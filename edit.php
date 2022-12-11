<?php
    // Add the header
    require './inc/header.php';
    
    // Include database file
    include 'database.php'; 

    // Crating a new object
    $userObj = new database();


    // Edit user record
    if(isset($_GET['editId']) && !empty($_GET['editId'])) {
        $editId = $_GET['editId'];
        $user = $userObj->displyaRecordById($editId);
    }

    // Update Record in user table
    if(isset($_POST['submit'])) {
        $userObj->updateRecord($_POST);
    }

?>
<main>
    <!-- Section: Design Block -->
<section class="text-center text-lg-start">
  <!-- Jumbotron -->
  <div class="container py-4">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Update User</h2>
            <!-- FORM -->
            <form action="edit.php" method="post">
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input name="name" type="text" id="form3Example1" class="form-control" value="<?php echo $user['userName']; ?>" />
                    <label class="form-label" for="form3Example1">Full Name</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input name="uid" type="text" value="<?php echo $user['userUid']; ?>" id="form3Example2" class="form-control" />
                    <label class="form-label" for="form3Example2">Username</label>
                  </div>
                </div>
              </div>
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input name="email" type="text" value="<?php echo $user['userEmail']; ?>" id="form3Example3" class="form-control" />
                <label class="form-label" for="form3Example3">Email address</label>
              </div>
              <!-- ID input - Hidden -->
              <div class="form-outline mb-4">
                <input name="id" type="hidden" value="<?php echo $user['userID']; ?>" />
              </div>
              <?php 
                // Printing the error message 
                if(isset($_GET["error"])){
                  // empty field
                  if($_GET["error"] ==  "emptyInput"){
                    echo "<h5 class='text-danger'>Fill in all fields!</h5>";
                  }
                  // username format
                  else if($_GET["error"] ==  "invalidUsername"){
                    echo "<h5 class='text-danger'>Choose a proper username, try again!</h5>";
                  }
                  // email format
                  else if($_GET["error"] ==  "invalidEmail"){
                    echo "<h5 class='text-danger'>Invalid Email, try again!</h5>";
                  }
                }
              ?>
              <!-- Submit button -->
              <button name="submit" type="submit" class="btn btn-primary btn-block mb-4">
                Update
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" class="w-100 rounded-4 shadow-4"
          alt="" />
      </div>
    </div>
  </div>
</section>
</main>
<?php
    // add our footer template
    require './inc/footer.php';
?>