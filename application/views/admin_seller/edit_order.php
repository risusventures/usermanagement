<!doctype html>
<html lang="en">
<meta charset="UTF-8">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" media="all">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<meta charset="UTF-8">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" media="all">
<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Remove Tap Highlight on Windows Phone IE -->
<meta name="msapplication-tap-highlight" content="no"/>
<head>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/risus-03.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/risus-03.png" sizes="32x32">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.min.css" media="all">
    <link href="<?php echo base_url(); ?>assets/css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

    <title>Risus Ventures</title>
    <style>
	.uk-width-1-1 {
    display: block;
    width: 100%;
    height: 34px !important;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #000;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
	opacity:1;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
        .col-md-2 {
            margin-top: 14px;
        }

        .col-md-3 {
            margin-top: 14px;
        }

        .update-picker-month option {
            color: gray;
        }

        .update-picker-year option {
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

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>
    
    <!---load customer value---->
    <script type="text/javascript">
	//test g bg
        jQuery(document).ready(function () {
            jQuery(".buyer").change(function () {
                var id = jQuery(this).val();
                jQuery.ajax
                ({
                    type: "GET",
                    url: "<?php echo site_url(); ?>seller/load_customer/" + id,
                    data: id,
                    cache: false,
                    success: function (html) {
                        var res = html.split("||");
                        var res1 = res[0];
                        var res2 = res[1];
                        jQuery(".seller_email").val(res1);
                        jQuery(".seller_address").val(res2);
                    }
                });
            });
        });

    </script>
    <script type="text/javascript">
        function validate() {

            if (document.ClassSearch.buyer_company_name.value == "") {
                alert("Please enter a Seller Company Name ! First Create Business Profile ");
                document.ClassSearch.buyer_company_name.focus();
                return false;
            }
            if (document.ClassSearch.seller_email.value == "") {
                alert("Please enter a Buyer Email ! ");
                document.ClassSearch.seller_email.focus();
                return false;
            }
            if (document.forms.ClassSearch.seller_company_name.value == "-1") {
                alert("Please Select Buyer Company Name");
                return false;
            }
            return (true);
            if (document.ClassSearch.seller_address.value == "") {
                alert("Please enter a Buyer Email ! ");
                document.ClassSearch.seller_address.focus();
                return false;
            }

        }
    </script>
    <style>
        #preloader {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fefefe;
            z-index: 99;
            height: 100%;
        }

        #status {
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
        jQuery(window).load(function () {
            // will first fade out the loading animation
            jQuery("#status").fadeOut();
            // will fade out the whole DIV that covers the website.
            jQuery("#preloader").delay(1000).fadeOut("slow");
        })
    </script>
    <script>
       jQuery(function () {
            jQuery("#skills").autocomplete({
                source: '<?php echo site_url();?>seller/load_Sales_person'
            });
        });
    </script>

</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
<?php include('header.php'); ?>
<?php include('header_top.php'); ?>


<div id="page_content" style="margin-left: 0px;">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom" style="align : left">Update Order</h3>

        <div class="md-card uk-margin-large-bottom1">
            <a href="<?php echo site_url() ?>/manageplaceOrder">
            <button type="button" class="md-btn md-btn-primary"
                    style="float: right;position: relative;bottom: 40px;text-align: center;background-color: #28a745;color: white;">
                <b>Back</b></button>
            </a>
            
                    <div class="md-card">
                        <div class="md-card-content large-padding">
                            <?php if(!empty($_GET['message'])){ if($_GET['message'] == 'already') {
                                echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>You are already registered</div>';
                            } ?>
                            <?php if ($_GET['message'] == 1) {
                                echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>Added order Successfully......</div>';
                            } } ?>
                            <?php echo form_open(site_url('seller/update_orderplace'), array('id' => 'contactform', 'name' => 'contactform', 'onsubmit' => 'return validateentry();', 'class' => 'uk-form-stacked', 'enctype' => 'multipart/form-data')); ?>

                            <div class="row setup-content" id="step">
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-1">
                                        <?php
                                                                                  
                                        $order_product = $edit_order['order_product'];
                                        $order_detail = $edit_order['order'];
                                        $seltedpriciple = $order_detail['pid'];
                                       
                                        ?>
                                    
                                        <div class="uk-grid principal_sarea">
                                            

                                                <div class="uk-width-medium-1-2 hide principal_sname principal_sname"
                                                     style="text-align:right;padding-right: 0px;padding-left:0px">

                                                </div>
                                                <div class="uk-width-medium-1-2" style="padding-left:0px">
                                                    <?php echo '/00' . $edit_order['order']['principal_msg_id']; ?>
                                                </div>
                                            


                                        </div>

                                  
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1">
                                            <h4>Order Total : <?php echo $order_detail['total'] ?></h4>
                                            <?php if (!empty($edit_order['order']['totalusd'])) { ?> <h5>Order Total USD
                                                : <?php echo $order_detail['totalusd'] ?></h5> <?php } ?>
                                            <?php if (!empty($edit_order['order']['totaleur'])) { ?> <h5>Order Total EUR
                                                : <?php echo $order_detail['totaleur'] ?></h5> <?php } ?>

                                        </div>
                                    </div>

                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3">
                                           

                                            <input type="hidden" name="principal_id" id='list_principal2' value=""/>
                                            <input type="hidden" name="customers_principal_assigned"
                                                   id='customers_principal_assigned2' value=""/>
                                            <input type="hidden" name="principal_contacts" id='principal_contacts2'
                                                   value=""/>

                                            <input type="hidden" name="orderid"
                                                   value="<?php echo $order_detail['id']; ?>"/>
                                            <?php

                                            if (!empty($list_principal)) {
                                                echo "<select class='form-control' id='list_principal' onchange='getprinciple()' name='principal_id_old' ><option value=''>Please select </option>";
                                                foreach ($list_principal as $principal) {
                                                    ?>
                                                    <option <?php if ($seltedpriciple == $principal['Principal_id']) {
                                                        echo "selected='selected'";
                                                    } ?> value="<?php echo $principal['Principal_id']; ?>"><?php echo $principal['Principal_person']; ?></option>

                                                    <!--                                                        <label><input type="checkbox" name="pcheck[]" onclick="showprincipalcontact('<?php echo $principal['Principal_id'] ?>')"  class="pcheck"   id="mytable<?php echo $principal['Principal_id']; ?>" value="<?php echo $principal['Principal_id'] ?>"><?php echo $principal['Principal_person']; ?></label>-->

                                                    <?php
                                                }
                                                echo "</select>";
                                            }
                                            // echo '<pre>'; print_r($list_principal); echo '</pre>';
                                            ?>
                                        </div>
                                        <div class="uk-width-medium-1-3 principal_contactsarea">

                                            <div class="hide principal_contactsdiv">
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-3 assignedarea ">

                                            <div class="hide assigneddiv assigneddiv">

                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-1 customercontact ">

                                            <div class="hide customercontactdiv">

                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1 productarea ">

                                            <div class="productdiv">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                       
                                        <div class="uk-width-medium-1-5 productarea ">
                                            <div class="md-input-wrapper">
                                                <label for="fullname">Order no<span class="req">*</span></label>
                                                <input type="text" name="orderno" id="orderno" class="md-input"
                                                       value="<?php echo $edit_order['order']['order_no']; ?>" >
                                                <span class="md-input-bar"></span>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-5 productarea ">
                                            <div class="md-input-wrapper">
                                                <label for="fullname">Invoice no<span class="req">*</span></label>
                                                <input type="text" name="invoiceno" id="invoiceno" class="md-input"
                                                       value="<?php echo $edit_order['order']['invoice_no']; ?>"  >
                                                <span class="md-input-bar"></span>
                                            </div>
                                        </div>

                                        <div class="uk-width-medium-1-5 productarea ">
                                            <div class="md-input-wrapper">
                                                <div class="uk-placeholder">order delivery date</div>
                                                <div class="uk-form">
                                                    <input type="text" id="orderdate" name="orderdate"
                                                           data-uk-datepicker="{format:'YYYY-MM-DD'}"
                                                           value="<?php echo $edit_order['order']['orderdate']; ?>" class="md-input" >

                                                </div>

                                            </div>
                                        </div>

                                        <div class="uk-width-medium-1-5 productarea ">
                                            <div class="md-input-wrapper">
                                                <div class="uk-placeholder">order placement date</div>
                                                <div class="uk-form">
                                                    <input type="text" name="datecretaed"
                                                           value="<?php echo $edit_order['order']['datecretaed']; ?>"
                                                           data-uk-datepicker="{format:'YYYY-MM-DD'}" class="md-input"  required>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="uk-width-medium-1-5 productarea ">
                                            <div class="md-input-wrapper">
                                                <div class="uk-placeholder"><label for="fullname">payment expected
                                                        date </label></div>
                                                <div class="uk-form">
                                                    <!--<input type="text" name="datecretaed" value="<?php //echo date("Y-m-d"); ?>" required> -->
                                                    <input type="text" name="paymentexpecteddate"
                                                           data-uk-datepicker="{format:'YYYY-MM-DD'}" class="md-input" value="<?php echo $edit_order['order']['paymentexpecteddate']; ?>" required>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                

                                        <div class="  productarea ">

                                            <div id="reapeatshw" style="margin: 20px 0px 20px 0px;">
                                                <?php

                                                $orders_images = $this->db->query("select * from orders_images where order_id = '{$order_detail['id']}'")->result_array();
                                                if (!empty($orders_images)) {
                                                    $lllll = 1;
                                                    foreach ($orders_images as $ed) {
                                                        ?>
                                                        <div class="uk-grid imagess<?php echo $ed['id'] ?>"
                                                             data-uk-grid-margin="">
                                                            <?php $filename = explode('/', $ed['name']); ?>
                                                            <div class="uk-width-medium-1-2">
                                                               <img src="https://cdn2.iconfinder.com/data/icons/greenline/512/check-512.png" style="width:25px;"> Document <?php echo $lllll . " - " . $filename[count($filename) - 1]; ?></div>
                                                            <div class="uk-width-medium-1-5">
                                                                <a href="<?php echo base_url(); ?><?php echo $ed['name']; ?>"
                                                                   target="_blank">
                                                                    <?php
                                                                    $ext = explode('.', $filename[count($filename) - 1])[1];
                                                                    if ($ext == 'pdf')
                                                                        echo '<i class="fa fa-file-pdf-o" style="width:50px;font-size: 30px;"></i>';
                                                                    else if ($ext == 'doc')
                                                                        echo '<i class="fa fa-file-word-o" style="width:50px;font-size: 30px;"></i>';
                                                                    else if ($ext == 'txt')
                                                                        echo '<i class="fa fa-file-text-o" style="width:50px;font-size: 30px;"></i>';
                                                                    else if ($ext == 'png' || $ext == 'jpeg' || $ext == 'jpg' || $ext == 'gif' || $ext == 'bmp')
                                                                        echo '<i class="fa fa-file-image-o" style="width:50px;font-size: 30px;"></i>';
                                                                    else
                                                                        echo '<i class="fa fa-file-o" style="width:50px;font-size: 30px;"></i>';
                                                                    ?>
                                                                    <!--                                                                    <img style="width: 200px;" src="<?php // echo base_url();
                                                                    ?>images/<?php echo $ed['name']; ?>" />-->
                                                                </a>
                                                            </div>
                                                            <div class="uk-width-medium-1-5 ">
                                                                <a href="javascript:void(0)"
                                                                   onclick="deleteimage('<?php echo $ed['id'] ?>')"
                                                                   data-uk-tooltip="{pos:'bottom'}"><i
                                                                            class="material-icons"
                                                                            style="font-size:28px;color:#1976D2;">delete</i></a>
                                                            </div>
                                                        </div>
                                                        <?php

                                                        $lllll++;
                                                    }
                                                }
                                                ?>
                                            </div>
                                            </div>
                                   

                                        <div class="uk-grid productarea" id="reapeat1">

                                            <div class="uk-width-medium-1-3 ">
                                                <div style="background: #e6e6e6;padding: 5px;">
                                                    <input type="file" name="attachments[]" class="md-input"
                                                                   value="" multiple="multiple"/>
                                                </div>
                                            </div>

                                        </div>
                                                <div class="uk-grid productarea" >
                                                    <div class="uk-width-1-2">
                                                        <button type="button" class="md-btn md-btn-success"
                                                                onclick="add_more()" name="add">Add More
                                                        </button>
                                                    </div>

                                                </div>

                                           

                                    <div class="uk-grid ">
                                        <div class="uk-width-1-4 productarea ">
                                            <div class="md-input-wrapper">
                                                <h5>Remark</h5>
                                                <textarea rows="4" cols="50" class="md-input autosized"
                                                          name="remark"><?php echo $edit_order['order']['remark']; ?></textarea>
                                                <span class="md-input-bar"></span>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-4 productarea ">
                                           <div class="md-input-wrapper">
                                               <h5>INCO Terms</h5>
                                               <textarea rows="4" cols="50" name="inco_term" ><?php echo $edit_order['order']['inco_term']; ?></textarea>
                                               <span class="md-input-bar"></span>
                                           </div>
                                        </div>-->
                                        <div class="uk-width-1-4 productarea ">
                                            <div class="md-input-wrapper">
                                                <h5>Remark 2</h5>
                                                <textarea rows="4" cols="50" class="md-input autosized"
                                                          name="delivery_terms"><?php echo $edit_order['order']['delivery_terms']; ?></textarea>
                                                <span class="md-input-bar"></span>
                                            </div>
                                        </div>


                                        <div class="uk-width-1-4 productarea ">
                                            <div class="md-input-wrapper">
                                                <h5>Payment term</h5>
                                                <textarea rows="4" cols="50" class="md-input autosized"
                                                          name="payment_term"><?php echo $edit_order['order']['payment_term']; ?> </textarea>
                                                <span class="md-input-bar"></span>
                                            </div>
                                        </div>
                                        <div class="uk-width-1-4 productarea ">
                                            <div class="md-input-wrapper">
                                                <h5>Destination</h5>
                                                <textarea rows="4" cols="50" class="md-input autosized"
                                                          name="destination"><?php echo $edit_order['order']['destination']; ?></textarea>
                                                <span class="md-input-bar"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-5 productarea ">
                                            <div class="uk-grid">
                                                <div class="uk-width-1-2">
                                                    <button type="submit" class="md-btn md-btn-primary" name="submit"
                                                            onclick="return verify_upload()">Update
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                </div>
                            </div>


                        </div>


                        <?php echo form_close(); ?>

                    </div>
                
        </div>
    </div>
</div>
</div>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<script src="<?php echo base_url(); ?>assets/js/pages/forms_advanced.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

<!-- jquery steps -->
<script src="<?php echo base_url(); ?>assets/js/custom/wizard_steps.min.js"></script>
<!-- handlebars.js -->
<script src="<?php echo base_url(); ?>assets/bower_components/handlebars/handlebars.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom/handlebars_helpers.min.js"></script>

<!--  forms wizard functions -->
<script src="<?php echo base_url(); ?>assets/js/pages/forms_wizard.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/common.min.js"></script>
<!-- uikit functions -->
<script src="<?php echo base_url(); ?>assets/js/uikit_custom.min.js"></script>
<!-- altair common functions/helpers -->
<script src="<?php echo base_url(); ?>assets/js/altair_admin_common.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- htmleditor (codeMirror) -->
<script src="<?php echo base_url(); ?>assets/js/uikit_htmleditor_custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>

<script>
	<?php 
	
	unset($order_detail['remark']);
	unset($order_detail['delivery_terms']);
	unset($order_detail['payment_term']);
	unset($order_detail['destination']);

//$order_detail['delivery_terms'] =  $newvar;
	?>
var orderdetail = '<?=json_encode($order_detail)?>';
      orderdetail=  JSON.parse(orderdetail);
	
      
      var order_product='<?=json_encode($order_product)?>';
      order_product=  JSON.parse(order_product);

    function add_more() {
         var hml = '<div class="uk-width-medium-1-3"><div style="background: #e6e6e6;padding: 5px;    padding-top: 10px;"><input name="attachments[]" class="md-input" value="" type="file"></div><span class="md-input-bar"></span></div>';


        jQuery("#reapeat1").append(hml);
    }
</script>

<script>
    function generatetotal() {
        var selected = $('input:checkbox:checked.checkboxes').map(function () {
            return this.value;
        }).get();

        var ttotal = 0;
		
        for (var k = 0; k < selected.length; k++) {
            var pss = selected[k];
            var subprice = parseFloat($("#subprice" + pss).val());
			console.log(subprice);
            if (subprice > 0) {
            } else {
                subprice = 0
            }
            ttotal = parseFloat(ttotal + subprice);

        }
        $("#totalprice").val(ttotal);
    }

    function calc(id) {
        var qty = parseFloat($("#cunt" + id).val());
        var price = parseFloat($("#price" + id).val());
        var sub = parseFloat(qty * price);
        //$("#subprice"+id).val(sub);
        $("#subprice" + id).val(sub.toFixed(2));
        generatetotal();
    }

</script>


<script>
    function deleteimage(id) {

        var r = confirm("Are you Sure. you want to delete this Image");
        if (r == true) {
            jQuery.ajax({
                type: "get",
                url: '<?php echo site_url('ajax/deleteimage') ?>',
                data: {'id': id},
                // dataType: "json",
                success: function (data) {
                    $(".imagess" + id).remove();

                }
            });
        }


    }

    function showproducts() {
        var selectedprinipal = $('#list_principal').val();
        var customers_principal_assigned = $('#customers_principal_assigned').val();

        jQuery.ajax({
            type: "get",
            url: '<?php echo site_url('ajax/getproducts') ?>',
            data: {'pid': selectedprinipal, cid: customers_principal_assigned},
            // dataType: "json",
            success: function (data) {

                jQuery(".productdiv").html(data);
                var total = 0;
                for (var i = 0; i < order_product.length; i++) {
                    var op = order_product[i];
                      console.log(op.p_subtotal);
                    product_id = op.product_id;
                    p_quntity = op.p_quntity;
                    price = op.p_price;
                    poo = op.po;
                    p_subtotal = parseFloat(op.p_subtotal);

                    total = parseFloat(total + p_subtotal);
						console.log(total + p_subtotal);
                    $('#checkeddd' + product_id).prop('checked', true);
                    $("#cunt" + product_id).val(p_quntity);
                    $("#subprice" + product_id).val(p_subtotal);
                    $("#po" + product_id).val(poo);
                    $("#price" + product_id).val(price);

                    console.log(op);
                }
                $("#totalprice").val(total);
                $("#acceptmoney").val(orderdetail.acceptmoney);
                jQuery('#orderno,#invoiceno,#po_number').trigger('change');
                jQuery("#list_principal,#principal_contacts,#customers_principal_assigned").attr('disabled', true)


            }
        });
        jQuery.ajax({
            type: "get",
            url: '<?php echo site_url('ajax/customercontact') ?>',
            data: {'pid': selectedprinipal, cid: customers_principal_assigned},
            // dataType: "json",
            success: function (data) {
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

    function getprinciple() {
        var selected = $('#list_principal').val();
        jQuery.ajax({
            type: "get",
            url: '<?php echo site_url('ajax/getprincipalcontact') ?>',
            data: {'pid': selected},
            dataType: "json",
            success: function (data) {
                var datas = data.data;
                for (var k = 0; k < datas.length; k++) {
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

                    jQuery('#customers_principal_assigned').attr('name', 'customers_principal_assigned_old');
                    jQuery('#principal_contacts').attr('name', 'principal_contacts_old');


                }


            }
        });


    }

    function showprincipalcontact(pid) {

        var selected = $('input:checkbox:checked.pcheck').map(function () {
            return this.value;
        }).get();


        if (selected.length > 0) {


            jQuery.ajax({
                type: "get",
                url: '<?php echo site_url('ajax/getprincipalcontact') ?>',
                data: {'pid': selected},
                dataType: "json",
                success: function (data) {
                    var datas = data.data;
                    for (var k = 0; k < datas.length; k++) {
                        var p = datas[k].pid;
                        var principal_contactshtml = datas[k].principal_contactshtml;
                        var customers_principal_assigned_html = datas[k].customers_principal_assigned_html;

                        jQuery(".assigneddiv" + p).removeClass('hide');
                        jQuery(".principal_contactsdiv" + p).removeClass('hide');
                        jQuery(".principal_contacts" + p).html(principal_contactshtml);
                        jQuery(".assigned" + p).html(customers_principal_assigned_html)

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
        for (var k = 0; k < selected.length; k++) {

            var un = selected[k];
            jQuery(".assigneddiv" + un).addClass('hide');
            jQuery(".principal_contactsdiv" + un).addClass('hide');
            jQuery(".principal_contacts" + un).html('');
            jQuery(".assigned" + un).html('');
            console.log("uncheck" + un);

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
    $(document).ready(function () {
        getprinciple();
    });
	
	
// Table sort
function sortTable(){
    var rows = $('#caltbl > tbody').children('tr').get(); // creates a JS array of DOM elements
rows.sort(function(a, b) {  // use a custom sort function
    var anum = parseInt($(a).find(".sortnr").text(), 10);
    var bnum = parseInt($(b).find(".sortnr").text(), 10);
    return anum-bnum;
});
for (var i = 0; i < rows.length; i++) {  // .append() will move them for you
    $('#caltbl > tbody').append(rows[i]);
}
}
sortTable();
	
</script>
</body>
</html>