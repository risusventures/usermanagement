<!doctype html>
 <html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="32x32">

    <title>FinacBooks</title>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/weather-icons/css/weather-icons.min.css" media="all">
        <!-- metrics graphics (charts) -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/metrics-graphics/dist/metricsgraphics.css">
        <!-- chartist -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/chartist/dist/chartist.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/c3js-chart/c3.min.css"> 
    <!-- uikit -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/icons/flags/flags.min.css" media="all">

    <!-- altair admin -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.min.css" media="all">

<?php include('analytics.php');?> 
</head>
<body class=" sidebar_main_open sidebar_main_swipe" style="background-color:white;">
    <!-- main header -->
<?php include('header.php');?>
<?php include('header_top.php');?>
    <div id="page_content" style="margin-left:0px;">
        <div id="page_content_inner" >
                <?php if($_GET['message']==1)
    { echo '<div class="uk-alert uk-alert-info" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Company Profile Updated  Successfully......</div>';}?>
            <!-- statistics (small charts) -->
            <div class="uk-grid uk-grid-width-large-1-5 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><i class="material-icons" style="font-size:27px;">shopping_cart</i></div>
                            <span class="uk-text-muted uk-text-small">Total Order</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><?php echo $invoice[0]['invoice']; ?></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
              <div class="uk-float-right uk-margin-top uk-margin-small-right"><i class="uk-icon-thumbs-up" style="font-size:27px;"></i></div>
                            <span class="uk-text-muted uk-text-small">Total Paid</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><?php echo $invoice[0]['paid_count']; ?></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><i class="uk-icon-tachometer" style="font-size:27px;"></i></div>
                            <span class="uk-text-muted uk-text-small">Total Due</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><?php echo $invoice[0]['due_count'];?></span></h2>
                        </div>
                    </div>
                </div>
				   <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><i class="uk-icon-justify uk-icon-github" style="font-size:27px;"></i></div>
                            <span class="uk-text-muted uk-text-small">Total Pending</span>
                          <h2 class="uk-margin-remove"><span class="countUpMe"><?php echo $invoice[0]['pending_count'];?></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                               <div class="uk-float-right uk-margin-top uk-margin-small-right"><i class="uk-close uk-close-alt" style="opacity:0px;box-shadow:#727272"></i></div>
                            <span class="uk-text-muted uk-text-small">Total Canceled</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><?php echo $invoice[0]['canceled_count'];?><noscript></noscript></span></h2>
                        </div>
                    </div>
                </div>
				
            </div>
 
            <!-- large chart -->
            <!-- tasks -->
            <div class="uk-grid" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}"  style="">
                <div class="uk-width-medium-1-1">
                    <div class="md-card">
                        <div style="width: 100%">
                       <div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div> 
    
                    </div>
                    </div>
                </div>
         
            </div>

            <!-- info cards -->
            <div class="uk-grid uk-grid-medium uk-grid-width-medium-1-2 uk-grid-width-large-1-2" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}">
                <div>
                 <div class="uk-width-medium-1-1">
                    <div class="md-card" data-uk-grid-margin="">
                         <div class="md-card">
                      <div class="md-card-content" style="height:345px;">
                            <ul class="uk-tab" data-uk-tab="{connect:'#tabs_anim1', animation:'scale'}">
                                <li class="uk-active" aria-expanded="true"><a href="#">About</a></li>
                                <li aria-expanded="false" class=""><a href="#">Company Profile</a></li>
                             
                            <li class="uk-tab-responsive uk-active uk-hidden" aria-haspopup="true" aria-expanded="false"><a>Item</a><div class="uk-dropdown uk-dropdown-small"><ul class="uk-nav uk-nav-dropdown"></ul><div></div></div></li><li class="uk-tab-responsive uk-active uk-hidden" aria-haspopup="true" aria-expanded="false"><a>Active</a><div class="uk-dropdown uk-dropdown-small"><ul class="uk-nav uk-nav-dropdown"></ul><div></div></div></li></ul>
                            <ul id="tabs_anim1" class="uk-switcher uk-margin" style="margin-top:0px;">
                                <li aria-hidden="false" class="uk-active" style="animation-duration: 200ms;"><div class="md-card">
                        <div class="md-card-head md-bg-light-blue-600" style="background-color:#1976D2!important">
                            <div class="md-card-head-menu" data-uk-dropdown="{pos:'bottom-right'}">
                            <a class="md-fab md-fab-small md-fab-accent" href="<?php echo site_url()?>profile/edit_contact/<?php echo $records4[0]['cp_id'];?>">
                                <i class="material-icons"></i>
                            </a>
                               
                            </div>
                            <div class="uk-text-center">
        <img class="md-card-head-avatar" src="<?php echo base_url()?>assets/file_icon/profile_image/thum/<?php if($records4[0]['image']){ echo $records4[0]['image'];}else{ echo 'dummy1.jpg';};?>" alt="" style="border-radius:0px;width:200px;height:100px;">
                            </div>
                            <h3 class="md-card-head-text uk-text-center md-color-white">
                             <?php echo $records4[0]['company_name'];?>
                            </h3>
                        </div>
                        <div class="md-card-content" style="height:115px;">
						<?php foreach($account_detail as $detail){?>
                            <ul class="md-list md-list-addon">
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons" style="color:#1976D2"></i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><?php echo $detail['user_email'];?></span>
                                        <span class="uk-text-small uk-text-muted">Email</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons" style="color:#1976D2"></i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><?php echo $detail['user_number'];?></span>
                                        <span class="uk-text-small uk-text-muted">Phone</span>
                                    </div>
                                </li>
						</ul><?php }?>
                        </div>
                    </div></li>
					   <li class="uk-active" aria-hidden="false">
                                    <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin="">
                                        <div class="uk-width-large-1-2">
                                            <h4 class="heading_c uk-margin-small-bottom">Contact Info</h4>
                                            <ul class="md-list md-list-addon">
                                        <li>
                                               <div class="md-list-addon-element">
                                               <i class="material-icons" style="font-size:28px;">&#xE853;</i>
                                                </div>
                                                <div class="md-list-content">
                                                <span class="md-list-heading"><?php echo $records4[0]['contact_name'];?></span>
                                                <span class="uk-text-small uk-text-muted">Contact Person</span>
                                                </div>
                                          </li>
                                             <li>
                                               <div class="md-list-addon-element">
                                               <i class="material-icons" style="font-size:28px;">&#xE7FD;</i>
                                                </div>
                                                <div class="md-list-content">
                                                <span class="md-list-heading" style=" text-transform: capitalize;"><?php echo $records4[0]['ceo_name'];?></span>
                                                <span class="uk-text-small uk-text-muted">CEO Name</span>
                                                </div>
                                          </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons"></i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">+91-<?php echo $records4[0]['mobile_number'];?></span>
                                                        <span class="uk-text-small uk-text-muted">Phone</span>
                                                    </div>
                                                </li>

                                                  <li>
                                                    <div class="md-list-addon-element">
                                                   <i class="material-icons" style="font-size:28px;">&#xE158;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><?php echo $records4[0]['email'];?></span>
                                                        <span class="uk-text-small uk-text-muted">Email</span>
                                                    </div>
                                                </li>
                                             
                                            </ul>
                                        </div>
                                        <div class="uk-width-large-1-2">
                                            <h4 class="heading_c uk-margin-small-bottom">Company Name</h4>
                                            <ul class="md-list">
                                                <li>
                                                    <div class="md-list-content">
                                                        <span class="uk-text-small uk-text-muted"><span style="font-size:18px;  text-transform: capitalize;"><?php echo $records4[0]['company_name'];?></span></span>
                                                    </div>
                                                </li>
                                             <li>
                                                <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted"><span><i class="material-icons" style="font-size:28px;float:left;">&#xE55F;</i></span>
                                                <div class="md-list-content">
                                                <span class="md-list-heading" style="font-size:12px;">
                                                 <?php echo $records4[0]['address']; ?>
                                                </span>
                                    
                                                </div>

                                                    </span>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                            </ul>
                        </div>
                 

                    </div>
                        </div>
                    </div>
                </div> 
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                         <ul class="md-list">
                   <li>
                                                    <div class="md-list-content">
                                                        <span class="uk-text-small uk-text-muted"> 
