<?php
require_once "../_connect.php";
unset($_SESSION['user']);
header('Location: /index.php');
?>