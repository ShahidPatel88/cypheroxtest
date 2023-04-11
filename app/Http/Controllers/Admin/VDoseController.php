<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\VCompanyDose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class VDoseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.vaccine_dose.index');
    }
    public function getVcompanyList(){
        $data = VCompanyDose::get();

        return Datatables::of($data)
            ->addIndexColumn()

            ->addColumn('dose_name', function ($row) {
                return $row->dose_name;
            })
            ->addColumn('action', function ($row) {
                $view ='';
                $edit = view('admin.edit')
                    ->with(['route' => route('vdose.edit',$row['id'])])
                    ->render();
                $view .= $edit;

                $delete = view('admin.delete')
                    ->with(['route' => route('vdose.delete', $row['id'])])
                    ->render();
                $view .= $delete;
                return $view;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function create(){
        $v_company=VCompanyDose::get();
        return view('admin.vaccine_dose.add',compact('v_company'));
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'dose_name' => "required|unique:vaccine_dose,dose_name",
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        VCompanyDose::create([
            'dose_name'=>$request->dose_name,
        ]);

        return redirect()->route('vdose')->with('success', 'Vaccine Dose Created Successfully.');
    }
    public function edit($id){
        $vcompany=VCompanyDose::find($id);
        return view('admin.vaccine_dose.edit',compact('vcompany'));
    }
    public function update(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'dose_name' => "required|unique:vaccine_dose,dose_name,$id",
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        VCompanyDose::where('id',$id)->update([
            'dose_name'=>$request->dose_name,
        ]);
        return redirect()->route('vdose')->with('success', 'Vaccine Dose Updated Successfully.');
    }
    public function delete($id){
        $cities=VCompanyDose::find($id);
        $cities->delete();
        return redirect()->route('vdose')->with('success', 'Vaccine Dose Deleted Successfully.');
    }
}
