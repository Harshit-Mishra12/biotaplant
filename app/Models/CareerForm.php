<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'current_location',
        'cv_path'
    ];
}
