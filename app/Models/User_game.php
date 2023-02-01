<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_game extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'id', 
                            'is_admin', 
                            'is_banned', 
                            'image', 
                            'level',
                            'stage', 
                            'max_box', 
                            'money', 
                            'exp', 
                            'team', 
                            'favorite'];
                            
    public $timestamps = false;
}
