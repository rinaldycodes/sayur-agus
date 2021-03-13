<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'receiver_name', 'no_telp', 
        'address', 'message', 'transaction_total', 
        'transaction_status', 'payment'
    ];

    protected $hidden = [];

    // USER HAS OWN TRANSACTION
    function user(){
        return $this->belongsTo(User::class);
    }

    // Trasaction has many transaction details 
    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}

