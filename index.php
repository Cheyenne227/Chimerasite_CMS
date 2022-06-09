<!DOCTYPE html>
<html>
	<?php
		include 'head.php';
	?>
	<body>	
		<!-- navbar -->
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="#"><img src="css/images/logo_white.png" alt="Logo" style="width:25px; margin-top:-5px;"> Stargazer</a>							
			</div>
		</nav>

		<!-- main content -->
		<div>
			<h1>Welcome to Stargazer</h1>
		</div>
		<div class="log-reg">
			<form action="authenticate.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<a href="register.php">Register</a>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>