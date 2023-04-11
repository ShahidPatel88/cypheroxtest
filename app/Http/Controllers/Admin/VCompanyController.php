<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\VCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class VCompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.vaccine_company.index');
    }
    public function getVcompanyList(){
        $data = VCompany::get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('action', function ($row) {
                $view ='';
                $edit = view('admin.edit')
                    ->with(['route' => route('vcompany.edit',$row['id'])])
                    ->render();
                $view .= $edit;

                $delete = view('admin.delete')
                    ->with(['route' => route('vcompany.delete', $row['id'])])
                    ->render();
                $view .= $delete;
                return $view;
            })
            ->rawColumns(['action'])
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
