<?php

// transaksi

function getAllDataTransaksi() {
    $query = "SELECT
    transaksi.id,
    transaksi.waktu_transaksi,
    pelanggan.nama as nama_pelanggan,
    transaksi.keterangan,
    transaksi.total
    FROM transaksi
    JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function getDataTransaksiByDate($start, $end) {
    $query = "SELECT
    total, waktu_transaksi, MONTH(waktu_transaksi)
    FROM transaksi
    WHERE waktu_transaksi >= '$start' AND waktu_transaksi <= '$end'
    ORDER BY waktu_transaksi ASC";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function getDataDetailById($id) {
    $query = "SELECT
    dt.transaksi_id,
    dt.harga,
    dt.qty,
    barang.id,
    barang.nama_barang as nama
    FROM transaksi_detail as dt
    JOIN barang ON dt.barang_id = barang.id
    WHERE dt.transaksi_id = '$id'";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function updateTotalTransaksiByTransaksiId($id) {
    $query = "SELECT SUM(harga*qty) as total
    FROM transaksi_detail
    GROUP BY transaksi_id
    HAVING transaksi_id = '$id'";
    $temp = mysqli_query(DB, $query)->fetch_assoc()['total'];
    mysqli_query(DB,
    "UPDATE transaksi SET total = '$temp' WHERE id = '$id'");
}

function deleteDetailTransaksiById($transaksiId, $barangId) {
    $query = "DELETE FROM transaksi_detail
    WHERE transaksi_id = '$transaksiId' AND barang_id = '$barangId'";
    mysqli_query(DB, $query);
}

function cekTransaksiOnDetail($id) {
    $query = "SELECT * FROM transaksi_detail
    WHERE transaksi_id= '$id'";
    return mysqli_query(DB, $query);
}

function deleteTransaksiById($id) {
    $query = "DELETE FROM transaksi
    WHERE id = '$id'";
    mysqli_query(DB, $query);
}

function getDataDetailByBarangId($id) {
    $query = "SELECT * FROM transaksi_detail WHERE barang_id = '$id'";
    return mysqli_query(DB, $query);
}


function getDataTransaksiByPelangganId($id) {
    $query = "SELECT * FROM transaksi
    WHERE pelanggan_id = '$id'";
    return mysqli_query(DB, $query);
}

// supplier

function getAllDataSupplier() {
    $query = "SELECT * FROM supplier";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}
function getDataSupplierById($id) {
    $query = "SELECT * FROM supplier WHERE id = '$id'";
    return mysqli_query(DB, $query);
}

function deleteDataSupplierById($id) {
    $query = "DELETE FROM supplier WHERE id = $id";
    mysqli_query(DB, $query);
}

// barang

function getAllDataBarang() {
    $query = "SELECT
    barang.id as bid,
    barang.kode_barang,
    barang.nama_barang,
    barang.harga,
    barang.stok,
    supplier.id,
    supplier.nama
    FROM barang
    JOIN supplier ON barang.supplier_id = supplier.id
    ORDER BY bid";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function getDataBarangById($id) {
    $query = "SELECT
    barang.id as bid,
    barang.kode_barang,
    barang.nama_barang,
    barang.harga,
    barang.stok,
    supplier.id as sid,
    supplier.nama
    FROM barang
    JOIN supplier ON barang.supplier_id = supplier.id
    WHERE barang.id = '$id'";
    return mysqli_query(DB, $query)->fetch_assoc();
}

function getDataBarangBySupplierId($id) {
    $query = "SELECT * FROM barang WHERE supplier_id = '$id'";
    return mysqli_query(DB, $query);
}

function deleteDataBarangById($id) {
    $query = "DELETE FROM barang WHERE id = '$id'";
    mysqli_query(DB, $query);
}

function totalHargaBarangTerbeli() {
    $query = 'SELECT
    SUM(transaksi_detail.harga * transaksi_detail.qty) as total,
    COUNT(transaksi_detail.barang_id) as jumlah_pembeli,
    SUM(transaksi_detail.qty) as jumlah_terjual,
    barang.id,
    barang.nama_barang
    FROM transaksi_detail
    JOIN barang ON transaksi_detail.barang_id = barang.id
    GROUP BY transaksi_detail.barang_id
    ';
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function getLowwerStokBarang() {
    $query = "SELECT nama_barang, stok
    FROM barang
    WHERE stok = (SELECT MIN(stok) FROM barang)
    LIMIT 1";
    return mysqli_query(DB, $query)->fetch_assoc();
}

// pelanggan

function getAllDataPelanggan() {
    $query = "SELECT * FROM pelanggan";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function getDataPelangganById($id) {
    $query = "SELECT * FROM pelanggan WHERE id = '$id'";
    return mysqli_query(DB, $query)->fetch_assoc();
}

// user

function getAllDataUser() {
    $query = "SELECT * FROM user";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

// validate

function validateDate($date) {
    $waktuSekarang = date('Y-m-d');
    if($date < $waktuSekarang || $date === "") {
        return false;
    }
    return true;
}

function validateKeterangan($keterangan) {
    if($keterangan === "" || strlen($keterangan) < 3) {
        return false;
    }
    return true;
}

function validatePelanggan($id) {
    if($id === "") {
        return false;
    }
    return true;
}

function validateQty($qty) {
    if($qty === "" || !preg_match("/^\d+$/", $qty)) {
        return false;
    }
    return true;
}

function validateNama($nama) {
    if($nama === "" || preg_match("/[\d]/", $nama)) {
        return false;
    }
    return true;
}

function validatePass($password) {
    if($password === "" || strlen($password) < 8) {
        return false;
    }
    return true;
}

function validateUsername($username) {
    if($username === "" || !preg_match("/[a-zA-Z]+/", $username) || preg_match("/\s+/", $username) || !preg_match("/[\d]+/", $username)) {
        return false;
    }
    return true;
}

function validateName($nama) {
    $pattern = "/^[a-zA-Z\. ]+$/";
    return preg_match($pattern, $nama);
}

function validateTelepon($telp) {
    $pattern = "/^\d{10,13}$/";
    return preg_match($pattern, $telp);
}

function validateAlamat($alamat) {
    $alfa = "/[a-zA-Z]+/";
    $number = "/\d+/";
    return preg_match($alfa, $alamat) && preg_match($number, $alamat);
}


function validateKodeBarang($kode) {
    $pattert = "/^(BRG)([0-9]{3})$/";
    $query = "SELECT * FROM barang WHERE kode_barang = '$kode'";
    $result = mysqli_query(DB, $query);
    if($kode === "") {
        return "Kode Barang tidak boleh kosong!";
    } elseif(!preg_match($pattert, $kode)) {
        return "Format kode barang salah : BGR(000-999)";
    } elseif(mysqli_num_rows($result) !== 0) {
        return "Kode Barang sudah ada!";
    }
    return "";
}

function validateNamaBarang($nama) {
    if($nama === "") {
        return "Nama Barang tidak boleh kosong!";
    }
    return "";
}

function validateHargaBarang($harga) {
    $pattern = "/^\d+$/";
    if($harga === "") {
        return "Harga Barang tidak boleh kosong!";
    } elseif(!preg_match($pattern, $harga)) {
        return "Harga Barang harus angka!";
    }
    return "";
}

function validateStokBarang($stok) {
    $pattern = "/^\d+$/";
    if($stok === "") {
        return "Stok Barang tidak boleh kosong!";
    } elseif(!preg_match($pattern, $stok)) {
        return "Stok Barang harus angka!";
    }
    return "";
}

function validateSupplierBarang($sid) {
    if($sid === "") {
        return "Supplier Barang tidak boleh kosong!";
    }
    return "";
}

function formatDate($data) {
    $date = explode("-", $data);
    return $date[2] . " " . date("F", mktime(0, 0, 0, $date[1], 10)) . " " . $date[0];
}