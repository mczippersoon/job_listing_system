<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employees";
    
    protected $fillable = [
        
        'first_name',
        'middle_name',
        'last_name',
        'company_name',
        'contact_number',
        'type_of_job',
        'description',
        'requirements'
        
    ];
}
