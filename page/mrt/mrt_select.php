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
      <?php
      $url = "http://163.32.98.26/Kaoshiung_Guide/page/mrt/station_name.aspx";
      $xml = simplexml_load_file($url);
      foreach ($xml -> StationData -> Station as $information){?>
        <div data-role="collapsible">
          <h4><?php echo $information -> Name; ?></h4>
          <div style="margin:2px;">
            <?php
            $url2 = "http://data.kaohsiung.gov.tw/Opendata/MrtJsonGet.aspx?site=".$information -> No;
            $arr=file($url2);
            $value = (string)$arr[0];
            $json = json_decode($value, true);
            if($json['MRT'][0]['descr'] == $json['MRT'][1]['descr']){
              echo "<div style='font-size:20px;color:red;'>往".$json['MRT'][0]['descr']."</div>";
              if($json['MRT'][0]['arrival'] > $json['MRT'][1]['arrival']){
                if($json['MRT'][1]['arrival'] == 0){
                  echo "下班：進站中 / ";
                }else{
                  echo "下班：".$json['MRT'][1]['arrival']." 分 / ";
                }
                echo "下下班：".$json['MRT'][0]['arrival']." 分";
              }else{
                if($json['MRT'][0]['arrival'] == 0){
                  echo "下班：進站中 / ";
                }else{
                  echo "下班：".$json['MRT'][0]['arrival']." 分 / ";
                }
                echo "下下班：".$json['MRT'][1]['arrival']." 分";
              }
            }else{
              echo "<div style='font-size:20px;color:red;'>往".$json['MRT'][0]['descr']."</div>";
              if($json['MRT'][0]['arrival'] == 0){
                echo "下班：進站中 / ";
              }else{
                echo "下班：".$json['MRT'][0]['arrival']." 分 / ";
              }
              echo "下下班：".$json['MRT'][0]['next_arrival']." 分";


              echo "<div style='font-size:20px;color:red;'>往".$json['MRT'][1]['descr']."</div>";
              if($json['MRT'][1]['arrival'] == 0){
                echo "下班：進站中 / ";
              }else{
                echo "下班：".$json['MRT'][1]['arrival']." 分 / ";
              }
              echo "下下班：".$json['MRT'][1]['next_arrival']." 分";
            }
            ?>
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
