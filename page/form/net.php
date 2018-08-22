<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="../../jquery/jquery.mobile-1.4.5.min.css" />
<script src="../../jquery/jquery-1.11.1.min.js"></script>
<script src="../../jquery/jquery.mobile-1.4.5.min.js"></script>
</head>

<body>
	<div data-role="header">
		<h3>網路調查</h3>
		<div data-role="navbar">
			<ul>
				<li><a href="net.php">網路調查</a></li>
				<li><a href="road.php">街頭調查</a></li>
				<li><a href="team.php">小組</a></li>
			</ul>
		</div>
	</div>
	<center>
		<div data-role="collapsible" data-collapsed="true">
			<h4>統計圖</h4>
			<div>
			<?php
			for($i=1;$i<=10;$i++){?>
				<image src="images/<?php echo $i;?>.png" width="100%" style="border-radius:10px;"><br>
			<?php	}?>
			</div>
		</div>
		<div data-role="collapsible" data-collapsed="true">
			<h4>結論</h4>
			<div>
				<p>在網路表單中，回覆者大多是女性，且多半介於16~18歲之間的高中職生。</p>
				<p>由這份統計圖中，可看出最多人搭乘的是公車，再來是捷運，最後是腳踏車跟其他。</p>
				<p>大部分的人都愛好美食;但常使用記事功能App的人與不常用各占一半。</p>
				<p>大多數的人都有意願下載包含大眾交通工具即時動態、高雄捷運附近美食，並含有記事功能的App，約有一半的人會推薦給朋友下載約35%的人選擇考慮，剩下的7%則是不推薦。</p>
				<p>由最後一的統計圖，我們可以得知一般民眾對於我們App的要求的前五名是，各種交通工具的搭乘時間(84票)、交通工具的搭乘點的附近美食(82票)、顯示最快速到達目的地的路徑(80票)、美食的相關資訊(78票)，再來是操作介面簡易與近期最熱門的景點與美食(各得74票)</p>
				<p>最後一般大眾對於查詢當天天氣較無太多需求</p>
			</div>
		</div>
	</center>
    <div data-role="footer" data-position="fixed" class="ui-bar">
    	<a href="../../index.php" target="_top" class="ui-btn ui-corner-all" style="width:100px">返回首頁</a>
    	<a href="../mrt/mrt.php" target="_top" class="ui-btn ui-corner-all" style="width:100px">捷運</a>
        <a href="../note/note.php" target="_top" class="ui-btn ui-corner-all" style="width:100px">記事本</a>
        <a href="../bike/bikeUI.php" target="_top" class="ui-btn ui-corner-all" style="width:100px">腳踏車</a>
        <a href="../food/food.php" target="_top" class="ui-btn ui-corner-all" style="width:100px">美食</a>
    </div>
</body>
</html>