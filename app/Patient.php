<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $table = 'tbl_patient';

    public function patient_records()
    {
        return $this->hasMany('App\PatientRecords', 'id_patient', 'id');
    }

    public function hospital()
    {
        return $this->belongsto('App\Hospital', 'id_hospital', 'id');
    }

    public function province()
    {
        return $this->belongsto('App\Province', 'id_province', 'id');
    }

    public function district()
    {
        return $this->belongsto('App\District', 'id_district', 'id');
    }

    public function ward()
    {
        return $this->belongsto('App\Ward', 'id_ward', 'id');
    }

    public function ethnic()
    {
        return $this->belongsto('App\Ethnic', 'id_ethnic', '_id');
    }

}
