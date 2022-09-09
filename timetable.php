<?php
//disabling error reporting
error_reporting(0);
date_default_timezone_set('Africa/Kampala');
//including database file
require_once 'connection/db.php';
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


if (isset($_POST['sch'])) {
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
    // looping posts AS name from the database to the table with pagination
    $query = "SELECT * FROM timetable WHERE school = '$sch' AND year = '$yr' AND program = '$prog' AND days = '$today';";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        $process = $stmt->get_result();
    } else {
        $error = '<div class="alert alert-danger">Error fetching events! Try again later.</div>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content=" latest news,latest news today,top news, current news, news today, news now">
    <meta property="og:title" content="The number one naija blog for the latest sports and current news">
    <meta property="og:description" content="Home of all latest , current and world current news">
    <meta property="og:image" content="https://unitechdev.com/image/ogimage.jpg">
    <meta property="og:url" content="https://unitechdev.com">
    <meta property="og:type" content="blog">
    <meta property="twitter:title" content="The number one for the latest sports and current news">
    <meta property="twitter:description" content="Home of all latest , current and world current news">
    <meta property="twitter:image" content="https://unitechdev.com/image/ogimage.jpg">
    <meta property="twitter:url" content="https://unitechdev.com">
    <meta property="twitter:card" content="summary_large_image">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="icon" type="image/jpg" sizes="16x16" href="images/cocis/muk.jpeg">
    <title>Cocis News | TimeTable</title>
</head>

<body>
    <!--including topbar-->
    <?php include 'includes/topbar.php'; ?>

    <!-- swiper sliding posts page-->
    <section id="section"><br />
        <div class="container mt-5">
            <div class="row justify-content-center">
                <!--first column-->
                <div class="col-md-12">
                    <div class="card card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="school" class="w-100">
                                        School
                                        <select name="sch" class="custom-select" required>
                                            <option value="">-- select school --</option>
                                            <?php foreach ($schools as $school) : ?>
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
                                            <?php foreach ($years as $year) : ?>
                                                <option value="<?= $year->name ?>">Year <?= $year->name ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <label for="program" class="w-100">
                                        Program
                                        <select name="prog" class="custom-select" required>
                                            <option value="">-- select school --</option>
                                            <?php foreach ($programs as $program) : ?>
                                                <option value="<?= $program->name ?>"><?= $program->name ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </label>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <button type="submit" class="btn btn-outline-success">Get TimeTable Schedule</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><br>

            </div>

            <?php if (isset($_POST['sch'])) : ?>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-bordered table-responsive table-hover w-100">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Course Unit</th>
                                        <th>Lecturer</th>
                                        <th>Day</th>
                                        <th>Time</th>
                                        <th>Theatre</th>
                                        <th>Status</th>
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
                                            <td>
                                                <?php $time = date("H", strtotime($result['lecture_time']));  ?>
                                                <?php if($time === $now): ?>
                                                    <span class="text-success">Ongoing</span>
                                                    <?php elseif($now < $time): ?>
                                                        <span class="text-secondary">Pending</span>
                                                    <?php else : ?>
                                                        <span class="text-warning">Completed</span>
                                                <?php endif ?>
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
            <?php endif ?>
        </div>
    </section>
    <!-- bootstrap modal ends -->
    <!-- footer section--->
    <?php include 'includes/footer.php'; ?>

    <script src="js/jquery.min.js"></scr>
    <script src="js/swiper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        /* posts slide*/
        var swiper = new Swiper('.swipe1', {
            spaceBetween: 30,
            effect: 'fade',
            autoplay: {
                display: 1500,
                diableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'progressbar',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</body>

</html>