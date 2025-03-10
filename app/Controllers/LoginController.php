<?php

namespace App\Controllers;

use App\Models\MLogin;
use App\Models\MMember;

class LoginController extends RestfulController
{
    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        log_message('debug', 'Email diterima: ' . $email);
        log_message('debug', 'Password diterima: ' . $password);

        $model = new MMember();
        $member = $model->where(['email' => $email])->first();

        log_message('debug', 'Data dari database: ' . json_encode($member));

        if (!$member) {
            log_message('error', 'Email tidak ditemukan di database: ' . $email);
            return $this->responseHasil(400, false, "Email tidak ditemukan");
        }

        if (!password_verify($password, $member['password'])) {
            log_message('error', 'Password salah untuk email: ' . $email);
            return $this->responseHasil(400, false, "Password tidak valid");
        }

        $login = new MLogin();
        $auth_key = $this->RandomString();
        $login->save([
            'member_id' => $member['id'],
            'auth_key' => $auth_key
        ]);

        $data = [
            'token' => $auth_key,
            'user' => [
                'id' => $member['id'],
                'email' => $member['email'],
            ]
        ];

        log_message('debug', 'Login berhasil untuk email: ' . $email);

        return $this->responseHasil(200, true, $data);
    }

    private function RandomString($length = 100)
    {
        $karakter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $panjang_karakter = strlen($karakter);
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $karakter[rand(0, $panjang_karakter - 1)];
        }
        return $str;
    }
}
