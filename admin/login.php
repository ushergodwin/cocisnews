<?php
        #error_reporting(0);
        session_start();
        // connecting to the database
        require_once "../connection/db.php";
            $error = "";
            if ($_SERVER['REQUEST_METHOD']== 'POST') {
                if (isset($_POST['login'])) {
                    $email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
                    $password = mysqli_real_escape_string($conn,md5($_POST['password']));
                    $query = "SELECT `id`,`role`,`username` FROM `admin_detail` WHERE `email` = ? AND `password` =?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param('ss',$email,$password);
                    $stmt->execute();
                    $process = $stmt->get_result();
                    $result = $process->fetch_assoc();
                    if ( $result > 0) {
                         $_SESSION['id'] = $result['id'];
                         $_SESSION['role'] = $result['role'];
                         $_SESSION['username'] = $result['username'];
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
    				    <link rel="icon" type="image/jpg" sizes="16x16" href="../images/cocis/muk.jpeg">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body style="background: #f5f5f5 !important;
"> 
                <div class="container create">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6">
                        <div class="card shadow p-2">
                        <h4 class="card-header py-1 bg-success text-white text-center">Admin Login page</h4>
                            <div><?php echo $error;?></div>
                        <form class="fcard-body" action="" method="POST" enctype="multipart/form-data">
                            <label for="Username">Enter email</label><br>
                            <input type="email" name="email" class="form-control" value=""><br>
                            <label for="Username">Enter password</label><br>
                            <input type="password" name="password" class="form-control" value=""><br>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary" name="login">Login</button>
                                <h5>News Editor? <a href="./news-editor.php">Login Here</a></h5>
                            </div>
                        </form>
                        </div>          
                    </div>  
                </div>
                </div>
</body>
</html>