<?php
$conn=new mysqli("localhost","root","","muhtas");
$sorgu="select * from api_sec";
			$sonuc=$conn->query($sorgu);
			if($sonuc->num_rows>0){
				while($row=$sonuc->fetch_assoc()){
					if($row['secili']=='1'){
						echo $row['haberturu'];
					}
				}
			}
?>