<?php
include "../common.php";

$id = $_REQUEST["id"];
setcookie("user_id", $id);

$tel1 = $_REQUEST["tel1"] ?? "";
$tel2 = $_REQUEST["tel2"] ?? "";
$tel3 = $_REQUEST["tel3"] ?? "";
$birthday1 = $_REQUEST["birthday1"] ?? "";
$birthday2 = $_REQUEST["birthday2"] ?? "";
$birthday3 = $_REQUEST["birthday3"] ?? "";

$sql = "SELECT * FROM member WHERE id=$id";
$result = mysqli_query($db, $sql);
if (!$result) exit("에러: $sql");

$row = mysqli_fetch_array($result);

if (!empty($row["tel"])) {
    $tel1 = substr($row["tel"], 0, 3);
    $tel2 = substr($row["tel"], 3, 4);
    $tel3 = substr($row["tel"], 7, 4);
}

if (!empty($row["birthday"])) {
    $birthday1 = substr($row["birthday"], 0, 4);
    $birthday2 = substr($row["birthday"], 5, 2);
    $birthday3 = substr($row["birthday"], 8, 2);
}
?>
<!doctype html>
<html lang="kr">
<head>
    <meta charset="utf-8">
    <title>INDUK Mall</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/my.css" rel="stylesheet">
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/my.js"></script>
</head>
<body>
<div class="container">
<script>document.write(admin_menu());</script>
<script>
function FindZip(zip_kind) {
    window.open("../zipcode.php?zip_kind=" + zip_kind, "zip", "scrollbars=no,width=490,height=320");
}
</script>
<form name="form2" method="post" action="member_update.php">
<input type="hidden" name="no" value="<?= $id; ?>">

<div class="row mx-1 justify-content-center">
    <div class="col-sm-10 text-center">
        <h4 class="m-0 mb-3">회원</h4>
        <table class="table table-sm table-bordered myfs12">
            <tr><td class="bg-light" width="15%">아이디</td><td class="ps-2 text-start"><?= htmlspecialchars($row["uid"]); ?></td></tr>
            <tr><td class="bg-light">암호</td><td class="ps-2 text-start"><input type="text" name="pwd" value="<?= htmlspecialchars($row["pwd"]); ?>" class="form-control form-control-sm"></td></tr>
            <tr><td class="bg-light">이름</td><td class="ps-2 text-start"><input type="text" name="name" value="<?= htmlspecialchars($row["name"]); ?>" class="form-control form-control-sm"></td></tr>
            <tr><td class="bg-light">휴대폰</td><td class="ps-2 text-start">
                <input type="text" name="tel1" value="<?= htmlspecialchars($tel1); ?>" maxlength="3" class="form-control form-control-sm" style="width: 60px;"> -
                <input type="text" name="tel2" value="<?= htmlspecialchars($tel2); ?>" maxlength="4" class="form-control form-control-sm" style="width: 70px;"> -
                <input type="text" name="tel3" value="<?= htmlspecialchars($tel3); ?>" maxlength="4" class="form-control form-control-sm" style="width: 70px;">
            </td></tr>
            <tr><td class="bg-light">주소</td><td class="ps-2 text-start">
                <input type="text" name="zip" value="<?= htmlspecialchars($row["zip"]); ?>" maxlength="5" class="form-control form-control-sm" style="width: 100px;">
                <a href="javascript:FindZip(0);" class="btn btn-sm btn-secondary text-white mb-1 myfs12">우편번호 찾기</a><br>
                <input type="text" name="juso" value="<?= htmlspecialchars($row["juso"]); ?>" class="form-control form-control-sm">
            </td></tr>
            <tr><td class="bg-light">E-Mail</td><td class="ps-2 text-start"><input type="text" name="email" value="<?= htmlspecialchars($row["email"]); ?>" class="form-control form-control-sm"></td></tr>
            <tr><td class="bg-light">생일</td><td class="ps-2 text-start">
                <input type="text" name="birthday1" value="<?= htmlspecialchars($birthday1); ?>" maxlength="4" class="form-control form-control-sm" style="width: 70px;"> -
                <input type="text" name="birthday2" value="<?= htmlspecialchars($birthday2); ?>" maxlength="2" class="form-control form-control-sm" style="width: 50px;"> -
                <input type="text" name="birthday3" value="<?= htmlspecialchars($birthday3); ?>" maxlength="2" class="form-control form-control-sm" style="width: 50px;">
            </td></tr>
            <tr><td class="bg-light">구분</td><td class="ps-2 text-start">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gubun" value="0" <?= $row["gubun"] == 0 ? "checked" : ""; ?>>
                    <label class="form-check-label">회원</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gubun" value="1" <?= $row["gubun"] == 1 ? "checked" : ""; ?>>
                    <label class="form-check-label">탈퇴</label>
                </div>
            </td></tr>
        </table>
        <a href="javascript:form2.submit();" class="btn btn-sm btn-dark text-white my-2">&nbsp;저 장&nbsp;</a>
        <a href="javascript:history.back();" class="btn btn-sm btn-outline-dark my-2">&nbsp;돌아가기&nbsp;</a>
    </div>
</div>
</form>
</div>
</body>
</html>