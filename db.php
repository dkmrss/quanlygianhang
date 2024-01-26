<?php
session_start();
@ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh'); //change zone as per need
define('ROOT_URL', 'http://quanlygianhang.abc/'); // CONST ROOT_URL = "http://localhost/case_study_module
define('ROOT_DIR', dirname(__FILE__));

$username   = 'root';
$password   = '';
$database   = 'db_quan_ly_gian_hang';
try {
    $conn = new PDO('mysql:host=localhost;dbname=' . $database, $username, $password);
} catch (Exception $e) {
    // echo $e->getMessage();
    echo '<h1>Khong the ket noi CSDL</h1>';
}
