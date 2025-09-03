<?php
include "../common.php"; 

$id = $_REQUEST['id'];

$sql_jumuns = "DELETE FROM jumuns WHERE jumun_id='$id'";

if (!mysqli_query($db, $sql_jumuns)) {
    die("Query Error: " . mysqli_error($db));
}

$sql_jumun = "DELETE FROM jumun WHERE id='$id'";

if (!mysqli_query($db, $sql_jumun)) {
    die("Query Error: " . mysqli_error($db));
}

header("Location: jumun.php");
exit;
?>