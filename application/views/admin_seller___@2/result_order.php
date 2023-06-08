<?php $pages='manage_category';?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="32x32">
    <title>FinacBooks</title>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.min.css" media="all">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/kendo-ui/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/kendo-ui/styles/kendo.material.min.css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>

    <!--  datatables functions -->
    <script src="<?php echo base_url()?>assets/js/pages/plugins_datatables.min.js"></script>
	<?php include('analytics.php');?> 

    <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;  }
</script>


</head>
<body class=" sidebar_main_open sidebar_main_swipe">
<?php include('header.php');?>
<?php include('header_top.php');?>
<div id="page_content" style="margin-left:0px;">
<div id="page_content_inner">
<h4 class="heading_a uk-margin-bottom"><?php  if($month_report=='12' || $month_report=='6' || $month_report=='3'){echo 'Last&nbsp&nbsp'.$month_report.'&nbsp&nbspmonth Reports';}elseif($month_report=='current'){ echo $month_report.'&nbspMonth &nbspReports';}else{ echo 'Last&nbsp'.$month_report.'&nbspReports';}?></h4>
<div class="md-card uk-margin-medium-bottom">
<div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}" aria-haspopup="true" aria-expanded="false">
                                <button class="md-btn">Filter<i class="material-icons" style="color:white;"></i></button>
               <?php echo form_open(base_url('searchRecords'));?>                               
							   <div class="uk-dropdown uk-dropdown-bottom" style="min-width: 320px; top: 35px; left: 0px;">
                                    <ul class="uk-nav uk-nav-dropdown">
                                        <li class="uk-nav-header">Select Report Type</li>
                                        <li><a href="#"><select style="width:100%;height:30px;" name="status"><option value="paid">Paid</option><option value="pending">Pending</option><option value="due">Due</option></select> </a></li>
										 <li class="uk-nav-header">Period</li>
                                        <li><a href="#">
										<select style="width:100%;height:30px;"  onchange='CheckColors(this.value);'  id="quantityReturn" class="form-control" id="uk_dp_end" name="month_report">
										     <option value="current">Current Month</option>
										     <option value="Week">Last Week</option>
										     <option value="3">Last 3 Month</option>
											 <option value="6">Last 6 Month</option>
											 <option value="12">Last 12 Month</option>
											 </select></a></li>
											 <li></li>
										     <li><a href="#"><input type="submit" class="md-btn md-btn-primary" href="#" value="Update" name="Update"></a></li>
                                    </ul>
                                </div>
								<?php  echo form_close();?>
                            </div>
                    <div class="uk-overflow-container" >
                     <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter">
                            <thead>
                            <tr>
							    <th></th>
                                <th>Order No.</th>
                                <th>Date</th>
                                <th>Company Name</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Sales Person</th>
                            </tr>
                            </thead>
                            <tbody>
                               <?php foreach($order_filter as $filter){?>
                            <tr><td></td>
                                <td><?php echo $filter['invoice_no'];?></td>
                                <td><?php echo $filter['invoice_date'];?></td>
                                <td><?php echo $filter['customer_company'];?></td>
                                <td><?php echo $filter['Total_amount'];?></td>
                                <td><?php $status = $filter['status'];
								   if($status== 'Pending'){
									echo '<span class="uk-badge uk-badge-success" style="padding: 3px 29px;background-color:#FCD202;">'.$filter['status'].'</span>';
								   }elseif($status=='Due'){
									 echo '<span class="uk-badge uk-badge-success" style="padding: 3px 29px;background-color:#0D8ECF;">'.$filter['status'].'</span>';  
								   }else{  echo '<span class="uk-badge uk-badge-success" style="padding: 3px 29px;background-color:#51A851;">'.$filter['status'].'</span>'; }
								?></td>
                                <td><?php echo $filter['sales_person'];?></td>
                            </tr>
							   <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
           </div>
      </div>
</div>
    <!-- common functions -->
    <script src="<?php echo base_url()?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url()?>assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url()?>assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
    <!-- datatables -->
    <script src="<?php echo base_url()?>assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <!-- datatables colVis-->
    <script src="<?php echo base_url()?>assets/bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
    <!-- datatables tableTools-->
    <script src="<?php echo base_url()?>assets/bower_components/datatables-tabletools/js/dataTables.tableTools.js"></script>
    <!-- datatables custom integration -->
    <script src="<?php echo base_url()?>assets/js/custom/datatables_uikit.min.js"></script>
      <!-- kendo UI -->
    <script src="<?php echo base_url()?>assets/js/kendoui_custom.min.js"></script>

    <!--  kendoui functions -->
    <script src="<?php echo base_url()?>assets/js/pages/kendoui.min.js"></script>
  <!-- tablesorter -->
     <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>

    <!--  tablesorter functions -->
    <script src="<?php echo base_url();?>assets/js/pages/plugins_tablesorter.min.js"></script>



</body>
</html>