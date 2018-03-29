<?php
	require_once('../database.php');
		session_start();
	if (isset($_GET['logout'])) {
     unset($_SESSION['admin']);
    }
	if(!$_SESSION['admin']){
		header('Location: login.html');
	}
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
        <li class="breadcrumb-item active">Add Post</li>
      </ol>
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
                   		  
					
			                     <label for="Image"><span>Image <span class="required">*</span></span><img  src="data:image/png;base64" class="img-responsive" width="524" height="350">
										    </figure><input type="file" onchange="change()" name="Image" /> </label>
										    </fieldset><input type="submit" class="am-btn am-btn-secondary" value="Insert"/> <input type="Reset" class="am-btn am-btn-secondary" value="Reset"/>
			                      </div>
			                      
			                      </form>
        </div>
 
 </div>
 
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
