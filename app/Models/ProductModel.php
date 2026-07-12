<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table         = 'products';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['name', 'price', 'stock', 'image', 'description', 'series'];

    // Ambil semua produk
    public function getAllProducts()
    {
        return $this->findAll();
    }

    // Ambil produk by ID
    public function getProduct($id)
    {
        return $this->find($id);
    }
}
