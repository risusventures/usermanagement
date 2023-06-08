<!DOCTYPE html>
<html class="no-js">
    <head>
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/normalize.min.css">
                <button class="print-link" onClick="jQuery.print('#ele3')">  print File </button>
    </head>
    <body>
        <div id="content_holder">
		
            <div id="ele3" class="a">
         <table border="1" style="width:100%;">
        <tr><th style="text-align:center;">Name</th>
		<th style="text-align:center;">Profile</th>
		<th style="text-align:center;">Mobile</th>
		</tr>		 
	<tr>
	<td style="text-align:center;">Kunal</td>
	<td style="text-align:center;">Software</td>
	<td style="text-align:center;">98989898989</td>
	</tr>	 
          </table>    
         
             
            </div>
      
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
        window.jQuery || document.write('<script src="<?php echo base_url()?>assets/js/jquery-1.9.1.min.js"><\/script>')
        </script>
        <script src="<?php echo base_url()?>assets/js//jQuery.print.js"></script>
        <script type='text/javascript'>
                                    //<![CDATA[
                                    $(function() {
                                        $("#ele2").find('.print-link').on('click', function() {
                                            //Print ele2 with default options
                                            $.print("#ele2");
                                        });
                                        $("#ele4").find('button').on('click', function() {
                                            //Print ele4 with custom options
                                            $("#ele4").print({
                                                //Use Global styles
                                                globalStyles : false,
                                                //Add link with attrbute media=print
                                                mediaPrint :true,
                                                //Custom stylesheet
                                                stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
                                                //Print in a hidden iframe
                                                iframe : true,
                                                //Don't print this
                                                noPrintSelector : ".avoid-this",
                                                //Add this at top
                                                prepend : "Hello World!!!<br/>",
                                                //Add this on bottom
                                                append : "<br/>Buh Bye!"
                                            });
                                        });
                                        // Fork https://github.com/sathvikp/jQuery.print for the full list of options
                                    });
                                    //]]>
        </script>
    </body>
</html>
