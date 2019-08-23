<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Record;

class AccessRecord
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function AdminOnlyAccess(User $user) {

      return in_array($user->email, [
          'admin@gmail.com',
      ]);

    }


}
