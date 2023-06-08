<!doctype html>
<html lang="en"> 
<meta charset="UTF-8">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>
<head>
   <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="32x32">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/css/main.min.css" media="all">
    <link href="<?php echo base_url();?>assets/css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <script src="<?php echo base_url();?>assets/js/common.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/uikit_custom.min.js"></script>
   
    <title>Cater Manage</title>
  <style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th, td {
    border: none;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
  <style type="text/css">
    

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
  </style>
<!---load customer value---->
<script type="text/javascript">
$(document).ready(function(){
$(".buyer").change(function(){
  var id= $(this).val();
  $.ajax
  ({
   type: "GET",
   url: "<?php echo base_url(); ?>seller/load_customer/"+id,
   data: id,
   cache: false,
   success: function(html){
    var res = html.split("||");
    var res1 = res[0];
    var res2 = res[1];
  $(".seller_email").val(res1);
  $(".seller_address").val(res2);
   }
  });
});
});

</script>
<script type="text/javascript">
  $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});

</script>
   <script type="text/javascript">
function validate()
{

      if( document.ClassSearch.buyer_company_name.value == "" )
   {
     alert( "Please enter a Seller Company Name ! First Create Business Profile " );
     document.ClassSearch.buyer_company_name.focus() ;
     return false;
   }
   if( document.ClassSearch.seller_email.value == "" )
   {
     alert( "Please enter a Buyer Email ! " );
     document.ClassSearch.seller_email.focus() ;
     return false;
   }
   if(document.forms.ClassSearch.seller_company_name.value == "-1" ){
   alert( "Please Select Buyer Company Name" );
   return false;
  } return( true );
  if( document.ClassSearch. seller_address.value == "" )
   {
     alert( "Please enter a Buyer Email ! " );
     document.ClassSearch. seller_address.focus() ;
     return false;
   }

}
</script>
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
  <script>
  $(function() {
    $( "#skills" ).autocomplete({
      source: '<?php echo base_url();?>seller/load_Sales_person'
    });
  });
  </script>

</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
   <?php include('header.php');?>
   <?php include('header_top.php');?>
    <?php echo form_open(base_url('seller/add_order'),array('id'=>'ClassSearch','name'=>'ClassSearch','class'=>'uk-form-stacked','onsubmit'=>'return(validate());','enctype'=>'multipart/form-data' ));?>
    <div id="page_content" style="margin-left: 0px;">
        <div id="page_content_inner">

            <h2 class="heading_b uk-margin-bottom">Add New Order</h2>

            <div class="md-card uk-margin-large-bottom1">
                <div class="md-card-content">
                <div class="">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Step 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Step 2</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Step 3</p>
        </div>
    </div>
