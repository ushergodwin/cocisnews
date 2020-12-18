<?php
				error_reporting(0);
				session_start();
				require_once '../connection/db.php';
				if (strlen($_SESSION['id'] == 0)) {
					header('location:login.php');
					exit();
				}
						$username = $_SESSION['username'];
						$error = '';
						//fetching the post data from the database
						if (isset($_GET['pid'])) {
						$pid = $_GET['pid'];
						//looping the table with the users data
						$select = "SELECT * FROM posts WHERE id=?";
						$stmt = $conn->prepare($select);
						$stmt->bind_param('i',$pid);
						$stmt->execute();
						$process = $stmt->get_result();
						$result = $process->fetch_assoc();
					}
					//updating the post
					if (isset($_POST['update'])) {
						$pid = $_GET['pid'];
						$p_title = mysqli_real_escape_string($conn,strip_tags($_POST['post-title']));
						$p_body = $_POST['ckeditor1'];
						$meta_tag = mysqli_real_escape_string($conn,strip_tags($_POST['meta-tag']));
						$meta_dsc = mysqli_real_escape_string($conn,strip_tags($_POST['meta-dsc']));
						$post_ctg = mysqli_real_escape_string($conn,strip_tags($_POST['post-ctg']));
						if (empty($post_img)) {
							$query = "UPDATE posts SET post_title=?,post_content=?,post_tag=?,post_desc=?,post_category=?
							WHERE id =?";
							$stmt = $conn->prepare($query);
							$stmt->bind_param('sssssi',$p_title,$p_body,$meta_tag,$meta_dsc,$post_ctg,$pid);
							if ($stmt->execute()) {
								$error= '<div class="alert alert-success">Content updated successfully!</div>';
							}
							else {
								$error = '<div class="alert alert-danger">Error updating content! Try again later.</div>';
							}
						}
						
						else{

							if (!preg_match("!image!",$_FILES['post-img']['type'])) {
								$error= '<div class="alert alert-danger"> Error! check if it is image, not large size and file type is valid</div>'."<br>"; 		
							}
							else{
								$image_path = "../images/".$_FILES['post-img']['name'];
								move_uploaded_file($_FILES['post-img']['tmp_name'],$image_path);
							$query = "UPDATE posts SET post_title=?,post_content=?,post_tag=?,post_desc=?,post_category=?,image_dir=?
							WHERE id =?";
							$stmt = $conn->prepare($query);
							$stmt->bind_param('ssssssi',$p_title,$p_body,$meta_tag,$meta_dsc,$post_ctg,$image_path,$pid);
							if ($stmt->execute()) {
								$error= '<div class="alert alert-success">Content updated successfully!</div>';
							}
							else {
								$error = '<div class="alert alert-danger">Error updating content! Try again later.</div>';
							}
						}
					}
				}
				

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | posts</title>
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
                        <div class="bg-light">
                            <div class="p-1 mt-1">
                                <p class="list-group-item active">Edit Post</p>
                            </div>
                            <div class="card-body shadow p-1">
                                <div class="">
								<form class="form-group" enctype="multipart/form-data" method="POST" action="">
										<label for="page">Post Title</label>
										<input type="text" name="post-title" value="<?php echo $result['post_title'];?>" required class="form-control"><br>
										<label for="post-body">Post Body</label>
										<textarea name="ckeditor1" required class="ckeditor form-control">
										<?php echo $result['post_content'];?></textarea><br>
										<label for="post_author">Post Author</label>
										<input type="text" class="form-control" readonly value="<?php echo $result['post_author'];?>"><br>
										<label for="post-image">post image</label>
										<input type="file"name="post-img"  placeholder="insert image" value="<?php echo $result['post_image'];?>" class="form-control" multiple><br>
										<label for="post-category">post category</label>
										<select class="form-control" name="post-ctg" id="" required>
											<option value="" disabled selected><?php echo $result['post_category'];?></option>
											<option value="Popular">Popular</option>
											<option value="latest">Latest</option>
											<option value="flashback">Flashback</option>
											<option value="education">Education</option>
											<option value="sponsored">Sponsored</option>
											<option value="sports">Sports</option>
											<option value="politics">Politics</option>
											<option value="other news">Other news</option>
										</select><br>
										<label for="meta-tag">Meta Tags</label>
										<input type="text" name="meta-tag" required placeholder="meta tag" class="form-control" value="<?php echo $result['post_tag'];?>"><br>	
										<label for="meta-description">Meta Description</label>
										<input type="text"name="meta-dsc" required placeholder="meta description" class="form-control" value="<?php echo $result['post_desc'];?>"><br>
										<button type="submit" class="btn btn-primary" name="update">Update Changes</button>
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