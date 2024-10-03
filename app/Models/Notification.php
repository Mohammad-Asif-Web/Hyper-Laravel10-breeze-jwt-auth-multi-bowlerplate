<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     * the primary key 'id' must be cast in integer first
    */
    protected $casts = [
        'id' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
