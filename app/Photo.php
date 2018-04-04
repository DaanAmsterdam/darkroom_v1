<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        //§'user_id', 'collection_id', 'title', 'body', 'shot_at', 'camera', 'lens', 'shutterspeed', 'aperture', 'iso', 'focallength', 'location', 'keywords', 'filename', 'views',
    ];

    protected $casts = [
        'shot_at' => 'date:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
