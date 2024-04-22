
<?php
$title = "Home Page";
require_once 'template/header.php';
require 'class/Service.php';
require 'config/App.php';

$services = new Service();



?>


<h1>Hello to our website</h1>

<?php $products = $mysqli->query("Select * from product")->fetch_all(MYSQLI_ASSOC) ?>

<div class="row">

    <?php foreach ($products as $product) { ?>

    <div class="col-md-4">
        <div class="card mb-3">

            <div class="custom-card-image" style="background-image : url(<?php echo $config['url'].$product['pic'] ?>)"></div>


            <div class="card-body text-center">



                <div class="card-title"><?php echo $product['name'] ?></>


                <div>product des : <?php echo $product['des'] ?></div>

                <div class="text-success"><?php echo $product['price'] ?> SAR</div>

            </div>


        </div>


    </div>

    <?php } ?>
</div>


<?php require_once 'template/footer.php' ?>