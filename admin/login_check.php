<?php
include '../common.php';

$adminid = $_POST['adminid'];
$adminpw = $_POST['adminpw'];

if ($adminid == $admin_id && $adminpw == $admin_pw) {

    setcookie("cookie_admin", "yes"); 

    header("Location: member.php");
    exit;
} else {

    setcookie("cookie_admin", ""); 

    header("Location: index.html");
    exit;
}
?>