<?php
$conn=new mysqli("localhost","root","","muhtas");
$sql="select * from video";
$liste=array();
$sonuc=$conn->query($sql);
if($sonuc->num_rows>0){
    while($row=$sonuc->fetch_assoc()){
      /*  $temp=array();
        $temp['isim']=$row['isim'];
        $temp['oynatma']=$row['oynatma'];
        array_push($liste,$temp); */
        $liste[]=$row;
    }
}
echo json_encode($liste);
?>