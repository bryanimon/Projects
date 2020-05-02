<!DOCTYPE html>
<!-- Fluid_DG_Slider is a responsive/liquid/fluid free jQuery slideshow | Dhiraj kumar (designer and developer) --> 
<html> 
<head> 
      <?php 
 session_start();
include('includes/dbconnect.php') ?>
  <?php       
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('?', $uri_path);

        $a = $_GET['link'];
        
        $sql = "SELECT * FROM properties WHERE id='$a'";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);
        $directory = explode('/', $row['image_directories']);
        $array_length = count($directory);
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" > 
    <title>Responsive_DG_Slider | a free jQuery slideshow by Dhiraj</title> 
    <meta name="description" content="Fluid_DG_Slider a free jQuery slideshow with many effects, transitions, adaptive layout, easy to customize, using canvas and mobile ready"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--////		Styles    /////////-->  
    <link rel='stylesheet' id='fluid_dg-css'  href='css/fluid_dg.css' type='text/css' media='all'> 
    <style>
		body {margin: 0; padding: 0; background:#111; color:#eee; font:14px "Trebuchet MS", Arial, Helvetica, sans-serif}
		a {color: #09f}
		a:hover {text-decoration: none}
		#back_to_fluid_dg {
			clear: both;
			display: block;
			height: 80px;
			line-height: 40px;
			padding: 20px;
		}
		.fluid_container {
			margin: 0 auto;
			width: 100%;
		}
		.fluid_dg_wrap .fluid_dg_pag .fluid_dg_pag_ul, h1{text-align:center}
	</style>

</head>
<body>
	<div id="back_to_fluid_dg">
    	<a href="http://www.css-jquery-design.com/2013/03/18/responsive-jquery-banner-slider-with-pagination-circles-responsive_dg_slider/">&larr; Back to the Responsive_DG_Slider project</a>
    </div><!-- #back_to_fluid_dg -->
    
	<div class="fluid_container">
        <?php
        echo="<h1>";
        echo $row['property_name']."<br>";
        echo $row['location'];`
        echo="</h1>";
        ?>
        
        <div class="fluid_dg_wrap fluid_dg_emboss pattern_1 fluid_dg_white_skin" id="fluid_dg_wrap_4">
            <?php
                for ($x = 0; $x < $array_length; $x++) {
                    echo "<div data-thumb='slides/thumbs/box_people.jpg' data-srsac='images/".$directory[$x]."'></div>";
                }  
            ?>
        </div><!-- #fluid_dg_wrap_3 -->
    </div><!-- .fluid_container -->
    
    <div style="clear:both; display:block; height:100px"></div>
    
    <!--//////////		Scripts    ////////////////--> 
    
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js'></script>
    <script type='text/javascript' src='Scripts/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='Scripts/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='Scripts/fluid_dg.min.js'></script> 
    
    <script>jQuery(document).ready(function(){
		jQuery(function(){			
			jQuery('#fluid_dg_wrap_1').fluid_dg({thumbnails: true,height:"25%"});
		}); })
	</script>
</body> 
</html>