<?php
$conn=new mysqli("localhost","root","","muhtas");
$sql="update hava_durumu set secili='0'";
$conn->query($sql);
$isim=$_POST['il'];
$sql="update hava_durumu set secili='1' where il='".$isim."'";
$conn->query($sql);
?>