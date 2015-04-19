<?php
require 'controller/config.php';
require 'controller/functions.php';
session_start();
if (!isset($_SESSION['uname'])) {
    header('location:logout.php');
}
else if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];

?>
<?php include 'header.php'; ?>

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        contact 
                        <small>Edit contact content </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">contact</li>
                        <li class="active">Edit contact</li>
                    </ol>
                </section>
                <div class="container">
                	<h4></h4>
                	<div class="row">
	                	<form method="post" action="controller/contact_action.php" enctype="multipart/data">
	                		<br>
	                		<div class="col-md-12">
	                		<div class="form-group">
                                <?php
                                        $sql_sel_tr = "SELECT *FROM contact";
                                        $res = mysql_query($sql_sel_tr);
                                        $rows =mysql_fetch_array($res);
                                ?>
	                            <label class="col-md-2 control-label">Paragraph 1</label>
	                            <div class="col-md-7">
	                            	<TEXTAREA name="content_first" rows="8" class="form-control"><?php echo $rows['content_first']; ?></TEXTAREA>
	                            </div>
	                       	</div><br><br><br><br><br><br><br><br><br>
	                        <div class="form-group">
	                            <label class="col-md-2 control-label">Paragraph 2</label>
	                            <div class="col-md-7">
	                            	<TEXTAREA  name="content_second" rows="8" class="form-control"><?php echo $rows['content_second']; ?></TEXTAREA>
	                            </div>
	                        </div><br><br><br><br><br><br><br><br><br>
	                        
	                        <div class="form-group">
	                            <label class="col-md-2 control-label"></label>
	                            <div class="col-md-9">
	                            	<input type="submit" class="btn btn-md btn-danger" name="submit_contact" value="Save changes" class="form-control">
	                            	
	                            </div>
	                        </div>


	                		</div>
	                		<div class="col-md-2">&nbsp;</div>
	                	</form>
	                	<center><?php if(isset($_GET['action'])) {
	                		if($_GET['action']=='success'){
	                			echo "<h4><p style='color:green;'>Success : Changes Saved</p></h4>";
	                		}
	                		}


	                		?>
	                	</center>
                	</div>
                </div>
               
<?php } include 'footer.php'; ?>