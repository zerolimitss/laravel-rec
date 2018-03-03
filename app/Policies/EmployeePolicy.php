<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
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

    public function addEmployee(User $user){
        foreach ($user->roles as $role) {
            if ($role->name == 'Admin') {
                return true;
            }
        }
        return false;
    }
}
