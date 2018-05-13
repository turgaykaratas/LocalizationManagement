<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Contracts\IUserService;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    private $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function showSignin()
    {
        return view('user.signin');
    }

    public function signin(UserLoginRequest $request)
    {
        if ($this->userService->loginByEmailAndPassword($request->input('email'), $request->input('password'))) {
            return redirect()->route('user.profile');
        }

        return redirect()->route('user.signin')->withErrors(['Girdiğiniz Email veya Şifre yanlış!']);
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('user.signin');
    }

    public function list()
    {
        $users = $this->userService->getAllUser();

        return view('user.list', compact('users'));
    }


    public function create()
    {
        return view('user.create');
    }

    public function store(CreateUserRequest $request)
    {
        $user = $this->userService->ceateUserFromRequest($request);

        $this->userService->setUserRole($user, 'owner');

        return redirect()->route('user.list');
    }

    public function edit(int $id)
    {
        $user = $this->userService->getUserById($id);

        return view('user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, int $id)
    {
        $this->userService->updateUserFromRequest($request, $id);

        return redirect()->route('user.list');
    }
}
