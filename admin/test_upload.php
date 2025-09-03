<?php
$newfilename = "new.txt";

if ($_FILES["filename"]["error"] == 0) 
{
    $fname = $_FILES["filename"]["name"];
    $fsize = $_FILES["filename"]["size"];

    if (file_exists("product/$newfilename")) {
        exit("동일한 파일이 이미 존재합니다.");
    }

    if (!move_uploaded_file($_FILES["filename"]["tmp_name"], "product/$newfilename")) {
        exit("업로드 실패!");
    }

    echo("파일이름 : $newfilename<br>파일크기 : $fsize");
}
?>
