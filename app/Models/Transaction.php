<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'address',
        'payment',
        'nominal',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function items() {
        return $this->hasMany(TransactionItem::class, 'transaction_id', 'id');
    }
}
