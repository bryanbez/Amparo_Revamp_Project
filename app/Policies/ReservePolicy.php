<?php

namespace App\Policies;

use App\User;
use App\ReserveCustomer;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReservePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the reserve customer.
     *
     * @param  \App\User  $user
     * @param  \App\ReserveCustomer  $reserveCustomer
     * @return mixed
     */
    public function view(User $user, ReserveCustomer $reserveCustomer)
    {
        //
    }

    /**
     * Determine whether the user can create reserve customers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {

      if($user->name == 'admin') {
        // Not Allowed
        return false;
      }
      else {
        return true;
      }

    }

    /**
     * Determine whether the user can update the reserve customer.
     *
     * @param  \App\User  $user
     * @param  \App\ReserveCustomer  $reserveCustomer
     * @return mixed
     */
    public function update(User $user, ReserveCustomer $reserveCustomer)
    {
        //
    }

    /**
     * Determine whether the user can delete the reserve customer.
     *
     * @param  \App\User  $user
     * @param  \App\ReserveCustomer  $reserveCustomer
     * @return mixed
     */
    public function delete(User $user, ReserveCustomer $reserveCustomer)
    {
        //
    }

    /**
     * Determine whether the user can restore the reserve customer.
     *
     * @param  \App\User  $user
     * @param  \App\ReserveCustomer  $reserveCustomer
     * @return mixed
     */
    public function restore(User $user, ReserveCustomer $reserveCustomer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the reserve customer.
     *
     * @param  \App\User  $user
     * @param  \App\ReserveCustomer  $reserveCustomer
     * @return mixed
     */
    public function forceDelete(User $user, ReserveCustomer $reserveCustomer)
    {
        //
    }
}
