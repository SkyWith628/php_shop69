<?php
include "../common.php";

$cookie_id = $_COOKIE["user_id"];
$pwd = $_POST["pwd"];
$name = $_POST["name"];
$tel1 = $_POST["tel1"];
$tel2 = $_POST["tel2"];
$tel3 = $_POST["tel3"];
$tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);
$zip = $_POST["zip"];
$juso = $_POST["juso"];
$email = $_POST["email"];
$birthday1 = $_POST["birthday1"];
$birthday2 = $_POST["birthday2"];
$birthday3 = $_POST["birthday3"];
$birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);
$gubun = isset($_POST["gubun"]) && $_POST["gubun"] == "1" ? "1" : "0";

$sql = "UPDATE member 
        SET pwd='$pwd', name='$name', tel='$tel', zip='$zip', juso='$juso', email='$email', birthday='$birthday', gubun='$gubun'
        WHERE id=$cookie_id";

$result = mysqli_query($db, $sql);
if (!$result) exit("에러: $sql");

echo("<script>location.href='member.php'</script>");
?>