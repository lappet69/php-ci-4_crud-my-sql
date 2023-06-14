<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table            = 'product';
    protected $primaryKey = 'id_produk';
    protected $allowedFields    = ['nama_produk', 'kategori',  'harga', 'status'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      =  [
        'nama_produk' => [
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => 'Nama Produk harus diisi',
                'min_length' => 'Nama produk terlalu pendek'
            ]
        ],
        'harga' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Harga harus diisi',
                'numeric' => 'Harga harus berupa angka'
            ]
        ],
        'kategori' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kategori harus diisi',

            ]
        ],
        'status' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Status harus diisi',

            ]
        ],
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
