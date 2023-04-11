<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Models\UserVaccination;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class VacaineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('employee.vaccination.add');
    }

    public function getVaccinationList()
    {
        return view('employee.vaccination.add');
    }

    public function submitvaccine(Request $request)
    {
        $is_vacianted=UserVaccination::where('user_id',Auth::user()->id)->where('company_id',$request->company_id)->where('dose_id',$request->dose_id)->first();
        if(isset($is_vacianted)){
            return redirect()->back()->with('error','You have already updated');
        }else{
            UserVaccination::create([
                'user_id'=>Auth::user()->id,
                'company_id'=>$request->company_id,
                'dose_id'=>$request->dose_id,
                'date_of_dose'=>Carbon::parse($request->date_dose)->format('Y-m-d'),
            ]);
            return redirect()->route('vaccine')->with('success', 'User Vaccination Created Successfully.');
        }

    }
}
