<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        $input['password'] = bcrypt($input['password']);
        User::create($input);

        echo '
        <script>
            alert("Đăng ký thành công. Vui lòng đăng nhập.");
            window.location.assign("login");
        </script>
        ';
    }

    public function login(Request $request)
    {
        $login = [
            'email' => $request->input('email'),
            'password' => $request->input('pw')
        ];

        if (Auth::attempt($login)) {
            $users = Auth::User();
            Session::put('users', $users);
            echo '<script>alert("Đăng nhập thành công."); window.location.assign("banhang");</script>';
        } else {
            echo '<script>alert("Đăng nhập thất bại."); window.location.assign("login");</script>';
        }
    }

    public function logout()
    {
        Session::forget('users');
        Session::forget('cart');
        return redirect('banhang');
    }
}
