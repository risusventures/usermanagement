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
   
    <script src="<?php echo base_url(); ?>assets/js/common.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/uikit_custom.min.js"></script>

  <title>Risus Ventures</title>
   
 
    <script>// makes sure the whole site is loaded
        jQuery(window).load(function () {
            // will first fade out the loading animation
            jQuery("#status").fadeOut();
            // will fade out the whole DIV that covers the website.
            jQuery("#preloader").delay(1000).fadeOut("slow");
        })
    </script>
	<style>
		td{
		padding:1px;
			    font-size: 13px;
		}
	
	</style>

</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
<?php include('header.php'); ?>
<?php include('header_top.php'); ?>


<div id="page_content" style="margin-left: 0px;">
	
    <div id="page_content_inner">
		
		<?php if($this->session->flashdata('message_name')){?>
		<b style="background: green;
    padding: 10px;
    color: white;"><?php echo $this->session->flashdata('message_name');?></b>
		<?php } ?>
			<?php echo form_open(site_url('seller/sendOrdermail'));?>
		<br>
		  <!-- <textarea id="wysiwyg_tinymce" cols="30" rows="20" name="maildata">-->
				 
   

    <div id="demo" class="invoice-box" style=" background: white;max-width: 850px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;">
		
		<?php 
                foreach ($list_order as $order) { 
                     $order_products = explode(';--order--;', $order['orders_products']);
            if($order['orderId']==$id) {?>
		<input type="hidden" name="uid" class="md-input label-fixed"
            value="<?php echo $order['customer_id']; ?>"
            data-parsley-id="4">
     

                            
                            <div style="background: white;">
                                MSG ID : &nbsp;&nbsp;<?php echo $order['principal_short_name'] . '/00' . $order['principal_msg_id'] //echo $order['order_no'];?><br>
								
								
                                Date : &nbsp;&nbsp;<?php 
								$dateaa=date_create($order['datecretaed']);
								echo date_format($dateaa,"d-M-Y"); ?><br><br>
                                <?php echo $order['Principal_person']; ?><br><br>
		</div>
                        
            
    
                            <div style="background: white;">
                                Dear <?php echo $order['name']; ?>,<br><br>
                                <?php echo $order['remark']; ?><br><br>
								<b><u>Customer</u></b> :
                &nbsp;&nbsp; <?php echo $order['customer_person']; ?>
                            </div><br>

			
			 <div style="background:white;"><b><u>Product Details</u></b></div><br>

                    <table style="background:white;    max-width: 300px;
    width: 100%;
" border="2" class="prodct">
        
			<?php 
            if (!empty($order_products)) {
			?>
            <tr class="heading" style="    font-weight: 700;">
                <td>
                    Product Name
                </td>
                
                <td>
                    Quantity (kg)
                </td>
				<td>
					PO Number
				</td>
            </tr>
			<?php 
            foreach ($order_products as $order_product) {
                    $order_product = explode('--info--', $order_product);
			?>
            <tr class="details" >
                <td>
                    <?php echo $order_product[3]; ?>
                </td>
                
                <td>
                    <?php echo $order_product[4]; ?>
                </td>
				<td>
					<?php echo $order_product[8]; ?>
				</td>
            </tr>
            <?php }
                }
                ?>
						 </table>
               <br>

                            <div style="background: white;">
                                <b><u>Shipment</u></b> :
        &nbsp;&nbsp;<?php $shipment_date = $order['orderdate'];
        echo date("d-M-Y", strtotime($shipment_date)); ?><br>
                                <b><u>Payment terms</u>
        </b>&nbsp;&nbsp; <?php echo $order['payment_term']; ?><br>
								<b><u>Destination</u></b> :
        &nbsp;&nbsp;<?php echo $order['destination']; ?><br>
								
								<?php echo $order['delivery_terms']; ?>
                            </div>
                            
                            
            
		<?php } }
