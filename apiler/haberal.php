<?php
$con=new mysqli("localhost","root","","muhtas");
$sql="select * from haberler";
$sonuc=$con->query($sql);
$liste=array();
if($sonuc->num_rows>0){
    while($row=$sonuc->fetch_assoc()){
        $temp=array();
        $temp['haber']=$row['haber'];
        $temp['tur']=$row['tur'];
        array_push($liste,$temp);
    }
}
echo json_encode($liste);
?>