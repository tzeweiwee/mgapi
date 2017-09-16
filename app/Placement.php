<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
    //Table Name
    protected $table = 'placements'; 
    protected $fillable = ['user_ic', 'created_at', 'updated_at', 'status'];
}
