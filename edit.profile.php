<?php
    // Add the header
    require './inc/header.php';

    // Include database file
    include 'database.php'; 

    // Crating a new object
    $avatarObj = new database();


    // Edit avatar record
    if(isset($_GET['editId']) && !empty($_GET['editId'])) {
        $editId = $_GET['editId'];
        $avatar = $avatarObj->displyaAvatarRecordById($editId);
    }

    // Update Record in user_avatar table
    if(isset($_POST['submit'])) {
        $avatarObj->updateAvatarRecord($_POST);
    }
?>
    <main>
        <section class="vh-100" style="background-color: #2779e2;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-9">
                        <h1 class="text-white mb-4">Edit Avatar</h1>
                        <!-- FORM -->
                        <form action="edit.profile.php" method="post">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Avatar Name</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" name="avatarName" class="form-control form-control-lg" value="<?php echo $avatar['avatarName']; ?>" required />
                                        </div>
                                    </div>
                                    <hr class="mx-n3">
                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">BIO</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control" name="bio" value="<?php echo $avatar['avatarBio']; ?>" required />
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="hidden" name="id" value="<?php echo $avatar['avatarID']; ?>" />
                                        </div>
                                    </div>
                                    <hr class="mx-n3">
                                    <div class="px-5 py-4">
                                        <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Edit Avatar">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
    // add our footer template
    require './inc/footer.php';
?>