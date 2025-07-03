<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'tech_stack',
        'tags',
        'image',
        'project_file',
        'github_link',
        'live_link',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
