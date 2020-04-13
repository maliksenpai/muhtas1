<?php
$conn=new mysqli("localhost","root","","muhtas");
$sql="update haber_sec set secili='0'";
$conn->query($sql);
$isim=$_POST['haber'];
$sql="update haber_sec set secili='1' where haber='".$isim."'";
$conn->query($sql);
echo "OK";
?>