<html>
	<head>
	<style type="text/css">
	@import "css.css";
	</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	var i=0;
	setInterval(() => {
		$.ajax({
			type: 'post',
			url: 'flash.php',
			data: {
			user_name:name,
			},
			success: function (response) {
			$( '#flash' ).html(response);
			}
			});


			$.ajax({
			type: 'post',
			url: 'video.php',
			data: {
			user_name:name,
			},
			success: function (response) {
			//	var span = document.getElementById("deneme").textContent;
				var string=span.replace(/\s/g, '');
				i++;
			//	$( '#videoisim' ).html(response);
				
				$.ajax({
				type: 'post',
				url: 'cookies/videocookie.php',
				data: {
				user_name:name,
				},
				success: function (response2) {
					span=response2;
			//		document.cookie="profile_viewer_uid="+response;
					$.ajax({
					type: 'post',
					url: 'cookies/videocookie.php',
					data: {
					user_name:name,
					},
					success: function (response3) {
						if(!(response2==response3)){
							document.getElementById("videoo").src=response;
						}
				}
				});
				}
				});
			}
			});

			$.ajax({
			type: 'post',
			url: 'haberler.php',
			data: {
			user_name:name,
			},
			success: function (response) {
			$('#haberler').html(response);
			}
			});


			
			$.ajax({
			type: 'post',
			url: 'havadurumu.php',
			data: {
			user_name:name,
			},
			success: function (response) {
				document.getElementById("havadurumu").src="http://www.mgm.gov.tr/sunum/tahmin-show-2.aspx?m="+response+"&basla=1&bitir=5&rC=111&rZ=fff";
				$('#ilismi').html(response);
			}
			});


			$.ajax({
			type: 'post',
			url: 'api-sec.php',
			data: {
			user_name:name,
			},
			success: function (response) {
				switch(response){
					case "ahaber-teknoloji":
					document.cookie="api=https://www.ahaber.com.tr/rss/teknoloji.xml";
					break;

					case "ahaber-otomobil":
					document.cookie="api=https://www.ahaber.com.tr/rss/otomobil.xml";
					break;

					case "ahaber-spor":
					document.cookie="api=https://www.ahaber.com.tr/rss/spor.xml";
					break;

					case "cnn-teknoloji":
					document.cookie="api=https://www.cnnturk.com/feed/rss/bilim-teknoloji/news";
					break;

					case "cnn-otomobil":
					document.cookie="api=https://www.cnnturk.com/feed/rss/otomobil/news";
					break;

					case "cnn-spor":
					document.cookie="api=https://www.cnnturk.com/feed/rss/spor/news";
					break;

					case "haberturk-teknoloji":
					document.cookie="api=https://www.haberturk.com/rss/kategori/teknoloji.xml";
					break;

					case "haberturk-otomobil":
					document.cookie="api=https://www.haberturk.com/rss/kategori/otomobil.xml";
					break;
					
					case "haberturk-spor":
					document.cookie="api=https://www.haberturk.com/rss/spor.xml";
					break;
				}
				$.ajax({
				type: 'post',
				url: 'api.php',
				data: {
				user_name:name,
				},
				success: function (response2) {
				$('#api').html(response2);
				}
				});
				}
				});
	}, 1000);
});
</script>
	</head>
	<body>
		<div id="yazi" onclick="uyu()">
			MUHTAS PROJE
		</div>
		<div id="sayfa">
		</div>
		<div id="flash">
		<?php
		flash();
		?>
		</div>
		<div id="video">
		<video id="videoo" width="320" height="240" src="<?php video(); ?>" controls autoplay>
		</video>	
		</div><ul>
		<div id="haberler">
		</div>
		</ul>
		<div id="ilismi">
		</div>
		   <img id="havadurumu" src="http://www.mgm.gov.tr/sunum/tahmin-show-2.aspx?m=ANKARA&basla=1&bitir=5&rC=111&rZ=fff" style="width:400px; height:100px;" alt="ANKARA" />
		<div id="api">
		</div>
	</body>
	<?php
		function video(){
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
		}
		function haber(){
		$con=new mysqli("localhost","root","","muhtas");
				$sorgu="select * from haber_sec where secili='1'";
				$sonuc=$con->query($sorgu);
				$i=0;
				if($sonuc->num_rows>0){
					while($row=$sonuc->fetch_assoc()){
						if($i==0){
							$i++;
						echo "x";
						$con=new mysqli("localhost","root","","muhtas");
						$sorgu="select haber,tur from haberler where tur='".$row['haber']."' order by id desc limit 5";
					//	echo $sorgu;
						$sonuc=$con->query($sorgu);
						if($sonuc->num_rows>0){
							while($row=$sonuc->fetch_assoc()){
								echo "<li>".$row['haber']."</li>";
							}
						}
					}
					}
                }
		}
		function flash(){
			$con=new mysqli("localhost","root","","muhtas");
			$sorgu="select * from flash_haber";
			$sonuc=$con->query($sorgu);
			if($sonuc->num_rows>0){
				$i=0;
				while($row=$sonuc->fetch_assoc()){
					if($i==0){
						echo $row['Haber'];
					}
					$i++;
				}
			}
		}
		function api(){
			$content = file_get_contents("https://www.ahaber.com.tr/rss/teknoloji.xml");
				$x = new SimpleXmlElement($content);
				foreach($x->channel->item as $entry) {
					echo "<li><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></li>";
				}
				echo "</ul>";
		}
		?>

</html>