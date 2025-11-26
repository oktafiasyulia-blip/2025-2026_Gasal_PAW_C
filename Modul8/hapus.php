<?php

require_once "../../config.php";

if(isset($_GET['nsajdbjasdnajda'])) {
    $id = $_GET['nsajdbjasdnajda'];
    $query = "DELETE FROM user WHERE id_user = '$id'";
    if(mysqli_query(DB, $query)) {
        echo "
        <script>
            alert('Berhasil menghapus user!');
            document.location.href = './';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Gagal menghapus user!');
        </script>
        ";
    }
} else {
    header("Location: ./");
    exit;
}