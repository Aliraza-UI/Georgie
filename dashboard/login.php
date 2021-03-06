<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard - Log in - Georgie Mettingley</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <form action="controller/login_action.php" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="user_name" class="form-control" placeholder="User Name" required="required"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="user_password" class="form-control" placeholder="Password" required="required"/>
                    </div>          
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block" name="login_submit">Sign me in</button> <br/>
                    <button type="reset" class="btn bg-olive btn-block" name="login_submit">Reset fields</button>  
                    <?php 
                    if(isset($_GET['action'])){
                        if($_GET['action']=="error"){?>
                            <h5><center><p style="color:red;">*&nbsp;&nbsp;INCORRECT INPUTS PLEASE TRY AGAIN</p></center></h5>
                        <?php } } ?>
                   
                </div>
            </form>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>