<?php
    include "../common.php";

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $id1 = isset($_GET['id1']) ? $_GET['id1'] : '';

    $sql_option = "SELECT opts.*, opt.name AS optionName 
            FROM opts 
            JOIN opt ON opts.opt_id = opt.id
            WHERE opts.opt_id = $id";

    $result_option = mysqli_query($db, $sql_option);
    if (!$result_option) {
        exit("옵션 정보를 가져오는 데 실패했습니다.");
    }

    $row = mysqli_fetch_assoc($result_option);

    $sql_sub = "SELECT * FROM opts WHERE opt_id = $id";

    $result_sub = mysqli_query($db, $sql_sub);
    if (!$result_sub) {
        exit("소옵션 정보를 가져오는 데 실패했습니다.");
    }
?>

<!doctype html>
<html lang="kr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stüssy</title>
    <link  href="../css/bootstrap.min.css" rel="stylesheet">
    <link  href="../css/my.css" rel="stylesheet">
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/my.js"></script>
</head>
<body>

<div class="container">
    <script> document.write(admin_menu());</script>

    <div class="row mx-1  justify-content-center">
        <div class="col-sm-10" align="center">

            <h4 class="m-0">소옵션</h4>

            <div class="row myfs13">
                <div class="col" align="left" style="padding-top:8px">
                    &nbsp;옵션명 : <font color="red"><?php echo $row['optionName'];?></font>
                </div>
                <div class="col" align="right">
                    <div class="d-inline-flex">
                        <a href="opts_new.php?id=<?=$id?>" class="btn btn-sm mycolor1 myfs12">소옵션 추가</a>&nbsp;
                    </div>
                </div>
            </div>

            <table class="table table-sm table-bordered table-hover my-1">
                <tr class="bg-light">
                    <td width="25%">소옵션 번호</td>
                    <td>소옵션명</td>
                    <td width="25%">수정 / 삭제</td>
                </tr>
                <?php
                    while ($sub_row = mysqli_fetch_assoc($result_sub)) {
                        $id1 = $sub_row["id"];
                ?>
                <tr>
                    <td><?=$sub_row["id"];?></td>
                    <td><?=$sub_row["name"];?></td>
                    <td>
                        <!-- <a href="opts_edit.php?id=<?=$id?>&id1=<?=$sub_row["name"];?> -->
                        <a href="opts_edit.php?id=<?=$id?>&id1=<?=$sub_row["id"];?>
                        " class="btn btn-sm mybutton-blue">수정</a>
                        <a href="opts_delete.php?id=<?=$id?>&id1=<?=$sub_row["id"];?>" class="btn btn-sm mybutton-red" onclick="javascript:return confirm('삭제할까요 ?');">삭제</a>   
                    </td>
                </tr>
                <?php } ?>
            </table>

            <?php echo $pagebar; ?>

            <a href="opt.php"  class="btn btn-sm btn-outline-dark my-2">&nbsp;돌아가기&nbsp;</a>

        </div>
    </div>
</div>

</body>
</html>