<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    //Table Name
    protected $table = 'cycles'; 
    //public $primaryKey = 'id'; if wanna change the default primary key
    public $timestamps = false;
}
