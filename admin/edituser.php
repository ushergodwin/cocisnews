<?php
    error_reporting(0);
    session_start();
    require_once '../connection/db.php';
    if (strlen($_SESSION['id'] == 0)) {
        header('location:login.php');
        exit();
    }
            // setting session username
			$username = $_SESSION['username'];
            $error = '';
            //fetching the users data and filling in the form for making changes
            if (isset($_GET['uid'])) {
                $query = "SELECT * FROM subusers WHERE id= ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i',$_GET['uid']);
                $stmt->execute();
                $get_data = $stmt->get_result();
                $fetch_data = $get_data->fetch_assoc();
                
            }
		//updating the user
		if (isset($_POST['update'])) {
            $userid = $_GET['uid'];
            $formerpas = $fetch_data['password'];
    		$username = mysqli_real_escape_string($conn,strip_tags($_POST['username']));
			$email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
			$fullname = mysqli_real_escape_string($conn,strip_tags($_POST['fullname']));
			$password = mysqli_real_escape_string($conn,md5($_POST['password']));
			$cpassword = mysqli_real_escape_string($conn,md5($_POST['cpassword']));
			if ($password !== $cpassword) {
				$error= '<div class="alert alert-danger">Passwords do not match</div>'."<br>"; 		
            }
            elseif ($password !== $formerpas) {
                $error= '<div class="alert alert-danger">Passwords do not match the former password</div>'."<br>";
            }
			else{
			$query = "UPDATE `subusers` SET `fullname`=?,`username`=?,`email`=?,`password`=? WHERE id =?";
			$stmt = $conn->prepare($query);
            $stmt->bind_param('ssssi',$fullname,$username,$email,$password,$userid);
			if ($stmt->execute()) {
				$error= '<div class="alert alert-success">User updated successfully!</div>';
			}
			else {
				$error = '<div class="alert alert-danger">Error updating user! Try again later.</div>';
			}
		}
    }
                
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Users</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
    				    <link rel="icon" type="image/jpg" sizes="16x16" href="../images/cocis/muk.jpeg">
    <style type="text/css">
		td > button{
			margin-right: 10px;
		}
	</style>
</head>
<body>
                                <!--- include header file-->
                                 <?php include '../includes/header.php';?>  
                                <!-- include header file ends-->
                                <!--- === error and success of the comment starts-->
								<div class="container"><?php echo $error;?></div>
								<!--- === error and success of the comment ends-->
								<section id="maincontent">
									<!-- including sidebar file-->
									<?php include '../includes/sidebar.php'; ?>
                    <!--Admin users management-->
                    <div class="col-md-9 my-3">
                        <div class="card bg-light">
                            <p class="list-group-item active">Edit User</p>
                            <div class="card-body">
                                <div class="shadow p-2">
								<form class="form-group" enctype="multipart/form-data" method="POST" action="">
                                    <label for="fullname">Full name</label>
                                    <input type="text" required name="fullname" value="<?php echo $fetch_data['fullname'];?>" class="form-control"><br>
                                    <label for="username">Username</label>
                                    <input type="text" required name="username" value="<?php echo $fetch_data['username'];?>" class="form-control"><br>
                                    <label for="email">Email</label>
                                    <input type="email" required name="email" value="<?php echo $fetch_data['email'];?>" class="form-control" readonly><br>
                                    <label for="password">Password</label>
                                    <input type="password" placeholder="If null, enter previous password" required name="password" class="form-control"><br>
                                    <label for="password">Confirm password</label>
                                    <input type="password" required name="cpassword" placeholder="If null, confirm previous password" class="form-control"><br>
                                    <button type="submit" name="update" class="btn btn-primary">Submit</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
                    <?php include '../includes/modal.php';?>
					<?php include '../includes/footer.php';?>
					<script src="../js/jquery.min.js"></script>
                    <script src="../js/popper.min.js"></script>
					<script src="../js/bootstrap.min.js"></script>
					<script src="../ckeditor/ckeditor.js"></script>
</body>
</html>