
<!doctype html>
<html>
    <head>
    <link rel="icon" type="image/ico" href="favicon.ico">   


    <link href="<?php echo base_url();?>assets/calculator/styles.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>assets/calculator/jquery-nightowl-1.2.css"/>        
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

    <script src="<?php echo base_url();?>assets/calculator/jquery-1.11.1.min.js"></script>        
</head>
<body class="light-bg home">
            <div class="main-content" >
                <div class="main-content-inner content-width">
                    <div class="column-container mid_container" style="float:right;">
                        <center><div class="column-one-qtr">
                            <div id="portfolio-blog-slider-container">
                                <!-- CALCULATOR -->
                               <center> <div class="night_owl"  style="color:white;" data-nightowl='{"drag":false, "subline":"Scientific Calculator", "title": "Finacbooks" }'></div></center>
                            </div>
                        </div>
                        </center>
    
                    </div>
                    

 

    <!-- LOAD NightOwl 1.2 -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/calculator/jquery-nightowl-1.2.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function(){
                $('div.night_owl, div.no_mini').NightOwl();
            });
            // WAIT FOR EVERYTHING TO LOAD
            $(window).load(function(){
                $('body').addClass('loaded').Chameleon({
                'current_item':'nightowl',
                'json_url':'../Envato/items.json'
            }); 
                $('#loader-wrapper .load_title').remove();
            });         
        </script>
</body></html>