</div>

    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3></h3>
                              <div class="row">
                            <div class="col-md-5">
                          <!--  <p>From (Seller Detail)</p>
                             <?php foreach ($company_detail as $row) { }?>
                <div class="form-group">
                <input type="text" class="form-control" id="companyName" placeholder="Company Name" name="buyer_company_name" value="<?php echo $row['company_name'];?>"  readonly>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows='3' id="companyAddress" placeholder="Your Address" name="buyer_address" readonly><?php echo $row['address'];?>  <?php echo $row['postal_code'];?>
                       </textarea>
                        </div>--->
                   <?php foreach ($company_detail as $row) { }?>
                <div class="form-group">
                <input type="text" class="form-control" id="companyName" placeholder="Company Name" name="buyer_company_name" value="<?php echo $row['company_name'];?>"  readonly>
                </div>
                <div class="form-group">
        <textarea class="form-control" rows='3' id="companyAddress" placeholder="Your Address" name="buyer_address" readonly><?php echo $row['address'];?>  <?php echo $row['postal_code'];?>
           </textarea>
            </div>
               <div class="form-group">
                <input type="text" class="form-control" id="datepicker1" placeholder="Order Date" id="invoiceDate1" name="party_date" Required>
                </div>
                <div class="form-group">
               
                <input type="text" class="form-control" id="datepicker" placeholder="Event Date" id="invoiceDate" name="invoice_date[]"  Required>
                </div>
                
                <div class="form-group">
            <textarea class="form-control" rows="5" id="" placeholder="Note" name="note"></textarea>
            </div>

                            </div>
                            <div class="col-md-2"></div>

                                        <div class="col-md-5">
                            <p>Customer Details</p>

                <div class="form-group">
                 <select id="select_demo_5" name="seller_company_name"  title="Select with tooltip" class="buyer form-control">
                            <option value="-1">Select Customer</option>
                            <?php foreach($list_customer as $customer) {?>
                            <option value="<?php echo $customer['customer_id'];?>"><?php echo $customer['customer_person'].'  ('.$customer['customer_phone'].')';?></option>
                            <?php }?>
                            </select>

                            
                </div>
               <div class="form-group">
                <input type="text" name="seller_email" id="seller_email " class="form-control seller_email" placeholder="Customer Email" id="category1" value="" required>
                </div>
                <div class="form-group">
                <textarea class="form-control seller_address"  rows='3' id="clientAddress" placeholder="Customer Address" name="seller_address" ></textarea>
                </div>
                
                 <div class="form-group">
                <textarea class="form-control"  rows='3' id="" placeholder="Event Venue" name="event_venue" ></textarea>
                </div>
                 <div class="form-group">
           
 <input class="form-control" type="text" id="uk_tp_1" name="event_time" placeholder="Select Time" data-uk-timepicker>
                </div>
                <div class="form-group">
                <input type="text" class="form-control"  rows='3' id="" placeholder="Enter Number Of Guest" name="num_guest" >
                </div>
                            </div>

                            </div>

                            <div class='row'>
            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12' style="overflow-x:auto;">
                <table class="table table-bordered table-hover item_equipment">
                    <thead>
                        <tr>
                            <th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
                            <th width="38%">Item Name</th>
                            <th width="15%">Price</th>
                            <th width="15%">Quantity</th>
                            <th width="15%">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="case" type="checkbox"/></td>
                            <td><select class="select2  autocomplete_txt form-control" id="itemName_1 select_demo_5" autocomplete="off" data-type="productName" name="itemName[]" data-placeholder="Choose ..."   style="width: 100%;">
                                     <option value="">Choose One</option>
                            <?php foreach($list_item as $items){?>
                             <option value="<?php echo $items['item_name'];?>"><?php echo $items['item_name'];?></option>
                            <?php }?>
                            </select>  
                            </td>
                            <td><input type="text" name="price[]" id="price_1" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                            <td><input type="text" name="quantity[]" id="quantity_1" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                            <td><input type="text" name="total[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class='row'>
            <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3' style="margin-top:10px;">
                <button class="btn btn-danger delete" type="button">- Delete</button>
                <button class="btn btn-success addmore_equipment" type="button" style="background-color:#1976D2;border-color:#1976D2">+ Add More</button>
            </div>
            </div>
                
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" style="margin-top:10px;" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="row">
            <div class="col-md-12">
                
                <div class="col-md-6" style="">
                    <h4>Select Veg  Items</h4>
                 <div  style="overflow-x:auto;">
                <table class="order-list table table-bordered table-hover veg_item">
                    <thead>
                        <tr>
                            <th width="30%">Item Name</th>
                            <th width="20%">Price</th>
                            <th width="15%">Quantity</th>
                            <th width="22%">Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="hidden" name="veg_total_item" id="veg_total_item" value="1">
                                <select class="select2  autocomplete_txt form-control" id="" autocomplete="off" data-type="productName" name="vegproduct1" data-placeholder="Choose ..."    style="width: 100%;" >
                                     <option value="">Choose One</option>
                                     <?php foreach($item_veg as $veg){ ?>
                                     <option value="<?php echo $veg['veg_name'];?>"><?php echo $veg['veg_name'];?></option>
                                     <?php }?>
                            </select>  
                            </td>
                            <td><input type="text" name="vegprice1" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                            <td><input type="text" name="vegqty1" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                            <td><input type="text" name="veglinetotal1" id="" class="form-control totalLinePrice" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                           <td></td>
                        </tr>
                    </tbody>
                       <tfoot>
        <tr>
            <td colspan="5" style="text-align: center;">
                <input type="button" id="addmore_veg" value="Add Row" class="btn btn-success addmore_veg"/>
            </td>
        </tr>
        
        <tr>
            <td colspan="5">
                Grand Total: &#163;<span id="grandtotal"></span>
            </td>
        </tr>
    </tfoot>
    </table>
    </div>
   </div>
     
                     <div class="col-md-6">
                    <h4>Select Non-Veg Items</h4>
                    <div style="overflow-x:auto;">
                    <table class="order-list1 table table-bordered table-hover">
    				 <thead>
                        <tr>
                            <th width="30%">Item Name</th>
                            <th width="20%">Price</th>
                            <th width="15%">Quantity</th>
                            <th width="22%">Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="hidden" name="non_veg_total_item" id="non_veg_total_item" value="1">
                                <select class="select2 autocomplete_txt form-control" id="" autocomplete="off" data-type="productName" name="nonvegproduct1" data-placeholder="Choose ..."   style="width: 100%;">
                                     <option value="">Choose One</option>
                                       <?php foreach($item_non_veg as $veg){ ?>
                                       <option value="<?php echo $veg['non_veg_name'];?>"><?php echo $veg['non_veg_name'];?></option>
                                       <?php }?>
                            </select>  
                            </td>
                            <td><input type="text" name="nonvegprice1" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                            <td><input type="text" name="nonvegqty1" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                            <td><input type="text" name="nonveglinetotal1" id="" class="form-control totalLinePrice" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                            <td></td>
                       
                        </tr>
                    </tbody>
    
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: center;">
                <input type="button" id="addrow1" value="Add Row" class="btn btn-success addmore" />
            </td>
        </tr>
        
        <tr>
            <td colspan="5">
                Grand Total: &#163;<span id="grandtotal1"></span>
            </td>
        </tr>
    </tfoot>
