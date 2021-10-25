<?php

namespace App\Exports;

use App\Models\Patients;
use Maatwebsite\Excel\Concerns\FromCollection;

class PatientsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Patients::all();
    }
}
