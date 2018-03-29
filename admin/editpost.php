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
<style>
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
<?php include("header.php"); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Post</a>
        </li>
        <li class="breadcrumb-item active">List All Post</li>
        <li class="breadcrumb-item active">Edit Post</li>
      </ol>
      <input type="button" onclick="window.history.back();" class=" am-btn-secondary" value="Preview"><br><br>
        	<div class="form-style-3">
          <fieldset>
							<fieldset>
							<legend>Post Details</legend>
					    <form onsubmit="return up()" action="Check.php" method="POST" enctype="multipart/form-data">
                        <label for="Id"><span>Id <span class="required">*</span></span><input type="text" class="input-field" name="Id" value=<?=$result[0]["Id"]?> /></label>
                        <label for="Title"><span>Title <span class="required">*</span></span><textarea name="Title" class="textarea-field "><?=$result[0]["Title"]?></textarea></label>
						<label for="Content"><span>Content <span class="required">*</span></span><textarea  name="Content" class="textarea-field aaa" style="height=250px"><?=$result[0]["Content"]?></textarea></label>
						<label for="Introduction"><span>Introduction <span class="required">*</span></span><textarea name="Introduction" class="textarea-field"><?=$result[0]["Introduction"]?></textarea></label>
                   		   </fieldset> 
                   		  
					
                   		   
					<br><fieldset>	<label for="likeNo"><span>likeNo <span class="required">*</span></span><input type="text" class="input-field" name="likeNo" value=<?=$result[0]["likeNo"]?> /></label>
						<label for="DateTime"><span>DateTime <span class="required">*</span></span><input type="text" class="input-field" name="DateTime" value=<?=$result[0]["DateTime"]?> /></label>
						<label for="type"><span>type <span class="required">*</span></span><input type="text" class="input-field" name="type" value=<?=$result[0]["type"]?> /></label>
         
					<br><br>
					
								    
			                     
			                     <label for="Image"><span>Image <span class="required">*</span></span><img  src="data:image/png;base64,<?=base64_encode($result[0]["Image"])?>" class="img-responsive" width="524" height="350">
										    </figure><input type="file" onchange="change()" name="Image" /> </label>
										    </fieldset><input type="submit" class="am-btn am-btn-secondary" value="Edit"/> <input type="Reset" class="am-btn am-btn-secondary" value="Reset"/>
			                      </div>
			                      
			                      </form>
        </div>
 


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
    
    </div>
  </div>

  <?php
	}
  ?>
  <br>

</article>
		</div>
			</div>
		</div>
	 </div>
	 <br><br>
 
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © OUHK Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary"  href="listpost.php?logout">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    		<script>
    		  if(getCookie("theme") != "dark"){
      $('nav').attr('class', 'navbar navbar-expand-lg  bg-light fixed-top navbar-light');
      $('body').attr('class', 'fixed-nav sticky-footer bg-light');
    }
    
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
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
		function up(){
		    return confirm('Are are sure?');
		}
	   function del(){
	       confirm("Are are sure?");
	   }
	</script>
  </div>
</body>

</html>
