<?php
$title = 'Create';
include __DIR__.'/../tamplate/header.php';
?>

    <div class="card">

        <div class="content">
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

                <br>
                <div class="form-group">
                    <button class="btn btn-success">Create!</button>
                </div>

            </form>


        </div>

        </div>


<?php
include __DIR__.'/../tamplate/footer.php';

