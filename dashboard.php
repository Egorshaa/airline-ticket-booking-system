<?php
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$role = $_SESSION['role'];


switch ($role) {
    case 'admin':
        header("Location: admin/index.php");
        break;
    
    case 'director':
        header("Location: director/index.php");
        break;

    case 'support':
        header("Location: support/index.php");
        break;

    case 'client':
        header("Location: client/index.php");
        break;

    default:
     
        header("Location: logout.php");
        break;
}
exit;
?>