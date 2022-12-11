<?php
    // Add the header and php functions
    require './inc/header.php';

    // Include database file
    include 'database.php';

    $userObj = new database();

    // Delete record from table
    if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
        $deleteId = $_GET['deleteId'];
        $userObj->deleteRecord($deleteId);
  }

?>
<main class="table">
    <section>
        <?php
        // Messages
        if (isset($_GET['error']) == "none2") {
            echo "<div class='alert alert-success alert-dismissible'>
                    User added successfully
                    </div>";
        }
        if (isset($_GET['msg2']) == "update") {
            echo "<div class='alert alert-success alert-dismissible'>
                User updated successfully
                </div>";
        }
        if (isset($_GET['msg3']) == "delete") {
            echo "<div class='alert alert-success alert-dismissible'>
                    User deleted successfully
                    </div>";
        }
        ?>
        <h2>View Users
            <a href="add.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
        </h2>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // display the users data
            $users = $userObj->displayData();
            foreach ($users as $user) {
                ?>
            <tr>
                <td><?php echo $user['userID'] ?></td>
                <td><?php echo $user['userName'] ?></td>
                <td><?php echo $user['userEmail'] ?></td>
                <td><?php echo $user['userUid'] ?></td>
                <td><?php echo $user['userPwd'] ?></td>
                <td>
                <button class="btn btn-primary mr-2"><a href="edit.php?editId=<?php echo $user['userID'] ?>">
                    <i class="fa fa-pencil text-white" aria-hidden="true"></i></a></button>
                <button class="btn btn-danger"><a href="users.php?deleteId=<?php echo $user['userID'] ?>" onclick="confirm('Are you sure want to delete this record')">
                    <i class="fa fa-trash text-white" aria-hidden="true"></i>
                    </a></button>
                </td>
            </tr>
                <?php } ?>
            </tbody>
      </table>
    </section>
</main>
<?php
    // add our footer template
    require './inc/footer.php';
?>