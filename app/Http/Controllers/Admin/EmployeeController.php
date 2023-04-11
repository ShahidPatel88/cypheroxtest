<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\UserVaccination;
use App\Models\VCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.employees.index');
    }
    public function getEmployeeList(Request $request){

        $data = UserVaccination::query()->whereHas('userList',function($q){
            $q->where('role_type',2);
        });

        if($request->dose_id != null){
            $dose_id=$request->dose_id;
            $data=$data->where('dose_id',$dose_id);
        }

        $data=$data->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($row) {
                return $row->userList->name??'-';
            })
            ->addColumn('company_name', function ($row) {
                return $row->companyList->name??'-';
            })
            ->addColumn('dose_name', function ($row) {
                return $row->doseList->dose_name??'-';
            })

            ->addColumn('dose_date', function ($row) {
                return $row->date_of_dose;
            })

            ->make(true);
    }
    public function create(){
        return view('admin.vaccine_company.add');
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'company_name' => "required|unique:vaccine_company,name",
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        VCompany::create([
           'name'=>$request->company_name,
        ]);

        return redirect()->route('vcompany')->with('success', 'Vaccine Company Created Successfully.');
    }
    public function edit($id){
        $vcompany=VCompany::find($id);
        return view('admin.vaccine_company.edit',compact('vcompany'));
    }
    public function update(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'company_name' => "required|unique:vaccine_company,name,$id",
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        VCompany::where('id',$id)->update([
           'name'=>$request->company_name,
        ]);
        return redirect()->route('vcompany')->with('success', 'Vaccine Company Updated Successfully.');
    }
    public function delete($id){
        $cities=VCompany::find($id);
        $cities->delete();
        return redirect()->route('vcompany')->with('success', 'Vaccine Company Deleted Successfully.');
    }
}
