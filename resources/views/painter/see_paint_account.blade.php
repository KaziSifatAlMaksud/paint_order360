<?php
require  public_path() . '/painter/header.php';
require  public_path() . '/painter/sidebar.php';

?>
<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="header-hide">
        
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>
        <div class="container-fluid-main">
                <div class="div">
                    <a href="<?php echo PUBLIC_PATH.'/main'?>">
                         <img src="{{ asset('/image/logo.png') }}">
                    </a>
                </div>
        <h2 class="media-heading">HI, <?php echo $user->company_name;?> </h2>
        </div>
    </div>

    
 <!--   <div class="container-fluid detail">
        <div class="row">
            <div class="col-lg-12">
                <div class="topbar">  -->

                <div class="row card "  style="display: flex; justify-content: space-between;margin-top:20px;margin-left:15px;margin-right:15px !important;border-radius:15px;font-size:17px">
                <div class="col-6" style="margin:20px">
                    
                    <!-- Left-aligned -->
                    <div class="media">
                        <div class="media-left">
                            <div class="profile" style="background-image: url( <?php echo ($user->photo != '') ? PUBLIC_PATH . '/uploads/' . $user->photo : 'image/no_img.png'; ?>);"></div>

                        </div>
                        

                            <style>
      /* Set the style of the line */
      hr {
        border: none;
        border-top: 1px solid gray;
        /* adjust the thickness and color of the line here */
      }
    </style>
  </head>
  <body>
    <?php
      // This is where your PHP code would go
    ?>
    <!-- Insert the line into the HTML document -->
    <hr>
                            


                            
                            <h3 class="mt-70 media-heading">Paint Acount Details</h3>
                            <hp class="color-black" style="font-size: 18px;">Add your paint acount number, paint brand and builder name  </hp>

                            <p class="redcolor_m">Scroll left to view more</p>
                            <div class="row">
                                <div class="col-md-12 hidden-xs hidden-sm">
                                    <a style="margin-bottom: 10px;" class="btn btn-orange outer rounded pull-right" href="<?php echo PUBLIC_PATH . '/add_builder' ?>">Add New Builder</a>
                                </div>
                                <div class="col-md-12" style="overflow-x: auto;">
                                    <table class="table table-bordered table-inverse" id="builder_table" style="margin-left: 0px;">
                                        <thead>
                                            <tr>
                                                <!-- <th>Account number</th>    -->
                                               <!-- <th>Builders</th> -->
                                                <th>Paint Acount</th>
                                               <!-- <th>brand</th> -->
                                                <!--  <th>Action</th>  -->
                                            </tr>
                                        </thead>    

                                                                   

                                                                                

                                        <tbody>
                                            <?php
                                            foreach ($builders as $key => $value) { ?>
                                                <tr>
                                                <td>    <a class=" " href="<?php echo PUBLIC_PATH . '/edit_builder/' . $value->id; ?>">    
                                                   <?php echo $value->name ? $value->name : $user->name; ?> </a>   
                                                    <?php echo $value->account_no; ?>
                                                      <?php 
                                                   echo $value->brand; 
                                                   
                                                   ?></td>  
                                                   
                                        
                                          
                                                  <!--  <td class="text-center">
                                                        <a style="margin-bottom: 10px;" class="btn-orange outer rounded btn-sm" href="<?php echo PUBLIC_PATH . '/edit_builder/' . $value->id; ?>">edit</a>
                                                    </td>   -->
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>  
                                <br>
                                <div class="col-md-12 hidden-lg hidden-md hidden-xl">
                                    <a style="margin-bottom: 10px;" class="btn btn-green outer rounded pull-right" href="<?php echo PUBLIC_PATH . '/add_builder' ?>">Add New Paint account</a>
                                </div>
                                        
                                <style>
                                hr {
        border: none;
        border-top: 1px solid gray;
        /* adjust the thickness and color of the line here */
      }
    </style>
  </head>
  <body>
    <?php
      // This is where your PHP code would go
    ?>
    <!-- Insert the line into the HTML document -->
   
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
<?php
require  public_path() . '/painter/footer.php';
?>