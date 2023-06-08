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
   <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/risus-03.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/risus-03.png" sizes="32x32">
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
    
     <script type="text/javascript" src="bootstrap-datetimepicker.de.js" charset="UTF-8"></script>
    
   <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>


    <title>Risus Ventures</title>
  <style>
      .col-md-2{margin-top: 14px;}
      .col-md-3{margin-top: 14px;}
      .update-picker-month option{
          color: gray;
      }
      .update-picker-year option{
          color: gray;
      }
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
<!--<script type="text/javascript">
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

</script>-->
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
    
    
    
    <div id="page_content" style="margin-left: 0px;">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom" style="align : left"><u>Update Order</u></h3>
             
            <div class="md-card uk-margin-large-bottom1">
                <a href="<?php echo base_url()?>manageplaceOrder"<button type="button" class="md-btn md-btn-primary" style="float: right;position: relative;bottom: 40px;text-align: center;background-color: #28a745;color: white;"><b>Back</b></button></a> 
                <div class="md-card-content">
                    <div class="">
<!--                        <div class="stepwizard">
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
                        </div>-->
                        <div class="md-card">
                <div class="md-card-content large-padding">
                             <?php if($_GET['message']==already)
             { echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>You are already registered</div>';}?>
                            <?php if($_GET['message']==1)
             { echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>Added order Successfully......</div>';}?>
                            <?php echo form_open(base_url('seller/update_orderplace'),array('id'=>'contactform','name'=>'contactform','onsubmit'=>'return validateentry();','class'=>'uk-form-stacked','enctype'=>'multipart/form-data'));?>
                        
                        <div class="row setup-content" id="step">                            
                            <div class="col-xs-12">
                                <div class="col-md-12">
                                     <?php
//                                            $princida_product_id = $edit_order['order']['pid'];
//                                            $query = $this->db->query("select * from Principal where Principal_id= '$princida_product_id'");
//                                            $data2 = $query->result_array();
//                                            echo '<pre>';print_r($data2); echo'</pre>';
                                            $order_product=$edit_order['order_product'];
                                            $order_detail=$edit_order['order'];
                                            $seltedpriciple=$order_detail['pid'];
                                            ?>
                                    <div class="row">
                                         <div class="col-md-5 principal_sarea ">
                                                                                     
                                            <div class="hide principal_sname principal_sname">
                                                
                                            </div>                                            
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    
                                    <div class="row">
                                        <h4>Order Total : <?php echo $order_detail['total']?></h4>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Select Principal</h4>
                                           
                                            <input type="hidden" name="principal_id" id='list_principal2' value="" />
                                            <input type="hidden" name="customers_principal_assigned" id='customers_principal_assigned2' value="" />
                                            <input type="hidden" name="principal_contacts" id='principal_contacts2' value="" />
                                            
                                            <input type="hidden" name="orderid" value="<?php echo $order_detail['id'];?>" />
                                            <?php
                                            
                                            if(!empty($list_principal)) {
                                                echo "<select class='form-control' id='list_principal' onchange='getprinciple()' name='principal_id_old' ><option value=''>Please select </option>";
                                                foreach($list_principal as $principal){
                                                ?>
                                            <option <?php if($seltedpriciple==$principal['Principal_id']) { echo "selected='selected'";} ?> value="<?php echo $principal['Principal_id'];?>"><?php echo $principal['Principal_person'];?></option>
                                            
                                            
                                            
<!--                                                        <label><input type="checkbox" name="pcheck[]" onclick="showprincipalcontact('<?php echo $principal['Principal_id'] ?>')"  class="pcheck"   id="mytable<?php echo $principal['Principal_id'];?>" value="<?php echo $principal['Principal_id'] ?>"><?php echo $principal['Principal_person'];?></label>-->
                                                   
                                                <?php
                                                }
                                                echo "</select>";
                                            }
                                           // echo '<pre>'; print_r($list_principal); echo '</pre>'; 
                                            ?>
                                        </div>
                                        <div class="col-md-5 principal_contactsarea">
                                            
                                            <div class="hide principal_contactsdiv">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-5 assignedarea ">
                                                                                     
                                            <div class="hide assigneddiv assigneddiv">
                                                
                                            </div>                                            
                                        </div>
                                        <div class="col-md-5 customercontact ">
                                                                                     
                                            <div class="hide customercontactdiv">
                                                
                                            </div>                                            
                                        </div>
                                    </div>                                    
                                    
                                    
                                    
                                     <div class="row">
                                        <div class="col-md-12 productarea ">
                                                                                       
                                            <div class="productdiv">
                                                
                                            </div>                                      
                                        </div>
                                    </div>
                                    <div class="row">
<!--                                        <div class="col-md-2 productarea ">
                                           <div class="md-input-wrapper">
                                               <label for="fullname">PO Number <span class="req">*</span></label>
                                               <input type="text" id="po_number" name="po_number" class="md-input" value="<?php echo $edit_order['order']['po_number'];?>" >
                                               <span class="md-input-bar"></span>
                                           </div> 
                                        </div>-->
                                        <div class="col-md-2 productarea ">
                                           <div class="md-input-wrapper">
                                               <label for="fullname">Order no<span class="req">*</span></label>
                                               <input type="text" name="orderno" id="orderno" class="md-input" value="<?php echo $edit_order['order']['order_no'];?>">
                                               <span class="md-input-bar"></span>
                                           </div> 
                                    </div>
                                         <div class="col-md-2 productarea ">
                                           <div class="md-input-wrapper">
                                               <label for="fullname">Invoice no<span class="req">*</span></label>
                                               <input type="text" name="invoiceno" id="invoiceno" class="md-input" value="<?php echo $edit_order['order']['invoice_no'];?>">
                                               <span class="md-input-bar"></span>
                                           </div>                             
                                        </div>
                                        
                                        <div class="col-md-3 productarea ">
                                           <div class="md-input-wrapper">
                                               <div class="uk-placeholder">order delivery date</div>
                                              <div class="uk-form">
                                                        <input type="text" id="orderdate" name="orderdate" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="<?php echo $edit_order['order']['orderdate'];?>">
                                                        
                                             </div>
                                               
                                           </div>                             
                                        </div>
                                        
                                         <div class="col-md-2 productarea ">
                                           <div class="md-input-wrapper">
                                               <div class="uk-placeholder">order placement date </div>
                                              <div class="uk-form">
                                                <input type="text" name="datecretaed" value="<?php echo $edit_order['order']['datecretaed'];?>"  data-uk-datepicker="{format:'YYYY-MM-DD'}" required>                                                        
                                             </div>
                                               
                                           </div>                             
                                        </div>
                                        
                                </div>
                                    <div class="row">
                                        
                                        <div class="col-md-12 productarea ">
                                        
                                            <div id="reapeatshw" style="margin-top: 20px">  
                                                <?php 
                                                
                                                 $orders_images = $this->db->query("select * from orders_images where order_id = '{$order_detail['id']}'")->result_array();
                                                  if(!empty($orders_images)) {
                                                    $lllll=1;
                                                    foreach($orders_images as $ed){
                                                        ?>
                                                           <div class="uk-grid imagess<?php echo $ed['id'] ?>" data-uk-grid-margin="">
                                                               <div class="col-md-3">Document <?php echo $lllll; ?></div>
                                                               <div class="col-md-3">
                                                                   <a href="<?php echo base_url(); ?><?php echo $ed['name'];?>" target="_blank" > 
                                                                       <i class="fa fa-file-pdf-o" style="width:50px;font-size: 48px;"></i>
<!--                                                                    <img style="width: 200px;" src="<?php // echo base_url(); ?>images/<?php echo $ed['name'];?>" />-->
                                                                   </a>
                                                               </div>
                                                               <div class="col-md-3">
                                                                   <a href="javascript:void(0)" onclick="deleteimage('<?php echo $ed['id'] ?>')" data-uk-tooltip="{pos:'bottom'}"><i class="material-icons" style="font-size:28px;color:#1976D2;">delete</i></a>
                                                               </div>
                                                           </div>
                                                        <?php

                                                  $lllll++;  }
                                                }
                                                ?>
                                            </div>
                                            
                                        <div id="reapeat1" style="margin-top: 20px">                        
                                            <div class="uk-grid " data-uk-grid-margin>
                                                 <div class="uk-width-1-2">     
                                                        <input type="file"  name="attachments[]" class="md-input"  value=""/>
                                                </div>                                                    
                                            </div>
                                        </div>
                                        </div></br><br>
                                      
                                    </div>
                                    
                                    <div class="row">
                                      <div class="col-md-5 productarea ">
                                    
                                    <div class="uk-grid" style="margin-top: 20px">
                                            <div class="uk-width-1-2">
                                                <button type="button" class="md-btn md-btn-primary" onclick="add_more()" name="add" >Add More</button>
                                            </div>

                                        </div>
                                      </div>
                                        </div>
                                    
                                    
                                    
                                   <div class="row">
                                      <div class="col-md-4 productarea ">
                                           <div class="md-input-wrapper">
                                               <h5>Remark</h5>
                                               <textarea rows="4" cols="50" name="remark" ><?php echo $edit_order['order']['remark'];?></textarea>
                                               <span class="md-input-bar"></span>
                                           </div>                             
                                        </div> 
                                       <div class="col-md-4 productarea ">
                                           <div class="md-input-wrapper">
                                               <h5>INCO Terms</h5>
                                               <textarea rows="4" cols="50" name="inco_term" ><?php echo $edit_order['order']['inco_term'];?></textarea>
                                               <span class="md-input-bar"></span>
                                           </div>                             
                                        </div>
                                       <div class="col-md-4 productarea ">
                                           <div class="md-input-wrapper">
                                               <h5>Delivery Terms</h5>
                                               <textarea rows="4" cols="50" name="delivery_terms" ><?php echo $edit_order['order']['delivery_terms'];?></textarea>
                                               <span class="md-input-bar"></span>
                                           </div>                             
                                        </div>
                               
                                       
                                       <div class="col-md-4 productarea ">
                                           <div class="md-input-wrapper">
                                               <h5>Payment term</h5>
                                               <textarea rows="4" cols="50" name="payment_term" ><?php echo $edit_order['order']['payment_term'];?></textarea>
                                               <span class="md-input-bar"></span>
                                           </div>                             
                                        </div> 
                                       <div class="col-md-4 productarea ">
                                           <div class="md-input-wrapper">
                                               <h5>Destination</h5>
                                               <textarea rows="4" cols="50" name="destination" ><?php echo $edit_order['order']['destination'];?></textarea>
                                               <span class="md-input-bar"></span>
                                           </div>                             
                                        </div> 
                                       
                                   </div>
                                    <br><br>
                                    <div class="row">
                                      <div class="col-md-5 productarea ">
                                    <div class="uk-grid">
                            <div class="uk-width-1-2">
                                <button type="submit" class="md-btn md-btn-primary" name="submit" onclick="return verify_upload()">Update</button>
                            </div>
                        </div> 
                                    
                                      </div>
                                    </div>
                                    
                                    
                                    
                        </div>
                        </div>
                        
                        
                        
                   
                       
                        
                        
                    </div>
                    
                     
                    
                    
                    <?php echo form_close();?>
                
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

  <script>
      
      var orderdetail='<?php echo json_encode($order_detail); ?>';
      orderdetail=  JSON.parse(orderdetail);
      
      var order_product='<?php echo json_encode($order_product); ?>';
      order_product=  JSON.parse(order_product);
      
        function add_more(){
            var hml='<div class="uk-grid " data-uk-grid-margin=""><div class="uk-width-1-2"><div class="md-input-wrapper"><input name="attachments[]" class="md-input" value="" type="file"><span class="md-input-bar"></span></div> </div> </div>'      
                                                 
                                                        
                                                                                                  
                                           
                            
                jQuery("#reapeat1").append(hml);  
        }
        </script> 
<script>
       function generatetotal(){
                   var selected = $('input:checkbox:checked.checkboxes').map(function () {
            return this.value;
          }).get();
          
          var ttotal=0;
          
           for(var k=0;k<selected.length;k++){ 
               var pss = selected[k];
               var subprice=parseFloat($("#subprice"+pss).val());
               if(subprice>0){}else{
                   subprice=0
               }
               ttotal=parseFloat(ttotal+subprice);
              
           }
         $("#totalprice").val(ttotal);
    }
function calc(id) {
 //console.log(id);
    var qty=parseFloat($("#cunt"+id).val());
    var price=parseFloat($("#price"+id).val());
    var sub=parseFloat(qty*price);
    //$("#subprice"+id).val(sub);
     $("#subprice"+id).val(sub.toFixed(2));
    generatetotal();
}

</script>


<script>
    function deleteimage(id){
       
        var r = confirm("Are you Sure. you want to delete this Image");
        if (r == true) {
            jQuery.ajax({
                          type: "get",
                          url: '<?php echo base_url('ajax/deleteimage') ?>',  
                          data: {'id':id},
                         // dataType: "json",
                          success: function(data)
                          {
                              $(".imagess"+id).remove();

                          } 
                        });
        }

       
    }
    function showproducts(){
         var selectedprinipal= $('#list_principal').val();
         var customers_principal_assigned= $('#customers_principal_assigned').val();
         
         jQuery.ajax({
                  type: "get",
                  url: '<?php echo base_url('ajax/getproducts') ?>',  
                  data: {'pid':selectedprinipal,cid:customers_principal_assigned},
                 // dataType: "json",
                  success: function(data)
                  {
                       
                        jQuery(".productdiv").html(data);
                        var total=0;
                        for(var i=0;i<order_product.length;i++){
                            var op=order_product[i];
                          //  console.log(op.p_subtotal);
                            product_id=op.product_id;
                            p_quntity=op.p_quntity;
                            price=op.p_price;
                            poo=op.po;
                            p_subtotal=parseFloat(op.p_subtotal);
                            
                            total=parseFloat(total+p_subtotal);
                            
                            $('#checkeddd'+product_id).prop('checked', true);
                            $("#cunt"+product_id).val(p_quntity);
                            $("#subprice"+product_id).val(p_subtotal);
                            $("#po"+product_id).val(poo);
                            $("#price"+product_id).val(price);
                            
                            console.log(op);
                        }
                            $("#totalprice").val(total);
                              $("#acceptmoney").val(orderdetail.acceptmoney);
                            jQuery('#orderno,#invoiceno,#po_number').trigger('change');
                            jQuery("#list_principal,#principal_contacts,#customers_principal_assigned").attr('disabled',true)
                            
                            
                  } 
                });
            jQuery.ajax({
                  type: "get",
                  url: '<?php echo base_url('ajax/customercontact') ?>',  
                  data: {'pid':selectedprinipal,cid:customers_principal_assigned},
                 // dataType: "json",
                  success: function(data)
                  {
                      /*
                      jQuery(".customercontactdiv").removeClass('hide');
                      jQuery(".customercontactdiv").html(data);
                      var customers_contacts= orderdetail.customers_contacts;
                      var customers_contacts = customers_contacts.slice(1, -1);
                      var customers_contactsarray= customers_contacts.split(",");
                       for(var i=0;i<customers_contactsarray.length;i++){ 
                            var op=customers_contactsarray[i];
                            $('.customers_contacts'+op).prop('checked', true);
                            // console.log("customers_contacts"+op);
                       }
                     */
                  }
                });
    }
    function getprinciple(){
        var selected= $('#list_principal').val();
        jQuery.ajax({
                  type: "get",
                  url: '<?php echo base_url('ajax/getprincipalcontact') ?>',  
                  data: {'pid':selected},
                  dataType: "json",
                  success: function(data)
                  {
                      var datas=data.data;
                      for(var k=0;k<datas.length;k++){
                        var p = datas[k].pid;
                        var principal_contactshtml = datas[k].principal_contactshtml;
                        var customers_principal_assigned_html = datas[k].customers_principal_assigned_html;
                        var customers_principal_sname_html = datas[k].customers_principal_sname_html;
                        
                        jQuery(".assigneddiv").removeClass('hide');
                        jQuery(".principal_contactsdiv").removeClass('hide');
                        jQuery(".principal_contactsdiv").html(principal_contactshtml);
                        jQuery(".assigneddiv").html(customers_principal_assigned_html)
                        jQuery(".principal_sname").removeClass('hide');
                        jQuery(".principal_sname").html(customers_principal_sname_html);
                        
                        
                        jQuery('#principal_contacts').val(orderdetail.p_c_id);
                        jQuery('#customers_principal_assigned').val(orderdetail.cid);
                        jQuery('#customers_principal_assigned').trigger('change');
                        
                        jQuery('#principal_contacts2').val(orderdetail.p_c_id);
                        jQuery('#customers_principal_assigned2').val(orderdetail.cid);
                        jQuery('#list_principal2').val(selected);
                        
                        jQuery('#customers_principal_assigned').attr('name','customers_principal_assigned_old');
                        jQuery('#principal_contacts').attr('name','principal_contacts_old');
                       
                        
                      }
                      

                  }
                });
                
                
                
    }
    
    function showprincipalcontact(pid){
        
          var selected = $('input:checkbox:checked.pcheck').map(function () {
            return this.value;
          }).get();
          
         
          
        
          if(selected.length>0){
       
        
            
            
            jQuery.ajax({
                  type: "get",
                  url: '<?php echo base_url('ajax/getprincipalcontact') ?>',  
                  data: {'pid':selected},
                  dataType: "json",
                  success: function(data)
                  {
                      var datas=data.data;
                      for(var k=0;k<datas.length;k++){
                        var p = datas[k].pid;
                        var principal_contactshtml = datas[k].principal_contactshtml;
                        var customers_principal_assigned_html = datas[k].customers_principal_assigned_html;
                        
                        jQuery(".assigneddiv"+p).removeClass('hide');
                        jQuery(".principal_contactsdiv"+p).removeClass('hide');
                        jQuery(".principal_contacts"+p).html(principal_contactshtml);
                        jQuery(".assigned"+p).html(customers_principal_assigned_html)
                        
                      }
                      
//                    jQuery(".assigneddiv"+pisd).removeClass('hide');
//                    jQuery(".principal_contactsdiv"+pisd).removeClass('hide');
//                    jQuery(".principal_contacts"+pisd).html(data.principal_contactshtml);
//                    jQuery(".assigned"+pisd).html(data.customers_principal_assigned_html)
                    //console.log(data);
                  }
                });
            
      
        }
        
        
        var selected = $('input:checkbox:not(:checked).pcheck').map(function () {
          return this.value;
        }).get();
          for(var k=0; k<selected.length;k++){
          
           var un=selected[k];
           jQuery(".assigneddiv"+un).addClass('hide');
            jQuery(".principal_contactsdiv"+un).addClass('hide');
           jQuery(".principal_contacts"+un).html('');
           jQuery(".assigned"+un).html('');
           console.log("uncheck"+un);
        
    }
                
    }
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
$( document ).ready(function() {
        getprinciple();
});
</script>
</body>
</html>