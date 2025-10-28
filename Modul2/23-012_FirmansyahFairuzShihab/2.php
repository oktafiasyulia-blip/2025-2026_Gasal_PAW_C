<?php
$t = date("H"); // Mengambil jam saat ini dalam format 24 jam (00–23)

if ($t < "20") {
    echo "Have a good day!";
} else {
    echo "Have a good night!";
}
?>
