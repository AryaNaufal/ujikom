<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h2>Invoice Item #<?= htmlspecialchars($sale['id_sales']) ?? '-' ?></h2>

    <table>
        <tr>
            <th>ID Sales</th>
            <td><?= htmlspecialchars($sale['id_sales']) ?? '-' ?></td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td><?= htmlspecialchars($sale['tgl_sales']) ?? '-' ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?= htmlspecialchars($sale['status']) ?? '-' ?></td>
        </tr>
        <tr>
            <th>DO Customer</th>
            <td><?= htmlspecialchars($sale['do_customer']) ?? '-' ?></td>
        </tr>
        <tr>
            <th>ID Customer</th>
            <td><?= htmlspecialchars($sale['id_customer']) ?? '-' ?></td>
        </tr>
        <tr>
            <th>Nama Customer</th>
            <td><?= htmlspecialchars($sale['nama_customer']) ?? '-' ?></td>
        </tr>
    </table>

    <h3>Item Detail</h3>
    <table>
        <thead>
            <tr>
                <th>Nama Item</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $sale['nama_item'] ?? '-' ?></td>
                <td><?= $sale['quantity'] ?? '-' ?></td>
                <td><?= $sale['amount'] ?? '-' ?></td>
                <td><?= number_format($sale['harga_jual'] ?? 0, 0, ',', '.') ?></td>
                <td><?= number_format($sale['total'] ?? 0, 0, ',', '.') ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>