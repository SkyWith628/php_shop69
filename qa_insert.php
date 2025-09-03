<?php
include "common.php";

$title = $_POST['title'];
$name = $_POST['name'];
$passwd = $_POST['passwd'];
$contents = $_POST['contents'];

$result = mysqli_query($db, "SELECT MAX(pos1) AS max_pos1 FROM qa");
$row = mysqli_fetch_assoc($result);
$pos1 = $row['max_pos1'] + 1;
$pos2 = 'A'; 
$sql = "INSERT INTO qa (title, name, passwd, contents, pos1, pos2, writeday, count) 
        VALUES ('$title', '$name', '$passwd', '$contents', '$pos1', '$pos2', NOW(), 0)";

if (mysqli_query($db, $sql)) {
    header("Location: qa.php");
} else {
    echo "에러: " . mysqli_error($db);
}
?>