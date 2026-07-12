<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        // Ambil 3 produk terbaru untuk preview di homepage
        $data['products'] = $this->productModel->orderBy('created_at', 'DESC')->limit(3)->find();
        return view('home', $data);
    }

    public function collection()
    {
        // Terbaru tampil paling atas (New Collection di depan)
        $data['products'] = $this->productModel->orderBy('created_at', 'DESC')->findAll();
        return view('collection', $data);
    }

    public function product($id)
    {
        $data['product'] = $this->productModel->getProduct($id);

        if (!$data['product']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk tidak ditemukan.");
        }

        return view('product_detail', $data);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