<div class="uk-grid uk-grid-width-small-1-2 uk-grid-width-large-1-3 uk-grid-width-xlarge-1-2 uk-text-center uk-sortable sortable-handler" id="dashboard_sortable_cards" data-uk-sortable="" data-uk-grid-margin="">

                <div>
                   <div class="md-card md-card-hover " style="background-color:#f88529">
                       <a href="<?php echo base_url();?>seller/sales" style="text-decoration:none;">  
                    <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                     <span style="font-size:35px;color:white"><b style="font-size:17px;"><i class="material-icons" style="font-size:27px;color:white"></i><br>Sales</b></span>
                        </div></a>
                    </div>
                </div>
                <div>
                <div class="md-card md-card-hover" style="background-color: rgba(0, 128, 0, 0.68);">
                     <a href="<?php echo base_url();?>seller/order" style="text-decoration:none;">  
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                         <span style="font-size:35px;color:white;"><b style="font-size: 17px;"><i class="material-icons" style="font-size:27px;color:white">shopping_cart</i><br>Add Order</b></span>
                        </div></a>
                    </div>
                </div>
                <div>

                           <div class="md-card md-card-hover" style="background-color:#1976D2;">
                              <a href="<?php echo base_url();?>seller/add_customer" style="text-decoration:none;"> 
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                         <span style="font-size:35px;color:white;"><b style="font-size:17px;"><i class="material-icons" style="font-size:27px;color:white">group</i><br>Add Customer</b></span>
                        </div></a>
                    </div>
                </div>
                <div>
                 <div class="md-card md-card-hover" style="background-color:#52B9E9;">
                <a href="http://www.morelife.in/shop/seller/password" style="text-decoration:none;"> 
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle" style="background-color: rebeccapurple">
                         <span style="font-size:35px;color:white"><b style="font-size:17px;"><i class="material-icons" style="font-size:27px;color:white"></i><br> Change Password</b></span>
                        </div></a>
                     </div>
                    </div>
                          <div>
                   <div class="md-card md-card-hover " style="background-color:#333021">
                       <a href="http://www.morelife.in/shop/seller/list_customers" style="text-decoration:none;">  
                    <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                     <span style="font-size:35px;color:white"><b style="font-size:17px;">
                     <i class="material-icons" style="font-size:27px;color:white">view_list</i><br>View Customers</b></span>
                        </div></a>
                    </div>
                </div>
                <div>
                <div class="md-card md-card-hover" style="background-color:#8B1267;">
                     <a href="http://www.morelife.in/shop/seller/view_order" style="text-decoration:none;">  
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                         <span style="font-size:35px;color:white;"><b style="font-size: 17px;">
                      <i class="material-icons" style="font-size:27px;color:white">view_list</i><br>View Orders</b></span>
                        </div></a>
                    </div>
                </div>
                  </div>
                </span>
          </div>
    </li>
 </ul>
 </div>
