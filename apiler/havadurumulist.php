<?php
$conn=new mysqli("localhost","root","","muhtas");
$sql="select * from hava_durumu";
$liste=array();
$sonuc=$conn->query($sql);
if($sonuc->num_rows>0){
    while($row=$sonuc->fetch_assoc()){
        $liste[]=$row;
    }
}
echo json_encode($liste);
?>