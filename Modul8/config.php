<?php
define('BASEPATH', $_SERVER["DOCUMENT_ROOT"] . "/praktikum/08/");
define('BASEURL', "http://localhost/praktikum/08/");
define('DB', mysqli_connect("localhost", "root", "", "store"));

require_once 'database.php';