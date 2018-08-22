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
		<h3>街頭調查</h3>
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
			<h4>照片</h4>
			<div>
				<p><image src="1.jpg" width="100%" style="border-radius:10px;"></p>
				<p><image src="2.jpg" width="100%" style="border-radius:10px;"></p>
				<p><image src="3.jpg" width="100%" style="border-radius:10px;"></p>
				<p><image src="4.jpg" width="100%" style="border-radius:10px;"></p>
			</div>
		</div>
		<div data-role="collapsible" data-collapsed="true">
			<h4>結論</h4>
			<div>
				<p>在街頭調查中，我們總共訪問了60人，男女較為平均。</p>
				<p>其中以16~18歲之間最多人，再來是16~40、19~25、41以上，而15歲以下人數最少。</p>
				<p>大多數的民眾都有高中職畢業，高中職畢業有32人，大學畢業有15人，再來是國中8人。</p>
				<p>而我們訪問到的民眾大多是學生，有30人，再來是服務業與上班族各站暫13人與12人。</p>
				<p>且大多數都搭乘捷運為主，總共有40人勾選捷運，再來是公車20人，其他14人，腳踏車9人。</p>
				<p>大部分的民眾都愛好美食、甜點，我們調查中僅有10人不愛好。</p>
				<p>而是否常用記事功能App，常用有36人，不常用有19人。<p>
				<p>而是否會有意願下載是與考慮各暫31與21，僅有3人不下載，而是否會推薦給朋友下載也各暫一半，僅有一人不推薦。</p>
				<p>而大眾最希望操作介面簡單(29票)、可以分享到各個社群網站(25票)、推薦近期熱門景點與美食(24票)、各種交通工具搭乘時間表(23票)</p>

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