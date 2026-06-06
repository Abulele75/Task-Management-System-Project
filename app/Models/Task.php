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
        'user_id',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
        
    public function user() {
        return $this->belongsTo(AAUser::class);
    }
}
