<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctores';

    protected $fillable = [
        'user_id',
        'specialization',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function schedules()
    {
        return $this->hasMany(DoctorSchedule::class);
    }
}