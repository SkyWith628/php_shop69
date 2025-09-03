<?php
    include "../common.php";
    $id = $_REQUEST["id"];
    
    $delete_opts_sql = "DELETE FROM opts WHERE opt_id = $id";
    $delete_opts_result = mysqli_query($db, $delete_opts_sql); 
    if (!$delete_opts_result) {
        exit("에러: $delete_opts_sql" . mysqli_error($db));
    }

    $delete_opt_sql = "DELETE FROM opt WHERE id = $id";
    $delete_opt_result = mysqli_query($db, $delete_opt_sql); 
    if (!$delete_opt_result) {
        exit("에러: $delete_opt_sql" . mysqli_error($db));
    }

    echo("<script>location.href='opt.php'</script>"); 
?>