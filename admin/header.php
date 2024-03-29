<?php
require_once '../database.php';
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']=="admin") {
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Cellfish - Admin Console</title>

  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <style>
  img.ipost{
						max-height:200px;
						max-width:200px;
						height:auto;
						width:auto;
					}
  </style>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="cards.php">Welcome, Admin!</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">News</span>
          </a>
                    <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="addnews.php">Add News</a>
            </li>
            <li>
              <a href="listallnews.php">List All News</a>
            </li>

          </ul>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#DiscussBoard" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Discuss Board</span>
          </a>
                    <ul class="sidenav-second-level collapse" id="DiscussBoard">
            <li>
              <a href="listallpost.php">List All Post</a>
            </li>
            <li>
              <a href="listpostreports.php">Manage Post Reports</a>
            </li>
			<li>
              <a href="listcommentreports.php">Manage Comments Reports</a>
            </li>
          </ul>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                     <a class="nav-link" href="feedback.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Feedback</span>
          </a>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Setting</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="navbar.php">Theme</a>
            </li>
          </ul>
        </li>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" href="../index.php" >
            <i>Back to Home Page</i></a>
        </li>
      </ul>
    </div>
  </nav>
<?php
  } else {
	  echo "<script type='text/javascript'>alert('Sorry, You have no permission!');window.history.back();</script>";
  }
?>