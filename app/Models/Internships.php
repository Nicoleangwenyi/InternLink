<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internships extends Model
{
    use HasFactory;

    protected $table = 'internships';

    protected $fillable = [
        'title',
        'company_id',
        'location',
        'start_date',
        'end_date',
        'description',
        'requirements',
        'application_deadline',
        'stipend_salary',
        'contact_information',
        'company_overview',
        'benefits',
        'working_hours',
        'eligibility_criteria'
    ];
}
