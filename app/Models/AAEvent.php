<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


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
    
public function scopeUpcoming($query)
{
    return $query->where('start_date', '>=', now());
}


public function scopeByOrganizer($query, $userId)
{
    return $query->where('user_id', $userId);
}
protected function startDate(): Attribute
{
    return Attribute::make(
        get: fn($value) => \Carbon\Carbon::parse($value)->format('d M Y'),
    );
}


protected function title(): Attribute
{
    return Attribute::make(
        set: fn($value) => ucfirst($value),
    );
}
}
