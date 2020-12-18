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
            $username = $_SESSION['username'];
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
				$error= '<div class="alert alert-danger">Image error! check if it is image, not large size and file type is valid</div>'."<br>"; 		
			}
			else{
				$image_path = "../images/".$_FILES['post-img']['name'];
				move_uploaded_file($_FILES['post-img']['tmp_name'],$image_path);
			$query = "INSERT INTO posts(post_title,post_content,post_tag,post_desc,post_category,image_dir,post_author)
			 VALUES(?,?,?,?,?,?,?)";
			$stmt = $conn->prepare($query);
			$stmt->bind_param('sssssss',$p_title,$p_body,$meta_tag,$meta_dsc,$post_ctg,$image_path,$author);
			if ($stmt->execute()) {
				$error= '<div class="alert alert-success">Content uploaded successfully!</div>';
			}
			else {
				$error = '<div class="alert alert-danger">Error posting content! Try again later.</div>';
			}
		}
	}
}
                                
				
				// setting result per page
				$rpp = 10;
				//check if the page is set
				if (isset($_GET['page'])) {
					$page = $_GET['page'];
				}
				else{
					$page = 1;
				}
				// check if the page value is greater than 1
				if ($page > 1) {
					$start = ($page * $rpp) - $rpp;
				}
				else {
					$start = 0;
				}
				//count the total number of id in the database
				$count = "SELECT COUNT(id) AS id FROM posts";
				$query_count = $conn->query($count);
				$result_count = mysqli_fetch_array($query_count);
				//getting the number of pages
				$total_pages = intval($result_count['id']) / $rpp;
				//previous button for the pagination
				$previous = $page -1;
				//next button for the pagination
				$next = $page +1;
				// looping posts from the database to the table with pagination
				$query = "SELECT * FROM posts ORDER BY id LIMIT $start,$rpp";
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
	<title>Admin | Post</title>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/all.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
</head>
<body>     
								 <div id="home"></div>
			                     <!-- header section-->
                                <?php include '../includes/header.php';?><br>
                                <!--- header section ends-->

								<!--- === error and success of the comment starts-->
								<div class="container"><?php echo $error;?></div>
								<!--- === error and success of the comment ends-->
								<section id="maincontent">
									<!--including sidebar file-->
									<?php include '../includes/sidebar.php';?>
									    <!--- adding new users to the admin-->
									<div class="col-md-9">
                                        <div class="card shadow my-3">
                                                <div>
                                                    <p class="list-group-item active">List Of Posts</p>
                                                </div>
                                                <div class="card-body">
													<!--pagination for the table-->
												<nav arial-black="Page navigation example text-center">
													<ul class="pagination justify-content-center">
														<li class="page-item"><a href="post.php?page=<?= $previous;?>" class="page-link">previous</a></li>
														<?php 
														for ($i=1; $i<= $total_pages; $i++):?>
															<li class="page-item"><a href="post.php?page=<?= $i;?>" class="page-link"><?= $i; ?></a></li>
														<?php endfor; ?>
														
														<li class="page-item"><a href="post.php?page=<?= $next;?>" class="page-link">Next</a></li>
													</ul>
												</nav>
												<div class="table-responsive table--no-card m-b-40">
                                                <table class="table table-bordered table-responsive table-hover">
                                                    <thead>
                                                        <tr>
															<th>S/N</th>
                                                            <th>Title</th>
                                                            <th>Author</th>
                                                            <th>Date</th>
                                                            <th>Category</th>
															<th>Action</th>
															
                                                        </tr>
                                                    </thead>
													<?php
															$count = 1;
															while ($result = $process->fetch_assoc()) {
                                                               ?>
														<tbody>
															<tr>
																<?php  $pid = $result['id'];?>
																<td><?php echo $pid; ?></td>
																<td><?php echo $result['post_title'];?></td>
																<td><?php echo $result['post_author'];?></td>
																<td><?php echo $result['post_date'];?></td>
																<td><?php echo $result['post_category'];?></td>
																<td style="display:flex;">
																<a style="color:white;text-decoration:none" href="editpost.php?pid=<?php echo $pid;?>">
																	<i class="fas fa-pen text-primary mr-2"></i>
																</a>
                                                                <a style="color:white;text-decoration:none;" href="deletepost.php?pid=<?php echo $pid;?>">
																	<i class="fas fa-trash mr-2 text-danger"></i>
                                                                </a>
                                                                
																</td>
															</tr>
														</tbody>
                                                        
														<?php $count = $count + 1; }?>
                                                </table>
										    </div>
										</div>
										</div>
                                    </div>
                                </div>
                            </div>							
					</section>
					<!--back to top-->
            <a href="#home" rel="nofollow" class="back-to-top"><i class="fas fa-arrow-up"></i></a>
								<?php include '../includes/modal.php'; ?>
								<?php include '../includes/footer.php'; ?>
					<script src="../js/jquery.min.js"></script>
                        <script src="../js/popper.min.js"></script>
                        <script src="../js/bootstrap.min.js"></script>
                        <script src="../js/script.js"></script>
					<script src="../ckeditor/ckeditor.js"></script>
</body>
</html>