<?php
include "common.php";

$uid = $_REQUEST["uid"];
$pwd = $_REQUEST["pwd"];

$sql = "SELECT id FROM member WHERE uid='$uid' AND pwd='$pwd'";
$result = mysqli_query($db, $sql);

if (!$result) exit("에러: $sql");

$row = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);

if ($count > 0) {
    setcookie("cookie_id", $row["id"]);
    echo("<script>location.href='index.html'</script>");
} else {
    echo("<script>location.href='member_login.php'</script>");
}
?>