</div>


    </div>
 </div>

      <div class="uk-grid" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}"  style="">
                <div class="uk-width-medium-1-1">
                    <div class="md-card">
  
                <div class="md-card-content">
                            <h4 class="heading_c uk-margin-bottom">Latest Order</h4>
                            <div class="uk-overflow-container">
                                <table class="uk-table">
                                    <thead>
                                        <tr>
                                            <th class="uk-text-nowrap">Order No.</th>
                                            <th class="uk-text-nowrap">Company Name</th>
                                            <th class="uk-text-nowrap">Total Amount</th>
                                            <th class="uk-text-nowrap ">Status</th>
                                            <th class="uk-text-nowrap ">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($order as $order){?>
    									<tr class="uk-table-middle">
                                            <td class="uk-width-3-10 uk-text-nowrap"><?php echo $order['invoice_no'];?></td>
                                            <td class="uk-width-2-10 uk-text-nowrap"><?php echo $order['customer_company'];?></span></td>
                                            <td class="uk-width-3-10"><?php echo $order['Total_amount'];?></div>
                                         
                                            <td class="uk-width-2-10  ">
											       <?php
				         $pp_id =  $order['id'];
					   $q = $this->db->query("SELECT sum(invoice_paid_amount) as status_amount FROM `payment` WHERE invoice_id='$pp_id'");
					   $pays = $q->result_array();
					   $payment_status = $pays[0]['status_amount'];
					   if($payment_status ==0){ 
						   $message ='Pending';
						  $this->db->query("UPDATE invoice SET status= '$message' WHERE id= '$pp_id'");
						 echo '<span class="uk-badge uk-badge-success" style="padding: 3px 29px;background-color:#FCD202;">'.$message.'</span>';
					   }elseif($payment_status == $order['Total_amount'])
					   { 
					    $message = 'Paid';
						$this->db->query("UPDATE invoice SET status= '$message' WHERE id= '$pp_id'");
						echo '<span class="uk-badge uk-badge-success" style="padding: 3px 29px;">'.$message.'</span>';
					   }
					   else{ $message = 'Due'; 
					   $this->db->query("UPDATE invoice SET status= '$message' WHERE id= '$pp_id'");
					   echo '<span class="uk-badge uk-badge-success" style="padding: 3px 29px;background-color:#0D8ECF;">'.$message.'</span>';
					   }
					   ?>
											
											
											
											
											
											
											</td>
                                            <td class="uk-width-2-10  "><?php echo $order['invoice_date'];?></td>
                                        </tr>
                                     
                                        </tr>  <?php }?>
                                    </tbody>
                                </table>
                                <table class="uk-table"><tr><div class="uk-text-center uk-margin-top uk-margin-small-bottom" style="width:100%;">
               <a href="<?php echo base_url();?>seller/view_order" class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent" style="background-color:#1976D2;color:white;">Show All</a>
                                            </div></tr></table>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
      <?php foreach ($invoice as $invoice) {?>  
<div class="uk-grid uk-grid-width-small-1-2 uk-grid-width-large-1-3 uk-grid-width-xlarge-1-6 uk-text-center uk-sortable sortable-handler" id="dashboard_sortable_cards" data-uk-sortable="" data-uk-grid-margin="">
           
                <div>
                   <div class="md-card md-card-hover md-card-overlay" style="background-color:#f88529">
                        <a href="<?php echo base_url();?>seller/view_order"><div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                         <span style="font-size:35px;color:white"><h2 style="color:white"><?php echo $invoice['invoice'];?></h2><b style="font-size: 26px;">Orders</b></span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                            </div>
                        </div>
						</a>
                    </div>
                </div>
                <div>
                <div class="md-card md-card-hover md-card-overlay" style="background-color: rgba(0, 128, 0, 0.68);" style="padding-bottom:0px;postion:none;">
				<a href="<?php echo base_url();?>seller/view_order">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">     
						 <span style="font-size:35px;color:white;"><h2 style="color:white">Rs.<?php if($invoice['total']){ $total_amount = $invoice['total']; echo $total_amount;}else { echo '0';}?>/-</h2><b style="font-size: 26px;">Total Amount</b></span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                            </div>
                        </div>
						</a>
                    </div>
                </div>
 <?php 
  $query=$this->db->query("select sum(invoice_paid_amount) as total_paid from payment where seller_id='$user_id' ");   
  $data=$query->result_array();?>
                <div>
                    <div class="md-card md-card-hover md-card-overlay" style="background-color:#1976D2;">
					<a href="<?php echo base_url();?>seller/view_order">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                         <span style="font-size:35px;color:white;"><h2 style="color:white">Rs.<?php if($data[0]['total_paid']){echo $data[0]['total_paid'];}else{ echo '0';}?></h2><b style="font-size: 26px;">Paid</b></span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                            </div>
                        </div>
						</a>
                    </div>
                </div>
				
				       <div>
                           <div class="md-card md-card-hover md-card-overlay" style="background-color:#008897;">
						   <a href="<?php echo base_url();?>seller/view_order">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                         <span style="font-size:35px;color:white;"><h2 style="color:white">Rs.<?php if(invoice['total']){$total_due = $invoice['total']-$data[0]['total_paid']; echo $total_due;}else{ echo '0';}?></h2><b style="font-size: 26px;">Due</b></span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                            </div>
                        </div>
						</a>
                    </div>
                </div>
				
                <div>
                 <div class="md-card md-card-hover md-card-overlay" style="background-color:#52B9E9;">
				 <a href="<?php echo base_url();?>seller/view_order">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle" style="background-color: rebeccapurple">
                         <span style="font-size:35px;color:white"><h2 style="color:white">Rs.<?php if($invoice['pending']){echo $invoice['pending'];}else { echo '0';}?></h2><b style="font-size: 26px;">Pending</b></span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                            </div>
                        </div>
						</a>
                    </div>
                </div>
				
				
				 <div>
                 <div class="md-card md-card-hover md-card-overlay" style="background-color: red;">
				 <a href="<?php echo base_url();?>seller/view_order">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle" style="background-color: #fa3031;">
                         <span style="font-size:35px;color:white"><h2 style="color:white"><?php if($invoice['canceled']){echo $invoice['canceled'];}else { echo '0';}?></h2><b style="font-size: 26px;">Canceled</b></span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                            </div>
                        </div>
						</a>
                    </div>
                </div>
				
				 <div>
                 <div class="md-card md-card-hover md-card-overlay" style="background-color: red;">
				 <a href="<?php echo base_url();?>seller/list_customers">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle" style="background-color: #fa3031;">
                         <span style="color:white"><h2 style="color:white"><?php if($total_customers[0]['customers']){echo $total_customers[0]['customers'];}else { echo '0';}?></h2><b style="font-size: 26px;">Total Customers</b></span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                            </div>
                        </div>
						</a>
                    </div>
                </div>
            </div>
			
		
	  <?php }?>


        </div>
    </div>



    <!-- google web fonts -->
  

    <!-- common functions -->
    <script src="<?php echo base_url();?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url();?>assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url();?>assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
        <!-- d3 -->
        <script src="<?php echo base_url();?>assets/bower_components/d3/d3.min.js"></script>
        <!-- metrics graphics (charts) -->
        <script src="<?php echo base_url();?>assets/bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>
        <!-- chartist (charts) -->
        <script src="<?php echo base_url();?>assets/bower_components/c3js-chart/c3.min.js"></script>
        <script src="<?php echo base_url();?>assets/bower_components/chartist/dist/chartist.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/pages/plugins_charts.min.js"></script>
        <!-- maplace (google maps) -->
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="<?php echo base_url();?>assets/bower_components/maplace.js/src/maplace-0.1.3.js"></script>
        <!-- peity (small charts) -->
        <script src="<?php echo base_url();?>assets/bower_components/peity/jquery.peity.min.js"></script>
        <!-- easy-pie-chart (circular statistics) -->
        <script src="<?php echo base_url();?>assets/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
     

        <!--  dashbord functions -->
        <script src="<?php echo base_url();?>assets/js/pages/dashboard.min.js"></script>
	  <?php foreach($chart as $key){ $amount=$key['max_value'];}?>
     	<script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
		<script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
