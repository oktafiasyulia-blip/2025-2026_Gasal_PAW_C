<?php
// Deklarasi array multidimensi awal
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665")
);

// Tambahkan 5 data baru
$students[] = array("Daniel", "220404", "0812345666");
$students[] = array("Evelyn", "220405", "0812345667");
$students[] = array("Felix", "220406", "0812345668");
$students[] = array("Grace", "220407", "0812345669");
$students[] = array("Henry", "220408", "0812345670");

// Tampilkan hasilnya
for ($row = 0; $row < count($students); $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
        echo "<li>" . $students[$row][$col] . "</li>";
    }
    echo "</ul>";
}
?>
