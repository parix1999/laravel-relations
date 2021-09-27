<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    // Model many to many
    public function article() {
        return $this->belongsToMany(article::class);
    }
    
}
