<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VCompanyDose extends Model
{
    protected $table = "vaccine_dose";

    protected $fillable = ['dose_name'];

}
