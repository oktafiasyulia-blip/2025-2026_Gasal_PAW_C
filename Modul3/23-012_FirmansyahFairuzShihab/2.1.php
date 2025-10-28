<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

// Tambahkan 5 data baru menggunakan array_push
array_push($fruits, "Durian", "Mango", "Orange", "Papaya", "Apple");

// Hitung panjang array setelah penambahan
$arcLength = count($fruits);

// Tampilkan seluruh data menggunakan looping FOR
for ($x = 0; $x < $arcLength; $x++) {
    echo $fruits[$x] . "<br>";
}

echo "<br>Panjang array fruits saat ini adalah: " . $arcLength;
?>

<!-- Panjang array $fruits sekarang adalah 8.
Tidak perlu mengubah kode looping, karena count() menghitung panjang array secara dinamis. -->