<?php
    // Add the header and php functions
    require './inc/header.php';
    include_once './inc/functions.inc.php'
?>
<main>
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
        <!-- FORM -->
          <form class="card-body p-5 text-center" action="./inc/login.inc.php" method="post">

            <h3 class="mb-5">Sign in</h3>

            <div class="form-outline mb-4">
              <input type="text" name="uid" id="text" class="form-control form-control-lg" />
              <label class="form-label" for="typeEmailX-2">Username or Email</label>
            </div>

            <div class="form-outline mb-4">
              <input name="pwd" type="password" id="typePasswordX-2" class="form-control form-control-lg" />
              <label class="form-label" for="typePasswordX-2">Password</label>
            </div>

            <?php 
                // Printing the error message 
                if(isset($_GET["error"])){
                  // empty field
                  if($_GET["error"] ==  "emptyInput"){
                    echo "<h5 class='text-danger'>Fill in all fields!</h5>";
                  }
                  // username format
                  else if($_GET["error"] ==  "wrongLogin"){
                    echo "<h5 class='text-danger'>Incorrect Information, try again!</h5>";
                  }
                }
              ?>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
              <label class="form-check-label" for="form1Example3">   Remember password </label>
            </div>

            <button name="submit" class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            <hr class="my-4">

          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</main>
<?php
    // add our footer template
    require './inc/footer.php';
?>