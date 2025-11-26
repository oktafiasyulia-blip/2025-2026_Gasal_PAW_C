<?php 
$page = "Data Master";
$title = "Data User";
require_once "../../layouts/header.php";

if(isset($_POST['submit'])) {
    $username = strtolower($_POST['username']);
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $level = $_POST['level'];
    $valid = true;
    if(!validateUsername($username)) {
        $valid = false;
        $errUsername = "Username harus terdiri dari huruf dan angka!";
    }
    if(!validatePass($password)) {
        $valid = false;
        $errPass = "Password minimal 8 karakter!";
    }
    if(!validateNama($nama)) {
        $valid = false;
        $errNama = "Nama User tidak boleh mengandung angka!";
    }
    if(strlen($alamat) < 3) {
        $valid = false;
        $errAlamat = "Alamat minimal 3 karakter!";
    }
    if(strlen($hp) < 10 || strlen($hp) > 15) {
        $valid = false;
        $errHP = "Nomor HP 10-15 karakter!";
    }
    if($level === "") {
        $valid = false;
        $errLevel = "Jenis User harus diisi!";
    }
    if($valid) {
        echo "Berhasil";
        $password = hash('sha256', $password);
        $query = "INSERT INTO user VALUES (null, '$username', '$password', '$nama', '$alamat', '$hp', '$level')";
        if(mysqli_query(DB, $query)) {
            echo "
            <script>
                alert('Berhasil menambahkan user!');
                document.location.href = './';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Gagal menambahkan user!');
            </script>
            ";
        }
    }
}
?>
<div class="container d-flex min-vh-100 w-50">
    <form action="" method="post" class="container border p-3 shadow rounded rounded-4 m-auto">
        <h2 class="text-center mb-5">Tambah User Baru</h2>
        <?= isset($errUser)? "<p class='text-danger mb-3'>$errUser</p>" : '' ?>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Username..." value="<?= (isset($valid) && !$valid)? $username : '' ?>">
            <?= isset($errUsername)? "<p class='text-danger mb-3'>$errUsername</p>" : '' ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="********">
            <?= isset($errPass)? "<p class='text-danger mb-3'>$errPass</p>" : '' ?>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama User</label>
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama User" value="<?= (isset($valid) && !$valid)? $nama : '' ?>">
            <?= isset($errNama)? "<p class='text-danger mb-3'>$errNama</p>" : '' ?>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= (isset($valid) && !$valid)? $alamat : '' ?></textarea>
            <?= isset($errAlamat)? "<p class='text-danger mb-3'>$errAlamat</p>" : '' ?>
        </div>
        <div class="mb-3">
            <label for="hp" class="form-label">Nomor HP</label>
            <input type="number" id="hp" name="hp" class="form-control" placeholder="Nomor HP" value="<?= (isset($valid) && !$valid)? $hp : '' ?>">
            <?= isset($errHP)? "<p class='text-danger mb-3'>$errHP</p>" : '' ?>
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Jenis User</label>
            <select class="form-select" id="level" name="level" aria-label="Default select example">
                <option selected value="">-- Pilih Jenis User --</option>
                <option value="1" <?= (isset($valid) && !$valid && $level == 1)? 'selected' : '' ?>>Admin</option>
                <option value="2" <?= (isset($valid) && !$valid && $level == 2)? 'selected' : '' ?>>User Biasa</option>
            </select>    
            <?= isset($errLevel)? "<p class='text-danger mb-3'>$errLevel</p>" : '' ?>
        </div>
        <div class="container d-flex">
            <input type="submit" class="btn btn-success d-block me-3" name="submit" value="Tambah">
            <input type="button" onclick="document.location.href = './'" class="btn btn-danger d-block" value="Batal">
        </div>
    </form>
</div>
<?php require_once "../../layouts/footer.php"; ?>