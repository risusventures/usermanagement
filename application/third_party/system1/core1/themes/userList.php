<?php
session_start();
$_SESSION['username'] = "Sakshi" // Must be already set
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd" >

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

<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]-->

</head>
<body>
<h1>Sakshi</h1>
<div id="main_container">

<a href="javascript:void(0)" onClick="javascript:chatWith('Alok')">Chat With Alok</a>
<a href="javascript:void(0)" onClick="javascript:chatWith('Ankit')">Chat With Ankit</a>
<!-- YOUR BODY HERE -->

</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/chat.js"></script>
</body>
</html>