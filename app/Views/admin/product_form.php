<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - <?= $product ? 'Edit' : 'Add' ?> Product</title>
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

        .content {
            padding: 2rem;
            max-width: 600px;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            padding: 2rem;
        }

        .card h3 {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #f45b69;
            padding-bottom: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            display: block;
            font-size: 0.82rem;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.4rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.95rem;
            font-family: inherit;
            color: #333;
            background: #fafafa;
            outline: none;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #f45b69;
            box-shadow: 0 0 0 3px rgba(244, 91, 105, 0.1);
            background: #fff;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .image-preview {
            margin-top: 0.8rem;
        }

        .image-preview img {
            width: 100%;
            max-width: 200px;
            border-radius: 8px;
            border: 1px solid #eee;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .btn-submit {
            flex: 1;
            padding: 0.9em;
            background: #f45b69;
            color: #fff;
            border: none;
            border-radius: 45px;
            font-size: 0.95rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            background: #e04050;
            transform: translateY(-2px);
        }

        .btn-cancel {
            flex: 1;
            padding: 0.9em;
            background: #fff;
            color: #333;
            border: 1px solid #ddd;
            border-radius: 45px;
            font-size: 0.95rem;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-cancel:hover {
            border-color: #f45b69;
            color: #f45b69;
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
            <h1><?= $product ? 'Edit Product' : 'Add Product' ?></h1>
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
            <div class="card">
                <h3><?= $product ? 'Edit Product' : 'Add New Product' ?></h3>

                <form action="<?= $product ? '/admin/products/update/' . $product['id'] : '/admin/products/store' ?>" method="POST">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" value="<?= $product ? htmlspecialchars($product['name']) : '' ?>" required />
                    </div>
                    <div class="form-group">
                        <label>Price (Rp)</label>
                        <input type="number" name="price" value="<?= $product ? $product['price'] : '' ?>" required />
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" name="stock" value="<?= $product ? $product['stock'] : '' ?>" required />
                    </div>
                    <div class="form-group">
                        <label>Image URL</label>
                        <input type="text" name="image" id="imageInput" value="<?= $product ? htmlspecialchars($product['image']) : '' ?>" placeholder="https://..." />
                        <div class="image-preview" id="imagePreview">
                            <?php if ($product && $product['image']) : ?>
                                <img src="<?= htmlspecialchars($product['image']) ?>" id="previewImg" alt="Preview" />
                            <?php else : ?>
                                <img src="" id="previewImg" alt="Preview" style="display:none;" />
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description"><?= $product ? htmlspecialchars($product['description']) : '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Series / Collection Label (optional)</label>
                        <input type="text" name="series" value="<?= $product ? htmlspecialchars($product['series'] ?? '') : '' ?>" placeholder="e.g. New Collection, Contra Omens Collection" />
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-submit"><?= $product ? 'Update Product' : 'Add Product' ?></button>
                        <a href="/admin/products" class="btn-cancel">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Live image preview
        document.getElementById('imageInput').addEventListener('input', function() {
            const img = document.getElementById('previewImg');
            img.src = this.value;
            img.style.display = this.value ? 'block' : 'none';
        });
    </script>
</body>

</html>