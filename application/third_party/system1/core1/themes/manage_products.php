<?php $pages='manage_products'; ?>
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
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 	<?php include('analytics.php');?> 
<script>
    $(document).ready(function(){
        getcountry(0);
        $("#load_more").click(function(e){
            e.preventDefault();
            var page = $(this).data('val');
            getcountry(page);
 
        });
 
    });
 
    var getcountry = function(page){
        $("#loader").show();
        $.ajax({
            url:"<?php echo base_url() ?>seller/getProduct",
            type:'GET',
            data: {page:page}
        }).done(function(response){
            $("#ajax_table").append(response);
            $("#loader").hide();
            $('#load_more').data('val', ($('#load_more').data('val')+1));
            scroll();
        });
    };
 
    var scroll  = function(){
        $('html, body').animate({
            scrollTop: $('#load_more').offset().top
        }, 1000);
    };
 
 
</script>
    <script type="text/javascript">

$(document).ready(function(){
$(".category").change(function(){
  var id= $(this).val();
  $.ajax
  ({
   type: "GET",
   url: "<?php echo base_url(); ?>seller/load_product/"+id,
   data: id,
   cache: false,
   success: function(html)
   {
    alert(html);
   $("#category1").html(html);
   } 
  });
});
});

</script>
    <script src="<?php echo base_url() ?>assets/js/custom/uikit_fileinput.min.js"></script>
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
    <?php include('header.php');?>
    <?php include('header_top.php');?>
    <div id="page_content" style="margin-left:0px;" >
        <div id="page_content_inner" >
              <div><h3 class="heading_a uk-margin-bottom">Manage products</h3><p> <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-3">
                                <div class="parsley-row">
                                 
                                </div>
                            </div>
                </div></p></div>
            <ul id="products_sort" class="uk-subnav uk-subnav-pill">
                <li data-uk-sort="product-name:asc"><a href="#">Ascending</a></li>
                <li data-uk-sort="product-name:desc"><a href="#">Descending</a></li>
            </ul>
                 <?php 
           if($_GET['message']==1){ echo '<div class="uk-alert uk-alert-info" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>
                           Your Record Update Successfully....
                            </div>';}?>  
              <?php $message=$_GET['delete'];
           if($message){ echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>
                             Your  Product Deleted Successfully....
                            </div>';}?>                
            <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-6 hierarchical_show" data-uk-grid="{gutter: 20, controls: '#products_sort'}">
               <?php foreach($records as $row){?>

                <div data-product-name="A est similique.">
                    <div class="md-card md-card-hover-img">
                        <div class="md-card-head uk-text-center uk-position-relative">
                            <img class="md-card-head-img" src="<?php echo base_url();?>upload/<?php echo $row['image'];?>"  style="padding:10px;"alt=""/>
                        </div>
                        <div class="md-card-content">
                            <h4 class="heading_c uk-margin-bottom">
                         <a style="text-transform:capitalize">  <?php echo $row['product_name'];?></a>
                                <span class="   sub-heading" style=""><strong>Rs.</strong><span><?php echo $row['price'];?></span><strong>/</strong><?php echo $row['per'];?></span>
                            </h4>
                            <p></p>
                           <a href="<?php echo site_url()?>viewProducts/<?php echo $row['id'];?>"> <button class="md-btn" data-uk-modal="{target:'#modal_large'}">Read More</button></a> <div class="md-card-head-menu" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="false">
                                <i class="md-icon material-icons"></i>
                                <div class="uk-dropdown uk-dropdown-small uk-dropdown-bottom" style="min-width: 160px; top: 32px; left: -128px;">
                                    <ul class="uk-nav">
                                        <li><a href="<?php echo base_url()?>editProduct/<?php echo $row['id'];?>">Edit</a></li>
                                        <li><a href="<?php echo base_url()?>seller/delete_product_id/<?php echo $row['id'];?>" onclick="return ConfirmDialog()">Remove</a></li>
                                    </ul>
                                </div>
                            </div>
                  
                        </div>
                    </div>
                </div>                  
            <?php }?>
            </div><br><br> 
        </div>
        </div>    
    </div>

    <!-- google web fonts -->

    <!-- common functions -->
    <script src="<?php echo base_url()?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url()?>assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url()?>assets/js/altair_admin_common.min.js"></script>
    <!-- parsley (validation) -->
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


    <script type="text/javascript">
  function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
}
</script>



</body>
</html>