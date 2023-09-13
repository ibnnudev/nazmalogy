<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    public $table = 'points';

    protected $fillable = [
        'user_id',
        'point_type_id',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pointType()
    {
        return $this->belongsTo(PointType::class);
    }
}
