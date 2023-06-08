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

<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$(".edit_tr").click(function()
{
var ID=$(this).attr('id');
$("#first_"+ID).hide();
$("#last_"+ID).hide();
$("#date_"+ID).hide();
$("#first_input_"+ID).show();
$("#last_input_"+ID).show();
$("#date_input_"+ID).show();
}).change(function()
{
var ID=$(this).attr('id');
var first=$("#first_input_"+ID).val();
var last=$("#last_input_"+ID).val();
var date=$("#date_input_"+ID).val();
var dataString = 'id='+ ID +'&firstname='+first+'&lastname='+last+'&date='+date;
$("#first_"+ID).html('<div class="md-preloader"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="32" width="32" viewBox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" stroke-width="6"></circle></svg></div>');
if(first.length && last.length>0)
{
$.ajax({
type: "POST",
url: "<?php echo base_url();?>seller/update_payment",
data: dataString,
cache: false,
success: function(html){
$("#first_"+ID).html(first);
$("#last_"+ID).html(last);
$("#date_"+ID).html(date);
}
});
}
else
{
alert('Enter something.');
}

});

$(".editbox").mouseup(function() 
{
return false
});

$(document).mouseup(function()
{
$(".editbox").hide();
$(".text").show();
});

});
</script>
<style>
body
{
font-family:Arial, Helvetica, sans-serif;
font-size:14px;
}
.editbox
{
display:none
}
td
{
padding:7px;
}
.editbox
{
font-size:14px;
width:100%;
background-color:#ffffcc;
border:solid 1px #000;
padding:4px;
}
.edit_tr:hover
{
background:url(edit.png) right no-repeat #80C8E5;
cursor:pointer;
}


