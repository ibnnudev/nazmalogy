<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointType extends Model
{
    use HasFactory;

    public $table = 'point_types';

    protected $fillable = [
        'name',
        'amount',
    ];

    public function points()
    {
        return $this->hasMany(Point::class, 'point_type_id');
    }
}
