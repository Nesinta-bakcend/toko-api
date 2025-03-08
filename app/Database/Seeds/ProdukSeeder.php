<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_produk' => 'PRD001',
                'nama_produk' => 'Laptop ASUS ROG',
                'harga'       => 20000000
            ],
            [
                'kode_produk' => 'PRD002',
                'nama_produk' => 'Monitor Samsung 27"',
                'harga'       => 5000000
            ],
            [
                'kode_produk' => 'PRD003',
                'nama_produk' => 'Mouse Gaming Logitech',
                'harga'       => 750000
            ],
            [
                'kode_produk' => 'PRD004',
                'nama_produk' => 'Keyboard Mechanical Razer',
                'harga'       => 1500000
            ],
            [
                'kode_produk' => 'PRD005',
                'nama_produk' => 'Headset HyperX Cloud II',
                'harga'       => 1800000
            ],
            [
                'kode_produk' => 'PRD006',
                'nama_produk' => 'SSD NVMe Samsung 1TB',
                'harga'       => 2500000
            ],
            [
                'kode_produk' => 'PRD007',
                'nama_produk' => 'GPU Nvidia RTX 4080',
                'harga'       => 25000000
            ],
            [
                'kode_produk' => 'PRD008',
                'nama_produk' => 'Processor AMD Ryzen 9',
                'harga'       => 12000000
            ],
            [
                'kode_produk' => 'PRD009',
                'nama_produk' => 'RAM Corsair 32GB DDR5',
                'harga'       => 3200000
            ],
            [
                'kode_produk' => 'PRD010',
                'nama_produk' => 'Power Supply 850W Gold',
                'harga'       => 1700000
            ]
        ];

        $this->db->table('produk')->insertBatch($data);
    }
}
