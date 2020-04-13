<?php
    $con=new mysqli("localhost","root","","muhtas");
    $sorgu="select * from flash_haber";
    $sonuc=$con->query($sorgu);
    if($sonuc->num_rows>0){
        $i=0;
        while($row=$sonuc->fetch_assoc()){
            if($i==0){
                echo $row['Haber'];
                $flash=$row['Haber'];
            }
            $i++;
        }
    }
    mysqli_close($con);
?>