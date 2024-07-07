<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'start_date',
        'end_date',
        'employer_id', // Assuming you have an employer_id foreign key
        // Add more fields as needed
    ];

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }
}
