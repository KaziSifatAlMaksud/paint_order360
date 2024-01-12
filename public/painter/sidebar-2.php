
<!-- Sidebar -->
<?php
list(, $action) = explode('@', Route::getCurrentRoute()->getActionName());
//echo $action;
?>
<nav class="navbar navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <li class="sidebar-brand">
            <a href="<?php echo PUBLIC_PATH;?>" class="text-center">
                <img src="<?php echo PUBLIC_PATH;?>/image/logo-phone.png" />
            </a>
        </li>
        <li class="">
            <a href="<?php echo PUBLIC_PATH.'/new_order';?>" class="buy side-icon <?php echo $action == 'index' ? 'active' : '' ?>">Buy Paint</a>
        </li>
        <li >
            <a href="<?php echo PUBLIC_PATH.'/friend'?>" class="friend side-icon">Tell your Friend</a>
        </li>
        <li class=" <?php echo ($action == 'profile') ? 'active' : '' ?> ">
            <a href="<?php echo PUBLIC_PATH.'/profile'?>" class="details side-icon " >Your Details</a>
        </li>
        <li >
            <a href="<?php echo PUBLIC_PATH.'/my_jobs'?>" class="jobs side-icon">Previous Orders</a>
        </li>
         <li >
            <a href="<?php echo PUBLIC_PATH.'/find_shops'?>" class="building side-icon"> <i class="fa fa-home building_icon"  aria-hidden="true"></i> Nearest Shops</a>
        </li>
        <li >
            <a href="<?php echo PUBLIC_PATH.'/photo_order'?>" class="camera side-icon">Photo Order</a>
        </li> 
        <li >
            <a href="<?php echo PUBLIC_PATH.'/contact_us'?>" class="building side-icon"> <i class="fa fa-phone building_icon"  aria-hidden="true"></i> Contact-Us</a>
        </li>
        <?php 
        if($_Painter_user){
        ?>
        <li >
            <i class="fa fa-sign-out" style="color: #333;float: left;padding: 20px 2px;" ></i>
            <a href="<?php echo PUBLIC_PATH;?>/logout" class="side-icon">Logout</a>
        </li>
        <?php } ?>
    </ul>
</nav>
<!-- /#sidebar-wrapper -->
