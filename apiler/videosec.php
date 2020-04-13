<?php
$conn=new mysqli("localhost","root","","muhtas");
$sql="update video set oynatma='0'";
$conn->query($sql);
$isim=$_POST['video'];
$sql="update video set oynatma='1' where isim='".$isim."'";
$conn->query($sql);
?>