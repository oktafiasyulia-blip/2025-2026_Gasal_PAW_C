<?php
// Deklarasi awal array asosiatif
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");

// Tambahkan 5 data baru
$height["Diana"] = "160";
$height["Edward"] = "175";
$height["Fiona"] = "168";
$height["George"] = "172";
$height["Helen"] = "169";

// Tampilkan seluruh data dengan foreach
foreach ($height as $x => $x_value) {
    echo "Key = " . $x . ", Value = " . $x_value;
    echo "<br>";
}
?>

<!--Kamu tidak perlu mengubah skrip looping (baris foreach) karena foreach otomatis menyesuaikan dengan jumlah data yang ada di array.
Jadi saat kamu menambah 5 data baru, foreach langsung membaca semuanya tanpa ubahan tambahan.  -->