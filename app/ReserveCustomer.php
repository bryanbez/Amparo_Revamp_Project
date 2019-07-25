<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReserveCustomer extends Model
{
    protected $table = 'tbl_reservation';
    protected $guarded = [];

    public function getReserveStatusAttribute($attribute) {

        return [
            0 => 'Pending',
            1 => 'Not Approved',
            2 => 'Approved'
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
