  <aside id="sidebar_main">
        <div class="sidebar_main_header">
            <div class="sidebar_logo">
                <a href="#" class="sSidebar_hide"><img src="" alt="" height="15" width="71"/></a>
            </div>
        </div>
        
        <div class="menu_section">
            <ul>
                <li class="current_section" title="Dashboard">
                    <a href="<?php echo site_url('profile/dashboard')?>">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Dashboard</span>
                    </a>
                </li>
                    <li>
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">person</i></span>
                        <span class="menu_title"> Company Profile</span>
                    </a>
                    <ul>
         <li><a href="<?php echo site_url()?>profile/contactprofile"   class="">Contact Profile</a></li>
         <li><a href="<?php echo site_url()?>profile/bussinessProfile"  class=''>Business Profile</a></li>
                        <li><a href="<?php echo site_url('profile/about_Us')?>" class="">About Us</a></li>
                    </ul>
                </li>
            <li class="">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">view_list</i></span>
                        <span class="menu_title">Products Listing</span>
                    </a>
                    <ul>
                    <li><a href="<?php echo site_url('seller/addProducts')?>"  class="">Add Product</a></li>
                    <li><a href="<?php echo site_url('seller/manageProducts')?>" class="">Manage Products</a></li>
                    <li><a href="<?php echo site_url('seller/manageCategory')?>" class="">Manage Product Category</a></li>
                    </ul>
                </li>

                   <li class="">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">shopping_cart</i></span>
                        <span class="menu_title">Order</span>
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('seller/order');?>"  class="">Add Order</a></li>
                        <li><a href="<?php echo site_url('seller/view_order')?>" class="">List Order</a></li>
                        <li><a href="<?php echo site_url('seller/upload_csv')?>" class="">Upload Csv</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">group</i></span>
                        <span class="menu_title">Customers</span>
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('seller/add_customer');?>" class="">Add Customer</a></li>
                        <li><a href="<?php echo site_url('seller/list_customers');?>" class="">List Customer</a></li>
                    </ul>
                </li>
           <li class="">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE24B;</i></span>
                        <span class="menu_title">Reports</span>
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('seller/sales');?>" class="">Sales</a></li>
                    </ul>
                 </li>
                  <li class="">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE7FD;</i></span>
                        <span class="menu_title">Hi,Administrator</span>
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('seller/password');?>" class="">Change Password</a></li>
                        <li><a href="<?php echo site_url('user_ctrl/logout');?>" class="">Logout</a></li>
                    </ul>
                </li>
                <li> <div id="kUI_calendar" style="padding:10px;"></div></li>
            </ul>

        </div>
    </aside><!-- main sidebar end -->
