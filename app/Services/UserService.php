<?php

namespace App\Services;

use App\User;
use App\Contracts\IUserService;
use Auth;
use App\Repositories\UserRepository;
use App\Role;
use Illuminate\Http\Request;


class UserService implements IUserService
{
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function getAllUser()
    {
        return $this->users->all();
    }

    public function ceateUserFromRequest(Request $request) : User
    {
        $user = $this->users->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return $user;
    }

    public function updateUserFromRequest(Request $request, int $id)
    {   
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ];

        if ($request->input('password'))
            $data['password'] = bcrypt($request->input('password'));

        $user = $this->users->update($data, $id);
    }

    public function getUserById(int $id) : User
    {
        return $this->users->find($id);
    }

    public function setUserRole(User $user, string $roleName)
    {
        $role = Role::where('name', $roleName)->first();
        if ($role) {
            $user->attachRole($role);
        }
    }

    public function loginByUser(User $user)
    {
        Auth::login($user);
    }

    public function loginByEmailAndPassword(string $email, string $pass) : bool
    {
        return Auth::attempt(['email' => $email, 'password' => $pass]);
    }
}