<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timelog extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'time_in',
        'date',
        'time_out',
        
    ];

    use HasFactory;

    Public function user(){
        
        return $this -> belongsTo(User::class);
    }
    
    
}
