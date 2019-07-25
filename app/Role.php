<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
        /**  Many to Many Relationship Updated */
        public function users() {
            return $this->belongsToMany(User::class)->withPivot(['name'])->withTimestamps();
        }
}
