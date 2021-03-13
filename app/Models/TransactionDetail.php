<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id', 'product_id', 'qty', 'sub_total'
    ];

    protected $hidden = [];

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
