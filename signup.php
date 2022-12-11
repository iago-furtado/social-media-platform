<?php
    // Add the header
    require './inc/header.php';
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
            <h2 class="fw-bold mb-5">Sign up now</h2>
            <!-- FORM -->
            <form action="./inc/signup.inc.php" method="post">
              <!-- 2 column grid layout with text inputs for full name -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input name="name" type="text" id="form3Example1" class="form-control" />
                    <label class="form-label" for="form3Example1">Full Name</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input name="uid" type="text" id="form3Example2" class="form-control" />
                    <label class="form-label" for="form3Example2">Username</label>
                  </div>
                </div>
              </div>
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input name="email" type="text" id="form3Example3" class="form-control" />
                <label class="form-label" for="form3Example3">Email address</label>
              </div>
              <!-- Password input -->
              <div class="form-outline mb-4">
                <input name="pwd" type="password" id="form3Example4" class="form-control" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>
              <!-- Repeat Password input -->
              <div class="form-outline mb-4">
                <input name="pwdrepeat" type="password" id="form3Example4" class="form-control" />
                <label class="form-label" for="form3Example4">Repeat Password</label>
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
                  // passwords
                  else if($_GET["error"] ==  "PasswordDontMatch"){
                    echo "<h5 class='text-danger'>Password doesn't match, try again!</h5>";
                  }
                  // username taken
                  else if($_GET["error"] ==  "usernameRepeated"){
                    echo "<h5 class='text-danger'>Choose another username, try again!</h5>";
                  }
                  // something went wrong
                  else if($_GET["error"] ==  "stmtFailed"){
                    echo "<h5 class='text-danger'>Something went worng, try again!</h5>";
                  }
                  // User created
                  else if($_GET["error"] ==  "none"){
                    echo "<h5 class='text-primary'>You have signed up!</h5>";
                  }
                }
              ?>
              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                <label class="form-check-label" for="form2Example33">
                  Subscribe to our newsletter
                </label>
              </div>

              <!-- Submit button -->
              <button name="submit" type="submit" class="btn btn-primary btn-block mb-4">
                Sign up
              </button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-github"></i>
                </button>
              </div>
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
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
</main>
<?php
    // add our footer template
    require './inc/footer.php';
?>