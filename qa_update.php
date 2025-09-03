<?php
include "common.php";

$id = $_POST['id'];
$title = $_POST['title'];
$name = $_POST['name'];
$passwd = $_POST['passwd'];
$contents = $_POST['contents'];

$sql = "SELECT passwd FROM qa WHERE id = $id";
$result = mysqli_query($db, $sql);
if (!$result) {
    echo "에러: " . mysqli_error($db);
    exit;
}
$row = mysqli_fetch_assoc($result);

if ($row['passwd'] === $passwd) {
    $sql = "UPDATE qa SET title='$title', name='$name', contents='$contents' WHERE id=$id";
    if (mysqli_query($db, $sql)) {
        header("Location: qa.php");
    } else {
        echo "에러: " . mysqli_error($db);
    }
} else {
    echo "<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>";
}
?>