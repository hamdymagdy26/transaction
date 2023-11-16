<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amount', 'date_to_pay', 'vat', 'including_vat', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
