<?php

namespace App\Models;

use App\Utility\TransactionStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amount', 'paid', 'date_to_pay', 'vat', 'including_vat', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
