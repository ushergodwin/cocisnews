<?php
	error_reporting(0);
    session_start();
    require_once '../connection/db.php';
    if (strlen($_SESSION['id'] == 0)) {
        header('location:login.php');
        exit();
	}
			$error = '';
            $id = $_SESSION['id'];
            $query = "SELECT * FROM admin_detail WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i',$id);
            $stmt->execute();
            $process = $stmt->get_result();
            $result = $process->fetch_assoc();
			$username = $result['username'];
			$stmt->close();
		// if post is submitted
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			if (isset($_POST['save'])) {
				$p_title = mysqli_real_escape_string($conn,strip_tags($_POST['post-title']));
				$p_body = $_POST['editor1'];
				$meta_tag = mysqli_real_escape_string($conn,strip_tags($_POST['meta-tag']));
				$meta_dsc = mysqli_real_escape_string($conn,strip_tags($_POST['meta-dsc']));
				$post_ctg = mysqli_real_escape_string($conn,strip_tags($_POST['post-ctg']));
				$author = mysqli_real_escape_string($conn,strip_tags($_POST['author']));
				if (!preg_match("!image!",$_FILES['post-img']['type'])) {
					$error= '<div class="alert alert-danger"> Error! check if it is image, not large size and file type is valid</div>'."<br>"; 		
				}
				else{
					$image_path = "../images/".$_FILES['post-img']['name'];
					move_uploaded_file($_FILES['post-img']['tmp_name'],$image_path);
					//inserting to the database with prepared statement method
				$query = "INSERT INTO posts(post_title,post_content,post_tag,post_desc,post_category,post_author,image_dir)
				 VALUES(?,?,?,?,?,?,?)";
				$stmt = $conn->prepare($query);
				$stmt->bind_param('sssssss',$p_title,$p_body,$meta_tag,$meta_dsc,$post_ctg,$author,$image_path);
				if ($stmt->execute()) {
					$error= '<div class="alert alert-success">Content uploaded successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error posting content! Try again later.</div>';
				}
			}
		}
	}
            // signing up new users from the admin dashboard
            if ($_SERVER['REQUEST_METHOD']== 'POST') {
                if (isset($_POST['submit'])) {
                    $fullname = mysqli_real_escape_string($conn,strip_tags($_POST['fullname']));
                    $email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
                    $username = mysqli_real_escape_string($conn,strip_tags($_POST['username']));
                    $password = mysqli_real_escape_string($conn,md5($_POST['password']));
                    $cpassword = mysqli_real_escape_string($conn,md5($_POST['cpassword']));
                    $check = "SELECT id FROM subusers WHERE email ='$email'";
                    $first_query = mysqli_query($conn,$check);
                    $row = mysqli_num_rows($first_query);
                    if ($row > 0) {
                        $error = '<div class="alert alert-danger">The email is already taken!.</div>';
                    }
                    else if ($password !== $cpassword) {
                        $error = '<div class="alert alert-danger">Passwords do not match!.</div>';
                    }
                    else{
                        $query = "INSERT INTO `subusers`(`fullname`,`email`,`username`,`password`)
                         VALUES(?,?,?,?)";
                         $stmt = $conn->prepare($query);
                         $stmt->bind_param('ssss',$fullname,$email,$username,$password);
                         $execute = $stmt->execute();
                         if ($execute) {
                             $error = '<div class="alert alert-success">New user added successfully!.</div>';
                         }
                         else{
                             $error = '<div class="alert alert-danger">Error registering user!.</div>';
                         }
                    }

                }
            }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin | Users</title>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
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
								<!--including the header file -->
		                        <?php include '../includes/header.php'; ?>
		                        <!--including the header file ends -->
                                <!--- header section ends-->
								<!--- === error and success of the comment starts-->
								<div class="container"><?php echo $error;?></div>
								<!--- === error and success of the comment ends-->
								<section id="maincontent">
									<!--including sidebar file-->
									<?php include '../includes/sidebar.php';?>
                                        <!--- adding new users to the admin-->
									<div class="col-md-9 bg-light my-3">
                                        <div class="card shadow">
                                            
                                                <div>
                                                    <p class="list-group-item active">New Users Registrations</p>
                                                </div>
                                                <div class="card-body">
                                                <form action="" method="POST" class="form-group">
                                                    <label for="fullname">Full name</label>
                                                    <input type="text" required name="fullname" class="form-control"><br>
                                                    <label for="username">Username</label>
                                                    <input type="text" required name="username" class="form-control"><br>
                                                    <label for="email">Email</label>
                                                    <input type="email" required name="email" class="form-control"><br>
                                                    <label for="password">Password</label>
                                                    <input type="password" required name="password" class="form-control"><br>
                                                    <label for="password">Cofirm password</label>
                                                    <input type="password" required name="cpassword" class="form-control"><br>
                                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                                </form>
										    </div>
										</div>
                                    </div>
                                </div>
                            </div>							
					</section>
					<!-- modals section for adding page--->
					<div class="modal fade" id="addpage" tabindex="-1" role="dialog" arial-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="submit" class="close" data-dismiss="modal" arial-label="Close" ><span arial-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Add post</h4>
								</div>
								<div class="modal-body">
									<form class="form-group" enctype="multipart/form-data" method="POST" action="">
										<label for="page">Post Title</label>
											<input type="text" name="post-title" placeholder="post title" required class="form-control"><br>
										<label for="post-body">Post Body</label>
										<textarea name="editor1" class="ckeditor form-control"></textarea><br>
										<label for="post-image">post image</label>
										<input type="file"name="post-img" placeholder="insert image" class="form-control" multiple><br>
																
										<label for="post-category">post category</label>
										<select class="form-control" name="post-ctg" id="">
											<option value="" disabled selected>Choose Category</option>
											<option value="Trending">Trending</option>
											<option value="Religion">Religion</option>
											<option value="Education">Education</option>
											<option value="Politics">Politics</option>
											<option value="Sports">Sports</option>
											<option value="Business">Business</option>
										</select><br>
									
										<label for="meta-tag">Meta Tags</label>
										<input type="text" name="meta-tag" placeholder="meta tag" class="form-control"><br>
									
										<label for="meta-description">Meta Description</label>
										<input type="text"name="meta-dsc" placeholder="meta description" class="form-control">
										<button type="submit" class="btn btn-primary" name="save">Save Changes</button>
									</form>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn-btn-default" data-dismiss="modal">Close
									</button>
									
								</div>
							</div>
						</div>
					</div>				
								<?php include '../includes/footer.php'; ?>
					<script src="../js/jquery.min.js"></script>
					<script src="../js/popper.min.js"></script>
					<script src="../js/bootstrap.min.js"></script>
					<script src="../ckeditor/ckeditor.js"></script>
</body>
</html>