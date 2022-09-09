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

$query = "SELECT DISTINCT school AS name FROM timetable";
$now = date("H");
$stmt = $conn->prepare($query);
$stmt->execute();
$process = $stmt->get_result();
$schools = array();
while($result = $process->fetch_object())
{
    $schools[] = $result;
}

$query = "SELECT DISTINCT program AS name FROM timetable";
$stmt = $conn->prepare($query);
$stmt->execute();
$process = $stmt->get_result();
$programs = array();
while($result = $process->fetch_object())
{
    $programs[] = $result;
}

$query = "SELECT DISTINCT year AS name FROM timetable";
$stmt = $conn->prepare($query);
$stmt->execute();
$process = $stmt->get_result();
$years = array();
while($result = $process->fetch_object())
{
    $years[] = $result;
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
						TimeTable
						<a href="./addtimetable.php" class="btn btn-success btn-sm">Add New Schedule to TimeTable</a>
					</p>

				</div>
				<div class="card-body">
                    <form action="./schedules.php" method="POST">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="school" class="w-100">
                                    School 
                                    <select name="sch" class="custom-select" required>
                                        <option value="">-- select school --</option>
                                        <?php foreach($schools as $school): ?>
                                            <option value="<?= $school->name ?>"><?= $school->name ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </label>
                            </div>
                              <div class="col-md-3">
                                <label for="Year" class="w-100">
                                    Year
                                    <select name="yr" class="custom-select" required>
                                        <option value="">-- select year --</option>
                                        <?php foreach($years as $year): ?>
                                            <option value="<?= $year->name ?>">Year <?= $year->name?></option>
                                        <?php endforeach ?>
                                    </select>
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label for="program" class="w-100">
                                    Program
                                    <select name="prog" class="custom-select" required>
                                        <option value="">-- select school --</option>
                                        <?php foreach($programs as $program): ?>
                                            <option value="<?= $program->name ?>"><?= $program->name?></option>
                                        <?php endforeach ?>
                                    </select>
                                </label>
                            </div>
                            <div class="col-md-3 mt-4">
                                <button type="submit" class="btn btn-outline-success">Get TimeTable</button>
                            </div>
                        </div>
                    </form>
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