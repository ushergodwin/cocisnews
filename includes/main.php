<?php
	error_reporting(0);
    session_start();
    require_once '../connection/db.php';
    if ($_SESSION['id'] == 0) {
        header('location:login.php');
        exit();
	}
			$error = '';
            $id = $_SESSION['id'];
            $query = "SELECT * FROM users WHERE id=?";
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
			$p_title = mysqli_real_escape_string($conn,$_POST['post-title']);
			$p_body = mysqli_real_escape_string($conn,$_POST['editor1']);
			$meta_tag = mysqli_real_escape_string($conn,$_POST['meta-tag']);
			$meta_dsc = mysqli_real_escape_string($conn,$_POST['meta-dsc']);
			$post_ctg = mysqli_real_escape_string($conn,$_POST['post-ctg']);
			$post_img = mysqli_real_escape_string($conn,$_FILES['post-img']['name']);
			if (!preg_match("!image!",$_FILES['post-img']['type'])) {
				$error= '<div class="alert alert-danger"> Error! check if it is image, not large size and file type is valid</div>'."<br>"; 		
			}
			else{
			$query = "INSERT INTO posts(post_title,post_content,post_tag,post_desc,post_category,image_dir)
			 VALUES(?,?,?,?,?,?)";
			$stmt = $conn->prepare($query);
			$stmt->bind_param('ssssss',$p_title,$p_body,$meta_tag,$meta_dsc,$post_ctg,$post_img);
			if ($stmt->execute()) {
				$error= '<div class="alert alert-success">Content uploaded successfully!</div>';
			}
			else {
				$error = '<div class="alert alert-danger">Error posting content! Try again later.</div>';
			}
		}
	}
}
				// looping posts from the database to the table
				$query = "SELECT * FROM post ORDER BY post_id DESC LIMIT 4";
				$stmt = $conn->prepare($query);
				if($stmt->execute()){
					$process = $stmt->get_result();
					$result = $process->fetch_assoc();
				}
				else{
					echo "unsuccessful";
				}

				
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin | Dashboard</title>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
	<style type="text/css">
		td > button{
			margin-right: 10px;
		}
	</style>
</head>
<body>
	<section id="navbar">
		<nav class="navbar navbar-inverse" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Admin Dashboard</a>
			</div>
			<div class="collapse navbar-collapse" id="example-navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Posts</a></li>
				<li><a href="#">Pages</a></li>
				<li><a href="#">Users</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><?php echo 'welcome,'. $username;?></a></li>
				<li><a href="#">Logout </a></li>
			</ul>
		</div>
	</div>
</nav>
	</section>
							<!-- header section--->
							<header id="header">
								<div class="container">
									<div class="row bg-light">
										<div class="col-md-10">
											<h4>Dashboard <small>Manage Your Blog</small></h4>
										</div>
										<div class="col-md-2">
											<div class="dropdown">
												<button class="dropdown-toggle btn-secondary" href="#" data-toggle="dropdown">
													Add Content <span class="caret"></span>
												</button>
												<ul class="dropdown-menu">
													<li><a style="cursor: pointer;" type="button" data-toggle="modal" data-target="#addpage">Add post</a></li>
													<li><a href="#">Add Pages</a></li>
													<li><a href="adduser.php">Add Users</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</header>
							
								<!-- breadcrum section---->
								<section id="breadcrumb">
									<div class="container">
										<ol class="breadcrumb">
											<li class="active">Dashboard</li>
										</ol>
									</div>
								</section>
								<!--- === error and success of the comment starts-->
								<div class="container"><?php echo $error;?></div>
								<!--- === error and success of the comment ends-->
								<section id="maincontent">
									<div class="container">
										<div class="row">
											<div class="col-md-3">
												<div class="list-group">
													<a href="#" class="list-group-item active">Dashboard</a>
													<a href="#" class="list-group-item">Pages <span class="badge badge-primary">10</span></a>
													<a href="#" class="list-group-item">Posts <span class="badge">100</span></a>
													<a href="#" class="list-group-item">Users <span class="badge">3000</span></a>
												</div>
												<!-- well---->
											<div class="well">
												<h4>Disk space used</h4>
												<div class="progress progress-striped">
												<div class="progress-bar progress-bar-danger" role="progressbar" arial-valuenow="70" arial-valuemin="0" arial-valuemax="100" style="width: 70%;">
												<span class="sr-only">70%</span>	
												</div>

											</div>
											<h4>Bandwidth used</h4>
													<div class="progress progress-striped">
												<div class="progress-bar progress-bar-primary" role="progressbar" arial-valuenow="40" arial-valuemin="0" arial-valuemax="100" style="width: 40%;">
												<span class="sr-only">40%</span>	
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-9">
										
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
								<!-- footer section--->
								<footer class="footer footer-secondary" style="height: 50px; width: 100%; background-color:black;padding-top:15px;color:gray; ">
									<p class="text-center">Copyright &copy; 2020 All rights reserved | Developed by <span class="danger">Unitech<span></p>
								</footer>
					<script src="../js/jquery.min.js"></script>
					<script src="../js/bootstrap.min.js"></script>
					<script src="../ckeditor/ckeditor.js"></script>
</body>
</html>