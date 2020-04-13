<?php
$con=new mysqli("localhost","root","","muhtas");
			$sorgu="select * from video";
			$sonuc=$con->query($sorgu);
			if($sonuc->num_rows>0){
				while($row=$sonuc->fetch_assoc()){
					if($row['oynatma']=='1'){
						echo $row['isim'];
					}
				}
			}
?>