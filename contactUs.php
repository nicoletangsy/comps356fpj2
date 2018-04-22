<?php
require_once("database.php");
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
   <![endif]-->
   <!--[if IE 7]>         
   <html class="no-js lt-ie9 lt-ie8">
      <![endif]-->
      <!--[if IE 8]>         
      <html class="no-js lt-ie9">
         <![endif]-->
         <!--[if gt IE 8]><!--> 
         <html class="no-js">
            <!--<![endif]-->
            <head>
               <meta charset="utf-8">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <title>Cellfish &mdash; Contact Us</title>
               <meta name="viewport" content="width=device-width, initial-scale=1">
               <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
               <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
               <meta name="author" content="FREEHTML5.CO" />
               <!-- Facebook and Twitter integration -->
               <meta property="og:title" content=""/>
               <meta property="og:image" content=""/>
               <meta property="og:url" content=""/>
               <meta property="og:site_name" content=""/>
               <meta property="og:description" content=""/>
               <meta name="twitter:title" content="" />
               <meta name="twitter:image" content="" />
               <meta name="twitter:url" content="" />
               <meta name="twitter:card" content="" />
               <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
               <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
               <link rel="stylesheet" href="css/styleForm.css">
               <link rel="shortcut icon" href="favicon.ico">
               <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic|Merriweather:300,400italic,300italic,400,700italic' rel='stylesheet' type='text/css'>
               <!-- Animate.css -->
               <link rel="stylesheet" href="css/animate.css">
               <!-- Icomoon Icon Fonts-->
               <link rel="stylesheet" href="css/icomoon.css">
               <!-- Simple Line Icons -->
               <link rel="stylesheet" href="css/simple-line-icons.css">
               <!-- Datetimepicker -->
               <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
               <!-- Flexslider -->
               <link rel="stylesheet" href="css/flexslider.css">
               <!-- Bootstrap  -->
               <link rel="stylesheet" href="css/bootstrap.css">
               <link rel="stylesheet" href="css/style.css">
               <link rel="stylesheet" href="css/index.css">
               <script src="js/index.js"></script>
               <!-- Modernizr JS -->
               <script src="js/modernizr-2.6.2.min.js"></script>
               <!-- FOR IE9 below -->
               <!--[if lt IE 9]>
               <script src="js/respond.min.js"></script>
               <![endif]-->
            </head>
            <body>
               <?php require ("navbar.php");?>
               <div style="background: #130d08 url(images/wood_1.png) repeat;">
                  <h1 style="margin-top: 0px;color:#E8F7EE;">Contact Form</h1>
                  <form class="cf" style="margin-bottom: 0px;" action="submitContact.php" method="post">
                     <div class="half left cf">
                        <input type="text" id="input-name" name="name" placeholder="Name">
                        <input type="email" id="input-email" name="email" placeholder="Email address">
                        <input type="text" id="input-subject" name="subject" placeholder="Subject">
                     </div>
                     <div class="half right cf">
                        <textarea name="message" type="text" id="input-message" placeholder="Message"></textarea>
                     </div>
                     <input type="submit" value="Submit" id="input-submit">
                  </form>
               </div>
               <div id="fh5co-footer">
                  <div class="container">
                     <div class="row row-padded">
                        <div class="col-md-12 text-center">
                           <p class="to-animate">&copy; 2017 Software engineering . <br> Designed by OU student
                           </p>
                           <p class="text-center to-animate"><a href="#" class="js-gotop">Go To Top</a></p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12 text-center">
                           <ul class="fh5co-social">
                              <li class="to-animate-2"><a href="#"><i class="icon-facebook"></i></a></li>
                              <li class="to-animate-2"><a href="#"><i class="icon-twitter"></i></a></li>
                              <li class="to-animate-2"><a href="#"><i class="icon-instagram"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- jQuery -->
               <script src="js/jquery.min.js"></script>
               <!-- jQuery Easing -->
               <script src="js/jquery.easing.1.3.js"></script>
               <!-- Bootstrap -->
               <script src="js/bootstrap.min.js"></script>
               <!-- Bootstrap DateTimePicker -->
               <script src="js/moment.js"></script>
               <script src="js/bootstrap-datetimepicker.min.js"></script>
               <!-- Waypoints -->
               <script src="js/jquery.waypoints.min.js"></script>
               <!-- Stellar Parallax -->
               <script src="js/jquery.stellar.min.js"></script>
               <!-- Flexslider -->
               <script src="js/jquery.flexslider-min.js"></script>
               <script>
                  $(function () {
                        $('#date').datetimepicker();
                    });
               </script>
               <!-- Main JS -->
               <script src="js/main.js"></script>
            </body>
         </html>