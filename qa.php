<?php
include "common.php"; 
include "main_top.php";

$text1 = $_POST['text1'] ?? '';
$page = $_POST['page'] ?? 1;

$where = "";
if ($text1) {
    $where = "WHERE title LIKE '%$text1%' OR contents LIKE '%$text1%'";
}

$sql = "SELECT * FROM qa $where ORDER BY pos1 DESC, pos2 ASC";
$result = mypagination($sql, $args, $count, $pagebar);
if (!$result) {
    echo "에러: " . mysqli_error($db);
    exit;
}
?>

<div class="row m-1 mb-0 justify-content-center">
    <div class="col" align="center">
        <h4 class="mt-5 mb-3">Q & A</h4>
        <hr class="my-0">
        <table class="table table-sm m-0">
            <tr height="35" class="bg-light">
                <td width="10%">번호</td>
                <td width="45%">제목</td>
                <td width="15%">작성자</td>
                <td width="20%">작성일</td>
                <td width="10%">조회</td>
            </tr>
            <?php
            $row_number = $count - ($page - 1) * 10;  
            while ($row = mysqli_fetch_assoc($result)) {
                $indent = "";
                if ($row['pos2'] != 'A') {
                    $indent = str_repeat("&nbsp;", strlen($row['pos2']) * 2);
                    $icon = "<img src='images/i_re.gif' border='0'>";
                } else {
                    $icon = "";
                }
                echo "<tr height='35'>";
                echo "<td>{$row_number}</td>"; 
                echo "<td align='left'>$indent$icon<a href='qa_read.php?id={$row['id']}&page=1&sel1=1&text1=' style='color:#0066CC'>{$row['title']}</a><br></td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['writeday']}</td>";
                echo "<td>{$row['count']}</td>";
                echo "</tr>";
                $row_number--;
            }
            ?>
        </table>
        <table class="table table-sm table-borderless mt-1 m-0">
            <tr>
                <td align="left">
                    <form name="form2" method="post" action="qa.php">
                        <div class="d-inline-flex">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text myfs13">제목+내용</span>
                                <input type="text" name="text1" size="10" value="<?= htmlspecialchars($text1) ?>"
                                    class="form-control bg-light myfs13">
                                <button type="button" class="btn btn-sm btn-outline-secondary myfs13" 
                                    onClick="form2.submit();">검색</button>&nbsp;
                            </div>
                        </div>
                    </form>
                </td>
                <td align="right">
                    <a href="qa_new.php" class="btn btn-sm btn-dark text-white myfs13">새글</a>&nbsp;&nbsp;
                </td>
            </tr>
        </table>
    </div>
</div>

<?php echo $pagebar; ?>

<br><br><br>

<?php include "main_bottom.php"; ?>

</div>

</body>
</html>