</table>
</div>
</div></div>
  </div>               
                 
   <div class="row">
   <div class="col-md-12">
                                   <div class="col-md-6">
                    <h4>Select Drinks & Beverages Items</h4>
                    <div style="overflow-x:auto;">
                    <table class="order-list2 table table-bordered table-hover">
     <thead>
                        <tr>
                            <th width="30%">Item Name</th>
                            <th width="20%">Price</th>
                            <th width="15%">Quantity</th>
                            <th width="22%">Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="hidden" name="cold_total_item" id="cold_total_item" value="1">
                                <select class="select2 autocomplete_txt form-control" id="" autocomplete="off" data-type="productName" name="coldproduct1" data-placeholder="Choose ..."  style="width: 100%;">
                                     <option value="">Choose One</option>
                                     <?php foreach($drink_items as $veg){ ?>
                                      <option value="<?php echo $veg['item_name'];?>"><?php echo $veg['item_name'];?></option>
                                     <?php } ?>
                            </select>  
                            </td>
                            <td><input type="text" name="coldprice1" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                            <td><input type="text" name="coldqty1" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                            <td><input type="text" name="coldlinetotal1" id="" class="form-control totalLinePrice" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                            <td></td>
                       
                        </tr>
                    </tbody>
    
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: center;">
                <input type="button" id="addrow_cold" value="Add Row" class="btn btn-success addmore" />
            </td>
        </tr>
        
        <tr>
            <td colspan="5">
                Grand Total: &#163;<span id="grandtotal2"></span>
            </td>
        </tr>
    </tfoot>
</table>
</div>
</div>
      
            <div class="col-md-6">
                    <h4>Select Desert Items</h4>
                    <div style="overflow-x:auto;">
                    <table class="order-list3 table table-bordered table-hover">
     <thead>
                        <tr>
                            <th width="30%">Item Name</th>
                            <th width="20%">Price</th>
                            <th width="15%">Quantity</th>
                            <th width="22%">Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="hidden" name="desert_total_item" id="desert_total_item" value="1">
                                <select class="select2 autocomplete_txt form-control" id="" autocomplete="off" data-type="productName" name="desertproduct1" data-placeholder="Choose ..."  style="width: 100%;">
                                
                                     <option value="">Choose One</option>
                                     <?php foreach($desert_items as $item){ ?>
                                      <option value="<?php echo $item['item_name'];?>"><?php echo $item['item_name'];?></option>
                                     <?php }?>
                            </select>  
                            </td>
                            <td><input type="text" name="desertprice1" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                            <td><input type="text" name="desertqty1" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                            <td><input type="text" name="desertlinetotal1" id="" class="form-control totalLinePrice" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                            <td></td>
                       
                        </tr>
                    </tbody>
    
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: center;">
                <input type="button" id="addrow_desert" value="Add Row" class="btn btn-success addmore" />
            </td>
        </tr>
        
        <tr>
            <td colspan="5">
                Grand Total: &#163;<span id="grandtotal3"></span>
            </td>
        </tr>
    </tfoot>
