<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");

$height["Diana"] = "160";
$height["Edward"] = "175";
$height["Fiona"] = "168";
$height["George"] = "172";
$height["Helen"] = "169";

echo "<b>Data setelah menambah 5 orang:</b><br>";
print_r($height);

$keys = array_keys($height);
$lastKey = end($keys);

echo "<br><br>Nilai dengan indeks terakhir: " . $height[$lastKey];
?>
