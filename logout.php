<?php
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['auth']);
    header("Location: login.php");
?>