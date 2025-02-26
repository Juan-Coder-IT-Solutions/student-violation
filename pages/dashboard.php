<!--  -->
<!-- Page body -->
<?php
if ($_SESSION['user_category'] != "S") {
?>
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <!-- Welcome Section -->
        <div class="col-12">
          <div class="card card-md">
            <div class="card-stamp card-stamp-lg">
              <div class="card-stamp-icon bg-primary">
                <img src="./static/chmsu.png" alt="CHMSU Logo">
              </div>
            </div>
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-10">
                  <h1 class="fw-bold">Welcome, <strong style="color:orange"><?= strtoupper(getUsername($user_id)) ?>!</strong></h1>
                  <p class="text-muted">
                    Explore the dashboard for insights and actions.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Statistic Cards Section -->
        <?php if($user_category == "A"){ ?>
        <div class="col-12">
          <div class="row row-cards g-3">
            <!-- Users -->
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm shadow-sm border-0">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-primary text-white avatar">
                        <i class="mdi mdi-account-multiple" style="font-size: 25px;"></i>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">Users</div>
                      <div class="text-muted">
                        <a href="index.php?page=users" class="text-decoration-none">Track all registered users</a>
                      </div>
                      <div class="text-muted"><?= total_users(); ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Students -->
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm shadow-sm border-0">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-green text-white avatar">
                        <i class="mdi mdi-account-multiple-plus" style="font-size: 25px;"></i>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">Students</div>
                      <div class="text-muted">
                        <a href="index.php?page=students" class="text-decoration-none">Manage student profiles</a>
                      </div>
                      <div class="text-muted"><?= total_students(); ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Violations -->
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm shadow-sm border-0">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-twitter text-white avatar">
                        <i class="mdi mdi-flag-triangle" style="font-size: 25px;"></i>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">Violations</div>
                      <div class="text-muted">
                        <a href="index.php?page=violations" class="text-decoration-none">Monitor reported violations</a>
                      </div>
                      <div class="text-muted"><?= total_violations(); ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Offenses -->
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm shadow-sm border-0">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-google text-white avatar">
                        <i class="mdi mdi-alert-outline" style="font-size: 25px;"></i>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">Offenses</div>
                      <div class="text-muted">
                        <a href="index.php?page=offenses" class="text-decoration-none">View logged offenses</a>
                      </div>
                      <div class="text-muted"><?= total_offenses(); ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        
      </div>
    </div>
  </div>
<?php } else { ?>
  <?php require_once 'student_dashboad.php'; ?>


<?php } ?>