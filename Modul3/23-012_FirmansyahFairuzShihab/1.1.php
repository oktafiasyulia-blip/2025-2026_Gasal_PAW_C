<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

// Tambahkan 5 data baru
array_push($fruits, "Durian", "Mango", "Orange", "Papaya", "Apple");

// Tampilkan semua isi array
print_r($fruits);

// Tampilkan nilai dengan indeks tertinggi
$last_index = count($fruits) -1;
echo "<br>Nilai dengan indeks tertinggi: " . $fruits[$last_index];
echo "<br>Indeks tertinggi dari array \$fruits adalah: " . $last_index;
?>
