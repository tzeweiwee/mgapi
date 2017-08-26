<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    protected $table = "transaction_history";
    public $timestamps = false;
    protected $fillable = ['user_ic', 'type', 'amount', 'status', 'reference_id', 'placement_id'];
}