</style>
<script type="text/javascript">
function printDiv(print) {
    var printContents = document.getElementById(print).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>
<script type="text/javascript">
function CheckColors(val){
 var element=document.getElementById('color');
 if(val=='others')
   element.style.display='block';
 else  
   element.style.display='none';
}

</script> 
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
<?php include('header.php');?>
<?php include('header_top.php');?>
<div id="page_content" style="margin-left:0px;">
<div id="page_content_inner">
<h4 class="heading_a uk-margin-bottom">View Order</h4>
<div class="md-card uk-margin-medium-bottom">
      <?php if($_GET['Order']==success)
    { echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Order Tracking Details Added Successfully......</div>';}?>
    <?php if($_GET['payment']==success)
    { echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Amount paid Successfully......</div>';}?>
    <?php if($_GET['payment']==deleted)
    { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Payment successfully deleted.........</div>';}?>
<div class="md-card-content">
    <?php if($_GET['order']==deleted)
    { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Order successfully deleted.........</div>';}?>
<div class="md-card-content" style="padding:0px;">
  <div class="md-card-content" style="padding:0px;">
    <?php if($_GET['order_track']==deleted)
    { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a> Record Deleted Successfully.........</div>';}?>
<a href="<?php echo base_url();?>seller/export_order" class="btn btn-warning btn-sm dropdown-toggle"   style="background-color:#1976D2;border:none;"><i class="material-icons" style="color:white;">view_list</i> Export Table Data</a>

<div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}" aria-haspopup="true" aria-expanded="false">
                                <button class="md-btn">Filter<i class="material-icons" style="color:white;"></i></button>
                                <div class="uk-dropdown uk-dropdown-bottom" style="min-width: 320px; top: 35px; left: 0px;">
                                    <ul class="uk-nav uk-nav-dropdown">
                                        <li class="uk-nav-header">Select Report Type</li>
                                        <li><a href="#"><select style="width:100%;height:30px;"><option>Paid</option><option>Pending</option><option>Due</option></select> </a></li>
										 <li class="uk-nav-header">Period</li>
                                        <li><a href="#">
										<select style="width:100%;height:30px;" name="" onchange='CheckColors(this.value);'>
										     <option>Last 3 Month</option>
											 <option>Last 6 Month</option>
											 <option>Last 12 Month</option>
											 <option value='others'>Custom</option>
											 </select></a></li>
                          <li><a href="#"><input type="date" name="" id="color" style='display:none;'/><input type="date" name="" id="color" style='display:none;'/></a></li>
										     <li><a href="#"><input type="submit" class="md-btn md-btn-primary" href="#" value="Update" name="Update"></a></li>
                                    </ul>
                                </div>
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
                                <th>Sub Total</th>
                                <th>Tax</th>
                                <th>Status</th>
                                <th>Sales Person</th>
                                <th class="filter-false remove sorter-false uk-text-center ">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                          <?php $i=1; foreach ($order as $order) {?>  
                            <tr><td></td>
                                <td><?php echo $order['invoice_no'];?></td>
                                <td><?php echo $order['invoice_date'];?></td>
                                <td><?php echo $order['customer_company'];?></td>
                                <td><?php echo $order['Total_amount'];?></td>
                                <td><?php echo $order['sub_total'];?></td>
                                <td><?php echo $order['tax'];?></td>
                                <td><a href="#"  data-uk-modal="{target:'#modal_header_footer_1_<?php echo $order['id'];?>'}" >
                                </a>
                           <!-- <form method="post" action="<?php/* echo base_url();?>seller/invoice_status/<?php echo $order['id'];*/?>">
                            <div class="uk-modal" id="modal_header_footer_1_<?php echo $order['id'];?>" aria-hidden="true" style="display: none; overflow-y: auto;">
                            <div class="uk-modal-dialog" style="top: 88px;">
                            <div class="uk-modal-header"><h3 class="uk-modal-title">Update Invoice Status (Order No.<?php/* echo $order['invoice_no'];*/?>)</h3></div>
                            <hr style="border:2px solid #e0e0e0;"></hr>
                            <select name="status" style="padding:10px;" class="uk-width-medium-1-1 status"><option>Select Status</option><option value="Canceled">Canceled</option><option value="Paid">Paid</option><option value="Due">Due</option><option value="Pending">Pending</option></select>
                            <div class="uk-modal-footer uk-text-right">
                            <button type="button" class="md-btn md-btn-flat uk-modal-close" style="background-color:#1976D2;">Close</button><input  type="submit" Value="Update" class="md-btn md-btn-flat md-btn-flat-primary" style="background-color:#1976D2;color:white;">
                            </div>
                            </div>
                        </div></form>-->
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
                         <td><?php echo $order['sales_person'];?></td>
                            <td>
<!--Add Payment---->
                    
                            <a href="#"  data-uk-modal="{target:'#modal_header_footer_<?php echo $order['invoice_no'];?>'}" data-uk-tooltip="{pos:'bottom'}" Title="Add Payment"><i class="material-icons" style="font-size:28px;color:#1976D2;">&#xE146;</i></a>
                            <div class="uk-modal" id="modal_header_footer_<?php echo $order['invoice_no'];?>" aria-hidden="true" style="display: none; overflow-y: auto;">
                            <div class="uk-modal-dialog" style="top: 88px;">
                            <form method="post" action="<?php echo base_url()?>seller/add_payment">
                            <div class="uk-modal-header"><h3 class="uk-modal-title">Add Payment (Order No.<?php echo $order['invoice_no'];?>)</h3></div>
                            <hr style="border:2px solid #e0e0e0;"></hr>
                            <input type="hidden" name="payment_id" value="<?php echo $order['id'];?>">
                            <input type="hidden" value="<?php echo $order['customer_id']?>" name="customer_id">
                            <p><div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin="">
                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper md-input-filled"><label>Date</label><input type="date" id="payment_date" name="payment_date" class="md-input label-fixed" value="<?php echo $order['invoice_date'];?>" required><span class="md-input-bar"></span></div> 
                                    </div>
									
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper md-input-filled"><label>Amount Paid</label><input type="number" id="payment_paid" name="payment_paid" class="md-input label-fixed" required><span class="md-input-bar"></span></div>  
                                    </div>
                                </div>
                            </div>
                 <div class="uk-form-row">
							<div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper md-input-filled">
										<select name="mode_of_payment" style="padding:10px;" class="uk-width-medium-1-1 status"><option>Select Mode Of Payment</option><option value="Cash">Cash</option>
										<option value="Cheques">Cheques</option>
										<option value="Debit Cards/Credit Cards">Debit Cards/Credit Cards</option>
										<option value="Internet Banking / NEFT">Internet Banking / NEFT</option>
										</select>
										<span class="md-input-bar"></span></div> 
                                    </div>
									
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper"><label>Note</label><input type="Text" class="md-input" id="payment_note" name="payment_note" required><span class="md-input-bar"></span></div> 
                                    </div>
                                </div>
                            </div>
                             <div class="uk-form-row" style="display:none">
                                <div class="md-input-wrapper"><input type="hidden" class="md-input" id="" name="company_name" value="<?php echo $order['name'];?>" hidden><span class="md-input-bar"></span></div>
                            </div>
                             <div class="uk-form-row" style="display:none">
                                <div class="md-input-wrapper"><input type="hidden" class="md-input" id="" name="company_email" value="<?php echo $order['company_email'];?>" hidden><span class="md-input-bar"></span></div>
                            </div>
                             <div class="uk-form-row" style="display:none">
                                <div class="md-input-wrapper"><input type="hidden" class="md-input" id="" name="company_address" value="<?php echo $order['company_address'];?>" hidden><span class="md-input-bar"></span></div>
                            </div>
                        </div>
                    </div>
                </div></p>
                            <div class="uk-modal-footer uk-text-right">
                            <button type="button" class="md-btn md-btn-flat uk-modal-close" style="background-color:#1976D2;">Close</button><input type="submit" class="md-btn md-btn-flat md-btn-flat-primary" style="background-color:#1976D2;color:white;" value="ADD PAYMENT"> 
                                </div>
                            </div>
                        </div>
                       </form>

                       <!--View Payment---->

  <a href="#"  data-uk-modal="{target:'#modal_header_footer____<?php echo $order['invoice_no'];?>'}" data-uk-tooltip="{pos:'bottom'}" Title="View Payment" ><i class="material-icons" style="font-size:28px;color:#1976D2;">&#xE8A0;</i></a>
                            <div class="uk-modal" id="modal_header_footer____<?php echo $order['invoice_no'];?>" aria-hidden="true" style="display: none; overflow-y: auto;">
                            <div class="uk-modal-dialog" style="top: 88px;">
                            <div class="uk-modal-header"><h3 class="uk-modal-title">View Payment (Order No.<?php echo $order['invoice_no'];?>)</h3></div>
                            <hr style="border:2px solid #e0e0e0;"></hr>
                            <p><div class="md-card-content">
                    <div class="uk-overflow-container" style="height:500px;">
                        <table class="uk-table">
                            <thead>
                            <tr style="background-color:white;">
                                <th><b>Date</b></th>
                                <th><b>Amount</b></th>
                                <th><b>Note</b></th>
                                <th><b>Action</b></th>
                            </tr>
                            </thead>
                            <tfoot>
                        <?php mysql_connect('localhost','morelif3','FbIIv~Kh{y|7y$T');
                              mysql_select_db('morelif3_shop');
                              $invoice=$order['id'];
                              $sql = mysql_query("select * from payment where invoice_id='$invoice'");
                              $i=1;
                              while($row =mysql_fetch_array($sql)){ 
                              $id=$row['payment_id'];
                              $date=$row['invoice_date'];
                              $firstname=$row['invoice_paid_amount'];
                              $lastname=$row['note'];
                              if($i%2){?>
                             <tr id="<?php echo $id; ?>" class="edit_tr">
                             <?php } else { ?>
                             <tr id="<?php echo $id; ?>" bgcolor="#f2f2f2" class="edit_tr">
                              <?php } ?>
                        <td class="edit_td">
                        <span id="date_<?php echo $id; ?>" class="text"><?php echo $date; ?></span>
                        <input type="date" value="<?php echo $date; ?>" class="editbox" id="date_input_<?php echo $id; ?>" name="date" />
                            </td>
                        <td class="edit_td">
                        <span id="first_<?php echo $id; ?>" class="text"><?php echo $firstname; ?></span>
                        <input type="text" value="<?php echo $firstname; ?>" class="editbox" id="first_input_<?php echo $id; ?>" />
                                </td>
                         <td class="edit_td">       
                     <span id="last_<?php echo $id; ?>" class="text"><?php echo $lastname; ?></span> 
                     <input type="text" value="<?php echo $lastname; ?>"  class="editbox" id="last_input_<?php echo $id; ?>"/>
                               </td>
                                <td>
<a href="<?php echo base_url()?>seller/print_payment/<?php echo $row['payment_id'];?>" target="_blank"><i class="material-icons" style="font-size:28px;color:#1976D2;" data-uk-tooltip="{pos:'bottom'}" Title="Print" >&#xE8A0;</i></a> <a href="<?php echo base_url();?>seller/delete_payment/<?php echo $row['payment_id'];?>" onclick="return ConfirmDialog()" data-uk-tooltip="{pos:'bottom'}" Title="Delete" ><i class="material-icons" style="font-size:28px;color:#1976D2;">&#xE872;</i></a></td>
                            </tr>
                        <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </p>           <div class="uk-modal-footer uk-text-right">
                            <button type="button" class="md-btn md-btn-flat uk-modal-close" style="background-color:#1976D2;">Close</button>
                            </div>
                            </div>
                        </div>  

    <!--Add Mail---->
                            <a href="#"  data-uk-modal="{target:'#modal_header_footer__<?php echo $order['invoice_no'];?>'}" data-uk-tooltip="{pos:'bottom'}" Title="Send Email" ><i class="material-icons" style="font-size:28px;color:#1976D2;">&#xE158;</i></a>
                            <div class="uk-modal" id="modal_header_footer__<?php echo $order['invoice_no'];?>" aria-hidden="true" style="display: none; overflow-y: auto;">
                            <div class="uk-modal-dialog" style="top: 88px;">
                            <div class="uk-modal-header"><h3 class="uk-modal-title">Email Order No:<?php echo $order['invoice_no'];?></h3></div>
                            <hr style="border:2px solid #e0e0e0;"></hr>
                            <p></p>
							
							 <div class="md-card-content">
<div class="uk-grid" data-uk-grid-margin="">
<div class="uk-width-medium-1-1">
<div class="uk-form-row">
<div class="uk-grid">
<div class="uk-width-medium-1-1">
<div class="md-input-wrapper md-input-filled"><label>To</label><input type="text" id="" name="to_email" class="md-input label-fixed" value="<?php echo $order['customer_email'];?>" required=""><span class="md-input-bar"></span></div>
</div>
<br>
<div class="uk-width-medium-1-1"><br>
<div class="md-input-wrapper md-input-filled"><label>Subject</label><input type="text" id="" name="subject" class="md-input label-fixed" value="" required=""><span class="md-input-bar"></span></div>
</div>

<div class="uk-width-medium-1-1"><br>
<div class="md-input-wrapper md-input-filled"><label>Message</label><input type="text" id="" name="Message" class="md-input label-fixed" value="Please find the attached invoice" required=""><span class="md-input-bar"></span></div>
</div>
</div>
</div>
</div>
</div>
</div>
                            <div class="uk-modal-footer uk-text-right">
                            <button type="button" class="md-btn md-btn-flat uk-modal-close" style="background-color:#1976D2;">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary" style="background-color:#1976D2;color:white;">Send Email</button>
                            </div>
                            </div>
                        </div>
<!--print---->
                       <a href="<?php echo base_url()?>seller/print_invoice/<?php echo $order['id'];?>" target="_blank" data-uk-tooltip="{pos:'bottom'}" title="View Order"><i class="material-icons" style="font-size:28px;color:#1976D2;">&#xE8AD;</i></a> 

              <a href="<?php echo base_url()?>seller/delete_invoice/<?php echo $order['id'];?>"  data-uk-tooltip="{pos:'bottom'}" title="Delete"><i class="material-icons" style="font-size:28px;color:#1976D2;" onclick="return ConfirmDialog()">&#xE872;</i></a>
 <!-----order tracking----> 
                    
              <a href="#" data-uk-modal="{target:'#modal_header_footer_2_<?php echo $order['invoice_no'];?>'}"> <i class="material-icons" style="font-size:28px;color:#1976D2;"  Title="Add Tracking Details" data-uk-tooltip="{pos:'bottom'}" >&#xE530;</i></a>
                     <div class="uk-modal" id="modal_header_footer_2_<?php echo $order['invoice_no'];?>" aria-hidden="true" style="display: none; overflow-y: auto;">
                            <div class="uk-modal-dialog" style="top: 88px;">
                            <div class="uk-modal-header">Add Tracking Details<h3 class="uk-modal-title">(Order No.<?php echo $order['invoice_no'];?>)</h3></div>
                            <hr style="border:2px solid #e0e0e0;"></hr>
                            <p><div class="md-card-content">
                <form method="post" action="<?php echo base_url();?>seller/add_tracking">  
              <input type="hidden" name="invoice_id" value="<?php echo $order['id'];?>">
              <input type="hidden" value="<?php echo $order['customer_id']?>" name="customer_id">
                    <div class="uk-grid" data-uk-grid-margin="">
                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper md-input-filled"><label>Dispatch Date</label><input type="date" id="payment_date" name="dod" class="md-input label-fixed" value="<?php echo $order['invoice_date'];?>" required><span class="md-input-bar"></span></div> 
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper md-input-filled"><label>Transport Name</label><input type="text" id="Transport_name" name="transport_name" class="md-input label-fixed" required><span class="md-input-bar"></span></div>  
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><label>Contact Person</label><input type="Text" class="md-input" id="contact_person" name="contact_person" required><span class="md-input-bar"></span></div>
                              </div>
                               <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><label>Mobile Number</label><input type="number" class="md-input" id="mobile_number" name="mobile_number" required><span class="md-input-bar"></span></div>
                              </div>
                            </div>
                           </div>

                             <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><label>Email Address</label><input type="Text" class="md-input" id="contact_person" name="email" required><span class="md-input-bar"></span></div>
                              </div>
                               <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><label>LR Number</label><input type="text" class="md-input" id="lr_number" name="lr_number" required><span class="md-input-bar"></span></div>
                              </div>
                            </div>
                           </div>
                        </div>
                    </div>
                </div></p>
                   <div class="uk-modal-footer uk-text-right">
                            <button type="button" class="md-btn md-btn-flat uk-modal-close" style="background-color:#1976D2;color:white;" >Close</button><input type="submit" class="md-btn md-btn-flat md-btn-flat-primary" style="background-color:#1976D2;color:white;" Value="Add">
                            </div>
                            </div>
                        </div>

<!---order tracking---->
               <a href="#"  data-uk-modal="{target:'#modal_header_footer_3_<?php echo $order['invoice_no'];?>'}" data-uk-tooltip="{pos:'bottom'}" Title="View Order Tracking" ><i class="material-icons" style="font-size:28px;color:#1976D2;"  Title="Track Order" >&#xE8E1;</i></a>
                            <div class="uk-modal" id="modal_header_footer_3_<?php echo $order['invoice_no'];?>" aria-hidden="true" style="display: none; overflow-y: auto;">
                            <div class="uk-modal-dialog" style="top: 88px;width:70%">
                            <div class="uk-modal-header"><h3 class="uk-modal-title">Order Tracking (Order No.<?php echo $order['invoice_no'];?>)</h3></div>
                            <hr style="border:2px solid #e0e0e0;"></hr>
                            <p><div class="md-card-content">
                    <div class="uk-overflow-container" style="height:500px;">
                        <table class="uk-table" style="">
                            <thead>
                            <tr style="background-color:white;">
                                <th><b>Dispatch Date</b></th>
                                <th><b>Transport Name</b></th>
                                <th><b>Contact Person</b></th>
                                <th><b>Mobile Number</b></th>
                                <th><b>Email</b></th>
                                <th><b>LR Number</b></th>
                                <th><b>Action</b></th>
                            </tr>
                            </thead>
                            <tfoot>
                      <?php 
                      $id=$order['id'];
                    $query = mysql_query("select * from order_tracking where invoice_id='$id'");
                    while($row=mysql_fetch_array($query)){ ?>
                        <tr>
                        <td><?php echo $row['dispatch_date'];?></td>
                        <td><?php echo $row['transport_name'];?></td>
                        <td><?php echo $row['contact_person'];?></td>
                        <td><?php echo $row['mobile_number'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['LR_number'];?></td>
                        <td>
<a href="<?php echo base_url();?>seller/order_track?code=<?php echo $row['LR_number'];?>"><i class="material-icons" style="font-size:28px;color:#1976D2;"  Title="Track Order" >&#xE8E1;</i></td>
                         </tr>
                       <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div></p>          
                 <div class="uk-modal-footer uk-text-right">
                            <button type="button" class="md-btn md-btn-flat uk-modal-close" style="background-color:#1976D2;">Close</button>
                            </div>
                            </div>
                        </div>  
                     </form>
                       </td>
                            </tr>
                            <?php  }$i++; ?>
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
    <script>
        $(function() {
            // enable hires images
            altair_helpers.retina_images();
            // fastClick (touch devices)
            if(Modernizr.touch) {
                FastClick.attach(document.body);
            }
        });
</script>
<script type="text/javascript">

function ConfirmDialog()
{

var x=confirm('Do You Want Delete Record..');
if(x){
return true;
}else{
return false;
 }
}
</script>

</body>
</html>