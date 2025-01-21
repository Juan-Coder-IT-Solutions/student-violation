<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
          Overview
        </div>
        <h2 class="page-title" style="color: #2fb344;">

        </h2>
      </div>
    </div>
  </div>
</div>
<!-- Page body -->
<?php
if ($_SESSION['user_category'] != "S") {
?>
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">

        <div class="col-12">
          <div class="row row-cards">
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-primary text-white avatar">
                        <i class="mdi mdi-account-multiple" style="font-size: 25px;"></i>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        Users
                      </div>
                      <div class="text-muted">
                        <?= total_users(); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-green text-white avatar">
                        <i class="mdi mdi-account-multiple-plus" style="font-size: 25px;"></i>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        Students
                      </div>
                      <div class="text-muted">
                        <?= total_students(); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-twitter text-white avatar">
                        <i class="mdi mdi-flag-triangle" style="font-size: 25px;"></i>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        Violations
                      </div>
                      <div class="text-muted">
                        <?= total_violations(); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-google text-white avatar">
                        <i class="mdi mdi-alert-outline" style="font-size: 25px;"></i>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        Offenses
                      </div>
                      <div class="text-muted">
                        <?= total_offenses(); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card card-md">
            <div class="card-stamp card-stamp-lg">
              <div class="card-stamp-icon bg-primary">
                <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->

                <img src="./static/chmsu.png">
              </div>
            </div>
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-10">
                  <!-- <h3 class="h1">System for Demerit Violation in Student Affairs</h3>
                <div class="markdown text-muted">
                  Efficiently track and manage student conduct to maintain a fair and orderly campus environment.
                </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } else { ?>
  <?php require_once 'student_dashboad.php'; ?>


<?php } ?>