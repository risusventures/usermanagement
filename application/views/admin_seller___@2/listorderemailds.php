<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/risus-03.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/risus-03.png" sizes="32x32">
    <title>Risus Ventures</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
 <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- uikit -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/icons/flags/flags.min.css" media="all">

    <!-- altair admin -->
         <script src="<?php echo base_url();?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url();?>assets/js/uikit_custom.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>
    
        <style>
#preloader  {
     position: absolute;
     top: 0;
     left: 0;
     right: 0;
     bottom: 0;
     background-color: #fefefe;
     z-index: 99;
    height: 100%;
 }
#status  {
     width: 200px;
     height: 200px;
     position: absolute;
     left: 50%;
     top: 50%;
     background-image: url(http://www.finacbooks.com/assets/img/ajax-loader.gif);
     background-repeat: no-repeat;
     background-position: center;
    margin: -100px 0 0 -100px;
 }
</style>
<script>// makes sure the whole site is loaded
    jQuery(window).load(function() {
        // will first fade out the loading animation
    jQuery("#status").fadeOut();
        // will fade out the whole DIV that covers the website.
    jQuery("#preloader").delay(1000).fadeOut("slow");
})
</script>
 

</head>
<body class=" sidebar_main_open sidebar_main_swipe" style="background-color:white;">
<?php include('header.php');?>
<?php include('header_top.php');?>
    <div id="page_content" style="margin-left:0px;">
        <div id="page_content_inner">
<h4 class="heading_a uk-margin-bottom">View Business Emails</h4>
            <div class="md-card">
			     <?php if($_GET['message']==already)
       { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
         <a href="#" class="uk-alert-close uk-close"></a>You are already registered</div>';}?>     
            <?php if($_GET['message']==success)
             { echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>Added Order Successfully......</div>';}?>
                 <?php if($_GET['message']==1)
    { echo '<div class="uk-alert uk-alert-info" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Order Update  Successfully......</div>';}?>
                    <?php if($_GET['customer']==deleted)
    { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Order successfully deleted.........</div>';}?>
                
                
                
		
  </div>					

				  
				  
        <div class="uk-grid" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}"  style="">
                <div class="uk-width-medium-1-1">
                    <div class="md-card">
<!--                        <div style="width: 100%">
                       <div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div> 
                    </div>-->
                    </div>
                </div>
         
            </div><br>
				   <div class="uk-overflow-container uk-margin-bottom">
                        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter">
                            <thead>
                            <tr>
                           
                                <th>S.No.</th>
                                <th>Order Id</th>
                                <th>View Emails</th>
                               
                               
                            </tr>
                            </thead>
              
                            <tbody>
                     <?php  $i=1;

                      
                     
                     foreach ($getorderemailidsdata as $order) {
                              $orderdetail=  $this->product_model->edit_order_model($order['order_id']);
                           // echo '<pre>'; print_r($orderdetail); echo '</pre>';
                         ?>  
                     <tr>
                         <td><?php echo $i; ?></td>
                         <td><?php if(!empty($orderdetail['order'])){ echo "Order number: <br>". $orderdetail['order']['order_no'];}else{
                             echo "Open Email";
                         } ?></td>
                         <td><?php if(!empty($orderdetail['order'])){  ?> 
                                <a href="<?php echo base_url('seller/listallemails')."?id=".$order['order_id'] ?>"  Title="view"><i class="material-icons" style="font-size:28px;color:#1976D2;">remove_red_eye</i></a>
                        <?php } ?></td>
                    </tr>
                            <?php $i++; }?>
                            </tbody>
                        </table>
                    </div>
                    <ul class="uk-pagination ts_pager">
                        <li data-uk-tooltip title="Select Page">
                            <select class="ts_gotoPage ts_selectize"></select>
                        </li>
                        <li class="first"><a href="javascript:void(0)"><i class="uk-icon-angle-double-left"></i></a></li>
                        <li class="prev"><a href="javascript:void(0)"><i class="uk-icon-angle-left"></i></a></li>
                        <li><span class="pagedisplay"></span></li>
                        <li class="next"><a href="javascript:void(0)"><i class="uk-icon-angle-right"></i></a></li>
                        <li class="last"><a href="javascript:void(0)"><i class="uk-icon-angle-double-right"></i></a></li>
                        <li data-uk-tooltip title="Page Size">
                            <select class="pagesize ts_selectize">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
           

            <div id="preloader">
 <div id="status"></div>
</div>
    <!-- common functions -->
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url();?>assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
    <!-- tablesorter -->
     <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.min.css" media="all">
   <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>

    <!--  tablesorter functions -->
    <script src="<?php echo base_url();?>assets/js/pages/plugins_tablesorter.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
    



 
 
</body>

</html>