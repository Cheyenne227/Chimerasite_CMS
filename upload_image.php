<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'chimerasite_cms';
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $conn->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
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
						<a class="nav-link" href="dashboard.php">Dashboard</a>
						</li>
						<li class="nav-item">
						<a class="nav-link active" href="manage.php">Manage</a>
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
		<div class="content">
            <h2 style="padding-bottom: 0px;">Manage</h2>
            <h3>Upload Image</h3>
			<div class="uploadImg_form">
                <form id="help-form" data-parsley-validate="" class="form container" action="" method="post">
                    <div class="row">
                        <div class="col-3">
                            <label for="image">Image</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-colums" name="image" required="" data-parsley-maxlength="255" placeholder="Image URL">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="title">Title</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-colums" name="title" required="" data-parsley-maxlength="50" placeholder="Image Title">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="filter">Filter</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-colums" name="filter" required="" data-parsley-maxlength="25" placeholder="Filter Class">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="date">Date</label>
                        </div>
                        <div class="col-9">
                            <input type="date" class="form-colums" name="date" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>
                            <label for="description">Description</label>
                        </div>
                        <div class="col-9">
                            <textarea id="message" class="form-colums" name="description" data-parsley-trigger="keyup" data-parsley-validation-threshold="15" data-parsley-maxlength="255" placeholder="Image Description"></textarea>
                            </p>
                        </div>
                    </div>
                    <input type="submit" class="submit-btn" value="Upload" name="uploadbtn">
                </form>
            </div>
            <div class="StatusReport">
                <?php
                    if(isset($_POST['uploadbtn'])) 
                    {
                        $title = $_POST['title'];
                        $date = $_POST['date'];
                        $description = $_POST['description'];
                        $image = $_POST['image'];
                        $filter = $_POST['filter'];

                        $sql = "INSERT INTO `dummy_website` (`title`, `date`, `description`, `image`, `filter`) VALUES ('$title', '$date', '$description', '$image', '$filter')";
                                
                        if(mysqli_query($conn, $sql)){
                            echo "Records inserted successfully.";
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                    }        
                ?> 
            </div>
		</div>
	</body>
	<script src="js/manage.js"></script>
</html>