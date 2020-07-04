<?php
// uncomment this to see the structure of $data

// echo "<pre>";
// print_r($data);
// echo "</pre>";
if (isset($data['result']) && $data['result'] === TRUE) {
?>
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Update of user info was a success.
    </div>
<?php
} elseif (isset($data['result']) && $data['result'] === FALSE) {
?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong> Invalid Credentials!
    </div>
<?php
}
?>
<form method="post" action="<?php echo $data['user_id']; ?>">
    <div class="form-group">
        <label for="username">
            <strong>Username</strong>
        </label>
        <input name="username" type="text" value="<?php echo $data['user_name']; ?>" class="form-control" id="username">
        <div class="d-flex flex-row-reverse">
            <span>Accepts Alpha-Numeric String, <?php echo $data['MIN_CHAR_LIMIT'] . "-" . $data['MAX_CHAR_LIMIT'] ?>
                Characters</span>
        </div>
    </div>
    <div class="form-group">
        <label for="name">
            <strong>Full Name</strong>
        </label>
        <input name="name" type="text" value="<?php echo $data['user_longname']; ?>" class="form-control" id="name">
        <div class="d-flex flex-row-reverse">
            <span>Accepts Alphabets And Spaces, <?php echo $data['MIN_CHAR_LIMIT'] . "-" . $data['MAX_CHAR_LIMIT'] ?>
                Characters</span>
        </div>
    </div>
    <div class="form-group">
        <label for="password">
            <strong>Password</strong>
        </label>
        <input name="password" type="password" class="form-control" placeholder="Update password" id="pwd">
        <div class="d-flex flex-row-reverse">
            <span>Accepts Any Characters, <?php echo $data['MIN_CHAR_LIMIT_PASS'] . "-" . $data['MAX_CHAR_LIMIT_PASS'] ?>
                Characters</span>
        </div>
    </div>
    <button name="submit" type="submit" class="btn btn-primary" <?php echo isset($data['result']) && $data['result'] === TRUE ? "disabled" : ""; ?>>
        Submit
    </button>
    <a class="btn btn-info" href="<?php echo WEBROOT . "crud/index/1"; ?>">
        Home
    </a>
</form>