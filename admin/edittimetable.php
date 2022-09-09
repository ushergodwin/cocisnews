<?php
error_reporting(1);
// starting session
session_start();
date_default_timezone_set('Africa/Kampala');
require_once '../connection/db.php';
//redirecting to the login page  if no id is found
if (strlen($_SESSION['id'] == 0)) {
    header('location:login.php');
}


if (isset($_GET['t'])) {
    header('location: ./schedules.php');
    return;
}

$tid = strip_tags($_GET['tid']);

// if post is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        $school = mysqli_real_escape_string($conn, strip_tags($_POST['school']));
        $program = mysqli_real_escape_string($conn, strip_tags($_POST['program']));
        $courseunit = mysqli_real_escape_string($conn, strip_tags($_POST['courseunit']));
        $lecturer = mysqli_real_escape_string($conn, strip_tags($_POST['lecturer']));
        $time = $_POST['lecture_time'];
        $room  = $_POST['theater'];
        $year = $_POST['year'];


        $query = "UPDATE timetable SET school = ?, courseunit = ?, program = ?, year = ?, lecturer = ?, lecture_time = ?, theatre = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssssss', $school, $courseunit, $program, $year, $lecturer, $time, $room, $tid);

        if ($stmt->execute()) {
            $error = '<div class="alert alert-success">Timetable updated successfully!</div>';
        } else {
            $error = '<div class="alert alert-danger">Error updating  timetable! Try again later.</div>';
        }
    }
}

$query = "SELECT * FROM timetable WHERE id = ? ";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $tid);
$stmt->execute();

$restult = $stmt->get_result();
$schedule = $restult->fetch_object();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin | Update TimeTable </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
    <style type="text/css">
        td>button {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <!-- header section-->
    <?php include '../includes/header.php'; ?>
    <!-- header section ends-->
    <!--- === error and success of the comment starts-->
    <div class="container"><?php echo $error; ?></div>
    <!--- === error and success of the comment ends-->
    <section id="maincontent">
        <?php include '../includes/sidebar.php'; ?>
        <div class="col-md-9 my-3">

            <!-- latest post--->
            <div class="card card-body shadow">
                <form class="form-group" enctype="multipart/form-data" method="POST" action="">
                    <div class="form-group">
                        <label for="post-body">School </label>
                        <select name="school" class="custom-select">
                            <option value="">-- select school --</option>
                            <option value="SCIT" <?= $schedule->school == "SCIT" ? "selected" : "" ?>>SCIT</option>
                            <option value="EASLIS" <?= $schedule->school == "EASLIS" ? "selected" : "" ?>>EASLIS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="post-body">Program </label>
                        <select name="program" class="custom-select">
                            <option value="">-- select program --</option>
                            <option value="BIST" <?= $schedule->program == "BIST" ? "selected" : "" ?>>BIST</option>
                            <option value="SE" <?= $schedule->program == "SE" ? "selected" : "" ?>>SE</option>
                            <option value="CS" <?= $schedule->program == "CS" ? "selected" : "" ?>>CS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="post-body">Year of study</label>
                        <select name="year" class="custom-select">
                            <option value="">-- select year--</option>
                            <option value="1" <?= $schedule->year == "1" ? "selected" : "" ?>>Year 1</option>
                            <option value="2" <?= $schedule->year == "2" ? "selected" : "" ?>>Year 2</option>
                            <option value="3" <?= $schedule->year == "3" ? "selected" : "" ?>>Year 3</option>
                            <option value="4" <?= $schedule->year == "4" ? "selected" : "" ?>>Year 4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="page">Course Unit</label>
                        <input type="text" name="courseunit" required class="form-control" value="<?= $schedule->courseunit ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="lecturer">Lecturer Name</label>
                        <input type="text" name="lecturer" class="form-control" value="<?= $schedule->lecturer ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="lecture_time">Lecture Time</label>
                        <input type="time" name="lecture_time" class="form-control" value="<?= $schedule->lecture_time ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="theater">Lecture Theatre</label>
                        <input type="text" name="theater" class="form-control" value="<?= $schedule->theatre ?>" required />
                    </div>
                    <button type="submit" class="btn btn-primary" name="update">Update TimeTable</button>
                </form>
            </div>


        </div>
        </div>
        </div>
    </section>
    <!-- modal section-->
    <?php include '../includes/modal.php'; ?>
    <!-- modal section ends-->
    <!-- footer section -->

    <!-- footer section ends-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>
</body>

</html>