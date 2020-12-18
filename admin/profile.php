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
        if (isset($_GET['uid'])) { // subadmin id
            //setting the update name for sub admins
            $update = 'update_sub';
            $query = "SELECT * FROM subusers WHERE id= ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i',$_GET['uid']);
            $stmt->execute();
            $get_data = $stmt->get_result();
            $fetch_data = $get_data->fetch_assoc();
        }
        else if (isset($_GET['aid'])) { // admin id
            //setting the update name for sub admins
            $update = 'update_main';
            $query = "SELECT * FROM admin_detail WHERE id= ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i',$_GET['aid']);
            $stmt->execute();
            $get_data = $stmt->get_result();
            $fetch_data = $get_data->fetch_assoc();
        }       
		//updating the user
		if (isset($_POST['update_sub'])) {
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
			else{
			$query = "UPDATE `subusers` SET `fullname`=?,`username`=?,`email`=?,`password`=? WHERE id =? LIMIT 1";
			$stmt = $conn->prepare($query);
            $stmt->bind_param('ssssi',$fullname,$username,$email,$password,$userid);
			if ($stmt->execute()) {
				$error= '<div class="alert alert-success">Profile updated successfully!</div>';
			}
			else {
				$error = '<div class="alert alert-danger">Error updating Profile! Try again later.</div>';
			}
		}
    }
        //updating the admin
		if (isset($_POST['update_main'])) {
            $userid = $_GET['aid'];
            $formerpas = $fetch_data['password'];
    		$username = mysqli_real_escape_string($conn,strip_tags($_POST['username']));
			$email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
			$fullname = mysqli_real_escape_string($conn,strip_tags($_POST['fullname']));
			$password = mysqli_real_escape_string($conn,md5($_POST['password']));
			$cpassword = mysqli_real_escape_string($conn,md5($_POST['cpassword']));
			if ($password !== $cpassword) {
				$error= '<div class="alert alert-danger">Passwords do not match</div>'."<br>"; 		
            }
			else{
			$query = "UPDATE `admin_detail` SET `fullname`=?,`username`=?,`email`=?,`password`=? WHERE id =? LIMIT 1";
			$stmt = $conn->prepare($query);
            $stmt->bind_param('ssssi',$fullname,$username,$email,$password,$userid);
			if ($stmt->execute()) {
				$error= '<div class="alert alert-success">Profile updated successfully!</div>';
			}
			else {
				$error = '<div class="alert alert-danger">Error updating Profile! Try again later.</div>';
			}
		}
    }

 			// elseif(isset($_GET['mprid'])) {
 			// 		$query = "SELECT * FROM admin_detail WHERE id= ?";
	        //         $stmt = $conn->prepare($query);
	        //         $stmt->bind_param('i',$_GET['mprid']);
	        //         $stmt->execute();
	        //         $get_data = $stmt->get_result();
	        //         $fetch_data = $get_data->fetch_assoc();
 			// }
                
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Profile</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
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
                            <p class="list-group-item active">Edit Profile</p>
                            <div class="card-body">
                                <div class="shadow p-2">
								<form class="form-group" enctype="multipart/form-data" method="POST" action="">
                                    <label for="fullname">Full name</label>
                                    <input type="text" required name="fullname" value="<?php echo $fetch_data['fullname'];?>" class="form-control"><br>
                                    <label for="username">Username</label>
                                    <input type="text" required name="username" value="<?php echo $fetch_data['username'];?>" class="form-control"><br>
                                    <label for="email">Email</label>
                                    <input type="email" required name="email" value="<?php echo $fetch_data['email'];?>" class="form-control"><br>
                                    <label for="password">Password</label>
                                    <input type="password" placeholder="If null, enter previous password" required name="password" class="form-control"><br>
                                    <label for="password">Confirm password</label>
                                    <input type="password" required name="cpassword" placeholder="If null, confirm previous password" class="form-control"><br>
                                    <button type="submit" name="<?= $update; ?>" class="btn btn-primary">Submit</button>
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