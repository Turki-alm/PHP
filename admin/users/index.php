<?php
$title = 'Users';
include __DIR__.'/../tamplate/header.php';
$users = $mysqli->query('select all * from user order by id')->fetch_all(MYSQLI_ASSOC);
?>

<div class="card">

    <div content="content">

        <a href="create.php" class="btn btn-success">Crrate New user</a>
<br>
        <p class="header">Users : <?php echo count($users) ?></p>
        <div class="table-responsive">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th width="0">#</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th width="50">Actions</th>

                </tr>


                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['name'] ?></td>
                        <td>
                            <a href="" class="btn btn-warning">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>



        </div>

    </div>




</div>

<?php
include __DIR__.'/../tamplate/footer.php';

