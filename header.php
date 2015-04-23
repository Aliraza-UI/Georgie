<!DOCTYPE html>
<?php
  require 'dashboard/controller/config.php';
  require 'dashboard/controller/functions.php';
?>
<html class="full" lang="en">
  <head>
    <meta charset="utf-8">
    <style> body  {opacity:0;}</style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A Portfolio website of Georgie Mattingley, visual artist based in Melbourne, Australia.">
    <meta name="author" content="Ajesh VC,Web programmer Kerala IND">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $title; ?></title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="fonts/stylesheet.css" type="text/css" charset="utf-8" />
    <script src="js/font-load.js" /></script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- custom css for index page -->
    <link href="css/style.css?v=16" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php 
      $sql_sel = "SELECT * FROM background  ORDER BY sl_no DESC LIMIT 1";
      $result = mysql_query($sql_sel) or die("Cant execute Query !!!");
      $fetch = mysql_fetch_array($result);
      $bg_photo =$fetch['bg_photo'];
    ?>
    <style>
    body {
      margin-top: 50px;
      margin-bottom: 50px;
      background: none;
      line-height: 53px;
      font-family:'tradegothicbold', Arial, sans-serif;
    }
    .full {
      background: url(dashboard/bg-image/<?php echo $bg_photo; ?>) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      background-color:#000;
    }
    </style>
    <script>
      window.onload = function() {setTimeout(function(){document.body.style.opacity="100";},500);};
    </script>
  </head>
<body>
 