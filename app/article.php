<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    // Qui ci andrà il model key:
    public function author() {
        return $this->belongsTo(author::class);
    }

    public function tag() {
        return $this->belongsToMany(tag::class);
    }
}
