<?php
$siteurl = "http://tw.yahoo.com/";
ob_start();
require($siteurl);
$content = ob_get_contents();
ob_end_clean();
echo $content;
