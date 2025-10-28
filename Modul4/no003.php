<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Ambil data dari form
    $nama     = $_POST["name"];
    $email    = $_POST["email"];
    $tanggal  = $_POST["tanggal"];

    // Validasi Nama
    if (is_string($nama)) {
        $nama = strtoupper($nama);
        echo "Nama Lengkap : $nama <br>";
    } else {
        echo "Kolom Nama Lengkap harus diisi dengan string.<br>";
    }

    // Validasi Email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email Address : $email <br>";
    } else {
        echo "Email Address tidak valid. Gunakan format seperti email pada umumnya, contoh: 'aziz@gmail.com'.<br>";
    }

    // Validasi Tanggal (Format: DD-MM-YYYY)
    if (preg_match("/^\d{2}-\d{2}-\d{4}$/", $tanggal)) {
        echo "Tanggal : $tanggal <br>";
    } else {
        echo "Format Tanggal tidak valid. Gunakan format DD-MM-YYYY, contoh: '26-12-2005'.<br>";
    }
}
?>
