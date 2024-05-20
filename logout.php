<?php 
    session_start();
    $_SESSION['usersss'] = '';
    session_unset();
    header('location:login.php');