<?php


global $mysqli;
$title = "Contact us";
require_once 'template/header.php';
require_once 'config/database.php';
$documentErorr = '';


$services = $mysqli->query("select id, name, price from services order by name")
    -> fetch_all(MYSQLI_ASSOC);
# Vaildation Form

// for string
function filterString($field){

    $field = filter_var(trim($field),  FILTER_SANITIZE_STRING);
}


// for email
function filterEmail($field){

    $field = filter_var(trim($field),  FILTER_SANITIZE_EMAIL);

    if(filter_var($field,FILTER_VALIDATE_EMAIL)){
        return $field;
    }else{
        return false;
    }

}

function canUpload($file){


    // array contain the allowed lists
    $allowed = [
        'jpg' => 'image/jpg',
        'jpeg' => 'image/jpeg',
        'png' =>  'imsge/png',
        'gif' => 'image/gif'
    ];

    // size allowed
    $maxFilSize = 10 * 1024;

    // size type allowed from tmp is better
    $fileMimeType = mime_content_type($file['tmp_name']);
    $fileSize = $file['size'];

    if(!in_array($fileMimeType , $allowed)) {
        return 'Files type not allowed';
    };

    if($fileSize > $maxFilSize) {
        return 'file size is high';
    }
    return true;

}



if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // vlidate email address

    if(!filterEmail($_POST['email'])){
        die('your email is incorrect');
    }

    // Check contact for the function
  #  echo "<pre>"; print_r($_POST); print_r($_FILES); echo"</pre>";

    // if the file is uploading with not any errors do

if(isset($_FILES['document']) && $_FILES['document']['error'] == 0){

    $canUpload = canUpload($_FILES['document']);

if($canUpload === true){

    $uploadDir ='uploads';

    if(!is_dir($uploadDir)){
        mkdir($uploadDir,0775);
    }
    $fileName = $_FILES['document']['name'];

    move_uploaded_file($_FILES['document']['tmp_name'], $uploadDir.'/'.$fileName);

}
else{
    $documentErorr = $canUpload;

}

}

}



?>

<h1>Hello to Contact Us :)</h1>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" name="name" class="form-control">

    </div>
<br />
    <div class="form-group">
        <label for="name">Your email</label>
        <input type="email" name="email" class="form-control">

    </div>
    <br />
    <div class="form-group">
        <label for="document">Your document</label>
        <input type="file" name="document" class="form-control">

    </div>

    <div class="from-group">
        <label for="services">Services</label>
        <select name="services" id="services" class="from-control">
            <?php foreach ($services as $service) { ?>
            <option value="<?php echo $service['id'] ?>">
            <?php echo $service['name'] ?>




            </option>



           <?php }?>




        </select>

    </div>
    <br />
    <div class="form-group">
        <label for="area">Your message</label>
        <textarea name="message" class="form-control"></textarea>

    </div>
    <br />
    <button class="btn btn-primary">Send</button>
</form>
<br />

<?php require_once 'template/footer.php' ?>
