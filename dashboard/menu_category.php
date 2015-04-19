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
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Add Menu - Categories.
        <small>Assign Menu Categories(Submenu) to Main manu from here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Categories</li>
        <li class="active">Menu Categories</li>
    </ol>
</section>

<!-- Main content -->
<form enctype="multipart/form-data" class="form-horizontal" role="form" method="post" action="controller/add_menucatg_action.php">
    <div class="container" style="max-width:950px;">
        <div class="row">
            <div class="col-md-4">
                <br><br>
                <div class="row">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title" style="float:none !important;">Select Menu Item </h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">&nbsp;</label>
                            <div class="col-sm-8" style="padding-right:0px;padding-top:10px;">
                                <select class="form-control" name="menu" required="required">
                                    <option class="form-control" value="no">Please Select</option>
                                    <?php
                                    $sql_sel_menu = "SELECT *FROM menu";
                                    $result_menu = mysql_query($sql_sel_menu) or die("Cant execute Query !!!");
                                    $co=0;
                                    while($fetch = mysql_fetch_array($result_menu)){
                                    $menu = $fetch['menu_name'];
                                    $menu_id = $fetch['m_id'];
                                    ?>
                                    <option class="form-control"  value="<?php echo $menu.','.$menu_id; ?>"> <?php echo $menu; ?> </option>
                                    <?php } ?>
                                 </select>
                            </div>
                        </div>
                        <br>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div class="col-md-6">
                <br><br>
                <div class="row">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title" style="float:none !important;">Select Catgory Items </h3><br>
                            <div class="col-md-8">
                                <div class="middle" style="width:400px;">
                                    <?php
                                    $sql_sel_menu = "SELECT *FROM catg ORDER BY catg_id DESC limit 35";
                                    $result_menu = mysql_query($sql_sel_menu) or die("Cant execute Query !!!");
                                    $co=0;
                                    while($fetch = mysql_fetch_array($result_menu)){
                                    $catg = $fetch['catg_name'];
                                    $catg_id = $fetch['catg_id'];
                                    ?>
                                    <div class="menu-sp" style="float:left;margin-left:10px;margin-top:10px;width=80px;">
                                        <button type="button"  class="btn btn-sm btn-success">
                                            <?php echo $catg ?> &nbsp;&nbsp;
                                            <input type="checkbox"  name="check_list[]" value="<?php echo $catg.','.$catg_id; ?>">
                                        </button>
                                    </div>
                                           
                                    <?php $co=$co+1; } ?>
                                    <input type="hidden" type="text"  value ="<?php echo $co; ?>" name="count">
                                </div>
                            </div>
                        </div><br> 
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <br><br>
                <div class="row">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title" style="float:none !important;">&nbsp; </h3><br>
                            <div class="col-sm-3" style="margin-top:10px;">
                                <input type="submit" class="btn btn-md btn-primary" value="Add to menu" name="submit"><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="container" style="max-width:980px;">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title" style="float:none !important;">Menu hierarchy</h3>
                </div>
            </div>
                                       
            
        </div>
    </div>
</div>

<div class="container" style="max-width:980px;">
    <div class="row">
        <div class="col-md-12">
            <?php
            $sql_sel_menu_u = "SELECT *FROM menu ORDER BY m_id DESC limit 20";
            $result_menu_u = mysql_query($sql_sel_menu_u) or die("Cant execute Query !!!");
            $cm=0;
            while($fetch = mysql_fetch_array($result_menu_u)){
            $menu_u = $fetch['menu_name'];
            $menu_id_u = $fetch['m_id'];
            $menu_catg_u = $fetch['catg_id'];
            $menu_catg_r_u = explode(" ", $menu_catg_u);
            $c=count($menu_catg_r_u)-1;

            ?>
            
            



             <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title" style="float:none !important;"><?php echo $menu_u; ?></h3>
                        <button type="button"  class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal<?php echo $cm; ?>">clear all &nbsp;&nbsp;
            
            </button>
            <form method="post" class="form-horizontal" action="controller/delete_menu_catg_action.php" type="text/multipart">
            <div class="modal fade" id="myModal<?php echo $cm; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Clear all Menu under <?php echo $menu_u; ?>  ?!</h4>
            </div>
            <div class="modal-body">
            Are you sure ?
            <input type="hidden" name="menu_id" value="<?php echo $menu_id_u; ?>">
            <input type="hidden" name="menu" value="<?php echo  $menu_u; ?>">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="submit_menu">Yes Sure</button>
            </div>
            </div>
            </div>
            </div>
            </form>
            <?php $cm=$cm+1;  ?>
                            <br>
                        <div class="col-sm-3" >
                            <ul>
                                <?php
                                 $co_u=0;
                                 while($c>$co_u){
                                    $catg_id_u =$menu_catg_r_u[$co_u];
                                    $sql_sel_catg = "SELECT *FROM catg where catg_id='$catg_id_u'";
                                    $result_catg_u = mysql_query($sql_sel_catg) or die("Cant execute Query !!!");
                                    $fetch_c = mysql_fetch_array($result_catg_u);
                                    ?>
                                    <div class="classs" style="width:200px;"><li><?php echo $fetch_c['catg_name']; ?></li></div>
                               <?php  $co_u =$co_u+1;  }  ?>
                            </ul>
                        </div>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                </div>
            </div>
            <?php } ?>


        </div>
                
    </div>
</div>
<?php include 'footer.php'; ?>
<?php } ?>