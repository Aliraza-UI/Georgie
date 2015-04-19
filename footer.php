<!-- footer of the website -->
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
</body>
<?php 
 $ip = $_SERVER['REMOTE_ADDR'];
 $url=$_SERVER['PHP_SELF'];
 $browser=$_SERVER['HTTP_USER_AGENT'];
 $xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=$ip");
 $country = $xml->geoplugin_countryName ;
 $sql_ins_tr = "INSERT INTO track (`sl_no`,`ip_address`,`page_url`,`browser`,`country`,`time`)VALUES('','$ip','$url','$browser','$country',CURRENT_TIMESTAMP)";
 mysql_query($sql_ins_tr);
 ?>
 </html>
