<?php

namespace Database\Seeders;

use App\Models\Patients;
use Illuminate\Database\Seeder;
use DB;
class PatientTableSeelder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Patients::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Patients::factory(50000)->create();
    }
}
