<?php
// Buat array baru $weight
$weight = array("Andy" => "60", "Barry" => "58", "Charlie" => "62");

// Tampilkan seluruh isi array
echo "<b>Array \$weight:</b><br>";
print_r($weight);

// Ambil data ke-2 dari array $weight
$keys = array_keys($weight);
$secondKey = $keys[1];

echo "<br><br>Data ke-2 dari array \$weight adalah: $secondKey = " . $weight[$secondKey];
?>
