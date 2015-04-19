<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</body>
<script type="text/javascript">
function Nextimg(imgid,elementId, newId) {
alert(elementId);
alert(newId);
          var e = document.getElementById("imgid"); //Get the element
         // e.setAttribute("id","newId"); //Change id to div3
          e.id=newId;
         }
       
</script>
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