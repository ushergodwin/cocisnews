<?php
	error_reporting(0);
    session_start();
    if (isset($_SESSION['role'])) {
        session_unset();
        session_destroy();
        header('location:login.php');
    }
    else {
        session_unset();
        session_destroy();
        header('location:sublogin.php');
    }
    
?>