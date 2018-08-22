<!DOCTYPE html>
<html>
  <head>
    <title>Search Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>

      #map {
        height: 100vmax;
      }
	  
	  a {
		  text-decoration:none;
		  }
	.footbtn{
		position:fixed;
		top:90%;
		width:100%;
		z-index:1;
		left:-2;
	}
    </style>
<script type='text/javascript' src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.js'></script>

<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

  </head>
  <body>
<div data-role="page" style="background:url(images/body.png) 50% 0 no-repeat;background-size:cover" id="home">
	<div data-role="header" data-position="fixed" style="height:25px;text-align: center;font-size:20px;padding:3px;">腳踏車據點</div>
	<div role="main" class="ui-content">
        <div id="pos">GPS定位中……</div>
        <div id="map"></div>

	</div>
  </div>
<script>
	
   //利用canvas產生一個內含文字的圖檔
	function createMarkerIcon(text, opt) {
		//定義預設參數
		var defaultOptions = {
			fontStyle: "normal", //normal, bold, italic
			fontName: "Arial",
			fontSize: 12, //以Pixel為單位
			bgColor: "darkblue",
			fgColor: "white",
			padding: 4,
			arrowHeight: 6 //下方尖角高度
		};
		options = $.extend(defaultOptions, opt);
		//建立Canvas，開始幹活兒
		var canvas = document.createElement("canvas"),
			context = canvas.getContext("2d");
		//評估文字尺寸
		var font = options.fontStyle + " " + options.fontSize + "px " + 
				   options.fontName;
		context.font = font;
		var metrics = context.measureText(text);
		//文字大小加上padding作為外部尺寸
		var w = metrics.width + options.padding * 2;
		//高度以Font的大小為準
		var h = options.fontSize + options.padding * 2 +
				options.arrowHeight;
		canvas.width = w;
		canvas.height = h;
		//邊框及背景
		context.beginPath();
		context.rect(0, 0, w, h - options.arrowHeight);
		context.fillStyle = options.bgColor;
		context.fill();
		//畫出下方尖角
		context.beginPath();
		var x = w / 2, y = h, arwSz = options.arrowHeight;
		context.moveTo(x, y);
		context.lineTo(x - arwSz, y - arwSz);
		context.lineTo(x + arwSz, y - arwSz);
		context.lineTo(x, y);
		context.fill();
		//印出文字
		context.textAlign = "center";
		context.fillStyle = options.fgColor;
		context.font = font;
		context.fillText(text,
			w / 2,
			(h - options.arrowHeight) / 2 + options.padding);
		//傳回DataURI字串
		return canvas.toDataURL();
	}
 
	var mapObj;
	var marker;	
	var marker2 = new Array();
	var contentString2 = new Array();
	var infowindow2 = new Array();
	var lastIdx = 0;
	var gps;

function initMap() {

	  var myLatLng;	
		mapObj = new google.maps.Map(document.getElementById('map'), {
		icon: createMarkerIcon("現在位置"),
		zoom: 14
	  });
	  
	  marker = new google.maps.Marker({
		map: mapObj,
		position: myLatLng,
		title: '目前位置'
	  });


	var contentString = "<h1>目前位置</h1><p>GPS所定的位置</p>";
	var infowindow = new google.maps.InfoWindow({
		content: contentString
	  });
	marker.addListener('click', function() {
    	infowindow.open(mapObj, marker);
  	});
	

	if( navigator.geolocation ) {
		//alert("支援GPS");
		gps = navigator.geolocation;
		gps.getCurrentPosition( geoYes, geoNo );
	}
	else {
		//alert("不支援GPS");
	}
	
	function geoYes(evt) {
		$.mobile.loading("hide");
		var str= "位置 - 緯度：" + evt.coords.latitude+ ", 經度：" + evt.coords.longitude;
		localStorage.lat = evt.coords.latitude;
		localStorage.lon = evt.coords.longitude;
		document.getElementById("pos").innerText= ''; //將取得資訊顯示在畫面元素上
		var myLatLng = {lat: evt.coords.latitude , lng: evt.coords.longitude};
		mapObj.setCenter( myLatLng );
		marker.setPosition( myLatLng );
	}
	function geoNo(evt) {
		//alert("GPS定位錯誤!!");
	}


	<?php
	//$url = 'http://data.kaohsiung.gov.tw/opendata/DownLoad.aspx?Type=2&CaseNo1=AV&CaseNo2=1&FileType=1&Lang=C&FolderType='; 
	$url = "http://www.c-bike.com.tw/xml/stationlistopendata.aspx";
    $xml = simplexml_load_file($url);
    $i = 0;
    $png = "<img src='icon.png'>";
    foreach ($xml -> BIKEStation -> Station as $information){?>
    	marker2[<?php echo $i;?>] = new google.maps.Marker({
			position:  {lat: <?php echo $information -> StationLat?>, lng: <?php echo $information -> StationLon?>}, //lat, lng
			map: mapObj,
			icon: createMarkerIcon("<?php echo $information -> StationNums1 ?>") //echo StationName
    	});

    	contentString2[<?php echo $i;?>] = "<?php echo $information -> StationName;?><br>剩於：<?php echo $information -> StationNums1?><br>空位：<?php echo $information -> StationNums2?><br><a href='https://www.google.com.tw/maps/dir/" + <?php echo $information -> StationLat?> + "," + <?php echo $information -> StationLon?> + "/" + localStorage.lat + "," + localStorage.lon + "'>導航</a>"; //empty:?,XXX:?
	  
	  	infowindow2[<?php echo $i;?>] = new google.maps.InfoWindow({
			content: contentString2[<?php echo $i;?>]
	  	});
	
	  	marker2[<?php echo $i;?>].addListener('click', function() {
			if(lastIdx > -1){
				infowindow2[lastIdx].close();
			}
			lastIdx = <?php echo $i;?>;
			infowindow2[<?php echo $i;?>].open(mapObj, marker2[<?php echo $i;?>]);
	  	});
	<?php 
		$i = $i + 1;
	}?>
}
  $(document).ready(function(){
    $.mobile.loading("show");  
  });
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcOHpTqh9b1FBhwMFWxIu2LI4lAaZygcQ&callback=initMap" async defer></script>



</body>
</html>
