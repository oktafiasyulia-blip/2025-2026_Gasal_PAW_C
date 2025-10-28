<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Grade Nilai Mahasiswa</title>
</head>
<body>
    <h2>Program Penentuan Grade Nilai Mahasiswa</h2>

    <form method="post">
        Masukkan Nilai Anda: <input type="number" name="nilai" required>
        <input type="submit" value="Cek Grade">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nilai = $_POST["nilai"];

        if ($nilai >= 85 && $nilai <= 100) {
            $grade = "A";
        } elseif ($nilai >= 70) {
            $grade = "B";
        } elseif ($nilai >= 55) {
            $grade = "C";
        } elseif ($nilai >= 40) {
            $grade = "D";
        } else {
            $grade = "E";
        }

        echo "<h3>Nilai Anda: $nilai</h3>";
        echo "<h3>Grade: $grade</h3>";
    }
    ?>
</body>
</html>
