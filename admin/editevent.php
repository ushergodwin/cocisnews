<?php
error_reporting(1);
// starting session
session_start();
require_once '../connection/db.php';
//redirecting to the login page  if no id is found
if (strlen($_SESSION['id'] == 0)) {
    header('location:login.php');
}

$eid = "";

if(!isset($_GET['eid'])){
    header("location: ./events.php");
    return;
}

$eid = strip_tags($_GET['eid']);


// if post is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        $event_name = mysqli_real_escape_string($conn, strip_tags($_POST['event_name']));
        $description = mysqli_real_escape_string($conn, strip_tags($_POST['editor1']));
        $start_date = mysqli_real_escape_string($conn, strip_tags($_POST['start_date']));
        $end_date = mysqli_real_escape_string($conn, strip_tags($_POST['end_date']));

        //inserting to the database with prepared statement method
        $query = "UPDATE event_calendar set title = ?, description = ?,start = ?, end = ?
			WHERE id = ? ";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssss', $event_name, $description, $start_date, $end_date, $eid);
        if ($stmt->execute()) {
            $error = '<div class="alert alert-success">Event updated successfully!</div>';
        } else {
            $error = '<div class="alert alert-danger">Error updating event! Try again later.</div>';
        }
    }
}
// looping posts from the database to the table
$event = array();

$query = "SELECT * FROM event_calendar WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $eid);
if ($stmt->execute()) {
    $process = $stmt->get_result();
    $event = $process->fetch_object();
} else {
    $error = '<div class="alert alert-danger">Error fetching events! Try again later.</div>';
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin | Edit Event</title>
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
                    <label for="page">Event Name</label>
                    <input type="text" name="event_name" required class="form-control" value="<?= $event->title ?>"><br>
                    <label for="post-body">Description (optional) </label>
                    <textarea name="editor1" required class="ckeditor form-control"><?= $event->description ?></textarea><br>

                    <label for="meta-tag">Start Date</label>
                    <input type="datetime-local" name="start_date" required class="form-control" value="<?= $event->start ?>"><br>

                    <label for="meta-description">End Date</label>
                    <input type="datetime-local" name="end_date" required class="form-control" value="<?= $event->end ?>"><br>
                    <button type="submit" class="btn btn-primary" name="update">Update Event</button>
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
    <?php include '../includes/footer.php'; ?>
    <!-- footer section ends-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>
</body>

</html>