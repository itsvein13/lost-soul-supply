<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Checkout extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $cart = $this->session->get('cart') ?? [];

        // Kalau cart kosong, redirect ke collection
        if (empty($cart)) {
            return redirect()->to('/collection');
        }

        // Hitung total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('checkout', [
            'cart'  => $cart,
            'total' => $total,
        ]);
    }

    public function process()
    {
        $cart = $this->session->get('cart') ?? [];

        if (empty($cart)) {
            return redirect()->to('/collection');
        }

        // Ambil data form
        $nama      = $this->request->getPost('nama');
        $email     = $this->request->getPost('email');
        $hp        = $this->request->getPost('hp');
        $alamat    = $this->request->getPost('alamat');
        $catatan   = $this->request->getPost('catatan');
        $pembayaran = $this->request->getPost('pembayaran');

        // Hitung total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $db = \Config\Database::connect();

        // Insert ke tabel orders
        $db->table('orders')->insert([
            'nama'        => $nama,
            'email'       => $email,
            'hp'          => $hp,
            'alamat'      => $alamat,
            'catatan'     => $catatan,
            'pembayaran'  => $pembayaran,
            'total'       => $total,
            'status'      => 'pending',
            'created_at'  => date('Y-m-d H:i:s'),
        ]);

        $order_id = $db->insertID();

        // Insert ke tabel order_items
        foreach ($cart as $product_id => $item) {
            $db->table('order_items')->insert([
                'order_id'   => $order_id,
                'product_id' => $product_id,
                'nama'       => $item['name'],
                'harga'      => $item['price'],
                'qty'        => $item['quantity'],
            ]);
        }

        // Kosongkan cart
        $this->session->remove('cart');

        // Redirect ke thank you page
        return redirect()->to('/checkout/success/' . $order_id);
    }

    public function success($order_id)
    {
        $db    = \Config\Database::connect();
        $order = $db->table('orders')->where('id', $order_id)->get()->getRowArray();
        $items = $db->table('order_items')->where('order_id', $order_id)->get()->getResultArray();

        if (!$order) {
            return redirect()->to('/home');
        }

        return view('checkout_success', [
            'order' => $order,
            'items' => $items,
        ]);
    }
}
