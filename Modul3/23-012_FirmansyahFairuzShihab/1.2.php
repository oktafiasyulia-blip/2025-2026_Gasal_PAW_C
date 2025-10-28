<?php
$fruits = array("Avocado", "Blueberry", "Cherry", "Durian", "Mango", "Orange", "Papaya", "Apple");

// Hapus 1 data, misalnya "Cherry"
unset($fruits[2]);

// Reindex array biar rapi (opsional)
$fruits = array_values($fruits);

// Tampilkan semua isi array
print_r($fruits);

// Tampilkan nilai dan indeks tertinggi
$last_index = count($fruits) - 1;
echo "<br>Nilai dengan indeks tertinggi: " . $fruits[$last_index];
echo "<br>Indeks tertinggi sekarang: " . $last_index;
?>
