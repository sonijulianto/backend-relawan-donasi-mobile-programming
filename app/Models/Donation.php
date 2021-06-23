<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'dana_dibutuhkan',
        'dana_terkumpul',
        'description',
        'tags',
        'categories_is'
    ];

    public function galeries() {
        return $this->hasMany(DonationGallery::class, 'donations_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Donations::class, 'categories_id', 'id');
    }
}
