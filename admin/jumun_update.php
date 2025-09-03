<?php
include "../common.php";

$id = $_REQUEST['id'];
$state = $_REQUEST['state'];

$sql = "UPDATE jumun SET state='$state' WHERE id='$id'";

if (!mysqli_query($db, $sql)) {
    die("에러: " . mysqli_error($db));
}

header("Location: jumun.php");
exit;
?>