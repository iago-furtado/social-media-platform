<?php
    // Add header
    require './inc/header.php';

    // Include database file
    include 'database.php';

    $avatarObj = new database();
    $avatar = $avatarObj->displayAvatarData();

    // Delete record from table
    if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
        $deleteId = $_GET['deleteId'];
        $avatarObj->deleteAvatarRecord($deleteId);
  }
?>
    <main class="main">
        <?php
            // Messages
            if (isset($_GET['error']) == "none3") {
                echo "<div class='alert alert-success alert-dismissible'>
                        Avatar Created
                        </div>";
            }
            if (isset($_GET['msg2']) == "update") {
                echo "<div class='alert alert-success alert-dismissible'>
                    Avatar updated successfully
                    </div>";
            }
            if (isset($_GET['msg3']) == "delete") {
                echo "<div class='alert alert-success alert-dismissible'>
                        Avatar deleted successfully
                        </div>";
            }
        ?>
        <section class="p-4 p-md-5 text-center text-lg-start shadow-1-strong rounded" style="
        background-image: url(https://mdbcdn.b-cdn.net/img/Photos/Others/background2.webp);
        ">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body m-3">
                            <div class="row">
                                <div class="col-lg-4 d-flex justify-content-center align-items-center mb-4 mb-lg-0">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20%2810%29.webp"
                                    class="rounded-circle img-fluid shadow-1" alt="woman avatar" width="200" height="200" />
                                </div>
                                <?php
                                    foreach($avatar as $avatar){ 
                                ?>
                                 <div class="col-lg-8">
                                    <p class="text-muted fw-light mb-4">
                                    <?php echo $avatar['avatarBio'] ?>
                                    </p>
                                    <p class="fw-bold lead mb-2"><strong><?php echo $avatar['avatarName'] ?></strong></p>
                                </div>
                                <?php } ?>
                                <div class="row-2 m-1 d-flex justify-content-center align-items-center">
                                     <!-- Button edit -->
                                     <button class="btn btn-primary m-2">
                                        <a href="edit.profile.php?editId=<?php echo $avatar['avatarID'] ?>">
                                            <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                                        </a>
                                    </button>
                                    <!-- Button Delete -->
                                     <button class="btn btn-danger m-2">
                                        <a href="profile.php?deleteId=<?php echo $avatar['avatarID'] ?>" onclick="confirm('Are you sure want to delete this record')">
                                            <i class="fa fa-trash text-white" aria-hidden="true"></i>
                                         </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
    // Add footer 
    require './inc/footer.php';
?>