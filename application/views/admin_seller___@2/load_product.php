<?php $page="manage_product"; ?>

<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title>Beoro Admin Template v1.1</title>
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <link rel="icon" type="image/ico" href="favicon.ico">
        
    <!-- common stylesheets-->
        <!-- bootstrap framework css -->
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap-responsive.min.css">
        <!-- iconSweet2 icon pack (16x16) -->
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/img/icsw2_16/icsw2_16.css">
        <!-- splashy icon pack -->
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/img/splashy/splashy.css">
        <!-- flag icons -->
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/img/flags/flags.css">
        <!-- power tooltips -->
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/lib/powertip/jquery.powertip.css">
        <!-- google web fonts -->
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Abel">
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300">

        <!-- enchanced select box, tag handler -->
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/lib/select2/select2.css">
        <!-- datepicker -->
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/lib/bootstrap-datepicker/css/datepicker.css"> 
        <!-- main stylesheet -->
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/beoro.css">
			<?php include('analytics.php');?> 
            <style type="text/css">
            .active{ background-color: #777;}
            </style>
    </head>
    <body> 
<div class="container">
    <div class="row-fluid">
  
    <div class="span10">
        <div class="w-box">
            
            <div class="w-box-content" id="category1" >
                <br>
                <?php foreach($records->result() as $row){
                $a = '<div class="row-fluid" >';
                $a.=    '<div class="span3" style="padding-left:10px;"><div class="fileupload fileupload-new span4" data-provides="fileupload" style="width:180px;"><div class="fileupload-new thumbnail" style="width: 150px; height: 120px;"><img src="'.base_url().'upload/'.$row->image.'"></div><div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div></div> </div>';
                $a.=    '<div class="span9">';
                $a.=        '<div class="row-fluid"><div class="span9"><label style="color:#0066FF;">'.$row->product_name.' | Item Code<b> : </b>acd123 | Last Modified date</p></label><br>';
                $a.=            '<p>Product (business), an item that ideally satisfies a markets </p><div class="w-box-header" style="background:#F7FAFB"><p style="color:black;">Product Category : Motors</p> </div></div>';
                $a.=            '<div class="span3" style="border-left:2px dotted;"><p style="margin-left:5px;"><input type="checkbox"> Mark As Hot</p><a href="'.base_url().'index.php/seller/edit_product_id/'.$row->id.'"> <p style="margin-left:5px;text-decoration:none;" ><i class="icsw16-pencil"></i>Edit</p></a><a href="'.base_url().'index.php/seller/delete_product_id/'.$row->id.'" onclick="return ConfirmDialog();" id="bb-confirm" class=""><p style="margin-left:5px;"><i class="icsw16-trashcan"></i>Delete</p></a></div>';
                $a.=        '</div>';
                $a.=    '</div>';
                $a.= '</div><hr>';
                echo $a;
             }
                ?>
            </div>
        </div>
    </div>
    </div>
</div>   
    <!-- footer --> 
        <footer style="position:fixed;bottom:0px;margin:10px;width:100px;">
            <div class="container">
                <div class="row">
                    <div class="span5">
                        <div>&copy; Your Company 2012</div>
                    </div>
                    <div class="span7">
                        <ul class="unstyled">
                            <li><a href="#">First link</a></li>
                            <li>&middot;</li>
                            <li><a href="#">Second link</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        
    <!-- Common JS -->
        <!-- jQuery framework -->
            <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <!-- bootstrap Framework plugins -->
            <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- top menu -->
            <script src="<?php echo base_url() ?>assets/js/jquery.fademenu.js"></script>
        <!-- top mobile menu -->
            <script src="<?php echo base_url() ?>assets/js/selectnav.min.js"></script>
        <!-- actual width/height of hidden DOM elements -->
            <script src="<?php echo base_url() ?>assets/js/jquery.actual.min.js"></script>
        <!-- jquery easing animations -->
            <script src="<?php echo base_url() ?>assets/js/jquery.easing.1.3.min.js"></script>
        <!-- power tooltips -->
            <script src="<?php echo base_url() ?>assets/js/lib/powertip/jquery.powertip-1.1.0.min.js"></script>
        <!-- date library -->
            <script src="<?php echo base_url() ?>assets/js/moment.min.js"></script>
        <!-- common functions -->
            <script src="<?php echo base_url() ?>assets/js/beoro_common.js"></script>

        <!-- jQuery validation -->
            <script src="<?php echo base_url() ?>assets/js/lib/jquery-validation/jquery.validate.min.js"></script>
        <!-- enchanced select box, tag handler -->
            <script src="<?php echo base_url() ?>assets/js/lib/select2/select2.min.js"></script>
        <!-- datepicker -->
            <script src="<?php echo base_url() ?>assets/js/lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <!-- WYSIWG Editor -->
            <script src="<?php echo base_url() ?>assets/js/lib/ckeditor/ckeditor.js"></script>
        <!-- textarea counter -->
            <script src="<?php echo base_url() ?>assets/js/lib/jquery-textarea-counter/jquery.textareaCounter.plugin.min.js"></script>

            <script src="<?php echo base_url() ?>assets/js/pages/beoro_form_validation.js"></script>
            <script src="<?php echo base_url() ?>assets/js/form/bootstrap-fileupload.min.js"></script>
            <script src="<?php echo base_url() ?>assets/js/form/bootstrap-fileupload.js"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>assets/js/lib/plupload/js/plupload.full.js"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>assets/js/lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.js"></script>
            <script src="<?php echo base_url() ?>assets/js/pages/beoro_notifications.js"></script>             
</body> 
</html>

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

<script type="text/javascript">
$(document).ready(function(){
$(".category").change(function()
{
  var id= $(this).val();
  $.ajax
  ({
   type: "GET",
   url: "<?php  echo base_url(); ?>index.php/seller/load_product/"+id,
   data: id,
   cache: false,
   success: function(res)
   {
   $("#category1").html(res);
   } 
  });
});
});



</script>


