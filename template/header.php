<?php
global $title;

include_once __DIR__.'/../config/app.php';
?>
<!DOCTYPE html>
<html dir="<?php echo $config['dir'] ?>" lang="<?php echo $config['lang'] ?>">
<head>
    <title><?php echo $config['app_name'] . ' | ' . $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .custom-card-image{

            height: 200px;
            background-size: cover ;
            background-position: center;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><?php echo$config['app_name'] ?>></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo $config['url'] ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $config['url'] ?>f/contact.php">contact</a>
                </li>

                <ul class="navbar-nav ml-auto">
<!--                    --><?php //if(isset($_SESSION['logged_in'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $config['url'] ?>f/Login.php">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $config['url'] ?>f/register.php">Register</a>
                    </li>
<!--               //     --><?php //else: ?>
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link" href="--><?php //echo $config['url'] ?><!--f/logout.php">logout</a>-->
<!--                        </li>-->
<!--                    --><?php //endif ?>
                </ul>
    </div>
</nav>
<div class="container pt-5">

    <?php include 'messages.php'; ?>