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
<<<<<<< Updated upstream
        'category_id'
=======
        'category_id',
        'assigned_to',
>>>>>>> Stashed changes
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
        
    public function user() {
        return $this->belongsTo(AAUser::class);
    }
<<<<<<< Updated upstream
}
=======

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function assignedTo() {
    return $this->belongsTo(AAUser::class, 'assigned_to');
}
}
>>>>>>> Stashed changes
