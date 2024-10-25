
<?php
session_start();
?>

  <!--====== HEADER START ======-->
  <?php include 'assets/inc/header.php'; ?>
  <!--====== HEADER END ======-->

  <!--====== NAVBAR START ======-->
  <?php include 'assets/inc/navbar.php'; ?>
  <!--====== NAVBAR END ======-->

  <!--====== PRELOADER START ======-->
  <?php include 'assets/inc/preloader.php'; ?>
  <!--====== PRELOADER END ======-->

  <!--====== CHATBOT START ======-->
  <?php include 'assets/inc/chatbot.php'; ?>
  <!--====== CHATBOT END ======-->



  <main id="main">

    <!--====== CONTENT START ======-->
  
    <!-- Profile section start -->
    <div class="container">
    <div class="main-body">

      <!-- Breadcrumb navigation -->
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">User Profile</li>
        </ol>
      </nav>
      <!-- End of Breadcrumb -->

      <div class="row gutters-sm">
        <!-- Left column with profile image and contact information -->
        <div class="col-md-4 mb-3">
          <!-- Profile Card -->
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <!-- Profile image and details -->
                <img src="assets/img/sta-academy.png" alt="User" class="rounded-circle p-1 bg-success" width="110">
                <div class="mt-3">
                  <h4>STA</h4>
                  <p class="text-secondary mb-1">STA Academy</p>
                  <p class="text-muted font-size-sm">10th Of Ramadan</p>
                  <button class="btn btn-primary">Follow</button>
                  <button class="btn btn-outline-primary">Message</button>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Profile Card -->

          <!-- Social Links Card -->
          <div class="card mt-3">
            <ul class="list-group list-group-flush">
              <!-- Twitter link -->
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-twitter mr-2 icon-inline text-info">
                    <path
                      d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                    </path>
                  </svg>Twitter
                </h6>
                <span class="text-secondary">@STA</span>
              </li>
              <!-- Facebook link -->
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-facebook mr-2 icon-inline text-primary">
                    <path d="M18 2h-3a4 4 0 0 0-4 4v3H8v4h3v8h4v-8h3l1-4h-4V6a1 1 0 0 1 1-1h3z"></path>
                  </svg>Facebook
                </h6>
                <span class="text-secondary">@STA</span>
              </li>
            </ul>
          </div>
          <!-- End of Social Links Card -->
        </div>
        <!-- End of Left Column -->

        <!-- Right column with profile details and progress bars -->
        <div class="col-md-8">
          <!-- Profile Details Card -->
          <div id="profile-info" class="card mb-3">
            <div class="card-body">
              <!-- Profile details rows -->
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Organization Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  Elsweady Technical Academy
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  admission@sta.edu.eg
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  (239) 816-9029
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  10Th Of Ramadan
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <button id="btn-profile-edit" class="btn btn-primary">Edit</button>
                </div>
              </div>
              <!-- End of Profile Details Rows -->
            </div>
          </div>
          <!-- End of Profile Details Card -->

           <!-- Right Column: Profile Form -->
           <div id="profile-edit" class="col-lg-8 mt-4 mt-lg-0 mb-3" style="display: none;">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Organization Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="Elsweady Technical Academy">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="admission@sta.edu.eg">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="(239) 816-9029">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="10Th of Ramadan">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                  <button id="btn-cancle" class="btn btn-outline-danger">Cancle</button>
                                </div>
                                <div class="col-sm-6 text-secondary">
                                    <button id="btn-profile-info" type="button" class="btn btn-primary float-end">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Right Column -->

          <!-- Card for skill progress bars and competency -->
          <div class="row gutters-sm">

            <!-- Net Zero Progress Card -->

            <div class="col-md-6 mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <h6 class="d-flex align-items-center mb-3">Net Zero Progress</h6>

                  <!-- Total Emissions Reduction -->

                  <small>Total Emissions Reduction</small>
                  <div class="progress mb-3">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>

                  <!-- Renewable Energy Adoption -->

                  <small>Renewable Energy Adoption</small>
                  <div class="progress mb-3">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>

                  <!-- Carbon Offsets Utilized -->

                  <small>Carbon Offsets Utilized</small>
                  <div class="progress mb-3">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>

                  <!-- Energy Efficiency Improvements -->

                  <small>Energy Efficiency Improvements</small>
                  <div class="progress mb-3">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Net Zero Progress Card -->

            <!-- Competency Card -->
            <div class="col-md-6 mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <h6 class="d-flex align-items-center mb-3">Competency</h6>

                  <!-- STA Skill -->
                  <div class="d-flex align-items-center mb-3">
                    <img src="assets/img/sta-academy.png" alt="STA" class="me-2" width="40" height="30">
                    <div class="flex-grow-1">
                      <small>STA</small>
                      <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>

                  <!-- We Skill -->
                  <div class="d-flex align-items-center mb-3">
                    <img src="assets/img/we-academy.png" alt="We" class="me-2" width="30" height="30">
                    <div class="flex-grow-1">
                      <small>We</small>
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>

                  <!-- Others Skill -->
                  <div class="d-flex align-items-center mb-3">
                    <img src="assets/img/logo-remove-bg-lg.png" alt="Others" class="me-2" width="30" height="30">
                    <div class="flex-grow-1">
                      <small>Others</small>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <!-- End of Competency Card -->
          </div>
          <!-- End of Skill and Competency Section -->
        </div>
        <!-- End of Right Column -->
      </div>
    </div>
    <!--====== CONTENT END ======-->
    </main>
    
  <!--====== FOOTER START ======-->
  <?php include 'assets/inc/footer.php'; ?>
  <!--====== FOOTER END ======-->
  
  
</body>

</html>