<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "sstore");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$waktuTransaksiError = $keteranganError = "";
$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");

if (isset($_POST["submit"])) {
    $waktu_transaksi = $_POST['waktu_transaksi'];
    $keterangan = $_POST['keterangan'];
    $pelanggan_id = $_POST['pelanggan_id'];

    $valid = true;
    echo validateTransactionDate($waktu_transaksi);
    if (!validateTransactionDate($waktu_transaksi)) {
        $waktuTransaksiError =  "Tanggal transaksi tidak boleh sebelum hari ini.";
        $valid = false;
    } 
    
    if (strlen($keterangan) < 3) {
        $keteranganError = "Keterangan minimal 3 karakter.";
        $valid = false;
    }
    
    // if ($valid) {
    //     $query = "INSERT INTO transaksi (waktu_transaksi, keterangan, pelanggan_id) 
    //               VALUES ('$waktu_transaksi', '$keterangan', '$pelanggan_id')";
    //     if (mysqli_query($conn, $query)) {
    //         echo "<script>
    //             alert('Transaksi berhasil ditambahkan.');
    //             document.location.href = 'data.php';
    //         </script>";
    //     } else {
    //         echo "Error: " . $query . "<br>" . mysqli_error($conn);
    //     }
    // }    
}
function validateTransactionDate($transactionDate) {
    $today = date('Y-m-d');
    // Cek apakah tanggal transaksi kurang dari hari ini
    if ($transactionDate < $today) {
        return false;
    }
    return true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <style>
        body {
            background-color: #f5f5f5;
            justify-content: center;
            display: flex;
            margin: 0;
        }

        h2 {
            text-align: center;
        }

        .form-card {    
            width: 100vw;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(1,1,1,0.1);
            display: flex;
            height: 100vh;
        }

        form {
            display: block;
            margin: auto;
            background-color: #ffffff;
            padding: 2rem;
            width: 30vw;
            height: 80vh;
            border-radius: 10px;
        }

        .form {
            margin-bottom: 20px;
        }

        .form label {
            display: block;
            color: #5b5959;
            margin-bottom: 5px;
        }

        .form input {
            width: 100%;
            padding: 10px;
            border: 1px solid black;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .error-message {
            color: red;
            font-size: 0.9em;
        }

        textarea, select {
            display: block;
            width: 100%;        
            font-size: 1rem;
            padding: 10px 8px;
        }

        textarea {
            width: 96%;
        }

        .submit {
            width: 100%;
            padding: 10px;
            background-color: #006bde;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .submit:hover {
            background-color: #085ab2;
        }
    </style>
</head>
<body> 
    <div class="form-card">
        <form method="POST">
            <h2>Tambah Data Transaksi</h2>
            <div class="form">
                <label for="waktu_transaksi">Waktu Transaksi</label>
                <input type="date" name="waktu_transaksi" required><br>
                <p class="error-message"><?= $waktuTransaksiError ?></p>
            </div>
            <div class="form">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" placeholder="Masukkan keterangan transaksi" required></textarea><br>
                <p class="error-message"><?= $keteranganError ?></p>
            </div>
            <div class="form">
                <label for="total">Total</label>
                <input type="number" name="total" id="total" value="0" readonly>
            </div>
            <div class="form">
                <label for="pelanggan_id">Pelanggan</label> 
                <select name="pelanggan_id">
                    <?php while($row = mysqli_fetch_assoc($pelanggan)) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                    <?php } ?>
                </select><br>
            </div>
            <div>
                <input class="submit" type="submit" name="submit" value="Tambah Transaksi">
            </div>
        </form>
    </div>
</body>
</html>
