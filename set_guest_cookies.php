<?php
$name = $_POST['name'];
$email = $_POST['email'];

setcookie('guest_name', $name);
setcookie('guest_email', $email);

header('Location: jumun.php');
exit();
?>