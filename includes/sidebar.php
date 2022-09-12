<?php
require_once '../connection/db.php';
// counting the totalpost from the database
$count = "SELECT COUNT(*) as posted FROM posts";
$number = $conn->query($count);
$fetch = mysqli_fetch_array($number);

//counting the total registered users except the admin
$count_user = "SELECT COUNT(*) AS reg_users FROM admin_detail";
$users_num = $conn->query($count_user);
$fetch_users = mysqli_fetch_array($users_num);
$count_writers = "SELECT COUNT(*) AS writers FROM subusers";
$writers_num = $conn->query($count_writers);
$writers = mysqli_fetch_array($writers_num);

$users = $fetch_users['reg_users'] + $writers['writers'];

$events_result = $conn->query("SELECT COUNT(*) as `count` FROM event_calendar");
$events_result = mysqli_fetch_object($events_result);
$events = $events_result->count;

$visits_result = $conn->query("SELECT MAX(num) as visits FROM views");
$visits_result = mysqli_fetch_object($visits_result);
$visits = $visits_result->visits;

$timetable_result = $conn->query("SELECT COUNT(*) as `count` FROM timetable");
$timetable_result = mysqli_fetch_object($timetable_result);
$timetable = $timetable_result->count;

?>


<div class="container" style="background-color:#E9ECEF;">
	<div class="row">
		<div class="col-md-3 my-3">
			<div class="list-group shadow">
				<a href="#" class="list-group-item active">Dashboard</a>
				<a href="#" class="list-group-item">Pages <span class="badge badge-pill badge-warning">10</span></a>
				<a href="#" class="list-group-item">Posts <span class="badge badge-pill badge-warning"><?php echo $fetch['posted']; ?></span></a>
				<a href="#" class="list-group-item">Admin <span class="badge badge-pill badge-warning"><?php echo $fetch_users['reg_users']; ?></span></a>
				<a href="#" class="list-group-item">Writers <span class="badge badge-pill badge-warning"><?php echo $writers['writers']; ?></span></a>
			</div><br>
			<!-- well---->
			<div class="card shadow p-2">
				<h5 class="card-title">Disk space used</h5>
				<div class="progress">
					<div class="progress-bar-striped bg-danger" role="progressbar" arial-valuenow="5" arial-valuemin="0" arial-valuemax="100" style="width: 1%;">
						<span class="sr-only">0.5%</span>
					</div>

				</div>
				<h5 class="card-title">Bandwidth used</h5>
				<div class="progress">
					<div class="progress-bar-striped bg-primary" role="progressbar" arial-valuenow="05" arial-valuemin="0" arial-valuemax="100" style="width:1%;">
						<span class="sr-only">0.6%</span>
					</div>
				</div>
			</div>
		</div>