<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Chef</title>
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --success: #10b981;
            --success-dark: #0d9668;
            --danger: #ef4444;
            --text-dark: #1f2937;
            --text-muted: #6b7280;
            --border: #e5e7eb;
            --bg-light: #f9fafb;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            color: var(--text-dark);
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }

        .dashboard-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 24px;
            margin-bottom: 24px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            border-bottom: 1px solid var(--border);
            padding-bottom: 16px;
        }

        .header-left {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            background-color: #eef2ff;
            color: var(--primary);
            padding: 3px 10px;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            justify-content: center;
        }

        .orders-table {
            width: 100%;
            border-collapse: collapse;
        }

        .orders-table th {
            text-align: left;
            font-weight: 600;
            color: var(--text-muted);
            border-bottom: 2px solid var(--border);
            padding: 12px 16px;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .orders-table td {
            padding: 16px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        .order-row {
            transition: background-color 0.2s;
        }

        .order-row:hover {
            background-color: var(--bg-light);
        }

        .order-row.completed {
            background-color: rgba(240, 240, 240, 0.5);
        }

        .order-row.completed td {
            color: var(--text-muted);
        }

        .order-code {
            font-weight: 600;
            color: var(--primary);
        }

        .empty-state {
            text-align: center;
            padding: 48px 0;
            color: var(--text-muted);
        }

        .empty-icon {
            font-size: 3rem;
            margin-bottom: 16px;
            opacity: 0.4;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 16px;
            font-weight: 500;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            font-size: 0.875rem;
        }

        .btn-success {
            background-color: var(--success);
            color: white;
        }

        .btn-success:hover {
            background-color: var(--success-dark);
        }

        .btn-disabled {
            background-color: #e5e7eb;
            color: var(--text-muted);
            cursor: not-allowed;
        }

        .tag {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .tag-distribution {
            background-color: #e0f2fe;
            color: #0369a1;
        }

        .tag-amount {
            background-color: #fef3c7;
            color: #92400e;
            border-radius: 9999px;
            padding: 2px 8px;
        }

        .timestamp {
            display: flex;
            flex-direction: column;
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        .time {
            font-weight: 500;
            color: var(--text-dark);
        }
         .btn-logout {
            padding: 8px 16px;
            background-color: var(--danger);
            color: white;
            border-radius: 6px;
            font-size: 0.875rem;
            text-decoration: none;
            display: inline-block;
        }

        .btn-logout:hover {
            background-color: #d92d2d;
        }
    </style>
</head>
<body>
    <div class="dashboard-card">
        <div class="card-header">
            <div class="header-left">
                <h2 class="card-title">Pesanan Masuk</h2>
                <span class="badge">Sudah Dibayar</span>
            </div>
            <a href="<?= site_url('logout') ?>" class="btn-logout">Logout</a>
        </div>
        <?php if (empty($transactions)): ?>
            <div class="empty-state">
                <div class="empty-icon">📋</div>
                <p>Belum ada pesanan masuk saat ini.</p>
            </div>
        <?php else: ?>
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Kode Pesanan</th>
                        <th>Menu</th>
                        <th>Jumlah</th>
                        <th>Distribusi</th>
                        <th>Waktu Pesanan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transactions as $trx): ?>
                        <tr class="order-row <?= ($trx->status == '0') ? 'completed' : '' ?>">
                            <td>
                                <span class="order-code"><?= esc($trx->code) ?></span>
                            </td>
                            <td><?= esc($trx->menu_name) ?></td>
                            <td>
                                <span class="tag tag-amount"><?= esc($trx->amount) ?></span>
                            </td>
                            <td>
                                <span class="tag tag-distribution"><?= esc($trx->distribution_name) ?></span>
                            </td>
                            <td>
                                <div class="timestamp">
                                    <span class="time"><?= date('H:i', strtotime($trx->date)) ?></span>
                                    <span><?= date('d M Y', strtotime($trx->date)) ?></span>
                                </div>
                            </td>
                            <td>
                                <form action="<?= site_url('chef/update_status/' . $trx->id) ?>" method="POST">
                                    <button type="submit" class="btn <?= ($trx->status == '0') ? 'btn-disabled' : 'btn-success' ?>">
                                        <?= ($trx->status == '0') ? 'Selesai' : 'Selesaikan' ?>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>