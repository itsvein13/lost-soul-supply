<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected $productModel;
    protected $userModel;
    protected $session;
    protected $db;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->userModel    = new UserModel();
        $this->session      = \Config\Services::session();
        $this->db           = \Config\Database::connect();

        // Guard: hanya admin yang bisa akses
        if ($this->session->get('user_role') !== 'admin') {
            redirect()->to('/login')->send();
            exit;
        }
    }

    // ── Dashboard ──────────────────────────────────────
    public function index()
    {
        $totalOrders   = $this->db->table('orders')->countAllResults();
        $totalRevenue  = $this->db->table('orders')->where('status', 'pending')->selectSum('total')->get()->getRowArray()['total'] ?? 0;
        $totalProducts = $this->productModel->countAll();
        $totalUsers    = $this->userModel->where('role', 'customer')->countAllResults();
        $recentOrders  = $this->db->table('orders')->orderBy('created_at', 'DESC')->limit(5)->get()->getResultArray();

        return view('admin/dashboard', [
            'totalOrders'   => $totalOrders,
            'totalRevenue'  => $totalRevenue,
            'totalProducts' => $totalProducts,
            'totalUsers'    => $totalUsers,
            'recentOrders'  => $recentOrders,
        ]);
    }

    // ── Orders ─────────────────────────────────────────
    public function orders()
    {
        $orders = $this->db->table('orders')->orderBy('created_at', 'DESC')->get()->getResultArray();
        return view('admin/orders', ['orders' => $orders]);
    }

    public function orderDetail($id)
    {
        $order = $this->db->table('orders')->where('id', $id)->get()->getRowArray();
        $items = $this->db->table('order_items')->where('order_id', $id)->get()->getResultArray();
        return view('admin/order_detail', ['order' => $order, 'items' => $items]);
    }

    public function updateOrderStatus($id)
    {
        $status = $this->request->getPost('status');
        $this->db->table('orders')->where('id', $id)->update(['status' => $status]);
        return redirect()->to('/admin/orders')->with('success', 'Order status updated.');
    }

    // ── Products ───────────────────────────────────────
    public function products()
    {
        $products = $this->productModel->getAllProducts();
        return view('admin/products', ['products' => $products]);
    }

    public function productCreate()
    {
        return view('admin/product_form', ['product' => null]);
    }

    public function productStore()
    {
        $data = [
            'name'        => $this->request->getPost('name'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'image'       => $this->request->getPost('image'),
            'description' => $this->request->getPost('description'),
            'series'      => $this->request->getPost('series') ?: null,
        ];
        if (! $this->db->fieldExists('series', 'products')) {
            unset($data['series']);
        }
        $this->productModel->insert($data);
        return redirect()->to('/admin/products')->with('success', 'Product added successfully.');
    }

    public function productEdit($id)
    {
        $product = $this->productModel->getProduct($id);
        return view('admin/product_form', ['product' => $product]);
    }

    public function productUpdate($id)
    {
        $data = [
            'name'        => $this->request->getPost('name'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'image'       => $this->request->getPost('image'),
            'description' => $this->request->getPost('description'),
            'series'      => $this->request->getPost('series') ?: null,
        ];
        if (! $this->db->fieldExists('series', 'products')) {
            unset($data['series']);
        }
        $this->productModel->update($id, $data);
        return redirect()->to('/admin/products')->with('success', 'Product updated successfully.');
    }

    public function productDelete($id)
    {
        $this->productModel->delete($id);
        return redirect()->to('/admin/products')->with('success', 'Product deleted.');
    }

    // ── Users ──────────────────────────────────────────
    public function users()
    {
        $users = $this->userModel->where('role', 'customer')->findAll();
        return view('admin/users', ['users' => $users]);
    }
}
