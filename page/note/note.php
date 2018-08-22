<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.css" />
<script type='text/javascript' src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.js'></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.7.1/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBU9loxehoHu_CauR7xiqekpATFqn_8kCM",
    authDomain: "app-asst.firebaseapp.com",
    databaseURL: "https://app-asst.firebaseio.com",
    storageBucket: "app-asst.appspot.com",
    messagingSenderId: "15721170532"
  };
  firebase.initializeApp(config);

  var fdb = firebase.database();
  var way = "<?php echo $_SESSION['uuid'];?>/note";
  var dbRef = fdb.ref(way);

  function add(){
  	if($("#main").val()==""){
  		alert("請輸入事件");
  	}else{
  		var today = new Date();
		var tamp = Date.parse(new Date());
  		var time = (today.getMonth()+1) + "月" + today.getDate() + "日" + today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var pro = { time: time, main: $("#main").val(), sorttime: -tamp};
  		fdb.ref("<?php echo $_SESSION['uuid'];?>/note/" + tamp).set(pro);
  		$("#main").val("");
  	}
  }

  var ref = fdb.ref(way);
  ref.orderByChild("sorttime").on("value", function(snapshot) {
  var str = "";
  snapshot.forEach(function(data) {
	var tmp =data.val();
    str += "<li><div><div style='color:#FF9D6F;'> " + tmp.time + "</div><hr>" + "<div style='color:#84C1FF;word-wrap:break-word;white-space:normal;width:100%'>" + tmp.main + "</div></div></li>";
  });
  		$("#ajax_main").html(str);
		$("#ajax_main").listview("refresh");
		$.mobile.loading("hide");
  });

  $(document).ready(function(){
  		$.mobile.loading("show");
  });

</script>
<title>記事</title>
</head>

<body>
<center>
<ul data-role="listview" id="ajax_main" data-inset="true"></ul>
</center>
	<div data-role="footer" data-position="fixed" class="ui-bar">
		<div data-role="navbar" class="ui-body-c">
      <ul>
        <table width="100%">
          <tr>
            <td width="80%">
              <li>
			         <input type="text" id="main">
			       </li>
            </td>
            <td width="15%">
              <li>
                <button onclick="add()" style="border-radius:5px;">送出</button>
              </li>
            </td>
            <td width="5%">
            </td>
          </tr>
        </table>
      </ul>
      <a href="../../index.php" target="_top" class="ui-btn ui-corner-all" style="width:10%" >首頁</a>
        <a href="../note/note.php" target="_top" class="ui-btn ui-corner-all" style="width:15">記事本</a>
        <a href="../bike/bikeUI.php" target="_top" class="ui-btn ui-corner-all" style="width:15%">腳踏車</a>
		</div>
	</div>

    	
</body>
</html>
