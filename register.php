<?php
global $mysqli;
$title = 'register';
require_once 'template/header.php';
require_once 'config/app.php';
require_once 'config/database.php';

// if(isset($_SESSION['logged_in'])) {
//    header('location: index.php');
// }
?>

<?php



$errors = [];
$email = '';
$name = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $password_confirmation = mysqli_real_escape_string($mysqli, $_POST['password_confirmation']);


    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (empty($password_confirmation)) {
        array_push($errors, "Password Confirmation is required");
    }
    if ($password != $password_confirmation) {
        array_push($errors, "password don't match");


    };
    if (!count($errors)) {
        $userExists = $mysqli->query("select id, email from user where email='$email' limit 1");
        if ($userExists->num_rows) {
            array_push($errors, "Email already registered");
        }
    }


    // create user

    if(!count($errors)){

        $password = password_hash($password, PASSWORD_DEFAULT);


        $query = "insert into user (email, name, password) values ('$email', '$name', '$password')";
        $mysqli->query($query);


//        $_SESSION['logged_in'] = false;
//        $_SESSION['user_id'] = $mysqli->insert_id;
//        $_SESSION['user_name'] = $name;
//        $_SESSION['sm'] = "welcome back $name";
//
//        header('location: private.php');


    }
}

?>

<div id="register">

<h4>Welcome to tote website</h4>
<h5 class="text-info">Please fill in the form below to register your account</h5>
<hr>

    <?php include 'template/errors.php' ?>
    <form action="" method="post">

        <div class="form-group">
            <label for="email">Your email : </label>
            <br>
            <input type="email" name="email" class="form-control" placeholder="Your email" id="email" value="<?php echo $email ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="name">Your name : </label>
            <br>
            <input type="text" name="name" class="form-control" placeholder="Your name" id="name" value="<?php echo $name ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="password">Your password : </label>
            <br>
            <input type="password" name="password" class="form-control" placeholder="Your password" id="password">
        </div>
        <br>
        <div class="form-group">
            <label for="password_confirmation">Confirm password : </label>
            <br>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Your password" id="password_confirmation">
        </div>

<br>
<div class="form-group">
    <button class="btn btn-success">Register!</button>
</div>

    </form>


</div>

