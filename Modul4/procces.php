<!DOCTYPE html>
<html>
<head>
    <title>Form Data</title>
</head>
<body>
    <?php
    echo "<h1>Form Data:</h1>";
    include ('validasi.inc.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $salah = validasi($nama);

        if (empty($salah)) {
            foreach ($_POST as $key => $value) {
                echo "<br><strong>$key:</strong> $value";
            }
        } else {
            echo "<b> Data ada yang salah </b>"; 
            foreach ($salah as $error) {
                echo $error;
            }
        }
    }
    ?>
</body>
</html>
