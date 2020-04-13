<?php
$haber=$_POST['haber'];
$tur=$_POST['tur'];
$con=new mysqli("localhost","root","","muhtas");
$sql="insert into haberler (haber,tur) values('".$haber."','".$tur."')";
$con->query($sql);
?>