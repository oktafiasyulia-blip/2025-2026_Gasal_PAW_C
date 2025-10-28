<?php
$veggies = array("Carrot", "Broccoli", "Spinach");
$veggieLength = count($veggies);

echo "Daftar Sayuran:<br>";

for ($i = 0; $i < $veggieLength; $i++) {
    echo $veggies[$i] . "<br>";
}
?>

<!-- Panjang array $veggies = 3 data.
Kita cukup ubah nama variabel dan nilai array saja, tidak perlu ubah struktur looping karena cara aksesnya sama seperti array buah. -->