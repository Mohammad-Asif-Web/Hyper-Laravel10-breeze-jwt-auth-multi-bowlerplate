<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barcode extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // Define the relationship with Profile
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

}
