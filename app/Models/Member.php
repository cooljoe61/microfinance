<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['fname','lname','oname','idnum','phonenum','dob','email','accnum','nok','location','mstatus'];
}