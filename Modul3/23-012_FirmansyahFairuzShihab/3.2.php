<?php
// Deklarasi awal array
$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170",
    "Diana" => "160",
    "Edward" => "175",
    "Fiona" => "168",
    "George" => "172",
    "Helen" => "169"
);

// Hapus 1 data tertentu (misal: Barry)
unset($height["Barry"]);

// Tampilkan data setelah penghapusan
echo "<b>Setelah menghapus 1 data (Barry):</b><br>";
print_r($height);

// Tampilkan nilai dengan indeks terakhir (kompatibel semua versi PHP)
$keys = array_keys($height);
$lastKey = end($keys);
echo "<br><br>Nilai dengan indeks terakhir sekarang: " . $height[$lastKey];
