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
<div style="margin:10px;">

      <ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="關鍵字搜尋">
      <a href="../bike/map.php" target="_top" class="ui-btn ui-corner-all">附近剩餘車輛查詢</a>
      <?php
      $url = "http://www.c-bike.com.tw/xml/stationlistopendata.aspx";
      $xml = simplexml_load_file($url);
      foreach ($xml -> BIKEStation -> Station as $information){?>
        <div data-role="collapsible">
          <h4>
            <?php echo $information -> StationName."<BR>"?>
          </h4>
          <div style="margin:2px">
            目前數量 : <?php echo $information -> StationNums1?><br>
            剩餘空位 : <?php echo $information -> StationNums2?><br>
            <a href="https://www.google.com.tw/maps/@<?php echo $information -> StationLat;?>,<?php echo $information -> StationLon;?>,17z" class="ui-btn ui-corner-all">Goole地圖</a>
          </div>
        </div>
      <?php }?>
      </ul>
      </div>
  <div data-role="footer" data-position="fixed" class="ui-bar">
      <a href="../../index.php" target="_top" class="ui-btn ui-corner-all" style="width:10%" >首頁</a>
        <a href="../note/note.php" target="_top" class="ui-btn ui-corner-all" style="width:15">記事本</a>
        <a href="../bike/bikeUI.php" target="_top" class="ui-btn ui-corner-all" style="width:15%">腳踏車</a>
    </div>
</body>
</html>
