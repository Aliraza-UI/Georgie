<?php
	// define("HOST","localhost");
	define("HOST","103.226.221.161");
	define("USER","georgiem_cmsdata");
	define("PASSWORD","ajvc@mnkl!7385");
	define("DBNAME","georgiem_cmsdatab");
	$connection = mysql_connect(HOST,USER,PASSWORD,DBNAME) or die ("cant connect to MySql Database :(");
	mysql_select_db(DBNAME);