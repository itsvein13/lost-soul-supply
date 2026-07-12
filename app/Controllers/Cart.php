<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Cart extends BaseController
{
    protected $productModel;
    protected $session;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->session      = \Config\Services::session();
    }

    public function index()
    {
        $cart = $this->session->get('cart') ?? [];
        return view('cart', ['cart' => $cart]);
    }

    public function add()
    {
        $product_id = (int) $this->request->getPost('product_id');
        $product    = $this->productModel->getProduct($product_id);

        if ($product) {
            $cart = $this->session->get('cart') ?? [];

            if (isset($cart[$product_id])) {
                $cart[$product_id]['quantity'] += 1;
            } else {
                $cart[$product_id] = [
                    'name'     => $product['name'],
                    'price'    => $product['price'],
                    'quantity' => 1,
                    'image'    => $product['image'],   // ✅ pakai 'image' bukan 'image_url'
                ];
            }

            $this->session->set('cart', $cart);
        }

        return redirect()->to('/cart');
    }

    public function remove($product_id)
    {
        $cart = $this->session->get('cart') ?? [];

        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
            $this->session->set('cart', $cart);
        }

        return redirect()->to('/cart');
    }
}
