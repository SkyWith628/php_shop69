<?php
include "common.php";

$id = $_POST['id'];
$passwd = $_POST['passwd'];

$sql = "SELECT passwd FROM qa WHERE id = $id";
$result = mysqli_query($db, $sql);
if (!$result) {
    echo "에러: " . mysqli_error($db);
    exit;
}
$row = mysqli_fetch_assoc($result);

if ($row['passwd'] === $passwd) {
    $sql = "DELETE FROM qa WHERE id = $id";
    if (mysqli_query($db, $sql)) {
        header("Location: qa.php");
    } else {
        echo "에러: " . mysqli_error($db);
    }
} else {
    echo "<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>";
}
?>