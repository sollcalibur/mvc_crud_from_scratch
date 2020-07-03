<?php
// uncomment this to see the structure of $data

// echo "<pre>";
// print_r($data);
// echo "</pre>";
if (isset($data['delete_sucess']) && $data['delete_sucess'] == TRUE) {
?>
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Deletion of user info was a success.
    </div>
<?php
}
if (isset($data['update_success']) && $data['update_success'] == TRUE) {
?>
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Update of user info was a success.
    </div>
<?php
}
if (isset($data['create_success']) && $data['create_success'] == TRUE) {
?>
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Successfully registered a new user.
    </div>
<?php
}
?>
<div class="row">
    <div class="col">
        <a class="btn btn-outline-primary" href="<?php echo WEBROOT . "Crud/create/"; ?>">
            <i class="fa fa-user-plus" aria-hidden="true"></i>
            Add User
        </a>
    </div>
</div>
<br />
<div class="table-responsive">
    <table class="table table-sm table-hover">
        <thead class="thead-light">
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Created On</th>
                <th>Last Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['users'] as $index => $user) {
            ?>
                <tr>
                    <td><?php echo $user['user_id']; ?></td>
                    <td><?php echo $user['user_name']; ?></td>
                    <td><?php echo $user['user_longname']; ?></td>
                    <td><?php echo $user['user_created_on']; ?></td>
                    <td><?php echo $user['user_updated_on']; ?></td>
                    <td>
                        <a class="btn btn-info btn-sm" href="<?php echo WEBROOT . "Crud/update/" . $user['user_id']; ?>">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Update
                        </a>
                        <a class="btn btn-danger btn-sm" href="<?php echo WEBROOT . "Crud/delete/" . $user['user_id']; ?>">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                            Delete
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <?php require(ROOT . 'Views/Layouts/PaginationLinks.php'); ?>

</div>