<?php
$fetch_student = $mysqli_connect->query("SELECT * FROM tbl_students WHERE user_id = '$user_id'") or die(mysqli_error());
$row = $fetch_student->fetch_array();
?>
<div class="page-wrapper">
  <div class="page-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="card card-md">
            <div class="card-stamp card-stamp-lg">
              <div class="card-stamp-icon bg-primary">
                <img src="./static/chmsu.png">
              </div>
            </div>
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-10">
                  <h1 class="fw-bold">Welcome, <strong style="color:orange"><?= strtoupper(getUsername($user_id)) ?>!</strong></h1>
                  <div class="my-2"><?= $row['student_email']  ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page body -->
  <div class="page-body">
    <div class="container-xl">
      <div class="row g-3">

        <div class="col-lg-6">
          <div class="row row-cards">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="card-title">Student Information</div>

                  <div class="mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                      <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                    Fullname: <strong><?= $row['student_fname'] . " " . $row['student_mname'] . " " . $row['student_lname'] ?></strong>
                  </div>

                  <div class="mb-2">
                    <!-- Download SVG icon from http://tabler-icons.io/i/book -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                      <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                      <path d="M3 6l0 13"></path>
                      <path d="M12 6l0 13"></path>
                      <path d="M21 6l0 13"></path>
                    </svg>
                    Course: <strong> <?= course_name($row['course_id']) ?></strong>
                  </div>
                  <div class="mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-books">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M5 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                      <path d="M9 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                      <path d="M5 8h4" />
                      <path d="M9 16h4" />
                      <path d="M13.803 4.56l2.184 -.53c.562 -.135 1.133 .19 1.282 .732l3.695 13.418a1.02 1.02 0 0 1 -.634 1.219l-.133 .041l-2.184 .53c-.562 .135 -1.133 -.19 -1.282 -.732l-3.695 -13.418a1.02 1.02 0 0 1 .634 -1.219l.133 -.041z" />
                      <path d="M14 9l4 -1" />
                      <path d="M16 16l3.923 -.98" />
                    </svg>
                    Year and section: <strong><?= $row['year_level'] . " - " . $row['section'] ?></strong>
                  </div>
                  <div class="mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-mail-spark">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M19 22.5a4.75 4.75 0 0 1 3.5 -3.5a4.75 4.75 0 0 1 -3.5 -3.5a4.75 4.75 0 0 1 -3.5 3.5a4.75 4.75 0 0 1 3.5 3.5" />
                      <path d="M11.5 19h-6.5a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v5" />
                      <path d="M3 7l9 6l9 -6" />
                    </svg>
                    Email: <strong><?= $row['student_email'] ?></strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr style="margin: 1rem 0;">
          <div class="col-12">
            <div class="card shadow-sm border-0">
              <div class="card-body">
                <h2 class="card-title text-primary mb-4">Student Offenses Summary</h2>
                <div class="row text-center">
                  <!-- Total Offenses -->
                  <div class="col-md-4">
                    <div class="summary-card p-4 border rounded shadow-sm">
                      <h4 class="text-warning">Total Offenses</h4>
                      <div class="avatar bg-yellow-lt" data-demo-color="">
                      <?php
                        $total_offenses = $mysqli_connect->query("SELECT COUNT(*) AS total FROM tbl_offenses WHERE student_id = '$row[student_id]'")->fetch_assoc()['total'];
                        echo $total_offenses ? $total_offenses : '0';
                        ?>
                      </div>
                    </div>
                  </div>
                  <!-- Cleared Offenses -->
                  <div class="col-md-4">
                    <div class="summary-card p-4 border rounded shadow-sm">
                      <h4 class="text-success">Cleared</h4>
                      <div class="avatar bg-green-lt" data-demo-color="">
                        <?php
                        $cleared_offenses = $mysqli_connect->query("SELECT COUNT(*) AS total FROM tbl_offenses WHERE student_id = '$row[student_id]' AND offense_status = 1")->fetch_assoc()['total'];
                        echo $cleared_offenses ? $cleared_offenses : '0';
                        ?>
                      </div>
                    </div>
                  </div>
                  <!-- Not Cleared Offenses -->
                  <div class="col-md-4">
                    <div class="summary-card p-4 border rounded shadow-sm">
                      <h4 class="text-danger">Not Cleared</h4>
                      <div class="avatar bg-red-lt" data-demo-color="">
                      <?php
                        $not_cleared_offenses = $mysqli_connect->query("SELECT COUNT(*) AS total FROM tbl_offenses WHERE student_id = '$row[student_id]' AND offense_status = 0")->fetch_assoc()['total'];
                        echo $not_cleared_offenses ? $not_cleared_offenses : '0';
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="col">
          <ul class="timeline" style="max-height: 500px; overflow-y: auto;">
            <?php
            $fetchOffense = $mysqli_connect->query("SELECT * FROM tbl_offenses WHERE student_id = '$row[student_id]' ORDER BY offense_id DESC") or die(mysqli_error());

            // Check if there are any offenses
            if ($fetchOffense->num_rows > 0) {
              while ($offense_row = $fetchOffense->fetch_array()) {
                $status_style = $offense_row['offense_status'] == 1 ? "color: #0277BD !important;background-color: #90CAF9 !important;" : "color: #FF5722 !important;background-color: #FFCCBC !important;";
            ?>
                <li class="timeline-event">
                  <div class="timeline-event-icon bg-twitter-lt" style="<?= $status_style ?>">
                    <?php
                    if ($offense_row['offense_status'] == 1) {
                    ?>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-checks">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 12l5 5l10 -10" />
                        <path d="M2 12l5 5m5 -5l5 -5" />
                      </svg>
                    <?php } else { ?>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-dashed-x">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95" />
                        <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44" />
                        <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92" />
                        <path d="M8.56 20.31a9 9 0 0 0 3.44 .69" />
                        <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95" />
                        <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44" />
                        <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92" />
                        <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69" />
                        <path d="M14 14l-4 -4" />
                        <path d="M10 14l4 -4" />
                      </svg>
                    <?php } ?>
                  </div>
                  <div class="card timeline-event-card">
                    <div class="card-body">
                      <div class="text-muted float-end"><?= timeAgoFromDatetime($offense_row['date_added']) ?></div>
                      <h4 style="color: #FF5722;"><b><?= violation_name($offense_row['violation_id']) ?></b></h4>
                      <p class="text-muted">
                        <strong>Offense Description:</strong> <?= $offense_row['offense_remarks'] ?><br>
                        <strong>Disciplinary Action Taken:</strong> <?= $offense_row['discplinary_action'] ?><br>
                        <strong>Date of Offense:</strong> <?= date('F d, Y', strtotime($offense_row['offense_date'])) ?><br>
                        <strong>Cleared By:</strong> <?= $offense_row['cleared_by'] > 0 ? getUser($offense_row['cleared_by']) : "---"; ?><br>

                        <strong>Status:</strong> <?= $offense_row['offense_status'] == 1 ? "<b style='color:green'>CLEARED</b>" : "<i style='color:orange'>NOT-CLEARED</i>"; ?><br>
                      </p>
                    </div>
                  </div>
                </li>

            <?php
              }
            } else {
              // If no offenses are found
              echo "<li class='timeline-event'>
              <div class='card timeline-event-card'>
                <div class='card-body'>
                  <p class='text-muted'>
                    <h2 style='color:#4CAF50;'><strong>No offenses found for this student.</strong><br><br></h2>
                    It appears that the student has maintained a clean record and has not committed any violations or offenses. Continue to uphold the standards of behavior and responsibility.
                  </p>
                </div>
              </div>
            </li>";
            }
            ?>
          </ul>
        </div>

      </div>
    </div>
  </div>
</div>