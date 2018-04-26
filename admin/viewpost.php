<?php include("header.php"); ?>
<?php
	$sth = $conn->prepare("SELECT * FROM replyboard where reply_to = ".$_GET["Id"]. " order by reply_date");
	$sth->execute();
    $result = $sth->fetchAll();
	$sth2 = $conn->prepare("SELECT * FROM board where id = ".$_GET["Id"]);
	$sth2->execute();
	$result2 = $sth2->fetch();
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Discuss Board</a>
        </li>
        <li class="breadcrumb-item active">
		<a href="listallpost.php">List All Posts</a>
		</li>
		<li class="breadcrumb-item active">  Posts #<?php echo $_GET["Id"];?></li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Posts #<?php echo $_GET["Id"];?> Details</div>
        <div class="card-body">
		<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<tr><th>Posts #<?php echo $_GET["Id"];?>: 
		</th></tr>
		<tr>
		<td>
		<div align="right"> Delete Post: 
		<a style='cursor: pointer;'  onclick='deletepost("<?php echo $_GET["Id"];?>")'>&times</a>
		</div>
		<?php 
					if (!(($result2['board_avatar_base64']=='') || ($result2['board_avatar_base64']=='data:image/;base64,'))) {
						?>
						<img class="ipost" src="<?php echo $result2['board_avatar_base64']?>"/><br>
					<?php }?>
		<?php echo $result2["content"];?>
		</td>
		</tr>
		<tr><td>
		Post At: <?php echo $result2['post_date']?> By <a href="../profile.php?username=<?php echo $result2['post_user'];?>"><?php echo $result2['post_user']?></a>
		</td></tr>
		</table>
		</div>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead><tr><th colspan="5">All Replies</th></tr>
                <tr>
                  <th>Reply Id</th>
                  <th>Replied Content</th>
                  <th>Replied By</th>
                  <th>DateTime</th>
                  <th>Delete Comment</th>
                </tr>
              </thead>
              <tbody>
                <?php 
  							foreach ($result as $aa){
  								echo "<tr><td>".$aa['reply_id'].
								"</td><td>"
								.$aa["reply_content"]."</td><td><a href='../profile.php?username=".$aa['reply_user']."'>"
								.$aa['reply_user']."</td><td>".$aa['reply_date']."</td><td><a style='cursor: pointer;'  onclick='deletecomment(".$aa['reply_id'].", ".$_GET["Id"].")'>&times</a></td></tr>";
							  }
						    ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
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
            <a class="btn btn-primary" href="listallnews.php?logout">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>
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
      	function deletepost(a){
	       if(confirm("Are are sure?")){
	      window.location = 'deletepost.php?Id='+a;
	       }
	   }
	   
	   function deletecomment(a, b){
	       if(confirm("Are are sure? print:")){
	      window.location = 'deletecomment.php?Id='+a+'&postid='+b;
	       }
	   }
    </script>

</html>
