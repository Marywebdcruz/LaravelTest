<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientLogs extends Model
{
    use HasFactory;

    protected $table = 'patient_log';

    protected $fillable = [
        'patient_id', 'date', 'time', 'sbp', 'dbp', 'bpm'
    ];
}
