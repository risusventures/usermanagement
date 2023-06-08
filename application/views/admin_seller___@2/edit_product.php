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
    <link rel="stylesheet" href="<?php echo base_url()?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.min.css" media="all">
        <script src="<?php echo base_url()?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url()?>assets/js/uikit_custom.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/pages/forms_file_upload.min.js"></script>
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
	<?php include('analytics.php');?> 
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
   <?php include('header.php');?>
   <?php include('header_top.php');?>
    <div id="page_content" style="margin-left:0px;">
    <div id="page_content_inner">
    <h3 class="heading_b uk-margin-bottom">Edit Product</h3>
    <div class="md-card">
    <div class="md-card-content large-padding">
      <?php foreach ($results->result() as $row){ ?>
	<?php echo form_open(base_url('Seller/update_product_id'),array('id'=>'contactname','name'=>'contactname','class'=>'uk-form-stacked','onsubmit'=>'return validateentry();','enctype'=>'multipart/form-data' ));?>
    <input tye="text" name="uid" value ="<?php echo $row->id;?>" hidden>
    <div  class="uk-grid" data-uk-grid-margin style="float:left;">
    <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }" style="padding-right:10px;">
    <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
    <div class="fileinput-new thumbnail">
        <img src="<?php echo base_url()?>upload/<?php echo $row->image;?>" alt="user avatar" style="background-image:none"/>
            </div>
                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <p>Upload Image</p>
                                <div class="user_avatar_controls">
                                        <span class="btn-file">
                                            <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                            <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                            <input type="file" name="image" id="user_edit_avatar_control" onchange="" value="<?php echo $row->image;?>">
                                </span>
                                <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
                                    </div>
                                </div>
                            </div></div>  
                        <div class="uk-grid " data-uk-grid-margin>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                    <label for="fullname">Enter Product Name<span class="req">*</span></label>
                                    <input type="text" name="product_name"  class="md-input" value="<?php echo $row->product_name;?>"/>
                                </div>
                            </div>
                                <div class="uk-width-medium-1-6">
                                <div class="parsley-row">
                                    <label for="fullname">Enter Price<span class="req">*</span></label>
                                    <input type="Number" name="price" class="md-input"  value="<?php echo $row->price;?>"/>
                                </div>
                            </div>
                               
                            <div class="uk-width-large-1-6 uk-width-medium-1-2">
                            <div class="uk-input-group">
                                <span class="uk-input-group-addon" style="padding: 0 5px;">Per</span>
                                <div >
                            <select id="val_select" required data-md-selectize name="quanty" value="<?php echo $row->per;?>">
                                         <option value="0">Select</option>
                                         <option value="Aunnum">Annum</option>
                                         <option value="Bag">Bag</option>
                                         <option value="Barrel">Barrel</option>
                                         <option value="Bottle">Bottle</option>
                                         <option value="Box">Box</option>
                                         <option value="Bushel">Bushel</option>
                                         <option value="Cubic feet">Cubic Feet</option>
                                         <option value="Foot">Foot</option>
                                         <option value="Square Feet">Square Feet</option>
                                         <option value="Gallon">Gallon</option>
                                         <option value="Gram">Gram</option>
                                         <option value="Hectare">Hectare</option>
                                         <option value="Hour">Hour</option>
                                         <option value="Inch">Inch</option>
                                         <option value="kilogram">Kilogram</option>
                                         <option value="kilometer">Kilometer</option>
                                         <option value="kilowatt">Kilowatt</option>
                                         <option value="Litre">Litre</option>
                                         <option value="Long Tone">Long Tone</option>
                                         <option value="Cubic Meter">Cubic Meter</option>
                                         <option value="Megawatts">Megawatts</option>
                                         <option value="Meter">Meter</option>
                                         <option value="Millimeter">Millimeter</option>
                                         <option value="Ounce">Ounce</option>
                                         <option value="Pack">Pack</option>
                                         <option value="Packet">packet</option>
                                         <option value="pair">Pair</option>
                                         <option value="Piece">Piece</option>
                                         <option value="Plate">plate</option>
                                         <option value="Ream">Ream</option>
                                         <option value="Roll">Roll</option>
                                         <option value="Unit">Unit</option>
                                         <option value="Watt">Watt</option>
                                    </select>
                                </div>  
                            </div>
                        </div>
                <div class="uk-width-medium-1-3" id="abc" style="display:none">
                <div class="uk-input-group">
                <div class="parsley-row" style="">
                <label for="fullname">Enter Category<span class="req">*</span></label>
                <input type="text" name="other_category"  class="md-input" style="" />                            
                </div>       
<span class="uk-input-group-addon" style="padding:0px;">
<p id="back"onClick="showDiv2()" style="display:none;"><i class="material-icons" style="font-size: 30px;color: rgb(25, 118, 210);padding-bottom: 5px;">&#xE14A;</i></p>
            </span>
         </div>
    </div> <div class="uk-width-medium-1-3" id="fldNum">
                <div class="uk-input-group" style="width:100%;">
                <div class="parsley-row">
                     <select id="val_select"  data-md-selectize name="product_group" placeholder="Select Category">
                                        <option value="-1">Select Category</option>
                                        <?php foreach ($records1 as $row1) {
                                        if($records1['cat_id'] == $row1->ci_id){
                                              echo  "<option value='".$row1->ci_id."' selected='selected'>".$row1->product_category."</option>";
                                        }else {
                                              echo  "<option value='".$row1->ci_id."'>".$row1->product_category."</option>";
                                            } } ?>   
                                    </select>
                                </div>      
                            </div>
                        </div>
                        </div>

                       <div class="uk-grid" data-uk-grid-margin>   
                  <div class="uk-width-1-1">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-wrapper-success"><label for="message">Description</label><textarea  style="overflow-x: hidden;  height: 21px;" class="md-input autosize_init md-input-success" name="description" cols="10" rows="8"  style="height:auto;" ><?php echo $row->producty_description;?></textarea><span class="md-input-bar"></span></div>
                                    
                                <div id="parsley-id-32" class="parsley-errors-list"></div></div>
                            </div>
                            
      
                     </div>
                         <br>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <button type="submit" class="md-btn md-btn-primary"  onClick="return ConfirmDialog()">Submit</button>
                            </div>
                        </div>

                    <?php echo form_close();?>
                    <?php }?>
                </div>
        </div>
    </div>
             <div id="preloader">
 <div id="status"></div>
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
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url()?>assets/js/altair_admin_common.min.js"></script>
    <script>
    // load parsley config (altair_admin_common.js)
    altair_forms.parsley_validation_config();
    </script>
    <script src="<?php echo base_url()?>assets/bower_components/parsleyjs/dist/parsley.min.js"></script>

    <!--  forms validation functions -->
    <script src="<?php echo base_url()?>assets/js/pages/forms_validation.min.js"></script>
    
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

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-65191727-1', 'auto');
        ga('send', 'pageview');
    </script>

   

      <script src="<?php echo base_url()?>assets/js/pages/forms_file_upload.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/common.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/uikit_custom.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/custom/uikit_fileinput.min.js"></script>

   
    
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
function validateentry(){
if(document.forms.contactform.product_group.value == "-1" ){
   alert( "Please provide your product category!" );
   return false;
  }return( true );
}
</script>

<script type="text/javascript">
function ConfirmDialog() {
  var x=confirm("Are you sure to Update record?")
  if (x) {
    return true;
  } else {
    return false;
  }
}


</script>

</body>
</html>

