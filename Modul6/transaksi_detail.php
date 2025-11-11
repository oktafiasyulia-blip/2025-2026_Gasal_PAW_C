<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "sstore");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$barangError = "";
$transaksi = mysqli_query($conn, "SELECT * FROM transaksi");

if (isset($_POST['transaksi_id'])) {
    $transaksi_id = $_POST['transaksi_id'];
    $barang = mysqli_query($conn, "SELECT * FROM barang WHERE id NOT IN (SELECT barang_id FROM transaksi_detail WHERE transaksi_id='$transaksi_id')");
} else {
    $barang = mysqli_query($conn, "SELECT * FROM barang");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transaksi_id = $_POST['transaksi_id'];
    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qty'];

    $cek_barang = mysqli_query($conn, "SELECT * FROM transaksi_detail WHERE transaksi_id='$transaksi_id' AND barang_id='$barang_id'");
    if (mysqli_num_rows($cek_barang) > 0) {
        $barangError = "Barang ini sudah ada dalam transaksi.";
    } else {
        $barangData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga FROM barang WHERE id='$barang_id'"));
        $harga_total = $barangData['harga'] * $qty;
        
        $query = "INSERT INTO transaksi_detail (transaksi_id, barang_id, qty, harga) VALUES ('$transaksi_id', '$barang_id', '$qty', '$harga_total')";
        if (mysqli_query($conn, $query)) {
            updateTotalTransaksi($conn, $transaksi_id);
            echo "<script>
            alert('Detail transaksi berhasil ditambahkan.');
            document.location.href = 'data.php';
            </script>";
        }
    }
}

function updateTotalTransaksi($conn, $transaksi_id) {
    $result = mysqli_query($conn, "SELECT SUM(harga * qty) AS total FROM transaksi_detail WHERE transaksi_id='$transaksi_id'");
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'] ?? 0;

    mysqli_query($conn, "UPDATE transaksi SET total = '$total' WHERE id='$transaksi_id'");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Detail</title>
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
            height: 60vh;
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
            <h2>Tambah Detail Transaski</h2>
            <div class="form">
                <label for="barang_id">Pilih Barang</label> 
                <select name="barang_id">
                    <option value="" disabled selected>Pilih Barang</option>
                    <?php while($row = mysqli_fetch_assoc($barang)) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['nama_barang'] ?></option>
                        <?php } ?>
                    </select><br>
                    <p class="error-message"><?= $barangError ?></p>
                </div>
                <div class="form">
                    <label for="transaksi_id">ID Transaksi</label> 
                    <select name="transaksi_id">
                        <option value="" disabled selected>Pilih ID Transaksi</option>
                        <?php while($row = mysqli_fetch_assoc($transaksi)) { ?>
                            <option value="<?= $row['id'] ?>">ID Transaksi <?= $row['id'] ?></option>
                        <?php } ?>
                    </select><br>
                </div>
            <div class="form">
                <label for="qty">Quantity</label> 
                <input type="number" name="qty" required placeholder="Masukkan Jumlah Barang"><br>
            </div>
            <div>
                <input class="submit" type="submit" value="Tambah Detail Transaksi">
            </div>
        </form>
    </div>
</body>
</html>
