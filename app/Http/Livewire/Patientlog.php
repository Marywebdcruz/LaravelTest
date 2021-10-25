<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PatientLogs as PatientlogModel;
use Livewire\WithPagination;

class Patientlog extends Component
{
    use WithPagination;

    public $date, $sbp, $dbp, $bpm;
    
    // Validation Rules
    protected $rules = [
        // 'date'=>'required|date_format:d-m-Y',
        'sbp'=>'required',
        'dbp'=>'required',
        'bpm'=>'required'
    ];

    public function mount($id)
    {
        $this->id            = $id;
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
    }

    public function render()
    {
        $patientlogs = PatientlogModel::latest()->orderBy('created_at', 'asc')->paginate(50);
        return view('livewire.addpatientlog', ['patientlogs' => $patientlogs]);
    }

    public function store(){
        // Validate Form Request
        $this->validate();
        dd($this);
        // try{
            // Create PatientlogModel
            PatientlogModel::create([
                'date'=>date("Y-m-d", strtotime($this->date)),
                'sbp'=>$this->sbp,
                'dbp'=>$this->dbp,
                'bpm'=> $this->bpm,
                'patient_id'=> $this->id,
            ]);
    
            // Set Flash Message
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"PatientlogModel Created Successfully!!"
            ]);

            // Reset Form Fields After Creating PatientlogModel
            $this->resetFields();
        // }catch(\Exception $e){
            // Set Flash Message
            //session()->flash('error','Something goes wrong while creating PatientlogModel!!');
            // $this->dispatchBrowserEvent('alert',[
            //     'type'=>'error',
            //     'message'=>"Something goes wrong while creating patient!!"
            // ]);

        //     // Reset Form Fields After Creating PatientlogModel
            $this->resetFields();
        // }
    }

    public function resetFields(){
        $this->date = '';
        $this->sbp = '';
        $this->dbp = '';
        $this->bpm = '';
        $this->id = '';
    }

}
