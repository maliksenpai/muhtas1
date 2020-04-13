<?php
$conn=new mysqli("localhost","root","","muhtas");
$sql="update sayfa set secili='0'";
$conn->query($sql);
$isim=$_POST['tur'];
$sql="update sayfa set secili='1' where tur='".$isim."'";
$conn->query($sql);
?>