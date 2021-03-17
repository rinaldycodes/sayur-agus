<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['payment', 'name', 'no_rek'];

    protected $hidden = [];

    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }
}
