<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function registration_validate(Request $request)
    {
        $request->validate(
            [
                'nickname' => 'required|unique:users',
                'email' => 'required|unique:users|email',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ],
            [
                'nickname.required' => 'Поле обязательно для заполнения',
                'nickname.nickname' => 'Введите nickname',
                'nickname.unique' => 'Данный nickname уже занят',
                'email.required' => 'Поле обязательно для заполнения',
                'email.email' => 'Введите email',
                'email.unique' => 'Данный email уже занят',
                'password.required' => 'Поле обязательно для заполнения',
                'confirm_password.required' => 'Поле обязательно для заполнения',
            ],
        );
        $userInfo = $request->all();
        $userCreate = User::create([
            'nickname' => $userInfo['nickname'],
            'email' => $userInfo['email'],
            'password' => Hash::make($userInfo['password']),
            'role' => 2,
        ]);
        if ($userCreate) {
            Auth::login($userCreate);
            return redirect('/')->with('success', 'Вы зарегистрировались');
        } else {
            return redirect('/registration')->with('error', 'Ошибка регистрации');
        }
    }
    public function authorization_validate(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email:rfc,dns',
                'password' => 'required',
            ],
            [
                'email.required' => 'Поле обязательно для заполнения',
                'email.email' => 'Введите email правильно',
                'password.required' => 'Поле обязательно для заполнения',
            ],
        );

        $user_authorization = $request->only('email', 'password');

        if (Auth::attempt(['email' => $user_authorization['email'], 'password' => $user_authorization['password']])) {
            if (Auth::user()->role == 1) {
                return redirect('/admin/index')->with('success', 'Вы вошли как Администратор');
            } else {
                return redirect('/')->with('success', 'Добро пожаловать');
            }
        } else {
            return redirect('/authorization')->with('error', 'Ошибка авторизации');
        }
    }
    public function sign_out()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
