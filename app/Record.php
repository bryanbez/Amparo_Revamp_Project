<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
      protected $table = 'tbl_records';
      protected $guarded = [];

      // public function getTimeRequestOccupyAttribute($attribute) {
      //
      //     return [
      //         0 => 'AM',
      //         1 => 'PM',
      //         2 => 'Whole Day'
      //     ][$attribute];
      //
      // }
}
