<?php
// Buat array baru
$weight = array("Andy" => "60", "Barry" => "58", "Charlie" => "62");

// Tampilkan seluruh data array $weight
foreach ($weight as $x => $x_value) {
    echo "Key = " . $x . ", Value = " . $x_value;
    echo "<br>";
}
?>

<!-- Kamu bisa gunakan skrip yang sama seperti pada array $height, hanya mengganti nama variabel array jadi $weight.
Tidak perlu menulis ulang struktur perulangannya, karena bentuknya sama — hanya sumber datanya (nama array) yang berubah. -->