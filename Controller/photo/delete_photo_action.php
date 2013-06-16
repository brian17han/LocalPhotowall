<?php session_start();
$file=$_POST["photo_path"];
$path = "../Project_Images/photos/".$file;
$path=iconv("UTF-8", "gb2312", $path);
echo $path;
@unlink($path);
?>