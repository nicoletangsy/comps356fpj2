<?php
	require_once('../database.php');
		session_start();
	if (isset($_GET['logout'])) {
     unset($_SESSION['admin']);
    }
	if(!$_SESSION['admin']){
		header('Location: login.html');
	}
	$sth = $conn->prepare("SELECT Id FROM Staff");
	$sth->execute();
    $result = $sth->fetchAll();
?>
<?php include("header.php"); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="Account.php">Account</a>
        </li>
        <li class="breadcrumb-item active">Reset</li>
      </ol>
            
    <div class="card card-register  mt-5">
      <div class="card-header">Change an Account</div>
      <div class="card-body">
        <form action="pass.php" onsubmit="return pass()" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Current Login name</label>
                <input class="form-control" id="exampleInputName" type="text" disabled aria-describedby="nameHelp" name="Id" value="<?=$result[0]{"Id"}?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Change New Password</label>
                <input class="form-control" id="exampleInputPassword1" name="Password" type="password" placeholder="Password">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Re-Enter Password</label>
                <input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirm password">
              </div>
            </div>
          </div >
          <div style="float:right">
          <input class="btn btn-primary" type="reset" value="Reset">
          <input class="btn btn-primary" type="submit" value="Confirm">
          </div>
        </form>
      </div>
    </div>
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
		function pass(){
		    confirm('Are are sure?');
		    var a = document.getElementById("exampleInputPassword1").value;
		    var b = document.getElementById("exampleConfirmPassword").value;
		    if(a == b){
		        return true;
		    }else{
		        alert("Passwords do not match!")
		        return false;
		    }
		}
	</script>
  </div>
</body>

</html>
