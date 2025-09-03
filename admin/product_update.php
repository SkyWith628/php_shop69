<?php
include "../common.php";

$id = $_REQUEST["id"]; 

$menu = $_REQUEST["menu"];
$code = addslashes($_REQUEST["code"]);
$name = addslashes($_REQUEST["name"]);
$coname = addslashes($_REQUEST["coname"]);
$price = $_REQUEST["price"];
$opt1 = isset($_REQUEST["opt1"]) && $_REQUEST["opt1"] !== "" ? $_REQUEST["opt1"] : 0;
$opt2 = isset($_REQUEST["opt2"]) && $_REQUEST["opt2"] !== "" ? $_REQUEST["opt2"] : 0;
$contents = addslashes($_REQUEST["contents"]);
$status = $_REQUEST["status"];
$regday = $_REQUEST["regday"];
$icon_new = isset($_REQUEST["icon_new"]) && $_REQUEST["icon_new"] !== "" ? $_REQUEST["icon_new"]: 0;
$icon_hit = isset($_REQUEST["icon_hit"]) && $_REQUEST["icon_hit"] !== "" ? $_REQUEST["icon_hit"] : 0;
$icon_sale = isset($_REQUEST["icon_sale"]) && $_REQUEST["icon_sale"] !== "" ? $_REQUEST["icon_sale"] : 0;
$discount = isset($_REQUEST["discount"]) && $_REQUEST["discount"] !== "" ? $_REQUEST["discount"] : 0;
$fname1 = $_REQUEST["imagename1"];
$fname2 = $_REQUEST["imagename2"];
$fname3 = $_REQUEST["imagename3"];
$checkno1 = $_REQUEST["checkno1"];
$checkno2 = $_REQUEST["checkno2"]; 
$checkno3 = $_REQUEST["checkno3"];

if ($checkno1 == "1") {
    if (!empty($fname1)) {
        unlink("../product/" . $fname1);
    }
    $fname1 = ""; 
} elseif ($_FILES["image1"]["error"] == 0) {
    $fname1 = $_FILES["image1"]["name"];    
    if (move_uploaded_file($_FILES["image1"]["tmp_name"], "../product/" . $fname1)) {
        $newfname1 = $fname1;
        while (file_exists("../product/" . $newfname1)) {
            $newfname1 = uniqid() . '_' . $fname1;
        }
        if (!rename("../product/" . $fname1, "../product/" . $newfname1)) {
            exit("파일명 업데이트 실패");
        }
        $fname1 = $newfname1; 
    } else {
        exit("이미지 파일 업로드 실패");
    }
}

if ($checkno2 == "1") {
    if (!empty($fname2)) {
        unlink("../product/" . $fname2);
    }
    $fname2 = ""; 
} elseif ($_FILES["image2"]["error"] == 0) {
    $fname2 = $_FILES["image2"]["name"];    
    if (move_uploaded_file($_FILES["image2"]["tmp_name"], "../product/" . $fname2)) {
        $newfname2 = $fname2;
        while (file_exists("../product/" . $newfname2)) {
            $newfname2 = uniqid() . '_' . $fname2;
        }
        if (!rename("../product/" . $fname2, "../product/" . $newfname2)) {
            exit("파일명 업데이트 실패");
        }
        $fname2 = $newfname2; 
        exit("이미지 파일 업로드 실패");
    }
}

if ($checkno3 == "1") {
    if (!empty($row['image3'])) {
        unlink("../product/" . $row['image3']);
    }
    $fname3 = ""; 
} elseif ($_FILES["image3"]["error"] == 0) {
    $fname3 = $_FILES["image3"]["name"];    
    if (move_uploaded_file($_FILES["image3"]["tmp_name"], "../product/" . $fname3)) {
        $newfname3 = $fname3;
        while (file_exists("../product/" . $newfname3)) {
            $newfname3 = uniqid() . '_' . $fname3;
        }
        if (!rename("../product/" . $fname3, "../product/" . $newfname3)) {
            exit("파일명 업데이트 실패");
        }
        $fname3 = $newfname3; 
    } else {
        exit("이미지 파일 업로드 실패");
    }
}



$sql = "UPDATE product SET menu= $menu, code = '$code', name = '$name', coname = '$coname',
        price = $price, opt1 = $opt1, opt2 = $opt2, contents = '$contents',
        status = $status, regday = '$regday', icon_new = $icon_new,
        icon_hit = $icon_hit, icon_sale = $icon_sale, discount = $discount,
        image1 = '$fname1', image2 = '$fname2', image3 = '$fname3'
        WHERE id= $id";
$result = mysqli_query($db, $sql);
if (!$result) {
    exit("에러: " . mysqli_error($db) . $sql ); 
}

echo("<script>location.href='product.php'</script>");
?>