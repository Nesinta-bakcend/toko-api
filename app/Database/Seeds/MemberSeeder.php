<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama'     => 'Administrator',
            'email'    => 'admin@admin.com',
            'password' => password_hash('admin', PASSWORD_DEFAULT), // Hashing password
        ];

        $this->db->table('member')->insert($data);
    }
}
