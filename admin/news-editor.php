<?php
        error_reporting(0);
        session_start();
                // connecting to the database
        require_once "../connection/db.php";
            $error = "";
            if ($_SERVER['REQUEST_METHOD']== 'POST') {
                if (isset($_POST['login'])) {
                    $email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
                    $password = mysqli_real_escape_string($conn,md5($_POST['password']));
                    $query = "SELECT `id`,`username` FROM `subusers`  WHERE `email` = ? AND `password`=?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param('ss',$email,$password);
                    $stmt->execute();
                    $process = $stmt->get_result();
                    $result = $process->fetch_assoc();
                    if ($result['id'] > 0) {
                        $_SESSION['id'] = $result['id'];
                        $_SESSION['username'] = $result['username'];
                        $_SESSION['is_editor'] = true;
                         $stmt->close();
                        header("location:dashboard.php");
                    }   
                    else{
                        $error .= '<div class="alert alert-danger">Incorrect Username or Password</div>';
                      
                    }
                }
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is the login page to Your Blog website">
    <title>Admin | Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    				    <link rel="icon" type="image/jpg" sizes="16x16" href="../images/cocis/muk.jpeg">
</head>
<body style="background: #f5f5f5 !important;
"> 
                <div class="container mt-2">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6">
                        <div class="card shadow p-2">
                        <h4 class=" card-header py-1 bg-success text-white text-center">News Editor Login page</h4>
                            <div><?php echo $error;?></div>
                        <form class="card-body" action="" method="POST" enctype="multipart/form-data">
                            <label for="Username">Enter email</label><br>
                            <input type="email" name="email" class="form-control" value=""><br>
                            <label for="Username">Enter password</label><br>
                            <input type="password" name="password" class="form-control" value=""><br>
                            <button type="submit" class="btn btn-primary" name="login">Login</button>
                        </form>
                        </div>          
                    </div>  
                </div>
                </div>
                <?php include '../includes/footer.php' ?>
</body>
</html>
