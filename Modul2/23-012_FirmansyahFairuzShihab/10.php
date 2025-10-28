<?php
session_start(); // Menyimpan data pesanan sementara

// Daftar menu
$menu = [
    "1" => ["nama" => "Nasi Goreng", "harga" => 15000],
    "2" => ["nama" => "Mie Ayam", "harga" => 12000],
    "3" => ["nama" => "Sate Ayam", "harga" => 20000],
    "4" => ["nama" => "Es Teh", "harga" => 5000],
    "5" => ["nama" => "Kopi", "harga" => 7000]
];

// Inisialisasi pesanan
if (!isset($_SESSION["pesanan"])) {
    $_SESSION["pesanan"] = [];
}

// Jika tombol tambah ditekan
if (isset($_POST["tambah"])) {
    $pilihan = $_POST["pilihan"] ?? "";

    if ($pilihan !== "" && isset($menu[$pilihan])) {
        $_SESSION["pesanan"][] = $menu[$pilihan];
        echo "<p style='color:green;'>Pesanan <b>{$menu[$pilihan]['nama']}</b> berhasil ditambahkan!</p>";
    } else {
        echo "<p style='color:red;'> Pilihan menu tidak valid!</p>";
    }
}

// Jika tombol hitung total ditekan
if (isset($_POST["hitung"])) {
    if (!empty($_SESSION["pesanan"])) {
        $total = 0;
        echo "<h3> Daftar Pesanan:</h3><ul>";
        foreach ($_SESSION["pesanan"] as $item) {
            echo "<li>{$item['nama']} - Rp " . number_format($item['harga'], 0, ',', '.') . "</li>";
            $total += $item["harga"];
        }
        echo "</ul>";
        echo "<h3>Total Bayar: <span style='color:blue;'>Rp " . number_format($total, 0, ',', '.') . "</span></h3>";
    } else {
        echo "<p style='color:red;'>Belum ada pesanan!</p>";
    }
}

// Jika tombol reset ditekan
if (isset($_POST["reset"])) {
    session_destroy();
    $_SESSION = [];
    echo "<p Pesanan telah dihapus!</p>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Kasir Sederhana</title>
</head>
<body>
    <h2> Sistem Kasir Sederhana</h2>

    <form method="post">
        <h4>Menu Makanan & Minuman:</h4>
        <ul>
            <?php foreach ($menu as $key => $item): ?>
                <li><?= $key ?>. <?= $item['nama'] ?> - Rp <?= number_format($item['harga'], 0, ',', '.') ?></li>
            <?php endforeach; ?>
        </ul>

        <label>Pilih nomor menu: </label>
        <input type="number" name="pilihan" min="1" max="5">
        <br><br>

        <button type="submit" name="tambah">Tambah Pesanan</button>
        <button type="submit" name="hitung">Selesai & Hitung Total</button>
        <button type="submit" name="reset">Reset Pesanan</button>
    </form>

    <?php
    // Tampilkan pesanan sementara
    if (!empty($_SESSION["pesanan"])) {
        echo "<h3> Pesanan Sementara:</h3><ul>";
        foreach ($_SESSION["pesanan"] as $item) {
            echo "<li>{$item['nama']} - Rp " . number_format($item['harga'], 0, ',', '.') . "</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
