<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $table = "business";
    protected $guarded =[''];
    protected $dates = ['date', 'another_date_field'];
}
