<?php
  error_reporting(0);
    session_start();
    require_once '../connection/db.php';
    if(strlen($_SESSION['id'] == 0) && strlen($_SESSION['uid'] == 0)){
        header('location:login.php');
        exit();
    }
    else{
        //deleting post from the table
        if(isset($_GET['pid'])){
           $post_id = intval($_GET['pid']);
           $query = "DELETE FROM posts WHERE id=?";
           $stmt = $conn->prepare($query);
           $stmt->bind_param('i',$post_id);
           if($stmt->execute()){
               header('location:post.php');
                exit();
           }
           
        }

    }
?>