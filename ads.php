<?php
	require_once('database.php');
	$id = $_GET["id"];
	$sth = $conn->prepare("SELECT Title,Content,Image,DateTime,likeNo FROM Post where Id=$id ORDER BY likeNo desc");
    $sth->execute();
    $postCom = $conn->prepare("SELECT Id,Title,Introduction FROM Post ORDER BY RAND()");
    $postCom->execute();
    $comment = $conn->prepare("SELECT * FROM Comment WHERE Post_id = $id ORDER BY DateTime;");
    $comment->execute();
    $posts = $postCom->fetchAll();
    $comments = $comment->fetchAll();
    $result = $sth->fetchAll();
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
	<link rel="stylesheet" href="asset/css/amazeui.min.css">
  	<link rel="stylesheet" href="asset/css/app.css">
    <link href="default.css" rel="stylesheet" type="text/css" media="all" />
    <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
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
    <img src="200-offline-sprite.png" alt="" class="am-comment-avatar" width="48" height="48"/>
  </a>
  <div class="am-comment-main">
    <header class="am-comment-hd">
      <!--<h3 class="am-comment-title">评论标题</h3>-->
      <div class="am-comment-meta">
        <a href="#link-to-user" class="am-comment-author"><?=$comment["ip"]?></a>
        on <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800"><?=$myDateTime->format('Y-m-d H:i');?></time>
      </div>
    </header>
    <div class="am-comment-bd">
      <?=$comment["Content"]?><?php $sc = $conn->prepare("SELECT IP,Content FROM SubComment where comment_Id = ".$comment["Id"]." order by DateTime");
    $sc->execute();
    $scs = $sc->fetchAll(); foreach($scs as $sc){?><blockquote><?=$sc["IP"]?>: <?=$sc["Content"]?></blockquote><?php } ?>
    <br>
      <i class="am-icon-thumbs-up" id="Comment<?=$comment["Id"]?>" onclick="like(<?=$comment["Id"]?>,'Comment')"> <?=$comment["likeNo"]?></i><a onclick="reply(<?=$comment["Id"]?>)">reply</a>
      <span style="display:none" id="Comment<?=$comment["Id"]?>ReplyBox"><input type="text" id="replytext<?=$comment["Id"]?>"><input type="submit" class="am-btn am-btn-secondary" value="Reply" onclick="saveReplay(<?=$comment["Id"]?>,document.getElementById('replytext<?=$comment["Id"]?>').value)"></span>
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

<script src="asset/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="asset/js/amazeui.min.js"></script>

<script>
function like(id,type){
	var http = new XMLHttpRequest();
	var url = "addLike.php";
	var params = "id="+id+"&type="+type;
	http.open("POST", url, true);
	
	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	http.onreadystatechange = function() {//Call a function when the state changes.
	    if(http.readyState == 4 && http.status == 200) {
	    	var myArr = JSON.parse(this.responseText);
	    	console.log(myArr);
	    	var likeNo = myArr["likeNo"];
	    	var ip = myArr["ip"];
	    	var type = myArr["type"];
	    	
	    	if(type == "Comment"){
	    		document.getElementById('Comment'+id).innerHTML = myArr["likeNo"];
	    	}else{
	    		document.getElementById('postLike').innerHTML = myArr["likeNo"];
	    	}
	    }
	}
	http.send(params);
}
function reply(id){
	document.getElementById('Comment'+id+'ReplyBox').style.display = "inline";
}
function saveReplay(id,reply){
	var http = new XMLHttpRequest();
	var url = "saveReplay.php";
	var params = "id="+id+"&reply="+reply;
	http.open("POST", url, true);
	
	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	http.onreadystatechange = function() {//Call a function when the state changes.
	    if(http.readyState == 4 && http.status == 200) {
	    	location.href = "detail.php?id=<?=$id?>";
	    }
	}
	http.send(params);
}
</script>