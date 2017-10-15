<?php
// function url_test($url ) {
  // $timeout = 10;
  // $ch = curl_init();
  // curl_setopt ( $ch, CURLOPT_URL, $url );
  // curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
  // curl_setopt ( $ch, CURLOPT_TIMEOUT, $timeout );
  // $http_respond = curl_exec($ch);
  // $http_respond = trim( strip_tags( $http_respond ) );
  // $http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
  // if ( ( $http_code == "200" ) || ( $http_code == "302" ) ) {
    // return true;
  // } else {
    // return $http_code;, possible too
    // return false;
  // }
  // curl_close( $ch );
// }
 
// $website = "www.animeler.net";
// if( !url_test( $website ) ) {
// }
// else { 
// $oku = file_get_contents("http://animeler.net/haberler.xml");
// $file = fopen("haberler.xml","w");
// fwrite($file,$oku);
// fclose($file);
// }
?>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
<script type="text/javascript" src="./js/jquery-min.js"></script>
<script type="text/javascript" src="./js/jquery-bootstrap.js"></script>
<script type="text/javascript" src="./js/jquery-func.js"></script>
<script type="text/javascript" src="./js/jquery-scroll.js"></script>
		<div class="col-xs-6" style="padding-right:0px;"> 
			<div class="panel">
				<div class="panel-ust">
					<div class="panel-title">ANIME &amp; MANGA HABERLERİ</div></div>
					<div class="panel-body padding-none" style="height:270px; overflow:visible;">
					<div id="haberler" class="ps-container ps-theme-genel ps-active-y">
					<?php
					function url_test($url ) {
					  $timeout = 10;
					  $ch = curl_init();
					  curl_setopt ( $ch, CURLOPT_URL, $url );
					  curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
					  curl_setopt ( $ch, CURLOPT_TIMEOUT, $timeout );
					  $http_respond = curl_exec($ch);
					  $http_respond = trim( strip_tags( $http_respond ) );
					  $http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
					  if ( ( $http_code == "200" ) || ( $http_code == "302" ) ) {
						return true;
					  } else {
						// return $http_code;, possible too
						return false;
					  }
					  curl_close( $ch );
					}
					 
					$website = "www.animeler.net";
					if( !url_test( $website ) ) {
						echo("<center><h2>Animeler.net Sitesine Ulasilamiyor</h2></center>");
					}
					else { 
						function rssoku() 
						{	
							$feed=file_get_contents("./haberler.xml") or die;
							$xml= new SimpleXMLElement($feed);
							$sayac="1";
							$limit="5";
							foreach ($xml -> channel -> item as $veri){
								if ($sayac <= $limit){ 
								$desc= $veri -> description;
								//$desc=substr($desc,0,40);
								$link = $veri -> link;
								$title= $veri -> title;
								$date= $veri -> pubDate;
								$date1 = str_replace("+0000","",$date);
								$date2 = str_replace("Jan","Oca",$date1);
								$date3 = str_replace("Feb","Şub",$date2);
								$date4 = str_replace("Mar","Mar",$date3);
								$date5 = str_replace("Apr","Nis",$date4);
								$date6 = str_replace("May","May",$date5);
								$date7 = str_replace("Jun","Haz",$date6);
								$date8 = str_replace("Jul","Tem",$date7);
								$date9 = str_replace("Aug","Ağu",$date8);
								$date10 = str_replace("Sep","Eyl",$date9);
								$date11 = str_replace("Oct","Eki",$date10);
								$date12 = str_replace("Nov","Kas",$date11);
								$date13 = str_replace("Dec","Ara",$date12);
								$date14 = str_replace("Mon","Pzt",$date13);
								$date15 = str_replace("Tue","Sal",$date14);
								$date16 = str_replace("Wed","Çar",$date15);
								$date17 = str_replace("Thu","Per",$date16);
								$date18 = str_replace("Fri","Cum",$date17);
								$date19 = str_replace("Sat","Cts",$date18);
								$date20 = str_replace("Sun","Pzr",$date19);
								$datex = substr($date19,0,22);
								$thumbAttr = $veri->children('media', true)->thumbnail->attributes();
								echo "<div class=\"thumbnail\" style=\"margin: 5px 10px 5px 5px;\"> ";
									echo "<a href=\"$link\" target=\"_blank\" rel=\"nofollow\" title=\"$title\">";
									echo "<img src=".$thumbAttr['url']." alt=\"$title\"></a>"; 
								echo "<div class=\"caption\">";
									echo "<h4 class=\"ozet\" style=\"font-size:16px; font-weight:bold; line-height:20px;\">";
									echo "<a href=\"$link\" target=\"_blank\" rel=\"nofollow\" title=\"$title\">$title</a></h4>";
									echo "<p class=\"ozet\">$desc</p>";
									echo "<small class=\pull-right ozet\">$datex</small>";
									echo "<div class=\"clearfix\"></div>";
								echo "</div>";
								echo "</div>";
						}
							$sayac++;
							}
						}
						rssoku();
						}
					?>
					</div> 
					</div> 
				</div>
			</div>
			<style type="text/css">.thumb_item {	float: left;	position: relative;	-webkit-transition: all 0.3s ease;	-moz-transition: all 0.3s ease;	-o-transition: all 0.3s ease;	}	.thumb_item:hover {	background-color: #dadada;	}	.thumb_item a {	color:#222;	text-decoration: none;	}	.thumb_item:hover a {	text-decoration: none;	}	.thumb_item:hover {	}	.thumb_item img {	width:152px;	height:120px;	border: 0;	margin: 3px;	display: block;	}	.thumb_item .title {	font-family: "Arial",Tahoma,Verdana,Segoe UI,Helvetica,sans-serif;	font-size: 15px;	margin: 0;	font-weight:bold;	display: block;	height: 27px;	line-height: 27px;	text-align:center;	overflow: hidden;	white-space: nowrap;	text-overflow: ellipsis;	}</style><script type="text/javascript">function showAds(cpmStar) {	var adContainer= document.getElementById('editorial_content');	while (cpmStar.adsLeft()) {	var ad = document.createElement('div');	ad.setAttribute("class", "thumb_item");	ad.innerHTML = "" +	"<a href='" + cpmStar.getLink() + "' target='_blank'>" +	"<img src='" + cpmStar.getImageUrl(152, 120) + "'>" +	"</a>" +	"<div class='title'>" + cpmStar.getTitle() + "</div>";	adContainer.appendChild(ad);	cpmStar.nextAd();	}	}	var cpmstar_dynamic_editorials = {	editorial_1: {	cpmstar_pid: 68865,	cpmstar_multi: 4,	cpmstar_callback: showAds	}	};	(function () {	var t = document.createElement('script');	t.type = 'text/javascript';	t.async = true;	var w = document.getElementsByTagName('script')[0];	w.parentNode.insertBefore(t, w);	})();	var isMobile = {	Android: function() {	return navigator.userAgent.match(/Android/i);	},	BlackBerry: function() {	return navigator.userAgent.match(/BlackBerry/i);	},	iOS: function() {	return navigator.userAgent.match(/iPhone|iPad|iPod/i);	},	Opera: function() {	return navigator.userAgent.match(/Opera Mini/i);	},	Windows: function() {	return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);	},	any: function() {	return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());	}	};	if(!isMobile.any()) { };</script>
			<script type="text/javascript">console.clear()</script> 