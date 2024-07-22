<?php
require_once "../_connect.php";
session_destroy();
header('Location: /index.php');
?>