<?php


namespace App\Http\Controllers;

use App\Patient;
use App\PatientRecords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function getAddPatient()
    {
        $provinces = DB::table('province')->get();
        $ethnics = DB::table('ethnic')->get();
        return view('pages.dashboard.add-patient', ['provinces' => $provinces, 'ethnics' => $ethnics]);
    }

    public function postAddPatient(Request $request)
    {
        $this->validate($request,
            [
                'identityCard' => 'unique:tbl_patient,identity_card'
            ], [
                'identityCard.unique' => 'Patient information is already in the system, Request a retest by Identity Card'
            ]);
        $patient = new Patient;
        $patient->identity_card = $request->identityCard;
        $patient->full_name = $request->fullName;
        //đoạn này tí làm đăng nhập xong sửa
        $patient->id_hospital = "1";
        $patient->id_province = $request->province;
        $patient->id_district = $request->district;
        $patient->id_ward = $request->ward;
        $patient->sex = $request->sex;
        $patient->phone = $request->phoneNumber;
        $patient->id_ethnic = $request->ethnicGroup;
        $patient->job = $request->job;
        $patient->save();
        return redirect()->action('DashboardController@getAddRecord', ['idPatient' => $patient->id]);
    }

    public function getAddRecord(Request $request)
    {
        $patient = Patient::find($request->idPatient);
        $records = PatientRecords::where('id_patient', $request->idPatient)->get();
        return view('pages.dashboard.add-record', ['patient' => $patient, 'records' => $records]);
    }

    public function postAddRecord(Request $request)
    {
        $record = new PatientRecords;
        $record->id_patient = $request->idPatient;
        $record->id_hospital = 1;
        $record->name = $request->name;

        $file = $request->file('record');
        $file->move('upload', $file->getClientOriginalName());
        $record->path_value = "upload/" . $file->getClientOriginalName();
        $record->save();
        return redirect()->action('DashboardController@getAddRecord', ['idPatient' => $request->idPatient]);
    }

    public function postSearch(Request $request)
    {
        $patient = Patient::where('identity_card', $request->identity)->first();
        if ($patient == null) {
            return redirect()->back();
        }
        return redirect()->action('DashboardController@getAddRecord', ['idPatient' => $patient->id]);
    }
}
