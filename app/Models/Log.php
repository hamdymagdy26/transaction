<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sentFrom()
    {
        return $this->belongsTo(User::class, 'from', 'id');
    }

    public function receivedTo()
    {
        return $this->belongsTo(User::class, 'to', 'id');
    }
}
