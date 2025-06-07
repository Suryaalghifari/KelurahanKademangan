<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login()
    {
        $data = ['title' => 'Admin Kelurahan - Login'];
        return view('auth/login', $data);
    }
    public function loginProcess()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    
        $user = (new \App\Models\UserModel())->where('username', $username)->first();
    
        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'isLoggedIn' => true,
                'username'   => $user['username'],
                'role'       => $user['role'],
            ]);
            return redirect()->to('/admin')->with('message', 'Selamat datang!');
        }
    
        return redirect()->back()->with('error', 'Username atau password salah.');
    }
    
    public function logout()
    {
        session()->destroy(); // Menghapus semua data session
        return redirect()->to('auth/login')->with('message', 'Anda telah logout.');
    }
    

}
