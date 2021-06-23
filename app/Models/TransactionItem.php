<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'donations_id',
        'transaction_id',
        'quantity'  
    ];

    public function donation() {
        return $this->hasOne(Donation::class, 'id', 'donations_id');
    }
}
