<?php
	session_start();
	if(!$_SESSION['admin']){
		header('Location: login.html');
	}


?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cellfish &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
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
	<link rel="shortcut icon" href="../favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic|Merriweather:300,400italic,300italic,400,700italic' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="../css/simple-line-icons.css">
	<!-- Datetimepicker -->
	<link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="../css/flexslider.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">

	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/index.css">
    <script src="../js/index.js"></script>
	<script src="../js/modernizr-2.6.2.min.js"></script>


	</head>
	<style type="text/css">
.form-style-3{
    max-width: 100%;
    font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
.form-style-3 label{
    display:block;
    margin-bottom: 10px;
}
.form-style-3 label > span{
    float: left;
    width: 100px;
    color: #F072A9;
    font-weight: bold;
    font-size: 13px;
    text-shadow: 1px 1px 1px #fff;
}
.form-style-3 fieldset{
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    margin: 0px 0px 10px 0px;
    border: 1px solid #FFD2D2;
    padding: 20px;
    background: #FFF4F4;
    box-shadow: inset 0px 0px 15px #FFE5E5;
    -moz-box-shadow: inset 0px 0px 15px #FFE5E5;
    -webkit-box-shadow: inset 0px 0px 15px #FFE5E5;
}
.form-style-3 fieldset legend{
    color: #FFA0C9;
    border-top: 1px solid #FFD2D2;
    border-left: 1px solid #FFD2D2;
    border-right: 1px solid #FFD2D2;
    border-radius: 5px 5px 0px 0px;
    -webkit-border-radius: 5px 5px 0px 0px;
    -moz-border-radius: 5px 5px 0px 0px;
    background: #FFF4F4;
    padding: 0px 8px 3px 8px;
    box-shadow: -0px -1px 2px #F1F1F1;
    -moz-box-shadow:-0px -1px 2px #F1F1F1;
    -webkit-box-shadow:-0px -1px 2px #F1F1F1;
    font-weight: normal;
    font-size: 18px;
}

.form-style-3 input[type=text],
.form-style-3 input[type=date],
.form-style-3 input[type=datetime],
.form-style-3 input[type=number],
.form-style-3 input[type=search],
.form-style-3 input[type=time],
.form-style-3 input[type=url],
.form-style-3 input[type=email],
.form-style-3 select, 
.form-style-3 textarea{
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border: 1px solid #FFC2DC;
    outline: none;
    color: #F072A9;
    padding: 5px 8px 5px 8px;
    box-shadow: inset 1px 1px 4px #FFD5E7;
    -moz-box-shadow: inset 1px 1px 4px #FFD5E7;
    -webkit-box-shadow: inset 1px 1px 4px #FFD5E7;
    background: #FFEFF6;
}
.form-style-3 textarea{
	width:70%;
}
.form-style-3  input[type=submit],
.form-style-3  input[type=reset],
.form-style-3  input[type=button]{
    background: #EB3B88;
    border: 1px solid #C94A81;
    padding: 5px 15px 5px 15px;
    color: #FFCBE2;
    box-shadow: inset -1px -1px 3px #FF62A7;
    -moz-box-shadow: inset -1px -1px 3px #FF62A7;
    -webkit-box-shadow: inset -1px -1px 3px #FF62A7;
    border-radius: 3px;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;    
    font-weight: bold;
    float:right;
}
.required{
    color:red;
    font-weight:normal;
}
.aaa{
	    height:250px;
}
</style>

	<body>


		
		 <div id="fh5co-featured" data-section="features">
			<div class="container">
			    <a href="post.php?"><input type="submit" class="am-btn am-btn-secondary" value="Back"></a>
				<div class="row text-left ">
					<div class="col-md-8 col-md-offset-2">
						<div class="form-style-3">
						<fieldset>
							<fieldset>
							<legend>Post Details</legend>
					    <form onsubmit="return up()" action="InCheck.php" method="POST" enctype="multipart/form-data">
                        <label for="Id"><span>Id <span class="required">*</span></span><input type="text" class="input-field" name="Id" value="" /></label>
                        <label for="Title"><span>Title <span class="required">*</span></span><textarea name="Title" class="textarea-field "></textarea></label>
						<label for="Content"><span>Content <span class="required">*</span></span><textarea  name="Content" class="textarea-field aaa" style="height=250px"></textarea></label>
						<label for="Introduction"><span>Introduction <span class="required">*</span></span><textarea name="Introduction" class="textarea-field"></textarea></label>
                   		   </fieldset> 
                   		  
					
                   		   
					<br><fieldset>	<label for="likeNo"><span>likeNo <span class="required">*</span></span><input type="text" class="input-field" name="likeNo" value="" /></label>
						<label for="DateTime"><span>DateTime <span class="required">*</span></span><input type="text" class="input-field" name="DateTime" value="" /></label>
						<label for="type"><span>type <span class="required">*</span></span><input type="text" class="input-field" name="type" value="" /></label>
         
					<br><br>
					
								    
			                     
			                     <label for="Image"><span>Image <span class="required">*</span></span><img  src="data:image/png;base64" class="img-responsive" width="524" height="350">
										    </figure><input type="file" onchange="change()" name="Image" /> </label>
										    </fieldset><input type="submit" class="am-btn am-btn-secondary" value="Insert"/> <input type="Reset" class="am-btn am-btn-secondary" value="Reset"/>
			                      </div>
			                      
			                      </form>
			                      
			                      
			                     
			   
						</div>
					</div>

				</div>
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



		<script>
			   function change(){
	   	  var preview = document.querySelector('img');
			  var file    = document.querySelector('input[type=file]').files[0];
			  var reader  = new FileReader();
			
			  reader.onloadend = function () {
			    preview.src = reader.result;
			  }
			
			  if (file) {
			    reader.readAsDataURL(file);
			  } else {
			    preview.src = "";
			  }
	   }
		function up(){
		    return confirm('Are are sure?');
		}
	   function del(){
	       confirm("Are are sure?");
	   }
	</script>
	
	
	
	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Bootstrap DateTimePicker -->
	<script src="../js/moment.js"></script>
	<script src="../js/bootstrap-datetimepicker.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="../js/jquery.stellar.min.js"></script>

	<!-- Flexslider -->
	<script src="../js/jquery.flexslider-min.js"></script>

	<!-- Main JS -->
	<script src="../js/main.js"></script>

	</body>
</html>