</table>
</div>  
</div>
    </div> 
    
     <div class="col-md-12">
             <div class="col-md-6">
                    <h4>Select Other Items</h4>
                    <div style="overflow-x:auto;">
                    <table class="order-list4 table table-bordered table-hover">
     <thead>
                        <tr>
                            <th width="30%">Item Name</th>
                            <th width="20%">Price</th>
                            <th width="15%">Quantity</th>
                            <th width="22%">Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="hidden" name="other_total_item" id="other_total_item" value="1">
 
                            <input type="text" name="otherproduct1" id="" class="form-control changesNo"  style="width: 100%;">
                            </td>
                            <td><input type="text" name="otherprice1" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                            <td><input type="text" name="otherqty1" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                            <td><input type="text" name="otherlinetotal1" id="" class="form-control totalLinePrice" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="width: 100%;"></td>
                            <td></td>
                       
                        </tr>
                    </tbody>
    
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: center;">
                <input type="button" id="addrow_other" value="Add Row" class="btn btn-success addmore" />
            </td>
        </tr>
        
        <tr>
            <td colspan="5">
                Grand Total: &#163;<span id="grandtotal4"></span>
            </td>
        </tr>
    </tfoot>
</table>
</div>  
</div>
     </div>   
   
     
   </div>              
                
                 <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" style="margin-right:30px;" >Next</button>   
                </div>
               
                
            </div>
        </div>
    </div>
    <div class="setup-content" id="step-3">
        <div class="col-xs-12 md-card">
            <div class="col-md-12">
                <h3> Step 3</h3>
                <div class="form-group" style="display:none;">
                        <label>Item: &nbsp;</label>
                        <div class="input-group">
                            <div class="input-group-addon menu_icon uk-icon-inr" ></div>
                            <input type="text" class="form-control" id="total" >
                        </div>
                    </div>
                    
                    
          
                    
               <!---  <div class="form-group">
                        <label>Subtotal: &nbsp;</label>
                        <div class="input-group">
                            <div class="input-group-addon menu_icon uk-icon-gbp" ></div>
                            <input type="text" class="form-control" id="subTotal" name="sub_total" placeholder="Subtotal" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly>
                        </div>
                    </div>--->
                    <div class="form-group">
                        <label>Discount: &nbsp;</label>
                        <div class="input-group">
                            <div class="input-group-addon">%</div>
                            <input type="text" class="form-control" id="tax" placeholder="Discount" name="tax" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Discount Amount: &nbsp;</label>
                        <div class="input-group">
                         <div class="input-group-addon menu_icon uk-icon-gbp"></div>
                            <input type="text" class="form-control" id="taxAmount" name="tax_amount" placeholder="Tax" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly>
                           
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label>Total Ammount: &nbsp;</label>
                        <div class="input-group">
                            <div class="input-group-addon menu_icon uk-icon-gbp" ></div>
                            <input type="text" class="form-control" id="totalAftertax" name="total_amount" placeholder="Total" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" >
                        </div>
                    </div>
                <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
<br><br><br><br>
            </div>
        </div>
    </div>
</form>
</div>
                </div>
            </div>

  

           
                        

                    </div>
                </div>
            </div>

        </div>
    </div>

  

  


     <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url();?>assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url();?>assets/js/altair_admin_common.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
    <!-- htmleditor (codeMirror) -->
    <script src="<?php echo base_url();?>assets/js/uikit_htmleditor_custom.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
    <script src="<?php echo base_url();?>assets/js/pages/forms_advanced.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
      <!-- jquery steps -->
    <script src="<?php echo base_url();?>assets/js/custom/wizard_steps.min.js"></script>
    <!-- handlebars.js -->
    <script src="<?php echo base_url();?>assets/bower_components/handlebars/handlebars.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/custom/handlebars_helpers.min.js"></script>

    <!--  forms wizard functions -->
    <script src="<?php echo base_url();?>assets/js/pages/forms_wizard.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url();?>assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url();?>assets/js/altair_admin_common.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
    <!-- htmleditor (codeMirror) -->
    <script src="<?php echo base_url();?>assets/js/uikit_htmleditor_custom.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
    <script src="<?php echo base_url();?>assets/js/pages/forms_advanced.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
      <script type="text/javascript">
            // When the document is ready
                       $('#datepicker').datepicker({
    format: 'dd/mm/yyyy',

    autoclose: true,
})
        </script>
           <script type="text/javascript">
            // When the document is ready
           
            
            $('#datepicker1').datepicker({
    format: 'dd/mm/yyyy',

    autoclose: true,
})
        </script>
     <script type="text/javascript">
