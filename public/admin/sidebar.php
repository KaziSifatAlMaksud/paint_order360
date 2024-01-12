<style type="text/css">
    .page-name {
        text-transform: uppercase;
    }
</style>
<div class="site-menubar scrollbar" id="style-1">
    <div class="site-menubar-body force-overflow">
        <div>
            <div>
                <ul class="site-menu">

                    <li class="site-menu-item">
                        <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/dashboard' ?>" data-slug="dashboard">
                            <i class="site-menu-icon fa fa-dashboard" aria-hidden="true"></i>

                            <span class="site-menu-title">Dashboard</span> </p>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub  <?php //echo ($page == 'index' || $page == 'about' || $page == 'terms'|| $page == 'policy') ?  "open active" : ""; 
                                                        ?>">
                        <a href="javascript:void(0)" data-slug="layout">
                            <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                            <span class="site-menu-title">
                                <p style="color:orange">Registered Painters</p>
                            </span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/painters' ?>" data-slug="admins-listing">
                                    <i class="site-menu-icon fa fa-arrow-right" aria-hidden="true"></i>
                                    <span class="site-menu-title">
                                        <p style="color:orange">Registered Painters</p>
                                    </span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/add_painter' ?>" data-slug="admins-listing">
                                    <i class="site-menu-icon fa fa-arrow-right" aria-hidden="true"></i>
                                    <span class="site-menu-title">
                                        <p style="color:orange">Add New Painters</p>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="site-menu-item">
                        <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/orders' ?>" data-slug="articles-listing">
                            <i class="site-menu-icon fa fa-cubes" aria-hidden="true"></i>
                            <span class="site-menu-title">
                                <p style="color:orange">See Painters Orders</p>
                            </span>
                        </a>
                    </li>

                    <li class="site-menu-item has-sub ">
                        <a href="javascript:void(0)" data-slug="layout">
                            <i class="site-menu-icon fa fa-cog" aria-hidden="true"></i>
                            <span class="site-menu-title">
                                <p style="color:orange">Upload to painter</p>
                            </span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/painterJob' ?>" data-slug="admins-listing">
                                    <i class="site-menu-icon fa fa-arrow-right" aria-hidden="true"></i>
                                    <span class="site-menu-title">
                                        <p style="color:orange">See Upload job</p>
                                    </span>
                                </a>
                            </li>

                        </ul>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/register-builder' ?>" data-slug="admins-listing">
                                    <i class="site-menu-icon fa fa-arrow-right" aria-hidden="true"></i>
                                    <span class="site-menu-title">
                                        <p style="color:orange">Builder</p>
                                    </span>
                                </a>
                            </li>

                        </ul>
                    </li>





                    <!-- <li class="site-menu-item">
                            <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/advisors/' ?>" data-slug="users-listing">
                                <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                                <span class="site-menu-title">Advisors</span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/teams/' ?>" data-slug="articles-listing">
                                <i class="site-menu-icon fa fa-gamepad" aria-hidden="true"></i>
                                <span class="site-menu-title">Teams </span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/events/' ?>" data-slug="articles-listing">
                                <i class="site-menu-icon fa fa-gamepad" aria-hidden="true"></i>
                                <span class="site-menu-title">Matches </span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/bookmakers/' ?>" data-slug="articles-listing">
                                <i class="site-menu-icon fa fa-cubes" aria-hidden="true"></i>
                                <span class="site-menu-title">Bookmakers </span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/clients/' ?>" data-slug="articles-listing">
                                <i class="site-menu-icon fa fa-cubes" aria-hidden="true"></i>
                                <span class="site-menu-title">Our Clients </span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/bestSellingTipsters/' ?>" data-slug="articles-listing">
                                <i class="site-menu-icon fa fa-cubes" aria-hidden="true"></i>
                                <span class="site-menu-title">Best Selling Tipster</span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/articles/' ?>" data-slug="articles-listing">
                                <i class="site-menu-icon fa fa-cubes" aria-hidden="true"></i>
                                <span class="site-menu-title">Blog</span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/categories/' ?>" data-slug="articles-listing">
                                <i class="site-menu-icon fa fa-cubes" aria-hidden="true"></i>
                                <span class="site-menu-title">Blog's Category </span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/countries/' ?>" data-slug="articles-listing">
                                <i class="site-menu-icon fa fa-cubes" aria-hidden="true"></i>
                                <span class="site-menu-title">Country</span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/languages/' ?>" data-slug="articles-listing">
                                <i class="site-menu-icon fa fa-language" aria-hidden="true"></i>
                                <span class="site-menu-title">Languages </span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/languageKeys/' ?>" data-slug="articles-listing">
                                <i class="site-menu-icon fa fa-language" aria-hidden="true"></i>
                                <span class="site-menu-title">Language Keys </span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/languageValues/' ?>" data-slug="articles-listing">
                                <i class="site-menu-icon fa fa-language" aria-hidden="true"></i>
                                <span class="site-menu-title">Language Values </span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/currencies/' ?>" data-slug="articles-listing">
                                <i class="site-menu-icon fa fa-money" aria-hidden="true"></i>
                                <span class="site-menu-title">Currencies </span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/PageData/' ?>" data-slug="articles-listing">
                                <i class="site-menu-icon wb-image" aria-hidden="true"></i>
                                <span class="site-menu-title">Header Images</span>
                            </a>
                        </li>
                          <li class="site-menu-item">
                            <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/settings/' ?>" data-slug="articles-listing">
                                <i class="fa fa-gears" aria-hidden="true"></i>
                                <span class="site-menu-title">Settings</span>
                            </a>                      <p style="color:blue">Add Product</p>
                        </li> -->



                    <li class="site-menu-item has-sub  <?php //echo ($page == 'index' || $page == 'about' || $page == 'terms'|| $page == 'policy') ?  "open active" : ""; 
                                                        ?>">
                        <a href="javascript:void(0)" data-slug="layout">
                            <i class="site-menu-icon fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="site-menu-title">
                                <p style="color:pink">Advertisement</p>
                            </span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/product' ?>" data-slug="admins-listing">
                                    <i class="site-menu-icon fa fa-arrow-right" aria-hidden="true"></i>
                                    <span class="site-menu-title">
                                        <p style="color:pink">View Products</p>
                                    </span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/product/create' ?>" data-slug="admins-listing">
                                    <i class="site-menu-icon fa fa-arrow-right" aria-hidden="true"></i>
                                    <span class="site-menu-title">
                                        <p style="color:pink">Add Product</p>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="site-menu-item has-sub  <?php //echo ($page == 'index' || $page == 'about' || $page == 'terms'|| $page == 'policy') ?  "open active" : ""; 
                                                        ?>">
                        <a href="javascript:void(0)" data-slug="layout">
                            <i class="site-menu-icon fa fa-cog" aria-hidden="true"></i>
                            <span class="site-menu-title">
                                <p style="color:pink">Text in banner</p>
                            </span>
                            <span class="site-menu-arrow"></span>
                        </a>

                    </li>



                    <li class="site-menu-item has-sub  <?php //echo ($page == 'index' || $page == 'about' || $page == 'terms'|| $page == 'policy') ?  "open active" : ""; 
                                                        ?>">
                        <a href="javascript:void(0)" data-slug="layout">
                            <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                            <span class="site-menu-title">Paint Shops</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/shops' ?>" data-slug="admins-listing">
                                    <i class="site-menu-icon fa fa-arrow-right" aria-hidden="true"></i>
                                    <span class="site-menu-title">View Shops</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/add_shop' ?>" data-slug="admins-listing">
                                    <i class="site-menu-icon fa fa-arrow-right" aria-hidden="true"></i>
                                    <span class="site-menu-title">Add Shop</span>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li class="site-menu-item has-sub  <?php //echo ($page == 'index' || $page == 'about' || $page == 'terms'|| $page == 'policy') ?  "open active" : ""; 
                                                        ?>">
                        <a href="javascript:void(0)" data-slug="layout">
                            <i class="site-menu-icon fa fa-cubes" aria-hidden="true"></i>
                            <span class="site-menu-title">Paint Brands</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/brands' ?>" data-slug="admins-listing">
                                    <i class="site-menu-icon fa fa-arrow-right" aria-hidden="true"></i>
                                    <span class="site-menu-title">View Brands</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/add_brand' ?>" data-slug="admins-listing">
                                    <i class="site-menu-icon fa fa-arrow-right" aria-hidden="true"></i>
                                    <span class="site-menu-title">Add Brand</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item has-sub  <?php //echo ($page == 'index' || $page == 'about' || $page == 'terms'|| $page == 'policy') ?  "open active" : ""; 
                                                        ?>">
                        <a href="javascript:void(0)" data-slug="layout">
                            <i class="site-menu-icon fa fa-cubes" aria-hidden="true"></i>
                            <span class="site-menu-title">See Expired Jobs</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/expiredJobs' ?>" data-slug="admins-listing">
                                    <i class="site-menu-icon fa fa-arrow-right" aria-hidden="true"></i>
                                    <span class="site-menu-title">Show expired</span>
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li class="site-menu-item has-sub  <?php //echo ($page == 'index' || $page == 'about' || $page == 'terms'|| $page == 'policy') ?  "open active" : ""; 
                                                        ?>">
                        <a href="javascript:void(0)" data-slug="layout">
                            <i class="site-menu-icon fa fa-cubes" aria-hidden="true"></i>
                            <span class="site-menu-title">Builder</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/admin_builder' ?>" data-slug="admins-listing">
                                    <i class="site-menu-icon fa fa-arrow-right" aria-hidden="true"></i>
                                    <span class="site-menu-title">Builder List</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/admin_builder/create' ?>" data-slug="admins-listing">
                                    <i class="site-menu-icon fa fa-arrow-right" aria-hidden="true"></i>
                                    <span class="site-menu-title">Create Builder</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="site-menu-sub mb-5">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/admin/assign_builder' ?>" data-slug="admins-listing">
                                    <i class="site-menu-icon fa fa-arrow-right" aria-hidden="true"></i>
                                    <span class="site-menu-title">Assign Builder</span>
                                </a>
                            </li>
                        </ul>

                    </li>

                </ul>

            </div>
        </div>
    </div>
</div>

<div class="page animsition">
    <div class="page-content">