<?php
	define("HOST","localhost");
	define("USER","root");
	define("PASSWORD","root");
	define("DBNAME","georgiem_cmsdatab");
	$connection = mysql_connect(HOST,USER,PASSWORD,DBNAME) or die ("cant connect to MySql Database :(");
	mysql_select_db(DBNAME);