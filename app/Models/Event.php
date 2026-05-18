<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AAEvent extends Model
{
    protected $fillable = [
        'title',
        'description',
        'location',
        'start_date',
        'end_date',
        'user_id',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function organiser(){
        return $this -> belongsTo(AAUser::class, 'user_id');

    }
    public function registrations(){
        $this -> hasMany(AARegistration::class);

    }

    public function attendees(){
        return $this -> belongsToMany(AAUser::class, 'registrations')
                     ->withPivot('status')
                     ->withTimestamps();

    }
}
