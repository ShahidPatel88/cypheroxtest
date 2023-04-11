<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserVaccination extends Model
{
    protected $table = "user_vaccination";

    protected $fillable = ['user_id','company_id','dose_id','date_of_dose'];

    public function userList(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function companyList(){
        return $this->belongsTo(VCompany::class,'company_id','id');
    }

    public function doseList(){
        return $this->belongsTo(VCompanyDose::class,'dose_id','id');
    }
}
