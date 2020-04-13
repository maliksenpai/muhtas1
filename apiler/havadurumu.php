<?php
$conn=new mysqli("localhost","root","","muhtas");
$sql="delete from hava_durumu";
$conn->query($sql);
$il=$_POST['il'];
$sql="insert into flash_haber values ('".$il."')";
$conn->query($sql);
?>