?>
    </div><br>
		<center><b onclick="copy('demo')" style="background: #4c9ca0;
    padding: 10px;color:white;cursor: pointer;">Copy Keeping Format</b></center>
            <!--</textarea><br><br>-->
		
		<!--<center><div style="background-color: white;width: 50%;margin-top: 10px;text-align: left;padding: 10px;box-shadow: -7px 10px 32px 1px;">
		<b>To,</b> <input type="email" name="to_email" id="to_email" class="md-input label-fixed" />
		<input type="hidden" name="oid" value="<?php echo $id;?>" />
		<button type="submit" class="md-btn md-btn-primary"
                    style="float: right;position: relative;bottom: 40px;text-align: center;background-color: #28a745;color: white;">
                <b>Send Mail</b></button> 	
		</div></center>-->
		</form>
        <div class="md-card uk-margin-large-bottom1"  style="display:none">
            <a href="<?php echo site_url(); ?>sendOrdermail/<?php echo $id;?>">
            <button type="button" class="md-btn md-btn-primary"
                    style="float: right;position: relative;bottom: 40px;text-align: center;background-color: #28a745;color: white;">
                <b>Send Mail</b></button>
            </a>
            <div class="md-card-content">
                <?php 
                foreach ($list_order as $order) { 
                     $order_products = explode(';--order--;', $order['orders_products']);
            if($order['orderId']==$id) {?>
            <input type="hidden" name="uid" class="md-input label-fixed"
            value="<?php echo $order['customer_id']; ?>"
            data-parsley-id="4">
           
                   
                            <div class="uk-grid " data-uk-grid-margin="">
                                <div class="uk-width-medium-1-2">
                                    <div class="parsley-row">
                                        <div class="md-input-wrapper md-input-filled"
                                        style="height: 20px;">
											<?php if($order['principal_short_name']!=0){ ?>
											<b>MSG ID : &nbsp;&nbsp;<?php echo $order['principal_short_name'] . '/00' . $order['orderId'] //echo $order['order_no'];?></b>
											<?php }else{?>
											
												<b>MSG ID : &nbsp;&nbsp;<?php echo $order['principal_short_name'] . '/00' .$order['order_no'];?></b>			
											<?php } ?>
										
										</div>
                                    </div>
                                </div>

                            </div>
                            <div class="uk-grid " data-uk-grid-margin=""
                            style="margin-top: 0px;">
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"
                                    style="height: 20px;"><b>Date : &nbsp;&nbsp;<?php echo date(" d-M-Y ") ?></b></div>
                                </div>
                            </div>
                        </div>


                        <div class="uk-grid " data-uk-grid-margin=""
                        style="margin-top: 0px;">
                        <div class="uk-width-medium-1-1">
                            <div class="parsley-row">
                                <div class="md-input-wrapper md-input-filled"
                                style="height: 20px;"><b><?php echo $order['Principal_person']; ?></b></div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="uk-grid ">
                    <div class="uk-width-medium-1-1">
                        <div class="parsley-row">
                            <div class="md-input-wrapper md-input-filled"
                            style="height: 20px;">
                            Dear <?php echo $order['name']; ?>,
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-grid " >
            <div class="uk-width-medium-1-1">
                <div class="parsley-row">
                    <div class="md-input-wrapper md-input-filled"
                    style="height: 20px;line-height: 1.6;margin-top: 16px;"><?php echo $order['remark']; ?></div>
                </div>
            </div>
        </div>
        <br>
        <div class="uk-grid " >
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <div class="md-input-wrapper md-input-filled"
                style="height: 20px;"><b>Customer</b> :
                &nbsp;&nbsp; <?php echo $order['customer_person']; ?>
            </div>
        </div>
    </div>
</div>

<div class="uk-grid " >
<div class="uk-width-medium-1-1">
    <div class="parsley-row">
        <div class="md-input-wrapper md-input-filled">
            <b>Product Details</b>
            <?php 
            if (!empty($order_products)) {
                echo '<table style="text-align: center" border="1"><thead><tr style="border-bottom: 1px solid #d0c9c9;"><th>Product Name</th><th ">Quantity</th><th>PO Number</th></tr></thead><tbody>';
                foreach ($order_products as $order_product) {
                    $order_product = explode('--info--', $order_product);
                    echo '<tr><td>' . $order_product[3] . '</td><td>' . $order_product[4] . '</td><td>' . $order_product[8] . '</td></tr>'; ?>
                    <?php }
                    echo '</tbody></table>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="uk-grid ">
<div class="uk-width-medium-1-1">
    <div class="parsley-row">
        <div class="md-input-wrapper md-input-filled"
        style="height: 20px;"><b>Shipment</b> :
        &nbsp;&nbsp;<?php $shipment_date = $order['orderdate'];
        echo date("d-m-Y", strtotime($shipment_date)); ?>
    </div>
</div>
</div>
</div>
<div class="uk-grid ">
<div class="uk-width-medium-1-1">
    <div class="parsley-row">
        <div class="md-input-wrapper md-input-filled"
        style="height: 20px;"><b>Payment
        terms</b> :
        &nbsp;&nbsp; <?php echo $order['payment_term']; ?>
    </div>
</div>
</div>
</div>
<div class="uk-grid " >
<div class="uk-width-medium-1-1">
    <div class="parsley-row">
        <div class="md-input-wrapper md-input-filled"
        style="height: 20px;">
        <b>Destination</b> :
        &nbsp;&nbsp;<?php echo $order['destination']; ?>
    </div>
</div>
</div>
</div>
<div class="uk-grid ">
<div class="uk-width-medium-1-1">
    <div class="parsley-row">
        <div class="md-input-wrapper md-input-filled"
        style="height: 20px;"><?php echo $order['delivery_terms']; ?></div>
    </div>
</div>
</div>


<?php } }
?>

            </div>
        </div>
    </div>
</div>
</div>

<!-- uikit functions -->
<script src="<?php echo base_url(); ?>assets/js/uikit_custom.min.js"></script>
<!-- altair common functions/helpers -->
<script src="<?php echo base_url(); ?>assets/js/altair_admin_common.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- htmleditor (codeMirror) -->
<script src="<?php echo base_url(); ?>assets/js/uikit_htmleditor_custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/forms_advanced.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

<!-- jquery steps -->

<!-- handlebars.js -->
<script src="<?php echo base_url(); ?>assets/bower_components/handlebars/handlebars.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom/handlebars_helpers.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/common.min.js"></script>
<!-- uikit functions -->
<script src="<?php echo base_url(); ?>assets/js/uikit_custom.min.js"></script>
<!-- altair common functions/helpers -->
<script src="<?php echo base_url(); ?>assets/js/altair_admin_common.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
  <script src="http://altair_html.tzdthemes.com/file_manager/js/extras/tinymceElfinder.js"></script>

 <script src="http://altair_html.tzdthemes.com/bower_components/tinymce/tinymce.min.js"></script>

    <!--  wysiwyg editors functions -->
    <script src="http://altair_html.tzdthemes.com/assets/js/pages/forms_wysiwyg.min.js"></script>
<script>
	function copy(element_id){
  var aux = document.createElement("div");
  aux.setAttribute("contentEditable", true);
  aux.innerHTML = document.getElementById(element_id).innerHTML;
  aux.setAttribute("onfocus", "document.execCommand('selectAll',false,null)"); 
  document.body.appendChild(aux);
  aux.focus();
  document.execCommand("copy");
  document.body.removeChild(aux);
}
</script>

</body>
</html>