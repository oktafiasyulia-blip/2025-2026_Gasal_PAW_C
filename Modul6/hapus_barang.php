<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "sstore");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['barang_id'])) {
    $barang_id = $_GET['barang_id'];

    $cek_barang = mysqli_query($conn, "SELECT * FROM transaksi_detail WHERE barang_id='$barang_id'");
    if (mysqli_num_rows($cek_barang) > 0) {
        echo "<script>
            alert('Barang sudah digunakan dalam transaksi, tidak bisa dihapus.');
            window.location.href = 'data.php';
        </script>";
    } else {
        $query = "DELETE FROM barang WHERE id='$barang_id'";
        if (mysqli_query($conn, $query)) {
            echo "<script>
                alert('Barang berhasil dihapus.');
                window.location.href = 'data.php';
            </script>";
        } else {
            echo "<script>
                alert('Error: " . mysqli_error($conn) . "');
                window.location.href = 'data.php';
            </script>";
        }
    }
} else {
    header('location: data.php');
}
?>