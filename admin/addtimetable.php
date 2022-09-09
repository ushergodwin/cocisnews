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




// if post is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save'])) {
        $school = mysqli_real_escape_string($conn, strip_tags($_POST['school']));
        $program = mysqli_real_escape_string($conn, strip_tags($_POST['program']));
        $courseunit = mysqli_real_escape_string($conn, strip_tags($_POST['courseunit']));
        $lecturer = mysqli_real_escape_string($conn, strip_tags($_POST['lecturer']));
        $days = (array) $_POST['days'];
        $times = explode(",", $_POST['lecture_time']);
        $theater = explode(",", $_POST['theater']);
        $year = $_POST['year'];

        $days_count = count($days);
        $executed = false;
        for($i = 0; $i < $days_count; $i++)
        {
            //inserting to the database with prepared statement method
            $day = $days[$i];
            $time = $times[$i];
            if(count($theater) === 1)
            {
                $room = $theater[0];
            }else {
                $room = $theater[$i];
            }

            $query = "INSERT INTO timetable(school, courseunit, program, year, lecturer, days, lecture_time, theatre) VALUES(?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ssssssss', $school, $courseunit, $program, $year, $lecturer, $day, $time, $room);
            $executed = $stmt->execute();
        }

        if ($executed) {
            $error = '<div class="alert alert-success">Timetable saved successfully!</div>';
        } else {
            $error = '<div class="alert alert-danger">Error saving timetable! Try again later.</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin | New TimeTable </title>
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
                            <option value="SCIT">SCIT</option>
                            <option value="EASLIS">EASLIS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="post-body">Program </label>
                        <select name="program" class="custom-select">
                            <option value="">-- select program --</option>
                            <option value="BIST">BIST</option>
                            <option value="SE">SE</option>
                            <option value="CS">CS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="post-body">Year of study</label>
                        <select name="year" class="custom-select">
                            <option value="">-- select year--</option>
                            <option value="1">Year 1</option>
                            <option value="2">Year 2</option>
                            <option value="3">Year 3</option>
                            <option value="4">Year 4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="page">Course Unit</label>
                        <input type="text" name="courseunit" required class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="lecturer">Lecturer Name</label>
                        <input type="text" name="lecturer" class="form-control" required/>
                    </div>

                    <div class="form-group">
                        <label for="days">Days</label>
                        <div class="d-flex justify-content-between flex-md-column flex-lg-row">
                            <input type="checkbox" class="custom-checkbox" value="Monday" name="days[]"> Monday
                            <input type="checkbox" class="custom-checkbox" value="Tuesday" name="days[]"> Tuesday
                            <input type="checkbox" class="custom-checkbox" value="Wednesday" name="days[]"> Wednesday
                            <input type="checkbox" class="custom-checkbox" value="Thursday" name="days[]"> Thursday
                            <input type="checkbox" class="custom-checkbox" value="Friday" name="days[]"> Friday
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="days">Lecture Time (seperate time with commas)</label>
                        <input type="text" name="lecture_time" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="theater">Lecture Theatre (seperate theatres with commas)</label>
                        <input type="text" name="theater" class="form-control" required/>
                    </div>
                    <button type="submit" class="btn btn-primary" name="save">Generate and save TimeTable</button>
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