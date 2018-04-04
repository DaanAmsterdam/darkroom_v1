<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    // A collection has many  photos()
    // @foreach ($collection->photos as $photo)
    // {{ $photo->title }}
    // by {{ $photo->user->name }}
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
