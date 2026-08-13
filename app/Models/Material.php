<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PointLog;
use App\Models\Session;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'title',
        'content',
        'file_path',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function pointLogs()
    {
        return $this->morphMany(PointLog::class, 'source');
    }
}