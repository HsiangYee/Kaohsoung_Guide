<div style="display:none;">
<?php 
session_start();
if(@!$_SESSION['uuid']){$_SESSION['uuid'] = $_GET['uuid'];}
if(@$_GET['rep']=='1'){echo $_GET['rep'];}
?>﻿
</div>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<script src="jquery/jquery.mobile-1.4.5.min.js"></script>
<script src="jquery/jquery-1.11.1.min.js"></script>
<script>
function loader(){
	$('#loaderdiv').css("display","block");
	}
</script>
<link rel="stylesheet" href="css.css">
<body>
<img src="images/page.png" width="100%" height="100%">
<center>
<?php if(@$_SESSION['uuid']!=""){?>
<table width="100%" border="0" class="table">
  <tr>
    <td colspan="2" align="center" valign="middle"><img src="images/page_logo.png" width="70%"></td>
    </tr>
  <tr>
    <td width="50%" align="right" valign="middle"><a href="page/mrt/mrt_select.php" onclick="loader()"><img src="images/page_mrt.png" width="70%"></a></td>
    <td width="50%" align="left" valign="middle"><a href="page/note/note.php" onclick="loader()"><img src="images/page_note.png" width="70%"></a></td>
  </tr>
  <tr>
    <td align="right" valign="middle"><a href="page/bike/bikeUI.php" onclick="loader()"><img src="images/page_bike.png" width="70%"></a></td>
    <td width="50%" align="left" valign="middle"></td>
  </tr>
</table>

<div id="loaderdiv" class="css_loader">
<table width="100%" border="0">
<tr>
<td align="center">
<image src="loader.gif" width="80px" style="border-radius:50px;">
</td>
</tr>
</table>
</div>
<?php }else{ ?>
  <table class="table" border="0" width="100%">
    <tr>
      <td align="center" valign="middle">
        請使用手機App瀏覽此網頁
      </td>
    </tr>
  </table>
 <?php }?>
</center>
</body>
</html>
