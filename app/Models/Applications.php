<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Applications extends Model
{
    use HasFactory;

    protected $table = 'applications';

    protected $fillable = [
        'user_id',
        'internship_id',
        'cover_letter',
        'resume',
        'status',
        'applied_at',
    ];
    public function internship()
{
    return $this->belongsTo(Internships::class, 'internship_id');
}

public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
