<?php
    // Add the header
    require './inc/header.php';
?>
 <!--Main layout-->
 <main class="my-5">
    <div class="container">
      <!--Section: Content-->
      <?php
        // Check if the user is logged in.
        if(isset($_SESSION["useruid"])){
          echo '<section>
              <div id="intro" class="p-5 text-center bg-light shadow-5 rounded-5 mb-5">
                <h2 class="mb-3 h2 text-primary">Hello, ' . $_SESSION["useruid"]. ' </h2>
                <h2 class="mb-3 h2">Coding Social Media</h2>
                <p class="mb-3">Expand your network of friends in the technology field.</p>
                <a class="btn btn-primary m-2" href="users.php" role="button" rel="nofollow">
                  User List</a>
                <a class="btn btn-primary m-2" href="add.profile.php" role="button" rel="nofollow">
                  Create Avatar
                </a>
              </div>
            </section>';
        }
        else{
          echo '<section>
            <div id="intro" class="p-5 text-center bg-light shadow-5 rounded-5 mb-5">
              <h1 class="mb-3 h2">Coding Social Media</h1>
              <p class="mb-3">Expand your network of friends in the technology field.</p>
              <a class="btn btn-primary m-2" href="https://lamp.computerstudi.es/~Iago200507139/project/login.php" role="button" rel="nofollow"
                >Login</a>
              <a class="btn btn-primary m-2" href="https://lamp.computerstudi.es/~Iago200507139/project/signup.php"
                role="button">Register</a>
            </div>
          </section>';
        }
      ?>
      <!--Section: Content-->
      <section class="text-center">
        <h4 class="mb-5"><strong>Latest posts</strong></h4>

        <div class="row">
          <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img class="img2" src="https://f.hubspotusercontent10.net/hubfs/6448316/game-development-programming-languages.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Game Development</h5>
                <a href="#!" class="btn btn-primary">Read</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img class="img2" src="https://www.howtogeek.com/wp-content/uploads/2022/08/github_hero_2.jpg?height=200p&trim=2,2,2,2" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Connect your GitHub</h5>
                <a href="#!" class="btn btn-primary">Read</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img class="img2" src="https://pspdfkit.com/assets/images/blog/2020/the-state-of-debugging-in-webassembly/article-header-0e1ba396.png" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Debug Code</h5>
                <a href="#!" class="btn btn-primary">Read</a>
              </div>
            </div>
          </div>
        </div>

      <!-- Pagination -->
      <nav class="my-4" aria-label="...">
        <ul class="pagination pagination-circle justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </main>
  <!--Main layout-->
<?php
    // add footer 
    require './inc/footer.php';
?>