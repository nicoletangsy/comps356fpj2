<?php
	require_once('../database.php');
	session_start();
	if(!$_SESSION['admin']){
		header('Location: login.html');
	}
	$sth = $conn->prepare("SELECT * FROM Post where Id =".$_GET["Id"]);
	$sth->execute();
    $result = $sth->fetchAll();
    $comment = $conn->prepare("SELECT * FROM Comment WHERE Post_id =".$_GET["Id"]." ORDER BY DateTime;");
    $comment->execute();
    $comments =  $comment->fetchAll();
    $myDateTime = new DateTime($result[0]['DateTime'], new DateTimeZone('GMT'));
	$myDateTime->setTimezone(new DateTimeZone('Asia/Hong_Kong'));
    
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
		<link rel="stylesheet" href="../asset/css/amazeui.min.css">
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

	<body>

	
		
		 <div id="fh5co-featured" data-section="features">
			<div class="container">
			    <a href="post.php?"><input type="submit" class="am-btn am-btn-secondary" value="Back"></a>
				<div class="row text-left ">
					<div class="col-md-8 col-md-offset-2">
					    <form onsubmit="return up()" action="Check.php" method="POST" enctype="multipart/form-data">
                        <table>
                        <div><tr><td>Id</td><td><input type="text" name="Id" value=<?=$result[0]["Id"]?>></input></td></div>
                         <div><tr><td>Title</td><td><textarea name="Title" rows="1" cols="50"><?=$result[0]["Title"]?></textarea></td></tr></div>
                        <div> <tr><td>Content</td><td><textarea name="Content" rows="10" cols="50"><?=$result[0]["Content"]?></textarea></td></tr></div>
                       <div><tr><td>  Introduction</td><td><textarea  rows="2" cols="50"><?=$result[0]["Introduction"]?></textarea></td></tr></div>
                      <div> <tr><td>  Image</td><td><figure>
											<img id="image" src="data:image/png;base64,<?=base64_encode($result[0]["Image"])?>" class="img-responsive" width="524" height="350">
										    </figure><input type="file" name="Image" onchange="change()" /></td></tr></div>
                       <div>  <tr><td>likeNo</td><td><input type=text name="likeNo" value=<?=$result[0]["likeNo"]?> ></td></tr></div>
                     <div> <tr><td>   DataTime</td><td><input type=text name="DateTime" value=<?=$result[0]["DateTime"]?>></td></tr></div>
                     <div> <tr><td>   type</td><td><input type=text name="type" value=<?=$result[0]["type"]?> ></td></tr></div>
                    </table>
					<br><br>
					
								    <input type="submit" class="am-btn am-btn-secondary" value="Update">
			                        <input type="button" onclick="del()"class="am-btn am-btn-secondary" value="Delete">
			                      </form>
			   
						</div>
					</div>

				</div>
					</div>
						<div id="wrapper">
	<div id="page" class="container">
							<div id="content">
			<div class="title">
			<p style="color:black;border-bottom:1px solid rgba(34,36,38,.15);">Comment</p>
			<article class="am-comment">
  
<?php
	foreach ($comments as $comment) {
			$myDateTime = new DateTime($comment["DateTime"], new DateTimeZone('GMT'));
    		$myDateTime->setTimezone(new DateTimeZone('Asia/Hong_Kong'));
?>
<a href="#link-to-user-home">
    <img src="../200-offline-sprite.png" alt="" class="am-comment-avatar" width="48" height="48"/>
  </a>
  <div class="am-comment-main">
    <header class="am-comment-hd">
      <!--<h3 class="am-comment-title">评论标题</h3>-->
      <div class="am-comment-meta">
        <a href="#link-to-user" class="am-comment-author"><?=$comment["ip"]?></a>
        on <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800"><?=$myDateTime->format('Y-m-d H:i');?></time>&nbsp<input type="button" onclick='ads(<?=$comment["Id"]?>)' value="delete" class="am-btn am-btn-secondary"/>
      </div>
    </header>
    <div class="am-comment-bd">
      <?=$comment["Content"]?><?php $sc = $conn->prepare("SELECT IP,Content, Id FROM SubComment where comment_Id = ".$comment["Id"]." order by DateTime");
    $sc->execute();
    $scs = $sc->fetchAll(); foreach($scs as $sc){?><blockquote><?=$sc["IP"]?>: <?=$sc["Content"]?> &nbsp<a   onclick='dele(<?=$sc["Id"]?>)'>&times;</a></blockquote><?php } ?>
    <br>
    </div>
  </div>

  <?php
	}
  ?>
  

</article>
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
		function up(){
		    return confirm('Are are sure?');
		}
	   function dele(a){
		if(confirm("Are are sure?")){
		
		window.location = 'dele.php?Id='+a+'&Id2='+<?=$_GET["Id"]?>;
		}
	   }
	   	   function ads(a){
		if(confirm("Are are sure?")){
		
		window.location = 'de.php?Id='+a+'&Id2='+<?=$_GET["Id"]?>;
		}
	   }
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


