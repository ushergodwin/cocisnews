<?php
error_reporting(0);
session_start();
date_default_timezone_set('Africa/Kampala');
require_once '../connection/db.php';
if (strlen($_SESSION['id'] == 0)) {
	header('location:login.php');
	exit();
}
$error = '';
$id = $_SESSION['id'];
$username = $_SESSION['username'];

if(!isset($_POST['sch']))
{
    header('location: ./timetable.php');
    return;
}
// if post is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['delete'])) {
		$eid = mysqli_real_escape_string($conn, strip_tags($_POST['eid']));

		//inserting to the database with prepared statement method
		$query = "DELETE FROM timetable WHERE id = ?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param('s', $eid);
		if ($stmt->execute()) {
			$error = '<div class="alert alert-success">Event deleted successfully!</div>';
		} else {
			$error = '<div class="alert alert-danger">Error deleting event! Try again later.</div>';
		}
	}
}

// setting result per page
$rpp = 10;
//check if the page is set
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}
// check if the page value is greater than 1
if ($page > 1) {
	$start = ($page * $rpp) - $rpp;
} else {
	$start = 0;
}

$sch = $_POST['sch'];
$yr = $_POST['yr'];
$prog = $_POST['prog'];

//count the total number of id in the database
$today = ucfirst(date("l"));

$count = "SELECT COUNT(id) AS id FROM timetable WHERE school = '$sch' AND year = '$yr' AND program = '$prog'; AND days = '$today' ";
$query_count = $conn->query($count);
$result_count = mysqli_fetch_array($query_count);
//getting the number of pages
$total_pages = intval($result_count['id']) / $rpp;
//previous button for the pagination
$previous = $page - 1;
//next button for the pagination
$next = $page + 1;
// looping posts from the database to the table with pagination
$query = "SELECT * FROM timetable WHERE school = '$sch' AND year = '$yr' AND program = '$prog' AND days = '$today';";
$stmt = $conn->prepare($query);
if ($stmt->execute()) {
	$process = $stmt->get_result();
} else {
	$error = '<div class="alert alert-danger">Error fetching events! Try again later.</div>';
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Admin | TimeTables</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/all.css">
	<link rel="icon" type="image/jpg" sizes="16x16" href="../images/cocis/muk.jpeg">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
</head>

<body>
	<div id="home"></div>
	<!-- header section-->
	<?php include '../includes/header.php'; ?><br>
	<!--- header section ends-->

	<!--- === error and success of the comment starts-->
	<div class="container"><?php echo $error; ?></div>
	<!--- === error and success of the comment ends-->
	<section id="maincontent">
		<!--including sidebar file-->
		<?php include '../includes/sidebar.php'; ?>
		<!--- adding new users to the admin-->
		<div class="col-md-9">
			<div class="card shadow my-3">
				<div class="">
					<p class="list-group-item active d-flex justify-content-between">
						TimeTable Schedule
						<a href="./addtimetable.php" class="btn btn-success btn-sm">Add New Schedule to TimeTable</a>
					</p>

				</div>
				<div class="card-body">
					<!--pagination for the table-->
					<nav arial-black="Page navigation example text-center">
						<ul class="pagination justify-content-center">
							<li class="page-item"><a href="post.php?page=<?= $previous; ?>" class="page-link">previous</a></li>
							<?php
							for ($i = 1; $i <= $total_pages; $i++) : ?>
								<li class="page-item"><a href="post.php?page=<?= $i; ?>" class="page-link"><?= $i; ?></a></li>
							<?php endfor; ?>

							<li class="page-item"><a href="post.php?page=<?= $next; ?>" class="page-link">Next</a></li>
						</ul>
					</nav>
					<div class="table-responsive table--no-card m-b-40">
						<table class="table table-bordered table-responsive table-hover">
							<thead>
								<tr>
									<th>S/N</th>
									<th>Course Unit</th>
									<th>Lecturer</th>
									<th>Day</th>
									<th>Time</th>
									<th>Theatre</th>
                                    <th>Action</th>

								</tr>
							</thead>
							<?php
							$count = $no = 1;
							while ($result = $process->fetch_assoc()) {

							?>
								<tbody>
									<tr>
										<?php $eid = $result['id']; ?>
										<td><?php echo $no; ?></td>
										<td><?php echo $result['courseunit']; ?></td>
										<td><?php echo $result['lecturer']; ?></td>
										<td><?php echo $result['days']; ?></td>
										<td><?php echo $result['lecture_time']; ?></td>
                                        <td><?php echo $result['theatre']; ?></td>
										<td style="display:flex;">
											<a style="color:white;text-decoration:none" href="./edittimetable.php?tid<?php echo $eid; ?>">
												<i class="fas fa-pen text-primary mr-2"></i>
											</a>
											<form action="" onsubmit="return confirm('Delete Event?\n Action can not be undone!');" method="POST">
												<input type="hidden" name="eid" value="<?= $eid ?>">
												<button style="color:white;text-decoration:none;" name="delete" class="btn btn-outline-light btn-sm">
													<i class="fas fa-trash mr-2 text-danger"></i>
												</button>
											</form>


										</td>
									</tr>
								</tbody>

							<?php $count = $count + 1;
								$no++;
							} ?>
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