/**
 * Site : http:www.smarttutorials.net
 * @author muni
 */

//adds extra table rows
var i=$('table tr').length;
$(".addmore_equipment").on('click',function(){
    html = '<tr>';
    html += '<td><input class="case" type="checkbox"/></td>';
    html += '<td><select title="Select with tooltip" class="select2 form-control  autocomplete_txt" id="itemName_1" autocomplete="off" data-type="productName" name="itemName[]" data-placeholder="Choose ..." id="itemName_'+i+'"  required ><option value="">Choose One</option><?php foreach($list_item as $items){?><option value="<?php echo $items['item_name'];?>"><?php echo $items['item_name'];?></option><?php }?></select>';
    html += '<td><input type="text" name="price[]" id="price_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
    html += '<td><input type="text" name="quantity[]" id="quantity_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
    html += '<td><input type="text" name="total[]" id="total_'+i+'" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
    html += '</tr>';
    $('table.item_equipment').append(html);
    i++;
});


//to check all checkboxes
$(document).on('change','#check_all',function(){
    $('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
});

//deletes the selected table rows
$(".delete").on('click', function() {
    $('.case:checkbox:checked').parents("tr").remove();
    $('#check_all').prop("checked", false);
    calculateTotal();
});


var prices = [<?php foreach($records as $row){ echo '"'.$row['productCode'].'|'.$row['productName'].'|'.$row['buyPrice'].'",';}?>];

//autocomplete script
$(document).on('focus','.autocomplete_txt',function(){
    type = $(this).data('type');

    if(type =='productCode' )autoTypeNo=0;
    if(type =='productName' )autoTypeNo=1;

    $(this).autocomplete({
        source: function( request, response ) {
             var array = $.map(prices, function (item) {
                 var code = item.split("|");
                 return {
                     label: code[autoTypeNo],
                     value: code[autoTypeNo],
                     data : item
                 }
             });
             //call the filter here
             response($.ui.autocomplete.filter(array, request.term));
        },
        autoFocus: true,
        minLength: 2,
        select: function( event, ui ) {
            var names = ui.item.data.split("|");
            id_arr = $(this).attr('id');
            id = id_arr.split("_");
            $('#itemNo_'+id[1]).val(names[0]);
            $('#itemName_'+id[1]).val(names[1]);
            $('#quantity_'+id[1]).val(1);
            $('#price_'+id[1]).val(names[2]);
            $('#total_'+id[1]).val( 1*names[2] );
            calculateTotal();
        }
    });
});

$(document).on('focus','.autocomplete_txt',function(){
    type = $(this).data('type');

    if(type =='productCode' )autoTypeNo=0;
    if(type =='productName' )autoTypeNo=1;

    $(this).autocomplete({
        source: function( request, response ) {
             var array = $.map(prices, function (item) {
                 var code = item.split("|");
                 return {
                     label: code[autoTypeNo],
                     value: code[autoTypeNo],
                     data : item
                 }
             });
             //call the filter here
             response($.ui.autocomplete.filter(array, request.term));
        },
        autoFocus: true,
        minLength: 2,
        select: function( event, ui ) {
            var names = ui.item.data.split("|");
            id_arr = $(this).attr('id');
            id = id_arr.split("_");
            $('#itemNo_'+id[2]).val(names[0]);
            $('#itemName_'+id[2]).val(names[1]);
            $('#quantity_'+id[2]).val(1);
            $('#price_'+id[2]).val(names[2]);
            $('#total_'+id[2]).val( 1*names[2] );
            calculateTotal();
        }
    });
});




//price change
$(document).on('change keyup blur','.changesNo',function(){
    id_arr = $(this).attr('id');
    id = id_arr.split("_");
    quantity = $('#quantity_'+id[1]).val();
    price = $('#price_'+id[1]).val();
    if( quantity!='' && price !='' ) $('#total_'+id[1]).val( (parseFloat(price)*parseFloat(quantity)).toFixed(2) );
    calculateTotal();
});

$(document).on('change keyup blur','#tax',function(){
    calculateTotal();
});

//total price calculation
function calculateTotal(){
    subTotal = 0 ; total = 0;
    $('.totalLinePrice').each(function(){
        if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
    });
    var vegTotal = $("#total").val();
    if(vegTotal != '' && typeof(vegTotal) != "undefined" ){
        subTotal += parseFloat( vegTotal); 
    }
    $('#subTotal').val( Math.round(subTotal));
    tax = $('#tax').val();
    if(tax != '' && typeof(tax) != "undefined" ){
        taxAmount = subTotal * ( parseFloat(tax) /100 );
        $('#taxAmount').val(taxAmount.toFixed(2));
        total = subTotal - taxAmount;
    }else{
        $('#taxAmount').val(0);
        total = subTotal;
    }
    $('#totalAftertax').val(Math.round(total));
    calculateAmountDue();
}

$(document).on('change keyup blur','#amountPaid',function(){
    calculateAmountDue();
});

//due amount calculation
function calculateAmountDue(){
    amountPaid = $('#amountPaid').val();
    total = $('#totalAftertax').val();
    if(amountPaid != '' && typeof(amountPaid) != "undefined" ){
        amountDue = parseFloat(total) - parseFloat( amountPaid );
        $('.amountDue').val( amountDue.toFixed(2) );
    }else{
        total = parseFloat(total).toFixed(2);
        $('.amountDue').val( total);
    }
}

//It restrict the non-numbers
var specialKeys = new Array();
specialKeys.push(8,46); //Backspace
function IsNumeric(e) {
    var keyCode = e.which ? e.which : e.keyCode;
    console.log( keyCode );
    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
    return ret;
}

//datepicker
$(function () {
    $.fn.datepicker.defaults.format = "dd-mm-yyyy";
    $('#invoiceDate').datepicker({
        startDate: '-3d',
        autoclose: true,
        clearBtn: true,
        todayHighlight: true
    });
});

</script>
<script>
//datepicker
$(function () {
    $.fn.datepicker.defaults.format = "dd-mm-yyyy";
    $('#invoiceDate1').datepicker({
        startDate: '-3d',
        autoclose: true,
        clearBtn: true,
        todayHighlight: true
    });
});

</script>
<script>
$(function() {
// enable hires images
altair_helpers.retina_images();
// fastClick (touch devices)
if(Modernizr.touch) {
FastClick.attach(document.body);
            }
});</script>

<script>
	
	$('input:checkbox').change(function ()
{

      var total = 0;
      $('input:checkbox:checked').each(function(){
         var mystring = ($(this).val());
         var splits = mystring.split(",");
       total += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
       
      });
      var subTotal = 0 ;
     $('.totalLinePrice').each(function(){
        if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
    });
    
 
    $('#subTotal').val( (parseFloat(subTotal.toFixed(2))+parseFloat(total)));
    $('#totalAftertax').val( (parseFloat(subTotal.toFixed(2))+parseFloat(total)) );
    $("#total").val(total);

});
</script>


<!---Veg Item--->

 <script>
$(document).ready(function () {
    var counter = 1;
    
    $(".addmore_veg").on("click", function () {
        counter++;
        
        $("#veg_total_item").val(counter);
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td><select class="select2 form-control  autocomplete_txt" id="" autocomplete="off" data-type="productName" name="vegproduct' + counter +'" data-placeholder="Choose ..." required><option value="">Choose One</option><?php foreach($item_veg as $veg){ ?><option value="<?php echo $veg['veg_name'];?>"><?php echo $veg['veg_name'];?></option><?php }?></select></td>';
        cols += '<td><input type="text" name="vegprice' + counter + '" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
        cols += '<td><input type="text" name="vegqty' + counter + '" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
        cols += '<td><input type="text" name="veglinetotal' + counter + '" id="" class="form-control totalLinePrice" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
        cols += '<td><a class="deleteRow"> x </a></td>';
        newRow.append(cols);
        
        $("table.order-list").append(newRow);
    });
    
    $("table.order-list").on("change", 'input[name^="vegprice"], input[name^="vegqty"]', function (event) {
        calculatevegRow($(this).closest("tr"));
        calculateVegGrandTotal();
    });
    
    $("table.order-list").on("click", "a.deleteRow", function (event) {
        counter--;
         $("#veg_total_item").val(counter);
        $(this).closest("tr").remove();
        calculateVegGrandTotal();
    });
});
    
function calculatevegRow(row) {
    var price = +row.find('input[name^="vegprice"]').val();
    var qty = +row.find('input[name^="vegqty"]').val();
    row.find('input[name^="veglinetotal"]').val((price * qty).toFixed(2));
}
    
function calculateVegGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="veglinetotal"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
</script>
 
 <!---non veg--->
 
 
<script>
$(document).ready(function () {
    var counter = 1;
    
    $("#addrow1").on("click", function () {
        counter++;
        $("#non_veg_total_item").val(counter);
          var newRow = $("<tr>");
        var cols = "";
        cols += '<td><select class="select2 form-control  autocomplete_txt" id="" autocomplete="off" data-type="productName" name="nonvegproduct' + counter +'" data-placeholder="Choose ..." required><option value="">Choose One</option> <?php foreach($item_non_veg as $veg){ ?><option value="<?php echo $veg['non_veg_name'];?>"><?php echo $veg['non_veg_name'];?></option><?php }?></select></td>';
        cols += '<td><input type="text" name="nonvegprice' + counter + '" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
        cols += '<td><input type="text" name="nonvegqty' + counter + '" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
        cols += '<td><input type="text" name="nonveglinetotal' + counter + '" id="" class="form-control totalLinePrice" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
        cols += '<td><a class="deleteRow"> x </a></td>';
        newRow.append(cols);
        
        $("table.order-list1").append(newRow);
    });
    
    $("table.order-list1").on("change", 'input[name^="nonvegprice"], input[name^="nonvegqty"]', function (event) {
       // counter--;
        //$("#non_veg_total_item").val(counter);
        calculateRow($(this).closest("tr"));
        calculateGrandTotal();
    });
    
    $("table.order-list1").on("click", "a.deleteRow", function (event) {
        $(this).closest("tr").remove();
        calculateGrandTotal();
    });
});
    
function calculateRow(row) {
    var price = +row.find('input[name^="nonvegprice"]').val();
    var qty = +row.find('input[name^="nonvegqty"]').val();
    row.find('input[name^="nonveglinetotal"]').val((price * qty).toFixed(2));
}
    
function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list1").find('input[name^="nonveglinetotal"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal1").text(grandTotal.toFixed(2));
}
</script>



 <!---cold drink--->
 
 
