<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['body'];
    protected $appends = array('hashtags');

    public function getHashtagsAttribute()
    {
        /* Match hashtags */
        $matches = [];
        preg_match_all('/#(\w+)/', $this->body, $matches);
        return $matches[1];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}