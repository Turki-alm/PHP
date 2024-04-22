<?php
session_start();

if(isset($_SESSION['logged_in'])){
    $_SESSION = [];
    $_SESSION['sm'] = "you are logout";
    header('location: index.php');
    die();
}