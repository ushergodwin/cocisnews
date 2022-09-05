<?php
	error_reporting(0);
	// starting session
	session_start();	
	require_once '../connection/db.php';
	//redirecting to the login page  if no id is found
    if (strlen($_SESSION['id'] == 0)) {
        header('location:login.php');
        
	}
	
		
           
			
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
				$image_path = __DIR__ ."/../images/".$_FILES['post-img']['name'];
				move_uploaded_file($_FILES['post-img']['tmp_name'],$image_path);
				//inserting to the database with prepared statement method
			$query = "INSERT INTO posts(post_title,post_content,post_tag,post_desc,post_category,post_author,image_dir)
			 VALUES(?,?,?,?,?,?,?)";
			$stmt = $conn->prepare($query);
			$stmt->bind_param('sssssss',$p_title,$p_body,$meta_tag,$meta_dsc,$post_ctg,$author,$image_path);
			if ($stmt->execute()) {
				$error= '<div class="alert alert-success">Article published successfully!</div>';
			}
			else {
				$error = '<div class="alert alert-danger">Error posting content! Try again later.</div>';
			}
		}
	}
}
				// looping posts from the database to the table
				$query = "SELECT * FROM posts ORDER BY id DESC LIMIT 7";
				$stmt = $conn->prepare($query);
				if($stmt->execute()){
					$process = $stmt->get_result();
				}
				else{
					$error = '<div class="alert alert-danger">Error fetching contents! Try again later.</div>';
				}
				
				
?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>Admin | Write Article</title>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
				<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="../css/style.css">
				<link rel="stylesheet" type="text/css" href="../css/all.css">
				<link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
				<style type="text/css">
					td > button{
						margin-right: 5px;
					}
				</style>
			</head>
		<body>		
							<!-- header section-->
								<?php include '../includes/header.php'; ?>
							<!-- header section ends-->
							<!--- === error and success of the comment starts-->
							<div class="container"><?php echo $error;?></div>
							<!--- === error and success of the comment ends-->
								<section id="maincontent">
									<?php include '../includes/sidebar.php';?>
										<div class="col-md-9 my-3">

											<!-- latest post--->
		                            <div class="card card-body shadow">
									<form class="form-group" enctype="multipart/form-data" method="POST" action="">
										<label for="page">Article Title</label>
											<input type="text" name="post-title" placeholder="post title" required class="form-control"><br>
										<label for="post-body">Article Body</label>
										<textarea name="editor1" required class="ckeditor form-control"></textarea><br>
										<label for="post-image">Article image</label>
										<input type="file"name="post-img" required placeholder="insert image" class="form-control" multiple><br>
																
										<label for="post-category">Article category</label>
										<select class="form-control" name="post-ctg" id="" required>
											<option value="" disabled selected>Choose Category</option>
											<option value="Popular">Popular</option>
											<option value="latest">Latest</option>
											<option value="education">Education</option>
											<option value="politics">Politics</option>
											<option value="sponsored">Sponsored</option>
											<option value="sports">Sports</option>
											<option value="other news">Other News</option>
											
										</select><br>
									
										<label for="meta-tag">Meta Tags</label>
										<input type="text" name="meta-tag" required placeholder="meta tag" class="form-control"><br>
									
										<label for="meta-description">Meta Description</label>
										<input type="text"name="meta-dsc" required placeholder="meta description" class="form-control"><br>
										<label for="author">Article Author</label>
										<input type="text" value="<?php echo $username; ?>" name="author" readonly class="form-control"><br>
										<button type="submit" class="btn btn-primary" name="save">Publish Article</button>
									</form>
								</div>


										</div>
										</div>
									</div>							
					</section>
					<!-- modal section-->
					<?php include '../includes/modal.php';?>
					<!-- modal section ends-->
					<!-- footer section -->
					<?php include '../includes/footer.php'; ?>
					<!-- footer section ends-->
					<script src="../js/jquery.min.js"></script>
					<script src="../js/popper.min.js"></script>
					<script src="../js/bootstrap.min.js"></script>
					<script src="../ckeditor/ckeditor.js"></script>
</body>
</html>