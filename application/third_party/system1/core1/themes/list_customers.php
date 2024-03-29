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


    <!-- uikit -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/icons/flags/flags.min.css" media="all">

    <!-- altair admin -->

    <script src="<?php echo base_url();?>assets/bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>


</head>
<body class=" sidebar_main_open sidebar_main_swipe" style="background-color:white;">
<?php include('header.php');?>
<?php include('header_top.php');?>
    <div id="page_content" style="margin-left:0px;">
        <div id="page_content_inner">
<h4 class="heading_a uk-margin-bottom">View Customers</h4>
            <div class="md-card">
			     <?php if($_GET['message']==already)
       { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
         <a href="#" class="uk-alert-close uk-close"></a>You are already registered</div>';}?>     
            <?php if($_GET['message']==success)
             { echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>Added Customer Successfully......</div>';}?>
                 <?php if($_GET['message']==1)
    { echo '<div class="uk-alert uk-alert-info" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Customer Update  Successfully......</div>';}?>
                    <?php if($_GET['customer']==deleted)
    { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>customer successfully deleted.........</div>';}?>
              <form action="<?php echo base_url();?>seller/list_customers" method="post">    
				<div class="md-card-content">
   <div class="uk-grid" data-uk-grid-margin=""> 
  <div class="uk-width-large-1-2 uk-width-medium-1-1" >
  <a href="<?php echo base_url();?>seller/export_customers" class="btn btn-warning btn-sm dropdown-toggle"   style="background-color:#1976D2;border:none;padding:5px;color:white"><i class="material-icons" style="color:white;">view_list</i> Export Table Data</a>         
								</div>
								
							

<div class="uk-width-large-1-4 uk-width-medium-1-1" >
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                <div class="md-input-wrapper md-input-filled"><label for="uk_dp_1"></label>
								<select name="month_year" style="width: 100%;height: 35px;"><option>Select Year</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option></select><span class="md-input-bar"></span></div>
                                    </div>
									
                                </div>
								<div class="uk-width-large-1-6 uk-width-medium-1-1">
                                    <div class="uk-input-group">
                                      <input type="submit" class="md-btn md-btn-success" Value="Filter" submit="Filter">
                                    </div>
									
                                </div></div>
				  </div></form><br><br>
				  
				  
				    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}"  style="">
                <div class="uk-width-medium-1-1">
                    <div class="md-card">
                        <div style="width: 100%">
                       <div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div> 
                    </div>
                    </div>
                </div>
         
            </div><br><br>
				   <div class="uk-overflow-container uk-margin-bottom">
                        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter">
                            <thead>
                            <tr>
                           
                                <th>S.No.</th>
                                 <th>Name</th>
                                <th>Company</th>
                                <th>Phone</th>
                                <th>Email Address</th>
                                <th>City </th>
                                <th>Country</th>
                                <th class="filter-false remove sorter-false uk-text-center">Actions</th>
                            </tr>
                            </thead>
              
                            <tbody>
                     <?php  $i=1; foreach ($list_customer as $customer) {?>  
                     <tr>
					 <td><?php echo $i++;?></td>
                     <td><?php echo $customer['customer_person']; ?></td>
                     <td><?php echo $customer['customer_company'];?></td>
                     <td><?php echo $customer['customer_phone'];?></td>    
                     <td><?php echo $customer['customer_email'];?></td>
                     <td><?php echo $customer['customer_city'];?></td>
                     <td><?php echo $customer['customer_country'];?></td>          
                     <td>
 <a href="#" data-uk-tooltip="{pos:'bottom'}" Title="edit" data-uk-modal="{target:'#modal_header_footer_<?php echo $customer['customer_id']; ?>'}"><i class="material-icons" style="font-size:28px;color:#1976D2;"></i></a>
<div class="uk-modal" id="modal_header_footer_<?php echo $customer['customer_id']; ?>" aria-hidden="true" style="display: none; overflow-y: auto;">
<form id="form_validation" name="contactform" onsubmit="return validateentry();" class="uk-form-stacked" action="<?php echo base_url();?>seller/update_customer" enctype="multipart/form-data" method="post" novalidate="">                   
<input type="hidden" name="uid" class="md-input label-fixed" value="<?php echo $customer['customer_id'];?>" data-parsley-id="4">				  
				  <div class="uk-modal-dialog" style="top: 88px;">
                            <div class="uk-modal-header"><h3 class="uk-modal-title">Update Customer</h3></div>
                            <hr style="border:2px solid #e0e0e0;"></hr>
                            <p>
							<div class="md-card">
                <div class="md-card-content large-padding">

                        <div class="uk-grid " data-uk-grid-margin="">
 <div class="uk-width-medium-1-2">
 <div class="parsley-row">
 <div class="md-input-wrapper md-input-filled"><label>Company Name<span class="req">*</span></label><input type="text" name="customer_company" class="md-input label-fixed" value="<?php echo $customer['customer_company'];?>" data-parsley-id="4"  required><span class="md-input-bar"></span></div> 
 </div></div>
 
<div class="uk-width-medium-1-2">
<div class="parsley-row">
<div class="md-input-wrapper md-input-filled"><label for="fullname">Contact Person<span class="req">*</span></label><input type="text" name="customer_person" class="md-input label-fixed" value="<?php echo $customer['customer_person']; ?>" data-parsley-id="6" required='required'><span class="md-input-bar"></span></div>   
                               </div>
                            </div>
                        </div>

<div class="uk-grid " data-uk-grid-margin="">
<div class="uk-width-medium-1-2">
<div class="parsley-row">
<div class="md-input-wrapper md-input-filled"><label for="email">Email Address<span class="req">*</span></label><input type="text" name="customer_email" class="md-input label-fixed" value="<?php echo $customer['customer_email'];?>" data-parsley-id="8"><span class="md-input-bar"></span></div>   
</div>
</div>

<div class="uk-width-medium-1-2">
<div class="parsley-row">
<div class="md-input-wrapper md-input-filled"><label for="fullname">Phone<span class="req">*</span></label><input type="number" name="customer_phone" class="md-input label-fixed" value="<?php echo $customer['customer_phone'];?>" data-parsley-id="10"><span class="md-input-bar"></span></div>    
                                </div>
                            </div>
                        </div>

<div class="uk-grid " data-uk-grid-margin="">
<div class="uk-width-medium-1-2">
<div class="parsley-row">
 <div class="md-input-wrapper md-input-filled"><label for="fullname">Address<span class="req">*</span></label><input type="text" name="customer_address" class="md-input label-fixed" value="<?php echo $customer['customer_address'];?>" data-parsley-id="12"><span class="md-input-bar"></span></div> </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
             <div class="md-input-wrapper md-input-filled"><label for="email">City<span class="req">*</span></label><input type="text" name="customer_city" class="md-input label-fixed" value="<?php echo $customer['customer_city'];?>" data-parsley-id="14"><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>
                        </div>

          <div class="uk-grid " data-uk-grid-margin="">
						    <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="fullname">State<span class="req">*</span></label><input type="text" name="customer_state" class="md-input label-fixed" value="<?php echo $customer['customer_state'];?>" data-parsley-id="16"><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>
							  <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="email">Postal Code<span class="req">*</span></label><input type="number" name="customer_postal_code" class="md-input label-fixed" value="<?php echo $customer['customer_postal_code'];?>" data-parsley-id="20"><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>
                        </div>
						
						<div class="uk-grid" data-uk-grid-margin="">
						      <div class="uk-width-medium-1-1">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="fullname">Country<span class="req">*</span></label><input type="text" name="customer_country" class="md-input label-fixed" value="<?php echo $customer['customer_country'];?>" data-parsley-id="18"><span class="md-input-bar"></span></div>   
                                </div>
                            </div>
							   
						</div>
                </div>
        </div>
							</p>
                            <div class="uk-modal-footer uk-text-right">
                            <button type="button" class="md-btn md-btn-flat uk-modal-close" style="background-color:#1976D2;">Close</button><button type="submit" class="md-btn md-btn-flat md-btn-flat-primary" style="background-color:#1976D2;color:white" onClick="return ConfirmDialog1()">Submit</button>
                            </div>
                            </div>
							
                    </form>
                        </div>
                     <a href="<?php echo base_url()?>seller/delete_customer/<?php echo $customer['customer_id'];?>" onclick="return ConfirmDialog()" data-uk-tooltip="{pos:'bottom'}" Title="Delete" onclick="return ConfirmDialog()"><i class="material-icons" style="font-size:28px;color:#1976D2;"></i></a> &nbsp;
					 <a href="<?php echo base_url();?>seller/detail_customer/<?php echo $customer['customer_id'];?>" data-uk-tooltip="{pos:'bottom'}" Title="Customer Profile"><i class="material-icons" style="font-size:28px;color:#1976D2;">&#xE879;</i> </a>
                       </td>
                            </tr>
                            <?php }$i++;?>
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
           <div class="uk-modal" id="modal_header_footer_customers" aria-hidden="true" style="display: none; overflow-y: auto;">
 <form id="form_validation"   name="contactform" id="contactform" onsubmit="return validateentry();"  class="uk-form-stacked" action="<?php echo base_url();?>seller/customer_submit" enctype="multipart/form-data" Method="post">                 
				   <div class="uk-modal-dialog" style="top: 88px;">
                            <div class="uk-modal-header"><h3 class="uk-modal-title">Add New Customer</h3></div>
                            <hr style="border:2px solid #e0e0e0;"></hr>
                            <p>
							<div class="md-card">
                <div class="md-card-content large-padding">

                        <div class="uk-grid " data-uk-grid-margin="">
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper"><label for="fullname">Company Name<span class="req">*</span></label><input type="text" name="customer_company" class="md-input" value="" data-parsley-id="4"  required><span class="md-input-bar"></span></div> 
                                </div>
                            </div>
                                <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper"><label for="fullname">Contact Person<span class="req">*</span></label><input type="text" name="customer_person" class="md-input" value="" data-parsley-id="6" required='required'><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>
                        </div>

                           <div class="uk-grid " data-uk-grid-margin="">
									 <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper"><label for="email">Email Address<span class="req">*</span></label><input type="text" name="customer_email" class="md-input" value="" data-parsley-id="8"><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper"><label for="fullname">Phone<span class="req">*</span></label><input type="number" name="customer_phone" class="md-input" value="" data-parsley-id="10"><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>
                        </div>



                                     <div class="uk-grid " data-uk-grid-margin="">
									      <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper"><label for="fullname">Address<span class="req">*</span></label><input type="text" name="customer_address" class="md-input" value="" data-parsley-id="12"><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper"><label for="email">City<span class="req">*</span></label><input type="text" name="customer_city" class="md-input" value="" data-parsley-id="14"><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>
                        </div>

						          <div class="uk-grid " data-uk-grid-margin="">
							
						    <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper"><label for="fullname">State<span class="req">*</span></label><input type="text" name="customer_state" class="md-input" value="" data-parsley-id="16"><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>
							  <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper"><label for="email">Postal Code<span class="req">*</span></label><input type="number" name="customer_postal_code" class="md-input" value="" data-parsley-id="20"><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>
                        </div>
						
						<div class="uk-grid" data-uk-grid-margin="">
						      <div class="uk-width-medium-1-1">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper"><label for="fullname">Country<span class="req">*</span></label><input type="text" name="customer_country" class="md-input" value="" data-parsley-id="18"><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>
							   
						</div>
                </div>
        </div>
							</p>
                            <div class="uk-modal-footer uk-text-right">
                            <button type="button" class="md-btn md-btn-flat uk-modal-close" style="background-color:#1976D2;">Close</button><button type="submit" class="md-btn md-btn-flat md-btn-flat-primary" style="background-color:#1976D2;color:white">Submit</button>
                            </div>
                            </div>
							
                    </form>
                        </div>
<div class="md-fab-wrapper">
    <a class="md-fab md-fab-accent" href="#" id="recordAdd" data-uk-modal="{target:'#modal_header_footer_customers'}" data-uk-tooltip="{pos:'bottom'}" Title="Add New Customer">
        <i class="material-icons"></i>
    </a>
</div>

    <!-- common functions -->
    <script src="<?php echo base_url();?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url();?>assets/js/uikit_custom.min.js"></script>
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
<script type="text/javascript">
function validateentry()
{
if(document.forms.contactform.customer_company.value=="")
{
 alert("Please provide your Company Name.");
 document.forms.contactform.customer_company.focus();
 return false;
}
if(document.forms.contactform.customer_person.value=="")
{
 alert("Please provide your Contact Person Name.");
 document.forms.contactform.customer_person.focus();
 return false;
}
if(document.forms.contactform.customer_email.value=="")
{
 alert("Please provide your Customer Email.");
 document.forms.contactform.customer_email.focus();
 return false;
}
if(document.forms.contactform.customer_phone.value=="")
{
 alert("Please  Select Your Customer Mobile Number.");
 document.forms.contactform.customer_phone.focus();
 return false;
}

if(document.forms.contactform.customer_address.value=="")
{
 alert("Please  Select Your Customer Address.");
 document.forms.contactform.customer_address.focus();
 return false;
}
if(document.forms.contactform.customer_city.value=="")
{
 alert("Please  Select Your Customer City.");
 document.forms.contactform.customer_city.focus();
 return false;
}
if(document.forms.contactform.customer_state.value=="")
{
 alert("Please  Select Your Customer State.");
 document.forms.contactform.customer_state.focus();
 return false;
}
if(document.forms.contactform.customer_country.value=="")
{
 alert("Please  Select Your Customer Country.");
 document.forms.contactform.customer_country.focus();
 return false;
}
if(document.forms.contactform.customer_postal_code.value=="")
{
 alert("Please  Select Your Customer Postal Code.");
 document.forms.contactform.customer_postal_code.focus();
 return false;
}
}
</script>
<?php 
$chart = $this->db->query("select month as m,month_id as id from chart_month ");
$b=$chart->result_array();
$i=1;
foreach($b as $c)
{$id=$c['id'];
$query =$this->db->query("SELECT date_format( add_on, '%m' ) as month, count(customer_id) as total_customers FROM customers WHERE seller_id = '$user_id' and `add_on` LIKE '%-0$id-%'  and `add_on` LIKE '%$month_year-%' AND add_on >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( add_on, '%b' ) ORDER BY date_format( add_on, '%m' ) ASC");
$amount=$query->result_array();

$total = count($b);
$str .= "{";
$str .= '"month":"'.$c['m'].'",';
$str .= '"total_customers":"'.$amount[0]['total_customers'].'",';

$str .= '}';
 if($total>$i){
  $str .= ",";
 }
 $i++;

}
?>


<script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
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
							"title": "Total customers",
							"type": "column",
							"valueField": "total_customers"
						}
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "Number Of Customer <?php echo $month_year;?> "
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
							"text": "Total Customers <?php echo $month_year;?>"
						}
					],
					"dataProvider": [<?php echo $str;?>

					]
				}
			);
		</script> 
 
 
</body>

</html>