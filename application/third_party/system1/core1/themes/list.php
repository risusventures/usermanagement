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
    <!-- altair admin -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.min.css" media="all">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/kendo-ui/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/kendo-ui/styles/kendo.material.min.css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
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
<h4 class="heading_a uk-margin-bottom">View Order</h4>
<div class="md-card uk-margin-medium-bottom">
<div class="md-card-content">
<?php $message=$_GET['message'];
if($message){ echo '<div class="uk-alert uk-alert-info" data-uk-alert=""><a href="#" class="uk-alert-close uk-close"></a>
Your   Category  Update Successfully....</div>';}?>   
<form id="form1" runat="server"> 
<div id="printablediv" style="width: 100%;height:auto;">  
<table id="dt_tableTools" id="printablediv"  class="uk-table" cellspacing="0" width="100%">
<thead>
    <tr><th>Order No.</th>
        <th>Date</th>
          <th>CompanyName</th>
            <th>Total Amount</th>
            <th>tax</th>
            <th>Status</th>
            <th>Create By</th>
            <th>Action</th>
        </tr>
</thead>
       <tbody>
       <?php foreach ($order as $order) {?>    
         <tr>
           <td><?php echo $order['invoice_no'];?></td>    
             <td><?php echo $order['invoice_date'];?></td>    
                 <td><?php echo $order['company_name'];?></td>
                     <td><?php echo $order['Total_amount'];?></td>
                       <td><?php echo $order['tax'];?></td>   
                        <td><span class="uk-badge uk-badge-danger">Pending</span></td>
                            <td><?php echo $order['seller_id'];?></td>
                            <td>
                  <!---view payment---->              
                            <a href="#" data-uk-modal="{target:'#modal_header_footer__<?php echo $order['invoice_no'];?>'}">    <i class="material-icons md-24" >&#xE227;</i></a>
                            <div class="uk-modal" id="modal_header_footer__<?php echo $order['invoice_no'];?>" aria-hidden="true" style="display: none; overflow-y: scroll;">
                                <div class="uk-modal-dialog" style="top: 66px;">
                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">View Payments (Order No <?php echo $order['invoice_no'];?>)</h3>
                                    </div>
                                    <p>
                    <div class="uk-overflow-container">
                        <table class="uk-table uk-table-striped">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                             <tr>
                                <td><?php echo $order['invoice_date'];?></td>
                                <td><?php echo $order['invoice_paid_amount'];?></td>
                                <td><?php echo $order['note'];?></td>
                                <td><i class="material-icons" style="color:#1976D2;">&#xE8AD;</i> <i class="material-icons md-24"  style="color:#1976D2;">&#xE254;</i> <i class="material-icons md-24" style="color:#1976D2;">&#xE872;</i></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
               </p>
                         <div class="uk-modal-footer uk-text-right">
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close" style="background-color: #1976D2;">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary">Action</button>
                                    </div>
                                </div>
                            </div>

        <!---add payment---->

                     <a href="#" data-uk-modal="{target:'#modal_header_footer_<?php echo $order['invoice_no'];?>'}"> <i class="material-icons md-24">&#xE147;</i></a>
                          <div class="uk-modal" id="modal_header_footer_<?php echo $order['invoice_no'];?>" aria-hidden="true" style="display: none; overflow-y: scroll;">
                                <div class="uk-modal-dialog" style="top: 66px;">
                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">Add Payment</h3>
                                    </div>
                                    <form method="post" action="<?php echo base_url();?>seller/add_payment">
                                   <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin="">
                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper"><label>Date</label><input type="text" class="md-input" id="uk_dp_end" id="invoice_date" name="invoice_date" value="<?php echo $order['invoice_date'];?>"><span class="md-input-bar" value=""></span></div>
                                       
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper"><label>Amount Paid</label><input type="text" class="md-input" id="invoice_amount" name="invoice_amount"><span class="md-input-bar"></span></div>               
                        </div>
                  </div>    
            </div>
          <div class="uk-form-row">                                 
        <div class="md-input-wrapper"><label>Note</label><input type="text" class="md-input" id="invoice_note" name="invoice_note">
        <span class="md-input-bar" name="invoice_note"></span></div>
      </div>                        
     </div>                     
 </div>
</div>                 
   <div class="uk-modal-footer uk-text-right">
  <button type="button" class="md-btn md-btn-flat uk-modal-close"
style="color:black">Close</button><button type="button" class="md-btn md-btn-
flat md-btn-flat-primary" style="background-color:#1976d2;color:white">Add
Payment</button> 
<input type="submit" name="submit">                              
 </div>
</div>                                
 </div>
</div>
</form>
     <!---view Invoice---->

                              <a href="#" data-uk-modal="{target:'#modal_header_footer___<?php echo $order['invoice_no'];?>'}"><i class="material-icons md-24">&#xE8A0;</i></a>
                               <div class="uk-modal" id="modal_header_footer___<?php echo $order['invoice_no'];?>" aria-hidden="true" style="display: none; overflow-y: scroll;">
                                <div class="uk-modal-dialog" style="top: 66px;">
                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">He</h3>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, aliquid amet animi aspernatur aut blanditiis doloribus eligendi est fugiat iure iusto laborum modi mollitia nemo pariatur, rem tempore. Dolor, excepturi.</p>
                                    <div class="uk-modal-footer uk-text-right">
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary">Action</button>
                                    </div>
                                </div>
                            </div> 


    <!---Download  Invoice---->

                               <a href="#" data-uk-modal="{target:'#modal_header_footer____<?php echo $order['invoice_no'];?>'}"> <i class="material-icons md-24">&#xE2C0;</i></a>
                                   <div class="uk-modal" id="modal_header_footer____<?php echo $order['invoice_no'];?>" aria-hidden="true" style="display: none; overflow-y: scroll;">
                                <div class="uk-modal-dialog" style="top: 66px;">
                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">Hello</h3>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, aliquid amet animi aspernatur aut blanditiis doloribus eligendi est fugiat iure iusto laborum modi mollitia nemo pariatur, rem tempore. Dolor, excepturi.</p>
                                    <div class="uk-modal-footer uk-text-right">
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary">Action</button>
                                    </div>
                                </div>
                            </div> 

 <!---email  Invoice---->

                       <a href="#" data-uk-modal="{target:'#modal_header_footer'}"><i class="material-icons md-24">&#xE0BE;</i></a>
                             <div class="uk-modal" id="modal_header_footer" aria-hidden="true" style="display: none; overflow-y: scroll;">
                                <div class="uk-modal-dialog" style="top: 66px;">
                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">Headline</h3>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, aliquid amet animi aspernatur aut blanditiis doloribus eligendi est fugiat iure iusto laborum modi mollitia nemo pariatur, rem tempore. Dolor, excepturi.</p>
                                    <div class="uk-modal-footer uk-text-right">
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary">Action</button>
                                    </div>
                                </div>
                            </div> 

 <!---edit delete  Invoice---->



                                <i class="material-icons md-24">&#xE254;</i>
                                <i class="material-icons md-24">&#xE872;</i>
                        </div>
                            </td> 
                          </tr>
                   <?php }?>
                        </tbody>   
                    </table>

                    <div>
                </div>
            </div>
      <center>
<ul><div class="md-card-toolbar-actions">
            <i class="material-icons" style="font-size:35px;color:#39f;" >&#xE415;</i>
            <i class="material-icons" style="font-size:35px;color:#39f;" onclick="javascript:printDiv('printablediv')">&#xE8AD;</i>
    </div></ul>
      </center>
     </form>
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

    <!--  datatables functions -->
    <script src="<?php echo base_url()?>assets/js/pages/plugins_datatables.min.js"></script>
      <!-- kendo UI -->
    <script src="<?php echo base_url()?>assets/js/kendoui_custom.min.js"></script>

    <!--  kendoui functions -->
    <script src="<?php echo base_url()?>assets/js/pages/kendoui.min.js"></script>

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
if(x)

{
    return true;
}
else
{

return false;
}
}
</script>
<script type="text/javascript" >
$(function() {
$(".submit").click(function() {
var invoice_date = $("#invoice_date").val();
var  invoice_amount = $("#invoice_amount").val();
var invoice_note = $("#invoice_note").val();
var dataString = 'invoice_date='+ invoice_date + '&invoice_amount=' + invoice_amount + '&invoice_note=' + invoice_note;
if(invoice_date=='' || invoice_amount=='' || invoice_note=='')
{
$('.success').fadeOut(200).hide();
$('.error').fadeOut(200).show();
}
else
{
$.ajax({
type: "POST",
url: "http://localhost/admin_seller_panel/seller/view_payment",
data: dataString,
success: function(){
$('.success').fadeIn(200).show();
$('.error').fadeOut(200).hide();
}
});
}
return false;
});
});
</script>


</body>


</html>