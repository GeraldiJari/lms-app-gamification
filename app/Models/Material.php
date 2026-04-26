<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\PointLog;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'content',
        'file_path',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function pointLogs()
    {
        return $this->morphMany(PointLog::class, 'source');
    }
}
