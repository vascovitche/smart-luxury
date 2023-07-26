<?php

namespace Modules\Admin\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Models\Admin;

class AuthController extends AdminController
{
    public function index()
    {
        return $this->view('auth.index');
    }

    public function login()
    {
        $fields = $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $admin = Admin::where('email', $fields['email'])->first();

        if ($admin === null || !Hash::check($fields['password'], $admin->password)) {
            throw ValidationException::withMessages(['email' => 'Wrong credentials']);
        }

        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.home');
    }

}
