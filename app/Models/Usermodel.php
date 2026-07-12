<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'role', 'reset_token', 'reset_expires', 'created_at'];

    public function findByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function findByToken($token)
    {
        return $this->where('reset_token', $token)
            ->where('reset_expires >=', date('Y-m-d H:i:s'))
            ->first();
    }
}
