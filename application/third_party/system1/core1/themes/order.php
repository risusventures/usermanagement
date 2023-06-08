
<!doctype html>
<html lang="en">
<head>
    <?php include 'inc_meta.php'; ?>
    <?php include 'inc_title.php'; ?>
	 <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/finacbook_icon.png" sizes="32x32">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.min.css" media="all">
    <link href="<?php echo base_url();?>assets/css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<title>FinacBooks</title>
	<?php include('analytics.php');?> 
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
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <?php include ('header.php'); ?>
    <!-- main sidebar -->
   <?php include('header_top.php');?>
    <div id="page_content" style="margin-left:0px;">
        <form method="post" name="ClassSearch"  id="ClassSearch" class="uk-form-stacked" onsubmit="return(validate());"   action="<?php echo base_url();?>seller/add_order" >
        <div id="page_content_inner">
              <?php if($_GET['ab']==1)
    { echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Created OrderSheet Successfully......</div>';}?>
            <div class="uk-grid">
                <div class="uk-width-large-1-1 uk-width-medium-1-1">
                    <div class="md-card">
                        <div class="md-card-content"> 
                            <div class="container content">
        <p>From (Seller Detail)</p>
        <div class='row'>
            <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
            <?php foreach ($company_detail as $row) { }?>
                <div class="form-group">
                <input type="text" class="form-control" id="companyName" placeholder="Company Name" name="buyer_company_name" value="<?php echo $row['company_name'];?>"  readonly>
                </div>
                <div class="form-group">
        <textarea class="form-control" rows='3' id="companyAddress" placeholder="Your Address" name="buyer_address" readonly>
      <?php echo $row['address'];?>  <?php echo $row['postal_code'];?>
           </textarea>
            </div>
            </div>
            <div class='col-xs-12 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-sm-4 col-md-4 col-lg-4'>
            <div class="form-group">
            <textarea class="form-control" rows='5' id="" placeholder="Note" name="note" ></textarea>
            </div> 
            </div>
        </div>
        <p>To (Buyer Detail)</strong></p>
        <div class='row'>
            <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
                  <div class="uk-width-medium-1-1">
                        <div class="parsley-row">
                            <select id="val_select" required data-md-selectize name="seller_company_name"  id="" class="buyer">
                            <option value="-1">Select Company Name</option>
                            <?php foreach ($list_customer as $customer) {?>
                            <option value="<?php echo $customer['customer_id'];?>"><?php echo $customer['customer_company'];?></option>
                            <?php }?>
                            </select>
                        </div></div>
                <div class="form-group">
                <input type="text" name="seller_email" id="seller_email " class="form-control seller_email" placeholder="Company Email" id="category1" value="" >
                </div>
                <div class="form-group">
                <textarea class="form-control seller_address"  rows='3' id="clientAddress" placeholder="Your Address" name="seller_address" ></textarea>
                </div>
            </div>
            <div class='col-xs-12 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-sm-4 col-md-4 col-lg-4'>
                <div class="form-group">
                <input type="number" class="form-control" id="invoiceNo" placeholder="Order No" name="invoice_number" disabled>
                </div>
                <div class="form-group">
                <input type="text" class="form-control" id="uk_dp_end" placeholder="Order Date" id="invoice_date" name="invoice_date[]" Required>
                </div>
                <div class="form-group">
                <input type="number" class="form-control amountDue" id="amountDueTop" placeholder=" Total Amount" name='total_amount' >
                </div>
				 <div class="form-group">
                <input type="text" class="form-control" id="" placeholder="Sales Person Name" id="" name="sales_person[]" Required>
                </div>
            </div>
        </div>
        <h2>&nbsp;</h2>
        <div class='row'>
            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                <table class="table table-bordered table-hover">
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
                            <td><input type="text" data-type="productName" name="itemName[]" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off"></td>
                            <td><input type="number" name="price[]" id="price_1" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
                            <td><input type="number" name="quantity[]" id="quantity_1" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
                            <td><input type="number" name="total[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class='row'>
            <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                <button class="btn btn-danger delete" type="button">- Delete</button>
                <button class="btn btn-success addmore" type="button" style="background-color:#1976D2;border-color:#1976D2">+ Add More</button>
            </div>
            <div class='col-xs-12 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-sm-5 col-md-5 col-lg-5'>
                    <div class="form-group">
                        <label>Subtotal: &nbsp;</label>
                        <div class="input-group">
                            <div class="input-group-addon menu_icon uk-icon-inr" ></div>
                            <input type="number" class="form-control" id="subTotal" name="sub_total" placeholder="Subtotal" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tax: &nbsp;</label>
                        <div class="input-group">
                            <div class="input-group-addon menu_icon uk-icon-inr"></div>
                            <input type="number" class="form-control" id="tax" placeholder="Tax" name="tax" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tax Amount: &nbsp;</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="taxAmount" name="tax_amount" placeholder="Tax" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                            <div class="input-group-addon">%</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Total: &nbsp;</label>
                        <div class="input-group">
                            <div class="input-group-addon menu_icon uk-icon-inr" ></div>
                            <input type="number" class="form-control" id="totalAftertax" placeholder="Total" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                        </div>
                    </div>
            </div>
         </div>          
    </div>       
     <div class="uk-margin-medium-top uk-margin-bottom">
<center><input type="submit" value="Save" id="save"  class="md-btn md-btn-primary md-btn-block md-btn-wave-light waves-effect waves-button waves-light" name="submit" style="width:50%"></center>
</form>
                   </div>
                </div>
            </div>
        </div>
    </div>

    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- common functions -->
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
/**
 * Site : http:www.smarttutorials.net
 * @author muni
 */
          
//adds extra table rows
var i=$('table tr').length;
$(".addmore").on('click',function(){
    html = '<tr>';
    html += '<td><input class="case" type="checkbox"/></td>';
    html += '<td><input type="text" data-type="productName" name="itemName[]" id="itemName_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
    html += '<td><input type="text" name="price[]" id="price_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
    html += '<td><input type="text" name="quantity[]" id="quantity_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
    html += '<td><input type="text" name="total[]" id="total_'+i+'" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
    html += '</tr>';
    $('table').append(html);
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
    $('#subTotal').val( subTotal.toFixed(2) );
    tax = $('#tax').val();
    if(tax != '' && typeof(tax) != "undefined" ){
        taxAmount = subTotal * ( parseFloat(tax) /100 );
        $('#taxAmount').val(taxAmount.toFixed(2));
        total = subTotal + taxAmount;
    }else{
        $('#taxAmount').val(0);
        total = subTotal;
    }
    $('#totalAftertax').val( total.toFixed(2) );
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
$(function() {
// enable hires images
altair_helpers.retina_images();
// fastClick (touch devices)
if(Modernizr.touch) {
FastClick.attach(document.body);
            }
});</script>

</body>
</html>

