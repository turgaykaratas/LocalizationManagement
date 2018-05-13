<?php

namespace App\Contracts;

use App\User;
use Illuminate\Http\Request;

interface IUserService
{
    public function getAllUser();
    public function ceateUserFromRequest(Request $request) : User;
    public function updateUserFromRequest(Request $request, int $id);
    public function getUserById(int $id) : User;
    public function setUserRole(User $user, string $roleName);
    public function loginByUser(User $user);
    public function loginByEmailAndPassword(string $email, string $pass) : bool;
}