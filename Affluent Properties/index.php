<!DOCTYPE html>
<?php 
    ob_start();
    include 'includes/dbconnect.php'; 
?>

<html lang="en">
<head>
    <title>Affluent Properties</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/waypoints.css" rel="stylesheet">
    <script src="js/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="js/waypoints.js" type="text/javascript"></script>
    <script src="js/navshrink.js" type="text/javascript"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Great+Vibes|Pinyon+Script');
        @import url('https://fonts.googleapis.com/css?family=Oswald');
      
        body {
            font: 400 15px/1.8 'Lato', sans-serif;
            color: #777;
        }
        q
        li {
            font: 11px 'Lato', sans-serif;
            color: #777;
            line-height:11px;
        }
        
        h3, h4 {
            margin: 10px 0 30px 0;
            letter-spacing: 10px;      
            font-size: 20px;
            color: #111;
        }
        
        .container {
            padding: 80px 120px;
        }
        
        .person {
            border: 10px solid transparent;
            margin-bottom: 25px;
            width: 80%;
            height: 80%;
            opacity: 0.7;
        }
        
        
        .person:hover {
            border-color: #f1f1f1;
        }
        
        .carousel .item {
            height: 750px;
            background-color:#bbb;
            overflow:hidden;
        }
        
        .carousel-inner img {
            display: block;
            width: 100%; /* Set width to 100% */
            margin: auto;
            height: 500px;
            position: relative;
            line-height:1
        }

        .carousel-caption {
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
            bottom: inital;
        }
        
        .carousel-caption h3 {
            color: #fff !important;
            font-family: 'Great Vibes', cursive;
            color: ##222323;
            text-shadow: 2px 2px 25px #222;
            font-size: 500%;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }
        
        #searchForm {
            position:absolute;
            top:76%;
            max-width: 100%;
        }
        
        @media (max-width: 600px) {
            .carousel-caption {
                display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
            }
        }
        
        .bg-1 {
            background: #1a4b9b;
            color: #bdbdbd;
            align-content: center;
        }
        
        .bg-1 h3 {color: #fff;}
        .bg-1 p {font-style: italic;}
        .list-group-item:first-child {
            border-top-right-radius: 0;
            border-top-left-radius: 0;
        }
        
        .list-group-item:last-child {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        
        .thumbnail {
            padding: 0 0 15px 0;
            border: none;
            border-radius: 0;
            background-color: white;
            align-content: center;
        }
        
        .thumbnail p {
            margin-top: 10px;
            margin-bottom: 5px;
            color: #555;
        }
  
        .btn {
            padding: 10px 20px;
            background-color: #1a4b9b;
            color: #f1f1f1;
            border-radius: 0;
            transition: .2s;
        }
        
        .btn:hover, .btn:focus {
            border: 1px solid #1a4b9b;
            background-color: #fff;
            color: #000;
        }
        
        .modal-header, h4, .close {
            background-color: #333;
            color: #fff !important;
            text-align: center;
            font-size: 30px;
        }
        
        .modal-header, .modal-body {
            padding: 20px 50px;
        }
        
        .nav-tabs li a {
            color: #777;
        }
        
        .navbar {
            font-family: Montserrat, sans-serif;
            margin-bottom: 0;
            background-color: transparent;
            border: 0;
            font-size: 11px !important;
            letter-spacing: 4px;
            opacity: 0.9;
        }
        
        .navbar-fixed-top.scrolled {
            background-color: #fff !important;
            transition: background-color 200ms linear;
        }
        
        .navbar li a, .navbar .navbar-brand { 
            color: #d5d5d5 !important;
        }
        
        .navbar-nav li a:hover {
            color: #fff !important;
        }
        
        .navbar-nav li.active a {
            color: #fff !important;
            background-color: #1a4b9b !important;
            opacity: 0.7;
        }
        
        .navbar-default .navbar-toggle {
            border-color: transparent;
        }
        
        .open .dropdown-toggle {
            color: #fff;
            background-color: ##1a4b9b !important;
        }
        
        .dropdown-menu li a {
            color: #000 !important;
        }
        
        .dropdown-menu li a:hover {
            background-color: red !important;
        }
        
        footer {
            background-color: #1a4b9b;
            color: #f5f5f5;
            padding: 20px;
        }
        
        footer a {
            color: #f5f5f5;
        }
        
        footer a:hover {
            color: #777;
            text-decoration: none;
        }  
        
        .form-control {
            border-radius: 0;
        }
        
        textarea {
            resize: none;
        }
        
        .btn1{
            background-color: #1a4b9b;
            border: solid #1a4b9b;
            border-radius: 9px;
            font-family: 'Oswald', sans-serif;
            color: whitesmoke;
            font-size: 135%;
            text-decoration: none;
            text-transform: uppercase;
            padding: 10px 20px;
            transition: all 0.5s;
        }
        
        .btn1:hover {
            background-color: transparent;
            color: white;
            border: solid white;
        }
        
        .slideanim {visibility:hidden;}
    </style>
</head>
    
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header bg-white-transpare">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="#myPage"><img src="images/logo.png" width="30%" height="150%" href="index.php"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#myPage">HOME</a></li>
                    <li><a href="#tour">FOR RENT</a></li>
                    <li><a href="#sale">FOR SALE</a></li>
                    <li><a href="#contact">CONTACT</a></li>
                    <!-- JUST IN CASE
                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a href="#">Merchandise</a></li>
                    <li><a href="#">Extras</a></li>
                    <li><a href="#">Media</a></li> 
                    </ul>
                    </li>
                    -->
                </ul>
            </div>
        </div>
    </nav>
    
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>
        <form class="col-sm-12" id="searchForm">
            <div class="form-group col-sm-4 col-sm-offset-4">
                <div class="input-group input-group-lg center-block">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i>Search</span>
                </div>
            </div>
        </form>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="https://images.pexels.com/photos/273244/pexels-photo-273244.jpeg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb">
                <div class="carousel-caption">
                    <h3>Luxury Living At Its Finest</h3>
                    <p>Welcome to Affluent Properties Leasing and Sales</p>
                    <br>
                </div>      
            </div>
            <div class="item">
                <img src="https://lh3.googleusercontent.com/p/AF1QipN_iovMWRJs8JtsBAZdY7crCYcQEl70IwiMKPVW=s1600-w1200" alt="" width="1200" height="500">
                <div class="carousel-caption">
                    <h3>Quezon City</h3>
                    <p>Check out the available listings</p>
                    <a class="btn" href="properties.php?filter=quezon-city">More Information</a><br>
                </div>      
            </div>
            <div class="item">
                <img src="https://kmc.solutions/media/1098/ortigas.jpg" alt="" width="1200" height="500">
                <div class="carousel-caption">
                    <h3>Pasig City</h3>
                    <p>Take a look at the most luxurious properties in the eastern border of Metro Manila</p>
                    <?php echo "<a class='btn' href='properties.php?filter=pasig'>More Information</a><br>"; ?>
                </div>      
            </div>
            <div class="item">
                <img src="https://d2ile4x3f22snf.cloudfront.net/wp-content/uploads/sites/50/2017/05/19030530/Makati-City-Skyline.jpg" alt="" width="1200" height="200">
                <div class="carousel-caption">
                    <h3>Makati City</h3>
                    <p>Live at the most upscaled city in the  heart of Manila</p>
                    <a class="btn" href="properties.php?filter=makati">More Information</a><br>
                </div>      
            </div>
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Container (RENT Section) -->
    <div id="tour">
        <div class="container">
            <h3 class="text-center">FOR RENT</h3>
            <!-- 
            <p class="text-center">Lorem ipsum we'll play you some music.<br> Remember to book your tickets!</p>
            <ul class="list-group">
            <li class="list-group-item">September <span class="label label-danger">Sold Out!</span></li>
            <li class="list-group-item">October <span class="label label-danger">Sold Out!</span></li> 
            <li class="list-group-item">November <span class="badge">3</span></li> 
            </ul>
            -->
            <div class="row text-center">
                <div class="col-sm-12" style="background-color:transparent;">
                    <div class="col-sm-4 col-xs-12" style="max-height: 150px; min-height: 150px;">
                        <div class="thumbnail">
                            <img src="images/uploads/4 Bedroom House and Lot for Rent (Bel Air Village) 420SQM/thumbnail.jpg" alt="Palm Village" width="450" height="350">
                            <p><strong>4 Bedroom House and Lot for Rent (Bel Air Village) 420SQM</strong></p>
                            <p>₱220,000/mo.</p>
                            <a href="property_details.php?id=1"><button class="btn">More Details</button></a>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12" style="max-height: 150px; min-height: 150px;">
                    <div class="thumbnail">
                        <img src="images/uploads/5 Bedroom House and Lot for Rent (Dasmariñas Village) 640SQM/thumbnail.jpg" alt="Acropolis" width="450" height="350">
                        <p><strong>5 Bedroom House and Lot for Rent (Dasmariñas Village) 640SQM</strong></p>
                        <p>₱290,000/mo.</p>
                        <a href="property_details.php?id=11"><button class="btn">More Details</button></a>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="thumbnail">
                    <img src="images/uploads/3 Bedrooms House and Lot for Rent (Urdaneta Village) 1050SQM/thumbnail.jpg" alt="Magallanes" width="450" height="350">
                    <p><strong>3 Bedrooms House and Lot for Rent (Urdaneta Village) 1050SQM</strong></p>
                    <p>₱325,000/mo.</p>
                    <a href="property_details.php?id=2"><button class="btn">More Details</button></a>
                </div>
            </div>
        </div>
        <?php
            echo "<center><a href='/Affluent Property Database/properties.php?filter=all-rent'>";
            echo "<button class='btn'>View All &raquo;</button>";
            echo "</a></center>";
        ?>
            </div>
        </div>
    </div>
    <!-- Container (FOR SALE Section) -->
    <div id="sale" class="bg-1">
        <div class="container">
            <h3 class="text-center">FOR SALE</h3>
            <div class="row text-center">
                <div class="col-sm-4 col-xs-12">
                    <div class="thumbnail">
                        <img src="images/uploads/Buri Street, Ayala Alabang Village (Vacant Lot for Sale) 908SQM/thumbnail.jpg" width="450" style="min-height: 220px;max-height: 220px;">
                        <p><strong>	Buri Street, Ayala Alabang Village (Vacant Lot for Sale) 908SQM</strong></p>
                        <p>₱70,000,000</p>
                        <a href="property_details.php?id=13"><button class="btn">More Details</button></a>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="thumbnail">
                        <img src="images/uploads/4 Bedroom House and Lot for Sale (Magallanes, Makati) 850SQM/thumbnail.jpg" alt="" width="450" style="min-height: 220px;max-height: 220px;">
                        <p><strong>4 Bedroom House and Lot for Sale (Magallanes, Makati) 850SQM</strong></p>
                        <p>₱70,000,000</p>
                        <a href="property_details.php?id=14"><button class="btn">More Details</button></a>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="thumbnail">
                        <img src="images/uploads/4 Bedroom House and Lot for Sale Valle Verde 5 550SQM/thumbnail.jpg" style="min-height: 220px;max-height: 220px;">
                        <p><strong>4 Bedroom House and Lot for Sale Valle Verde 5 550SQM</strong></p>
                        <p>₱63,000,000</p>
                        <a href="property_details.php?id=15"><button class="btn">More Details</button></a>
                    </div>
                </div>
            </div>
            <?php
            	echo "<center><a href='/Affluent Property Database/properties.php?filter=all-sale'>";
            	echo "<button class='btn'>View All &raquo;</button>";
            	echo "</a></center>";
            ?>
        </div>
    </div>
    <!-- Container (Contact Section) -->
    <div id="contact" class="container">
        <h3 class="text-center">Contact Us</h3>
        <p class="text-center"><em>We are always here to assist you with all you real estate needs. Please give us a call, or fill out the form below. We look forward to be of service to you soon.</em></p>
        <div class="row">
            <div class="col-md-4">
                <p><b>Affluent Properties Leasing and Sales</b></p>
                <p><span class="glyphicon glyphicon-map-marker"></span>Fort Legend Tower, 3rd Ave. Corner 31st St., Bonifacio Global City, Taguig, 1630 Metro Manila</p>
                <p><span class="glyphicon glyphicon-phone"></span>Phone: (+63)917 840. 037</p>
                <p><span class="glyphicon glyphicon-envelope"></span> Email: inquiry@affluentproperties.ph</p>
            </div>
            <div class="col-md-8 ">
                <form method="POST" action="index.php">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                        </div>
                    </div>
                    <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <button class="btn pull-right" type="submit" name="send">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php include 'includes/checkContactsInput.php'; ?>
        </div>
  </div>
    
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.799628592955!2d121.04452921483967!3d14.553447989832511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9993fdef1dd%3A0xfd9b46bb8d7b1b87!2sAffluent+Properties+Leasing+and+Sales!5e0!3m2!1sen!2sph!4v1521605234153" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
<!-- <div id="googleMap">
</div>
<script>
function myMap() {
var myCenter = new google.maps.LatLng(41.878114, -87.629798);
var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker = new google.maps.Marker({position:myCenter});
marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
Add Google Maps -->

<!-- Footer -->
<footer class="text-center">
    <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a><br><br>
    <p>© 2018 | Affluent Properties Leasing and Sales</p> 
    </footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

</body>
</html>