<script>
$(document).ready(function () {
    var counter = 1;
    
    $("#addrow_cold").on("click", function () {
        counter++;
        $("#cold_total_item").val(counter);
          var newRow = $("<tr>");
        var cols = "";
        cols += '<td><select class="select2 form-control  autocomplete_txt" id="" autocomplete="off" data-type="productName" name="coldproduct' + counter +'" data-placeholder="Choose ..." required><option value="">Choose One</option> <?php foreach($drink_items as $veg){ ?><option value="<?php echo $veg['item_name'];?>"><?php echo $veg['item_name'];?></option><?php }?></select></td>';
        cols += '<td><input type="text" name="coldprice' + counter + '" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
        cols += '<td><input type="text" name="coldqty' + counter + '" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
        cols += '<td><input type="text" name="coldlinetotal' + counter + '" id="" class="form-control totalLinePrice" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
        cols += '<td><a class="deleteRow"> x </a></td>';
        newRow.append(cols);
        
        $("table.order-list2").append(newRow);
    });
    
    $("table.order-list2").on("change", 'input[name^="coldprice"], input[name^="coldqty"]', function (event) {
       // counter--;
        //$("#non_veg_total_item").val(counter);
        calculatecoldRow($(this).closest("tr"));
        calculatecoldGrandTotal();
    });
    
    $("table.order-list2").on("click", "a.deleteRow", function (event) {
        $(this).closest("tr").remove();
        calculatecoldGrandTotal();
    });
});
    
