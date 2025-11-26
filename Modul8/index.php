<?php
$page = "Data Master";
$title = "Data User";
require_once "../../layouts/header.php";

$dataUser = mysqli_query(DB, "SELECT id_user, username, nama, level FROM user");

?>
<div class="container">
    <h4 class="h4 bg-primary text-white py-3 ps-4 mt-4 mb-0">Data User</h4>
    <div class="container border border-gray p-0">
        <div class="container d-flex flex-row-reverse">
            <a href="./tambah.php" class="btn btn-success my-3 d-inline-block">Tambah User</a>
        </div>
        <table class="table table-hover mb-0 table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; while($data = mysqli_fetch_assoc($dataUser)) : ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td><?= $data["username"] ?></td>
                        <td><?= $data["nama"] ?></td>
                        <td><?= ($data["level"] == 1)? 'Admin' : 'User Biasa' ?></td>
                        <td>
                            <a href="./edit.php?lksakflksasa=<?= $data['id_user']?>" class="btn btn-warning">Edit</a>
                            <a href="./hapus.php?nsajdbjasdnajda=<?= $data['id_user']?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus <?= $data['nama']?>')">Hapus</a>
                        </td>
                        <?php $nomor++ ?>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once "../../layouts/footer.php"; ?>