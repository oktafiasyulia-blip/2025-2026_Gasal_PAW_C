<?php
function validasi($nama) {
    $error = array();

    if (!preg_match('/^[A-Z a-z]+$/', $nama)) {
        $error[] = "Harus Alfabet";
    }

    return $error;
}
?>
