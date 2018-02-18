<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    //
    protected $primaryKey = 'TrackId';
    public $timestamps = false;

    public function Album()
    {
        return $this->belongsTo('App\Album', 'AlbumId');
    }

    public function MediaType()
    {
        return $this->belongsTo('App\MediaType', 'MediaTypeId');
    }
}
