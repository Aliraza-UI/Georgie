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
<?php include'header.php'; ?>
    <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">View Analytics</li>
                </ol>
            </section>
            <!-- Main content -->
            
                <br/>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-1">&nbsp;</div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title" style="float:none !important;">Website Analytics</h3>
                                    </div>
                                    <div class="box-body">
                                         <table class="table table-striped table-responsive">

                                        <tr>
                                            <td style="width:5px;"><strong>No</strong></td>
                                            <td><strong>IP</strong></td>
                                            <td><strong>URL</strong></td>
                                            <td><strong>Browser</strong></td>
                                            <td><strong>Country</strong></td>
                                            <td><strong>Time</strong></td>
                                        </tr>
                                        <?php
                                        $sql_sel_tr = "SELECT *FROM track ORDER BY sl_no DESC";
                                        $res = mysql_query($sql_sel_tr);
                                        $n=1;
                                        while($rows =mysql_fetch_array($res)){
                                        
                                        ?>
                                        <tr>
                                            <td style="width:5px;"><strong><?php echo $n; ?></strong></td>
                                            <td><strong><?php echo $rows['ip_address']; ?></strong></td>
                                            <td><strong><?php echo $rows['page_url']; ?></strong></td>
                                            <td><strong><?php echo $rows['browser']; ?></strong></td>
                                            <td><strong><?php echo $rows['country']; ?></strong></td>
                                            <td><strong><?php echo $rows['time']; ?></strong></td>
                                        </tr>
                                        <?php $n=$n+1; } ?>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            
<?php include'footer.php'; ?> 
<?php } ?>          