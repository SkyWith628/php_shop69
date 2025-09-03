<?php
include "../common.php";

setcookie("user_id", "");

$text1 = $_REQUEST["text1"] ?? "";
$sel1 = $_REQUEST["sel1"] ?? 1;

$where_condition = ($sel1 == 1) ? "name LIKE '%$text1%'" : "uid LIKE '%$text1%'";

$sql = "SELECT COUNT(*) AS total_members FROM member WHERE $where_condition";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$total_members = $row['total_members'];

$sql = "SELECT * FROM member WHERE $where_condition ORDER BY name";
$args = "text1=$text1&sel1=$sel1";
$result = mypagination($sql, $args, $count, $pagebar);
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

<div class="row mx-1 justify-content-center">
    <div class="col text-center">

        <h4 class="m-0 mb-2">회원</h4>

        <form name="form1" method="post" action="member.php">
            <table class="table table-sm table-borderless m-0">
                <tr>
                    <td class="text-start" style="padding-top:12px">
                        &nbsp;회원수: <span class="text-danger"><?= $total_members; ?></span>
                    </td>
                    <td class="text-end">
                        <div class="d-inline-flex">
                            <div class="input-group input-group-sm">
                                <select name="sel1" class="form-select bg-light myfs12" style="width:92px;">
                                    <option value="1" <?= $sel1 == 1 ? 'selected' : ''; ?>>이름</option>
                                    <option value="2" <?= $sel1 == 2 ? 'selected' : ''; ?>>아이디</option>
                                </select>
                                <input type="text" name="text1" value="<?= htmlspecialchars($text1); ?>" 
                                       class="form-control myfs12" style="width:100px;" 
                                       onkeydown="if (event.keyCode == 13) { form1.submit(); }">
                                <button class="btn mycolor1 myfs12" type="button" onclick="form1.submit();">검색</button>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </form>

        <table class="table table-sm table-bordered table-hover m-0 mb-1">
            <tr class="bg-light">
                <th>아이디</th>
                <th>이름</th>
                <th>핸드폰</th>
                <th>E-Mail</th>
                <th width="10%">구분</th>
                <th width="15%">수정 / 삭제</th>
            </tr>
            <?php foreach ($result as $row): 
                $id = $row["id"];
                $tel = preg_replace("/(\d{3})(\d{3,4})(\d{4})/", "$1-$2-$3", $row["tel"]);
            ?>
                <tr>
                    <td><?= htmlspecialchars($row["uid"]); ?></td>
                    <td><?= htmlspecialchars($row["name"]); ?></td>
                    <td><?= htmlspecialchars($tel); ?></td>
                    <td class="px-2 text-start"><?= htmlspecialchars($row["email"]); ?></td>
                    <td><?= $row["gubun"] == 0 ? "회원" : "탈퇴"; ?></td>
                    <td>
                        <a href="member_edit.php?id=<?= $id; ?>" class="btn btn-sm btn-outline-info mybutton-blue">수정</a>
                        <a href="member_delete.php?id=<?= $id; ?>" 
                           class="btn btn-sm btn-outline-danger mybutton-red" 
                           onclick="return confirm('삭제할까요?');">삭제</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <?= $pagebar; ?>

    </div>
</div>

</div>
</body>
</html>