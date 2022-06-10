<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<?php
		include 'head.php';	
	?>
	<body class="loggedin">
		<!-- navbar -->
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="#"><img src="css/images/logo_white.png" alt="Logo" style="width:25px; margin-top:-5px;"> Stargazer</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
					<ul class="navbar-nav">
						<li class="nav-item">
						<a class="nav-link active" href="dashboard.php">Dashboard</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="manage.php">Manage</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="profile.php">Profile</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="help.php">Help</a>
						</li>
					</ul>
				</div>
				<a href="logout.php" style="width:112.78px; text-align:right;"><i class="fas fa-sign-out-alt"></i></a>				
			</div>
		</nav>

		<!-- main content -->
		<div class="content container">
			<h2>Dashboard</h2>
			<div>
				<p>Welcome back, <?=$_SESSION['name']?>!</p>
				<div id="calender">
					<div class="calendar">
						<div class="calendar-header">
							<span class="month-picker" id="month-picker">February</span>
							&nbsp;
							<div class="year-picker">
								<span id="year">2021</span>
							</div>
						</div>
						<div class="calendar-body">
							<div class="calendar-week-day">
								<div>Sun</div>
								<div>Mon</div>
								<div>Tue</div>
								<div>Wed</div>
								<div>Thu</div>
								<div>Fri</div>
								<div>Sat</div>
							</div>
							<div class="calendar-days"></div>
						</div>
						<div class="month-list"></div>
					</div>

					<script src="js/callender.js"></script>
				</div>
			</div>
		</div>
		<div class="pageDoll d-flex">
			<img src="css/images/pageDoll.png" class="pageDoll">
		</div>
	</body>
	<footer class="footer container-fluid">
		<div class="f-content">
			<div>
				&copy; 2022 Cheyenne. All Rights Reserved
			</div>
			<div style="width: 25%;" class="d-flex justify-content-around">
				<div>
					Donate 
				</div>
				<div>
					Privacy Policy 
				</div>
				<div>
					Terms of Service 
				</div>
			</div> 
		</div>
	</footer>
</html>