<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VCompany extends Model
{
    protected $table = "vaccine_company";

    protected $fillable = ['name'];
}
