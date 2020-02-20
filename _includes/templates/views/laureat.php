<?php
ob_start();
?>
<form action="" method="post">
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
</form>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/_includes/templates/views/discussion.php");

$content = ob_get_clean();
?>
