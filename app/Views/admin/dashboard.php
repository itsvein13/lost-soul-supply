<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Lost Soul Supply</title>
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

        /* Sidebar */
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

        .sidebar nav a span {
            font-size: 1.1rem;
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
            font-size: 0.85rem;
        }

        /* Main */
        .main {
            margin-left: 240px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Topbar */
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
            transition: background 0.2s;
        }

        .logout-btn:hover {
            background: #e04050;
        }

        /* Content */
        .content {
            padding: 2rem;
        }

        /* Stats grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.2rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: #fff;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border-left: 4px solid #f45b69;
            transition: transform 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
        }

        .stat-card:nth-child(2) {
            border-left-color: #23c483;
        }

        .stat-card:nth-child(3) {
            border-left-color: #4a00e0;
        }

        .stat-card:nth-child(4) {
            border-left-color: #f0a500;
        }

        .stat-icon {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 0.2rem;
        }

        /* Table */
        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .card-header {
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h3 {
            font-size: 1rem;
            color: #333;
        }

        .card-header a {
            font-size: 0.82rem;
            color: #f45b69;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #fafafa;
            padding: 0.8rem 1.2rem;
            text-align: left;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #888;
            border-bottom: 1px solid #f0f0f0;
        }

        td {
            padding: 0.9rem 1.2rem;
            font-size: 0.88rem;
            color: #555;
            border-bottom: 1px solid #f9f9f9;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: #fafafa;
        }

        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .badge-pending {
            background: #fff3cd;
            color: #856404;
        }

        .badge-paid {
            background: #d1e7dd;
            color: #0f5132;
        }

        .badge-shipped {
            background: #cff4fc;
            color: #055160;
        }

        .badge-done {
            background: #d1e7dd;
            color: #0f5132;
        }

        .badge-cancelled {
            background: #f8d7da;
            color: #842029;
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

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <img src="https://i.ibb.co/VxpPWFz/Tak-berjudul3-20230425225531.png" alt="Lost Soul" />
        </div>

        <span class="sidebar-label">Menu</span>
        <nav>
            <a href="/admin" class="active"><span>📊</span> Dashboard</a>
            <a href="/admin/orders"><span>📦</span> Orders</a>
            <a href="/admin/products"><span>👕</span> Products</a>
            <a href="/admin/users"><span>👥</span> Users</a>
        </nav>

        <div class="sidebar-footer">
            Lost Soul Supply<br>Admin Panel
            <a href="/home">← View Store</a>
        </div>
    </aside>

    <!-- Main -->
    <div class="main">
        <div class="topbar">
            <h1>Dashboard</h1>
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

            <!-- Stats -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">📦</div>
                    <div class="stat-value"><?= $totalOrders ?></div>
                    <div class="stat-label">Total Orders</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">💰</div>
                    <div class="stat-value">Rp <?= number_format($totalRevenue, 0, ',', '.') ?></div>
                    <div class="stat-label">Total Revenue</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">👕</div>
                    <div class="stat-value"><?= $totalProducts ?></div>
                    <div class="stat-label">Products</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">👥</div>
                    <div class="stat-value"><?= $totalUsers ?></div>
                    <div class="stat-label">Customers</div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="card">
                <div class="card-header">
                    <h3>Recent Orders</h3>
                    <a href="/admin/orders">View All →</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($recentOrders)) : ?>
                            <?php foreach ($recentOrders as $order) : ?>
                                <tr>
                                    <td>#<?= $order['id'] ?></td>
                                    <td><?= htmlspecialchars($order['nama']) ?></td>
                                    <td>Rp <?= number_format($order['total'], 0, ',', '.') ?></td>
                                    <td><?= htmlspecialchars($order['pembayaran']) ?></td>
                                    <td><span class="badge badge-<?= $order['status'] ?>"><?= $order['status'] ?></span></td>
                                    <td><?= date('d M Y', strtotime($order['created_at'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" style="text-align:center; color:#999; padding: 2rem;">No orders yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>

</html>