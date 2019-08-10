<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReserveCustomer extends Model
{
    protected $table = 'tbl_reservation';
    protected $guarded = [];

    public function getReserveStatusAttribute($attribute) {
        return [
            0 => 'Approved',
            1 => 'Cancelled',
        ][$attribute];

    }

    // public function gettime_request_occupyAttribute($attribute) {
    //
    //     return [
    //         0 => 'AM',
    //         1 => 'PM',
    //         2 => 'Whole Day'
    //     ][$attribute];
    // }


}
