<?php
$conn=new mysqli("localhost","root","","muhtas");
$sql="update api_sec set secili='0'";
$conn->query($sql);
$isim=$_POST['haberturu'];
$sql="update api_sec set secili='1' where haberturu='".$isim."'";
$conn->query($sql);
?>