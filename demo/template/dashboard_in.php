<?php 
    session_start();
    
    if(!isset($_SESSION["email"])) {
        header("Location:login");
    }
?>
<?php include '_include/header.php' ?>
<div class="global">
    <header>
        <div class="container-main custom_header">
            <img src="../statics/img/logo_small.png">
            <?php
            if($_SESSION["email"]) {
                ?>
                <span class="pull-right">Welcome <?php echo " ".$_SESSION["name"]." "; ?><a href="logout.php" tite="Logout"> Logout</a></span>
                <?php
            }
            ?>
        </div>
    </header>
    <div class="container-main">
        <div class="js_aj_data">
            
        </div>
        <div class="js_all_user other_user_list">
            
        </div>
    </div> 
    <div class="footer">
        

    </div>
    <span class="loader js_loader">
        <img src="../statics/img/loader.gif">
    </span>
</div>

<!-- <script src="../statics/js/dashboard.js" type="text/javascript" ></script> -->
<!-- <script src="../statics/js/common.js" type="text/javascript" ></script> -->
<?php
    require 'jsmin-1.1.1.php';
    $js=file_get_contents('../statics/js/dashboard.js');
    $js.=file_get_contents('../statics/js/common.js');
    $js=JSMin::minify($js);
    echo '<script>'.$js.'</script>';
    // file_put_contents($writabledir.$name,$js);
?>
<script type="text/javascript">
    aj_call(<?php echo "'".$_SESSION["email"]."'"; ?>);
    all_user_render();
    session_status = <?php echo "'".$_SESSION["status"]."'"; ?>;
    session_email = <?php echo "'".$_SESSION["email"]."'"; ?>;
</script>
<?php include '_include/footer.php' ?>
