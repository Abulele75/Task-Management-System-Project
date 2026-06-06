<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AAUser;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'priority',
        'status',
        'deadline',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(AAUser::class);
    }
}
