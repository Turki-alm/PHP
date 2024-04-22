<?php
require_once 'template/header.php';
require_once 'config/database.php';

$private = $mysqli->query("select * from private order by id")
            ->fetch_all(MYSQLI_ASSOC);


$title = "private";
?>

    <div class="table-responsive">
        <table class="table table-hover table-striped">+
            <thead>

            <tr>
                <th>name</th>
                <th>email</th>
            </tr>

            </thead>
            <tbody>



<?php
foreach ($private as $priv)

{ ?>

    <tr>
        <td><?php echo $priv['name'] ?></td>
        <td><?php echo $priv['email'] ?></td>
    </tr>
        <?php

        }

        ?>
            </tbody>

    </table>



    </div>




<?php
require_once 'template/footer.php';