<?php

namespace App\Repositories;

use App\User;
use App\Repositories\Core\Repository;

class UserRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return User::class;
    }
}