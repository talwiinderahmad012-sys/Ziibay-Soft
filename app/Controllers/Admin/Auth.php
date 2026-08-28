<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }
        return view('admin/auth/login');
    }

    public function attemptLogin()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            if ($user['status'] !== 'active') {
                return redirect()->back()->withInput()->with('error', 'Your account is inactive or banned.');
            }

            if (password_verify($password, $user['password_hash'])) {
                session()->set([
                    'user_id' => $user['id'],
                    'role_id' => $user['role_id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'isLoggedIn' => true
                ]);
                session()->regenerate();
                return redirect()->to('/admin/dashboard');
            }
        }
        
        return redirect()->back()->withInput()->with('error', 'Invalid login credentials.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}