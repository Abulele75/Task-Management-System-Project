<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AARegistration extends Model
{
    use HasFactory;


   
    protected $table = 'registrations';

    protected $fillable = [
        'event_id',
        'user_id',
        'status',
    ];

    public function event(){
        return $this -> belongsTo(AAEvent::class);
    }

    public function user(){
        return $this -> belongsTo(AAUser::class);
    }

}