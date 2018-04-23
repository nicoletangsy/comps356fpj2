	<div id="fh5co-container">
		<div class="js-sticky">
			<div class="fh5co-main-nav">
				<div class="container-fluid">
					<div class="fh5co-menu-1">
					<?php if(isset($_SESSION['username'])&&$_SESSION['username']=="admin") {?><a href="admin/cards.php" data-nav-section="admin">Admin Console</a><?php } ?>
						<a href="index.php" data-nav-section="home">Home</a>
						<a href="about.php" data-nav-section="about">About</a>
						<a href="news.php" data-nav-section="menu">News</a>
						<a href="discussboard.php" data-nav-section="menu">Discuss Board</a>
					</div>
					<div class="fh5co-logo">
						<a href="index.php">Cellfish</a>
					</div>
					<div class="fh5co-menu-2">
						
						<a href="survey.php" data-nav-section="menu">Survey</a>
						<a href="search.php" data-nav-section="menu">Search</a>
						<a href="<?php if (isset($_SESSION['username'])) {
							echo "logout.php";
						} else {
							echo "login.php";
						}?>" data-nav-section="menu"><?php if (isset($_SESSION['username'])) {
							echo "Logout";
						} else {
							echo "Login";
						}?></a>
						
						<a href="<?php if (isset($_SESSION['username'])) {
							echo "profile.php";
						} else {
							echo "register.php";
						}?>" data-nav-section="menu"><?php if (isset($_SESSION['username'])) {
							echo $_SESSION['username'];
						} else {
							echo "Register";
						}?></a>
					</div>
				</div>
				
			</div>
		</div>
		<br>