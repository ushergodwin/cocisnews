<?php
    error_reporting(0);
    session_start();
    require_once '../connection/db.php';
    if($_SESSION['id'] == 0){
        header('location:login.php');
        die();
    }
    else{
        //deleting user from the database
        if(isset($_GET['uid'])){
           $user_id = intval($_GET['uid']);
           $query = "DELETE FROM subusers WHERE id=?";
           $stmt = $conn->prepare($query);
           $stmt->bind_param('i',$user_id);
           if($stmt->execute()){
              header('location:users.php');
              exit();
           }
           else {
            $error= '<div class="alert alert-danger">Error deleting user</div>'."<br>";
           }
        }

    }
?>