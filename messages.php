<?php
if(isset($_SESSION['sm'])): ?>

<div class="alert alert-success">
    <?php
    echo $_SESSION['sm'];
    ?>


</div>

<?php
unset($_SESSION['sm']);
endif;