<?php 
$chart = $this->db->query("select month as m,month_id as id from chart_month ");
$b=$chart->result_array();
$i=1;
foreach($b as $c)
{$id=$c['id'];
$query =$this->db->query("SELECT date_format( on_date, '%m' ) as month, SUM( Total_amount) as total_sales FROM invoice WHERE seller_id = '$user_id' and `on_date` LIKE '%-0$id-%'  AND on_date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( on_date, '%b' ) ORDER BY date_format( on_date, '%m' ) ASC");
$amount=$query->result_array();

$paid =$this->db->query("SELECT date_format( add_on, '%m' ) as month, SUM(invoice_paid_amount) as total_paid FROM payment WHERE seller_id = '$user_id' and `add_on` LIKE '%-0$id-%'  AND add_on >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( add_on, '%b' ) ORDER BY date_format( add_on, '%m' ) ASC");
$paid_amount=$paid->result_array();


$pending =$this->db->query("SELECT date_format(on_date, '%m' ) as month, SUM(Total_amount) as total_pending FROM invoice WHERE status='pending' and seller_id = '$user_id' and `on_date` LIKE '%-0$id-%'  AND on_date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( on_date, '%b' ) ORDER BY date_format( on_date, '%m' ) ASC");
$pending_amount=$pending->result_array();

$due_amount = $amount[0]['total_sales']-$paid_amount[0]['total_paid'];

$canceled =$this->db->query("SELECT date_format(on_date, '%m' ) as month, SUM(Total_amount) as total_canceled FROM invoice WHERE status='canceled' and seller_id = '$user_id' and `on_date` LIKE '%-0$id-%'  AND on_date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( on_date, '%b' ) ORDER BY date_format( on_date, '%m' ) ASC");
$canceled_amount=$canceled->result_array();

$total = count($b);
$str .= "{";
$str .= '"month":"'.$c['m'].'",';
$str .= '"total_sales":"'.$amount[0]['total_sales'].'",';
$str .= '"total_pending":"'.$pending_amount[0]['total_pending'].'",';
$str .= '"total_paid":"'.$paid_amount[0]['total_paid'].'",';
$str .= '"total_due":"'.$due_amount.'",';
$str .= '"total_canceled":"'.$canceled_amount[0]['total_canceled'].'"';
$str .= '}';
 if($total>$i){
  $str .= ",";
 }
 $i++;

}


