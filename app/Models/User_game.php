<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_game extends Model
{
    use HasFactory;
    
    protected $fillable = ['id'];
    public $timestamps = false;
}
