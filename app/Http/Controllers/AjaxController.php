<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function getAjaxDistrict(Request $request)
    {
        $districts = DB::table('district')->where('_province_id', $request->idProvince)->get();
        echo "<option></option>";
        foreach ($districts as $d) {
            echo "<option value='" . $d->id . "'>" . $d->_name . "</option>";
        }
    }

    public function getAjaxWard(Request $request)
    {
        $wards = DB::table('ward')->where('_province_id', $request->idProvince)->where('_district_id', $request->idDistrict)->get();
        echo "<option></option>";
        foreach ($wards as $w) {
            echo "<option value='" . $w->id . "'>" . $w->_name . "</option>";
        }
    }
}
