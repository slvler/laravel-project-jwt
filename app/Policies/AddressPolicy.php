<?php

namespace App\Policies;

use App\Models\Address;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddressPolicy
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
    /**
     * Determine if the given post can be updated by the user.
     */
    public function update(User $user, Address $address): bool
    {
        return $user->id === $address->user_id;
    }
}
