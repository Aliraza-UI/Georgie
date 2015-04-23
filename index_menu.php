<div class="container-fluid">
    <div class="row">
        <div class="obj-wrapper"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 menu homemenu">
            <ul class="nav nav-pills nav-stacked menu-area">
                <li class="main-li">
                    <a href="about.php">GEORGIE MATTINGLEY</a>
                </li>
                <?php
                $sql_sel_menu = "SELECT *FROM menu";
                $result_menu = mysql_query($sql_sel_menu) or die("Cant execute Query !!!");
                $co=0;
                while($fetch = mysql_fetch_array($result_menu)){
                $menu = $fetch['menu_name'];
                $menu_id = $fetch['m_id'];
                ?>
                <li>
                    <a href="gallery_index.php?page=<?php echo $menu; ?>&page_id=<?php echo $menu_id; ?>"><?php echo $menu; ?></a>
                </li>
                <?php } ?>
                <li>
                    <a href="about.php?page=about">ABOUT</a>
                </li>
                <li>
                    <a href="contact.php?page=contact">CONTACT</a>
                </li>
            </ul>
        </div>
        <div class="upcoming upcoming-home">
            <?php
            $sql_sel_tr = "SELECT *FROM event ORDER BY sl_no ASC LIMIT 20";
            $res = mysql_query($sql_sel_tr);
            $n_row = mysql_num_rows($res);
            if($n_row>0){
            ?>
            <p class="upc-text">Upcoming</p>
            <?php } ?>
            <ul class="nav nav-section upc-section">
                <?php
                while($rows =mysql_fetch_array($res)){?>
                <li>
                    <?php echo stripslashes(mysql_real_escape_string($rows['name']));?><br>
                    <?php echo stripslashes(mysql_real_escape_string($rows['place']));?><br>
                    <?php echo stripslashes(mysql_real_escape_string($rows['date']));?><br><br>
                </li>
                <?php } ?>
            </ul>
        </div>
        <!-- <div class="col-xs-8  visible-xs-block">
            <?php
            $sql_sel_tr = "SELECT *FROM event ORDER BY sl_no ASC LIMIT 20";
            $res = mysql_query($sql_sel_tr);
            $n_row = mysql_num_rows($res);
            if($n_row>0){
            ?>
            <p class="mob-upchead">Upcoming</p>
            <?php } ?>
            <div class="col-xs-16  visible-xs-block mob-section">
                <ul class="nav nav-section">
                    <?php 
                    while($rows =mysql_fetch_array($res)){?>
                    <li>
                        <?php echo stripslashes(mysql_real_escape_string($rows['name']));?><br>
                        <?php echo stripslashes(mysql_real_escape_string($rows['place']));?><br>
                        <?php echo stripslashes(mysql_real_escape_string($rows['date']));?><br><br>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div> -->
    </div>
</div>