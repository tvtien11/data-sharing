<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table = 'tbl_hospital';

    public function patient()
    {
        return $this->hasMany('App\Patient', 'id_hospital', 'id');
    }

    public function patient_records()
    {
        return $this->hasMany('App\PatientRecords', 'id_hospital', 'id');
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

}
