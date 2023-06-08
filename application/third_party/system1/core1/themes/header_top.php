<div id="top_bar" style="margin-left:0px;">
    <div class="md-top-bar">
        <ul id="menu_top" class="uk-clearfix">
            <li><a href="<?php echo site_url('dashboard')?>"><i class="material-icons md-24"></i></a></li>
            <li data-uk-dropdown="" aria-haspopup="true" aria-expanded="false" class="">
                <a href="<?php echo site_url()?>add_profile" style="text-decoration:none;">Business Profile</a>
            </li>
            <li data-uk-dropdown="" aria-haspopup="true" aria-expanded="false" class="">
                <a href="#" style="text-decoration:none;">Products Catalog</a>
                <div class="uk-dropdown uk-dropdown-scrollable uk-dropdown-bottom" style="min-width: 200px; top: 40px; left: 0px;">
                    <ul class="uk-nav uk-nav-dropdown">
                        <li><a href="<?php echo site_url('addProducts')?>">Add Products</a></li>
                        <li><a href="<?php echo site_url('manageProducts')?>">Manage Products</a></li>
                        <li><a href="<?php echo site_url('manageCategory')?>">Manage Product Categories</a></li>
                    </ul>
                </div>
            </li>			
			
			  <li data-uk-dropdown="" aria-haspopup="true" aria-expanded="false" class="">
                <a href="#" style="text-decoration:none;">Customers</a>
                <div class="uk-dropdown uk-dropdown-scrollable uk-dropdown-bottom" style="min-width: 200px; top: 40px; left: 0px;">
                    <ul class="uk-nav uk-nav-dropdown">
                        <li><a href="<?php echo site_url('seller/add_customer');?>">Add Customer</a></li>
                        <li><a href="<?php echo site_url('seller/list_customers');?>">Manage Customers</a></li>
                    </ul>
                </div>
            </li>
               <li data-uk-dropdown="" aria-haspopup="true" aria-expanded="false" class="">
                <a href="#" style="text-decoration:none;">Order</a>
                <div class="uk-dropdown uk-dropdown-scrollable uk-dropdown-bottom" style="min-width: 200px; top: 40px; left: 0px;">
                    <ul class="uk-nav uk-nav-dropdown">
                        <li><a href="<?php echo site_url('seller/upload_csv')?>">Upload CSV</a></li>
                        <li><a href="<?php echo site_url('seller/order');?>">Add Order</a></li>
                        <li><a href="<?php echo site_url('seller/view_order')?>">manage Orders</a></li>
                    </ul>
                </div>
            </li>          

			
			 <li data-uk-dropdown="" aria-haspopup="true"  class="">
    <a href="<?php echo site_url('seller/order_track');?>" style="text-decoration:none;">Track Order</a></li>
			
			

    <li data-uk-dropdown="" aria-haspopup="true"  class="">
    <a href="<?php echo site_url('seller/sales');?>" style="text-decoration:none;">Sales</a></li>
	
	 <li data-uk-dropdown="" aria-haspopup="true"  class="">
    <a href="#" style="text-decoration:none;">Reports</a></li>
				   </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>