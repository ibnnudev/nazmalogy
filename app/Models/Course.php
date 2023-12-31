<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $table = 'courses';

    protected $fillable = [
        'course_category_id',
        'name',
        'slug', // Add this line
        'thumbnail',
        'certificate',
        'price',
        'description',
        'language',
        'level',
        'phone',
        'is_active',
        'publish_status',
        'discount',
        'author_id',
    ];

    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function playlists()
    {
        return $this->hasMany(Playlist::class, 'course_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'course_id');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class, 'course_id');
    }

    public function courseLastTasks()
    {
        return $this->hasMany(CourseLastTask::class, 'course_id');
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'course_id');
    }
}
