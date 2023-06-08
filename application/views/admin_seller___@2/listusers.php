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
      <!-- uikit -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/icons/flags/flags.min.css" media="all">

    <!-- altair admin -->
         <script src="<?php echo base_url();?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url();?>assets/js/uikit_custom.min.js"></script>
    
    
   <!---date picker--->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/jquery.comiseo.daterangepicker.css" >
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.min.css" media="all">
     <script id="script_e1">
    $(function() {$("#e1").daterangepicker();
     });
    </script>
        <script src="<?php echo base_url();?>assets/js/common.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/uikit_custom.min.js"></script>
    <!-- datepicker-->
    
        <style>
   .tablesorter-altair .tablesorter-headerAsc .tablesorter-header-inner::after{ color:#1976d2 !important;}         
    .tablesorter-altair .tablesorter-header-inner::after{color:#1976d2 !important;}        
            
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
            <h3 class="heading_a uk-margin-bottom"><u>View Users</u></h3>
            <div class="md-card">
			     <?php if($_GET['message']==already)
       { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
         <a href="#" class="uk-alert-close uk-close"></a>You are already registered</div>';}?>     
            <?php if($_GET['message']==success)
             { echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>Added User Successfully......</div>';}?>
                 <?php if($_GET['message']==1)
    { echo '<div class="uk-alert uk-alert-info" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>User Update  Successfully......</div>';}?>
                    <?php if($_GET['users']==deleted)
    { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>User successfully deleted.........</div>';}?>
                
                
               <!---datepicker--->
           
                    <div class="md-card">
                        <?php echo form_open(base_url('exportPrincipal'),array('method'=>'GET'));?>
                        <div class="md-card-toolbar">
                           <!-- <div class="md-card-toolbar-actions">
                                    <div class="col-md-4"><p><input class="raw" id="e1" name="recort_filter"><input type="submit" value="Reports" style="height:30px;background-color: #1976D2;border: none;color: white;" /></p>
                                </div>
                            </div>--><?php echo form_close();?>
                          <h3 class="md-card-toolbar-heading-text">
                                Principal
                            </h3>
                        </div>
                      
                    </div>
             
                                    <!---datepicker--->

            <!-- circular charts --> <br><br> 
	
				   <div class="uk-overflow-container uk-margin-bottom" style="margin: 10px;">
                        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter" style="border: 2px solid whitesmoke !important;">
                            <thead>
                            <tr>
                           
                                <th  style="color:#1976d2"><b>S.No.</b></th>
                                <th  style="color:#1976d2"><b>User Number</b></th>
                                <th  style="color:#1976d2"><b>Email</b></th>
                                <th  style="color:#1976d2"><b>Password</b></th>
                                <th  style="color:#1976d2"><b>Role</b></th>
                                <th  style="color:#1976d2"><b>Reg. Date</b></th>
                                <th class="filter-false remove sorter-false uk-text-center"  style="color:#1976d2"><b>Actions</b></th>
                            </tr>
                            </thead>
              
                            <tbody>
                     <?php  $i=1;

                      
                     
                     foreach ($user_details as $order) {
                              
                           
                         ?>  
                     <tr>
                         <td><?php echo $i; ?></td>
                         <td><?php  echo $order['user_number']; ?></td>
                          <td><?php echo $order['user_email']; ?></td>
                          <td><?php echo $order['user_password']; ?></td>
                          <td><?php $status = $order['roleid']; if ($status == 1){echo "Admin";} elseif(($status == 2)) {echo "Subadmin";}?></td>
                          <td><?php echo date('m-d-Y h:i:s A ', strtotime($order['add_on'])); ?></td>
                          <td>
                            <a href="<?php echo base_url()?>seller/contactprofile?id=<?php echo $order['user_id']; ?>" Title="edit"><i class="material-icons" style="font-size:28px;color:#1976D2;">edit</i></a>
   
                            <a href="<?php echo base_url()?>seller/delete_user/<?php echo $order['user_id'];?>" onclick="return ConfirmDialog()" data-uk-tooltip="{pos:'bottom'}" Title="Delete" onclick="return ConfirmDialog()"><i class="material-icons" style="font-size:28px;color:#1976D2;"></i></a> &nbsp;  
                          </td>
                         
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
    <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>
   <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
   <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>

    <!--  tablesorter functions -->
    <script src="<?php echo base_url();?>assets/js/pages/plugins_tablesorter.min.js"></script>
    <script type="text/javascript">

function ConfirmDialog(){
var x=confirm('Do You Want Delete This Record..');
if(x){
return true;
}else{
return false;
 }
}
</script>
<script type="text/javascript">
function ConfirmDialog1() {
  var x=confirm("Are you sure to Update record?")
  if (x) {
    return true;
  } else {
    return false;
  }
}


</script>
    
  <!-- date picker -->
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.js"></script>
            <script src="https://cdn.jsdelivr.net/momentjs/2.3.1/moment.min.js"></script>
            <script src="<?php echo base_url();?>assets/js/jquery.comiseo.daterangepicker.js"></script>
            
            <!-- date picker -->


 
 
</body>

</html>