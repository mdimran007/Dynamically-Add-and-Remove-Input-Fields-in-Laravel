<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['std_name', 'university', 'subject', 'cgpa','gender'];
    //protected $fillable = ['std_name', 'university', 'subject', 'cgpa',];
}
