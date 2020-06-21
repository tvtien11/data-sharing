<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientRecords extends Model
{

    protected $table = 'tbl_patient_records';

    public function patient()
    {
        return $this->belongsto('App\Patient', 'id_patient', 'id');
    }

    public function hospital()
    {
        return $this->belongsto('App\Hospital', 'id_hospital', 'id');
    }

}
