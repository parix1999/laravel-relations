<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    // Qui è il model che non ha la foreign key(che è la key)
    public function article() {
        return $this->hasMany(article::class);
    }
}
