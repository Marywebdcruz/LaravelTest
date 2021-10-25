<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patients as PatientsModel;
use Livewire\WithPagination;
use App\Exports\PatientsExport;
use Maatwebsite\Excel\Facades\Excel;

class Patients extends Component
{
    use WithPagination;

    public $name, $email, $mobile, $birthdate, $patient_id;
    public $updatePatient = false;

    protected $listeners = [
        'deletePatient' =>'destroy'
    ];

    // Validation Rules
    protected $rules = [
        'name'=>'required',
        'email'=>'required|email',
        'mobile'=>'required',
        'birthdate'=>'required|date_format:d/m/Y'
    ];

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
    }

    public function render()
    {
        $patients = PatientsModel::select('id','name','email','mobile', 'birthdate')->latest()->orderBy('created_at', 'asc')->paginate(50);
        
        return view('livewire.patient', ['patients' => $patients]);
    }

    public function resetFields(){
        $this->name = '';
        $this->email = '';
        $this->mobile = '';
        $this->birthdate = '';
    }

    public function store(){
        // Validate Form Request
        $this->validate();
        try{
            // Create Patient
            PatientsModel::create([
                'name'=>$this->name,
                'email'=>$this->email,
                'mobile'=>$this->mobile,
                'birthdate'=> date("Y-m-d", strtotime($this->birthdate)),
            ]);
    
            // Set Flash Message
            //session()->flash('success','Patient Created Successfully!!');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Patient Created Successfully!!"
            ]);

            // Reset Form Fields After Creating Patient
            $this->resetFields();
        }catch(\Exception $e){
            // Set Flash Message
            //session()->flash('error','Something goes wrong while creating Patient!!');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while creating patient!!"
            ]);

        //     // Reset Form Fields After Creating Patient
            $this->resetFields();
        }
    }

    public function edit($id){
        $patient = PatientsModel::findOrFail($id);
        $this->name = $patient->name;
        $this->email = $patient->email;
        $this->mobile = $patient->mobile;
        $this->birthdate = date("d/m/Y", strtotime($patient->birthdate));
        $this->patient_id = $patient->id;
        $this->updatePatient = true;
    }

    public function cancel()
    {
        $this->updatePatient = false;
        $this->resetFields();
    }

    public function update(){

        // Validate request
        $this->validate();
        
        try{

            // Update Patient
            PatientsModel::find($this->patient_id)->fill([
                'name'=>$this->name,
                'email'=>$this->email,
                'mobile'=>$this->mobile,
                'birthdate'=>$this->birthdate
            ])->save();

            //session()->flash('success','Patient Updated Successfully!!');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Patient Updated Successfully!!"
            ]);
    
            $this->cancel();
        }catch(\Exception $e){
            session()->flash('error','Something goes wrong while updating patient!!');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while updating patient!!"
            ]);
            $this->cancel();
        }
    }

    public function destroy($id){
        try{
            PatientsModel::find($id)->delete();
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Patient Deleted Successfully!!"
            ]);
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Something goes wrong while deleting patient!!"
            ]);
        }
    }

    public function patientExport()
    {
        return Excel::download(new PatientsExport, 'patients.xlsx');
    }
}