?>

<!-- amCharts javascript code -->
		<script type="text/javascript">
			AmCharts.makeChart("chartdiv",
				{
					"type": "serial",
					"categoryField": "month",
					"colors": [
		"#F60",
		"#FCD202",
		"#B0DE09",
		"#0D8ECF",
		"#FA3031",
		"#FA3031",
		"#CC0000",
		"#00CC00",
		"#0000CC",
		"#DDDDDD",
		"#999999",
		"#333333",
		"#990000"
	],
					"startDuration": 1,
					"categoryAxis": {
						"gridPosition": "start"
					},
					"trendLines": [],
					"graphs": [
						{
							"balloonText": "[[title]] of [[category]]:[[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-1",
							"title": "Total Sales",
							"type": "column",
							"valueField": "total_sales"
						},
						{
							"balloonText": "[[title]] of [[category]]:[[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-2",
							"title": "Total Pending",
							"type": "column",
							"valueField": "total_pending"
						},
							{
							"balloonText": "[[title]] of [[category]]:[[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-3",
							"title": "Total Paid",
							"type": "column",
							"valueField": "total_paid"
						},
						{
							"balloonText": "[[title]] of [[category]]:[[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-4",
							"title": "Total Due",
							"type": "column",
							"valueField": "total_due"
						},
						{
							"balloonText": "[[title]] of [[category]]:[[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-5",
							"title": "Total Canceled",
							"type": "column",
							"valueField": "total_canceled",
							"colors":"red"
						}
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "Amount"
						}
					],
					"allLabels": [],
					"balloon": {},
					"legend": {
						"enabled": true,
						"useGraphSettings": true
					},
					"titles": [
						{
							"alpha": 0.97,
							"id": "15",
							"size": 21,
							"text": "Sales"
						}
					],
					"dataProvider": [
						<?php echo $str;?>
					]
				}
			);
		</script>


</body>

</html>

           