<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Form Validation</title>
</head>
<body>
<?php
$nameError = $emailError = $dateError = "";
$name = $email = $date = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["name"])) {
        $nameError = "Nama Tidak Boleh Kosong";
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameError = "Hanya huruf dan spasi yang diperbolehkan.";
            $name = "";
        }
    }

    if (empty($_POST["email"])) {
        $emailError = "Email Tidak Boleh Kosong.";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Format email tidak valid.";
            $email = "";
        }
    }

    if (empty($_POST['tanggal'])) {
        $dateError = "Date Tidak Boleh Kosong";
    } else {
        $date = $_POST['tanggal'];
        if (!preg_match('/^\d{2}-\d{2}-\d{4}$/', $date)) {
            $dateError = "Format Tanggal tidak benar format yang benar dd-mm-yyyy";
            $date = "";
        }
    }
}
include ('no2.inc');
if ($_SERVER["REQUEST_METHOD"] === "POST" && empty($nameError) && empty($emailError) && empty($dateError)) {
    echo "<h4>Form submitted successfully with no errors.</h4>";
}
?>
</body>
</html>
