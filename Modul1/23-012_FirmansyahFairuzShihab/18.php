<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <title>Biodata Dinamis</title>
    <style>
        table { border-collapse: collapse; width: 650px; margin: 20px auto; font-family: "Segoe UI", Tahoma, sans-serif; }
        th, td { border: 1px solid #ddd; padding: 10px; }
        th { background: #fafafa; text-align: left; width: 30%; }
        caption { font-weight: 700; font-size: 1.15rem; margin-bottom: 10px; }
    </style>
</head>
<body>

<?php
// Data biodata sebagai array asosiatif (mudah ditambah / diubah)
$biodata = [
    "Nama" => "Firmansyah Fairuz Shihab",
    "NIM" => "202112345",
    "Jurusan" => "Teknik Informatika",
    "Angkatan" => "2021",
    "Tempat, Tgl Lahir" => "Jakarta, 1 Januari 2003",
    "Alamat" => "Jl. Mawar No. 10, Jakarta",
    "Telepon" => "0812-3456-7890",
    "Email" => "firmansyah@example.com"
];
?>

<table>
    <caption>Biodata Mahasiswa (Dinamis)</caption>
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
