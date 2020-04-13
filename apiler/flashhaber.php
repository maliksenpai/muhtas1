<?php
$conn=new mysqli("localhost","root","","muhtas");
$sql="delete from flash_haber";
$conn->query($sql);
$haber=$_POST['haber'];
$sql="insert into flash_haber (Haber) values ('".$haber."')";
$conn->query($sql);
echo "OK";
?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  setInterval(function()
{
    alert("hi");
}, 3000);
});