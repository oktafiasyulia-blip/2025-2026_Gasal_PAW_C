<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <title>Biodata Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; }
        table { border-collapse: collapse; width: 650px; margin: 30px auto; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 10px; }
        th { background: #f0f0f0; width: 30%; text-align: left; }
        caption { font-size: 1.3rem; font-weight: bold; margin-bottom: 10px; }
    </style>
</head>
<body>

<?php
// Ambil data dari query string dengan fallback nilai default
$nama     = $_GET['nama']     ?? "Tidak diisi";
$nim      = $_GET['nim']      ?? "Tidak diisi";
$jurusan  = $_GET['jurusan']  ?? "Tidak diisi";
$angkatan = $_GET['angkatan'] ?? "Tidak diisi";
$ttl      = $_GET['ttl']      ?? "Tidak diisi";
$alamat   = $_GET['alamat']   ?? "Tidak diisi";
$telepon  = $_GET['telepon']  ?? "Tidak diisi";
$email    = $_GET['email']    ?? "Tidak diisi";

// Simpan ke array untuk fleksibilitas
$biodata = [
    "Nama" => $nama,
    "NIM" => $nim,
    "Jurusan" => $jurusan,
    "Angkatan" => $angkatan,
    "Tempat, Tgl Lahir" => $ttl,
    "Alamat" => $alamat,
    "Telepon" => $telepon,
    "Email" => $email
];
?>

<table>
    <caption>Biodata Mahasiswa</caption>
    <tr><th>Field</th><th>Informasi</th></tr>
    <?php foreach ($biodata as $field => $value): ?>
        <tr>
            <td><?= htmlspecialchars($field) ?></td>
            <td><?= nl2br(htmlspecialchars($value)) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
