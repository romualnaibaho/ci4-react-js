<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Employee;
use App\Models\User;

class AuthController extends ResourceController
{

    private $admin;
    protected $format = 'json';

    public function __construct()
    {
        $this->admin = model('Admin');
    }

    public function loginAdmin()
    {
        $email = esc($this->request->getVar('email'));
        $password = esc($this->request->getVar('password'));

        $rules = $this->validate([
            'email'     => 'required|valid_email',
            'password'  => 'required'
        ]);

        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        $user = $this->admin->where('oud_email', $email)->first();

        if (count($user) == 0) {
            $description = 'User not found';
            return $this->failNotFound($description);
        }

        if (password_verify($password, $user['oud_password'])) {
            $data = [
                'message' => 'success',
                'data' => [
                    'fullname' => $user['oud_fullname'],
                    'email' => $user['oud_email'],
                    'userType' => $user['oud_user_type']
                ]
            ];
    
            return $this->respond($data, 200);
        }

        $errors = 'Autentikasi gagal. Silakan periksa kembali email dan password anda.';

        return $this->fail($errors, 400);
    }
}
