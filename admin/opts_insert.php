<?php
include "../common.php"; 

$id = isset($_REQUEST["id"]) ? intval($_REQUEST["id"]) : 0;
$name = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';

$sql_sub = "INSERT INTO opts (id, opt_id, name) 
            VALUES (null, $id, '$name')";       

$result_sub = mysqli_query($db, $sql_sub);

if (!$result_sub) {
    exit("에러: " . mysqli_error($db)); 
}

echo("<script>location.href='opts.php?id=$id'</script>"); 
?>


