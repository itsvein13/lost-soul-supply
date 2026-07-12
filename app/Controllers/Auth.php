<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session   = \Config\Services::session();
    }

    // ── Login ──────────────────────────────────────────
    public function login()
    {
        if ($this->session->get('user_id')) {
            return redirect()->to('/home');
        }
        return view('auth/login');
    }

    public function loginProcess()
    {
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->findByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Invalid email or password.');
        }

        // Set session
        $this->session->set([
            'user_id'   => $user['id'],
            'user_name' => $user['name'],
            'user_email' => $user['email'],
            'user_role' => $user['role'],
            'logged_in' => true,
        ]);

        // Redirect berdasarkan role
        if ($user['role'] === 'admin') {
            return redirect()->to('/admin');
        }

        return redirect()->to('/home');
    }

    // ── Register ───────────────────────────────────────
    public function register()
    {
        if ($this->session->get('user_id')) {
            return redirect()->to('/home');
        }
        return view('auth/register');
    }

    public function registerProcess()
    {
        $name     = $this->request->getPost('name');
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirm  = $this->request->getPost('confirm_password');

        // Validasi password match
        if ($password !== $confirm) {
            return redirect()->back()->with('error', 'Passwords do not match.');
        }

        // Cek email sudah terdaftar
        if ($this->userModel->findByEmail($email)) {
            return redirect()->back()->with('error', 'Email is already registered.');
        }

        // Simpan user baru
        $this->userModel->insert([
            'name'       => $name,
            'email'      => $email,
            'password'   => password_hash($password, PASSWORD_DEFAULT),
            'role'       => 'customer',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/login')->with('success', 'Account created! Please log in.');
    }

    // ── Logout ─────────────────────────────────────────
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }

    // ── Forgot Password ────────────────────────────────
    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }

    public function forgotPasswordProcess()
    {
        $email = $this->request->getPost('email');
        $user  = $this->userModel->findByEmail($email);

        if (!$user) {
            return redirect()->back()->with('error', 'Email not found.');
        }

        // Generate token
        $token   = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

        $this->userModel->update($user['id'], [
            'reset_token'   => $token,
            'reset_expires' => $expires,
        ]);

        // Simpan token ke session buat ditampilkan (tanpa email server)
        $this->session->set('reset_link', base_url('/reset-password/' . $token));

        return redirect()->to('/forgot-password/sent');
    }

    public function forgotPasswordSent()
    {
        return view('auth/forgot_password_sent');
    }

    // ── Reset Password ─────────────────────────────────
    public function resetPassword($token)
    {
        $user = $this->userModel->findByToken($token);

        if (!$user) {
            return redirect()->to('/forgot-password')->with('error', 'Reset link is invalid or has expired.');
        }

        return view('auth/reset_password', ['token' => $token]);
    }

    public function resetPasswordProcess()
    {
        $token    = $this->request->getPost('token');
        $password = $this->request->getPost('password');
        $confirm  = $this->request->getPost('confirm_password');

        if ($password !== $confirm) {
            return redirect()->back()->with('error', 'Passwords do not match.');
        }

        $user = $this->userModel->findByToken($token);

        if (!$user) {
            return redirect()->to('/forgot-password')->with('error', 'Reset link is invalid or has expired.');
        }

        $this->userModel->update($user['id'], [
            'password'      => password_hash($password, PASSWORD_DEFAULT),
            'reset_token'   => null,
            'reset_expires' => null,
        ]);

        return redirect()->to('/login')->with('success', 'Password reset successful! Please log in.');
    }
}
