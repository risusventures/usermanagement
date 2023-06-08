<?php
session_start();
    $user_email=print_r($user_email);
$_SESSION['username'] = "$user_email"; // Must be already set
?>
<html>
<head>
<title>Sample Chat Application</title>
<style>
body {
  background-color: #eeeeee;
  padding:0;
  margin:0 auto;
  font-family:"Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;
  font-size:11px;
}
</style>

<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/css/screen.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/screen_ie.css">
</head>
<body>
<div id="main_container">
    <table width="45%" cellspacing="1" cellpadding="2" class="tableContent" style="margin-left:0px !important;">
        <tbody>
          <tr style="background-color:#9EB0E9;  font-size:13px; font-weight:bold; color:#fff;">
            <th>Online</th>
            <th>User Id</th>
            <th>User Name</th>
          </tr>
                              
        <?php 

         foreach($records4 as $res)
        {   
        ?>
          <tr style="background-color:#efefef;">
            <td><?php if($res['online']==1) { echo 'Active'; } else { echo 'Inactive'; } ?></td>
            <td><?php echo $res['user_id']; ?></td>
            <td><a href="javascript:void(0)" onClick="javascript:chatWith('<?php echo $res['user_id'];?>');">
                  
                <?php echo $res['user_email']; ?>
                        </a>
                  </td>
            </tr>
            <?php   
                                         
    } // end if condition
        ?>          
            
        </tbody>
    </table>
<!-- YOUR BODY HERE -->

</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/chat.js"></script>

</body>
</html>