function calculatecoldRow(row) {
    var price = +row.find('input[name^="coldprice"]').val();
    var qty = +row.find('input[name^="coldqty"]').val();
    row.find('input[name^="coldlinetotal"]').val((price * qty).toFixed(2));
}
    
function calculatecoldGrandTotal() {
    var grandTotal = 0;
    $("table.order-list2").find('input[name^="coldlinetotal"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal2").text(grandTotal.toFixed(2));
}
</script>



 <!---desert--->
 
 
<script>
$(document).ready(function () {
    var counter = 1;
    
    $("#addrow_desert").on("click", function () {
        counter++;
        $("#desert_total_item").val(counter);
          var newRow = $("<tr>");
        var cols = "";
        cols += '<td><select class="select2 form-control  autocomplete_txt" id="" autocomplete="off" data-type="productName" name="desertproduct' + counter +'" data-placeholder="Choose ..." required><option value="">Choose One</option> <?php foreach($desert_items as $veg){ ?><option value="<?php echo $veg['item_name'];?>"><?php echo $veg['item_name'];?></option><?php }?></select></td>';
        cols += '<td><input type="text" name="desertprice' + counter + '" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
        cols += '<td><input type="text" name="desertqty' + counter + '" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
        cols += '<td><input type="text" name="desertlinetotal' + counter + '" id="" class="form-control totalLinePrice" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
        cols += '<td><a class="deleteRow"> x </a></td>';
        newRow.append(cols);
        
        $("table.order-list3").append(newRow);
    });
    
    $("table.order-list3").on("change", 'input[name^="desertprice"], input[name^="desertqty"]', function (event) {
       // counter--;
        //$("#non_veg_total_item").val(counter);
        calculatedesertRow($(this).closest("tr"));
        calculatedesertGrandTotal();
    });
    
    $("table.order-list3").on("click", "a.deleteRow", function (event) {
        $(this).closest("tr").remove();
        calculatedesertGrandTotal();
    });
});
    
function calculatedesertRow(row) {
    var price = +row.find('input[name^="desertprice"]').val();
    var qty = +row.find('input[name^="desertqty"]').val();
    row.find('input[name^="desertlinetotal"]').val((price * qty).toFixed(2));
}
    
function calculatedesertGrandTotal() {
    var grandTotal = 0;
    $("table.order-list3").find('input[name^="desertlinetotal"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal3").text(grandTotal.toFixed(2));
}
</script>




<script>
$(document).ready(function () {
    var counter = 1;
    
    $("#addrow_other").on("click", function () {
        counter++;
        $("#other_total_item").val(counter);
          var newRow = $("<tr>");
        var cols = "";
        cols += '<td><input type="text" name="otherproduct' + counter +'" id="" class="form-control"></td>';
        cols += '<td><input type="text" name="otherprice' + counter + '" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
        cols += '<td><input type="text" name="otherqty' + counter + '" id="" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
        cols += '<td><input type="text" name="otherlinetotal' + counter + '" id="" class="form-control totalLinePrice" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
        cols += '<td><a class="deleteRow"> x </a></td>';
        newRow.append(cols);
        
        $("table.order-list4").append(newRow);
    });
    
    $("table.order-list4").on("change", 'input[name^="otherprice"], input[name^="otherqty"]', function (event) {
       // counter--;
        //$("#non_veg_total_item").val(counter);
        calculateotherRow($(this).closest("tr"));
        calculateotherGrandTotal();
    });
    
    $("table.order-list4").on("click", "a.deleteRow", function (event) {
        $(this).closest("tr").remove();
        calculateotherGrandTotal();
    });
});
    
function calculateotherRow(row) {
    var price = +row.find('input[name^="otherprice"]').val();
    var qty = +row.find('input[name^="otherqty"]').val();
    row.find('input[name^="otherlinetotal"]').val((price * qty).toFixed(2));
}
    
function calculateotherGrandTotal() {
    var grandTotal = 0;
    $("table.order-list4").find('input[name^="otherlinetotal"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal4").text(grandTotal.toFixed(2));
}
</script>






</body>
</html>