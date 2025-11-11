<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "sstore");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$barang = mysqli_query($conn, "SELECT barang.*, supplier.id as supplier_id, supplier.nama as nama_supplier
                               FROM barang
                               CROSS JOIN supplier ON barang.supplier_id = supplier.id");

$transaksi = mysqli_query($conn, "SELECT transaksi.*, pelanggan.nama AS nama_pelanggan 
                                  FROM transaksi 
                                  LEFT JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id");

$transaksi_detail = mysqli_query($conn, "SELECT transaksi_detail.*, barang.nama_barang 
                                         FROM transaksi_detail 
                                         LEFT JOIN barang ON transaksi_detail.barang_id = barang.id");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master</title>
    <script>
        function confirmDelete(barang_id) {
            if (confirm("Anda yakin ingin menghapus barang ini?")) {
                window.location.href = 'hapus_barang.php?barang_id=' + barang_id;
            }
        }
    </script>
    <style>
        .container {
            display:flex;
        }

        .container div:nth-child(2) {
            margin-left: 2rem;
        }

        .submit {
            background-color: #006bde;
            color: white;
            font-size: 16px;
            border: none;
            border-radius:8px;
            padding: 10px;
            margin-top: 10px;
        }
        
        .submit a {
            color:white;
            text-decoration: none;
        }

        .submit:hover {
            background-color: #085ab2;
        }
    </style>
</head>
<body>
<h2>Pengelolaan Master Detail</h2>
<h3>Barang</h3>
<table border="1">
    <tr><th>ID</th><th>Kode Barang</th><th>Nama</th><th>Harga</th><th>Stok</th><th>Nama Supplier</th><th>Action</th></tr>
    <?php while($row = mysqli_fetch_assoc($barang)) { ?>
        <tr>
            <td><?= $row['supplier_id'] ?></td>
            <td><?= $row['kode_barang'] ?></td>
            <td><?= $row['nama_barang'] ?></td>
            <td><?= $row['harga'] ?></td>
            <td><?= $row['stok'] ?></td>
            <td><?= $row['nama_supplier'] ?? '-' ?></td>
            <td><button onclick="return confirmDelete(<?= $row['id'] ?>)">Delete</button></td>
        </tr>
    <?php } ?>
</table>
<div class="container">
    <div>
        <h3>Transaksi</h3>
        <table border="1">
            <tr><th>ID</th><th>Waktu</th><th>Keterangan</th><th>Total</th><th>Nama Pelanggan</th></tr>
            <?php while($row = mysqli_fetch_assoc($transaksi)) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['waktu_transaksi'] ?></td>
                    <td><?= $row['keterangan'] ?></td>
                    <td><?= $row['total'] ?></td>
                    <td><?= $row['nama_pelanggan'] ?? '-' ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div>
        <h3>Transaksi Detail</h3>
        <table border="1">
            <tr><th>ID Transaksi</th><th>Nama Barang</th><th>Harga</th><th>Qty</th></tr>
            <?php while($row = mysqli_fetch_assoc($transaksi_detail)) { ?>
                <tr>
                    <td><?= $row['transaksi_id'] ?></td>
                    <td><?= $row['nama_barang'] ?? '-' ?></td>
                    <td><?= $row['harga'] ?></td>
                    <td><?= $row['qty'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<button class="submit"><a href="transaksi.php">Tambah Transaksi</a></button>
<button class="submit"><a href="transaksi_detail.php">Tambah Detail Transaksi</a></button>
</body>
</html>