<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Products</title>
    <link rel="icon" href="https://i.ibb.co.com/MSYKpXW/favicon-32x32.png" type="image/x-icon" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 240px;
            background: #111;
            color: #fff;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 100;
        }

        .sidebar-logo {
            padding: 1.5rem;
            border-bottom: 1px solid #222;
            text-align: center;
        }

        .sidebar-logo img {
            width: 80px;
        }

        .sidebar-label {
            font-size: 0.65rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #666;
            padding: 1.2rem 1.5rem 0.5rem;
        }

        .sidebar nav a {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.85rem 1.5rem;
            color: #aaa;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }

        .sidebar nav a:hover,
        .sidebar nav a.active {
            color: #fff;
            background: #1a1a1a;
            border-left-color: #f45b69;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 1.5rem;
            border-top: 1px solid #222;
            font-size: 0.8rem;
            color: #555;
        }

        .sidebar-footer a {
            color: #f45b69;
            text-decoration: none;
            display: block;
            margin-top: 0.5rem;
        }

        .main {
            margin-left: 240px;
            flex: 1;
        }

        .topbar {
            background: #fff;
            padding: 1rem 2rem;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar h1 {
            font-size: 1.3rem;
            color: #333;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #f45b69;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .user-info strong {
            display: block;
            font-size: 0.88rem;
            color: #333;
        }

        .user-info small {
            color: #999;
            font-size: 0.78rem;
        }

        .logout-btn {
            padding: 0.4em 1em;
            background: #f45b69;
            color: #fff;
            border: none;
            border-radius: 20px;
            font-size: 0.8rem;
            cursor: pointer;
            text-decoration: none;
        }

        .logout-btn:hover {
            background: #e04050;
        }

        .content {
            padding: 2rem;
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .btn-add {
            padding: 0.6em 1.4em;
            background: #f45b69;
            color: #fff;
            border-radius: 20px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: bold;
            transition: background 0.2s;
        }

        .btn-add:hover {
            background: #e04050;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 1.2rem;
            padding: 1.5rem;
        }

        .product-card {
            border: 1px solid #f0f0f0;
            border-radius: 10px;
            overflow: hidden;
            transition: box-shadow 0.2s;
        }

        .product-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .product-card-info {
            padding: 1rem;
        }

        .product-card-info h4 {
            font-size: 0.95rem;
            color: #333;
            margin-bottom: 0.3rem;
        }

        .product-card-info .price {
            color: #f45b69;
            font-weight: bold;
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
        }

        .product-card-info .stock {
            color: #999;
            font-size: 0.8rem;
            margin-bottom: 0.8rem;
        }

        .product-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-sm {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.78rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background: #e8f0ff;
            color: #4a00e0;
        }

        .btn-edit:hover {
            background: #d0e0ff;
        }

        .btn-delete {
            background: #ffe0e0;
            color: #d63030;
        }

        .btn-delete:hover {
            background: #ffc0c0;
        }

        .alert {
            padding: 0.8rem 1.2rem;
            border-radius: 8px;
            margin-bottom: 1.2rem;
            font-size: 0.88rem;
        }

        .alert-success {
            background: #e8f8f1;
            color: #1ea673;
            border: 1px solid #b2e8d0;
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <div class="sidebar-logo">
            <img src="https://i.ibb.co/VxpPWFz/Tak-berjudul3-20230425225531.png" alt="Lost Soul" />
        </div>
        <span class="sidebar-label">Menu</span>
        <nav>
            <a href="/admin"><span>📊</span> Dashboard</a>
            <a href="/admin/orders"><span>📦</span> Orders</a>
            <a href="/admin/products" class="active"><span>👕</span> Products</a>
            <a href="/admin/users"><span>👥</span> Users</a>
        </nav>
        <div class="sidebar-footer">
            Lost Soul Supply<br>Admin Panel
            <a href="/home">← View Store</a>
        </div>
    </aside>

    <div class="main">
        <div class="topbar">
            <h1>Products</h1>
            <div class="topbar-user">
                <div class="avatar"><?= strtoupper(substr(session()->get('user_name'), 0, 1)) ?></div>
                <div class="user-info">
                    <strong><?= session()->get('user_name') ?></strong>
                    <small><?= session()->get('user_email') ?></small>
                </div>
                <a href="/logout" class="logout-btn">Logout</a>
            </div>
        </div>

        <div class="content">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <div class="content-header">
                <span style="color:#888; font-size:0.9rem;"><?= count($products) ?> products</span>
                <a href="/admin/products/create" class="btn-add">+ Add Product</a>
            </div>

            <div class="card">
                <div class="product-grid">
                    <?php if (!empty($products)) : ?>
                        <?php foreach ($products as $p) : ?>
                            <div class="product-card">
                                <img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>"
                                    onerror="this.src='https://via.placeholder.com/220x180?text=No+Image'" />
                                <div class="product-card-info">
                                    <h4><?= htmlspecialchars($p['name']) ?></h4>
                                    <div class="price">Rp <?= number_format($p['price'], 0, ',', '.') ?></div>
                                    <div class="stock">Stock: <?= $p['stock'] ?> pcs</div>
                                    <div class="product-actions">
                                        <a href="/admin/products/edit/<?= $p['id'] ?>" class="btn-sm btn-edit">Edit</a>
                                        <a href="/admin/products/delete/<?= $p['id'] ?>" class="btn-sm btn-delete"
                                            onclick="return confirm('Delete this product?')">Delete</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p style="color:#999; padding:1rem;">No products yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>