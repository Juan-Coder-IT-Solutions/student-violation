<div class="container-fluid" id="container-wrapper">
  <?php

  $fetchData = $mysqli_connect->query("SELECT * FROM tbl_users WHERE user_id='$user_id'");
  $row = $fetchData->fetch_array();

  if ($row['user_category'] == "S") {
    $user_category = "Student";
  } else {
    $user_category = "Admin";
  }
  ?>
  <!-- Row -->
  <div class="page-wrapper">
    <div class="page-body">
      <div class="container-xl">
        <div class="row">
          <div class="col-lg-8">
            <!-- Form Basic -->
            <div class="card mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
              </div>
              <div class="card-body">
                <form action="" method='POST' id='frm_manage_profile'>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group" style="padding: 10px;">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" value="<?= $row['user_fname']; ?>" id="first_name" name="first_name">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group" style="padding: 10px;">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control" value="<?= $row['user_mname']; ?>" id="middle_name" name="middle_name">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group" style="padding: 10px;">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" value="<?= $row['user_lname']; ?>" id="last_name" name="last_name">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group" style="padding: 10px;">
                        <label for="user_category">Email Address</label>
                        <input type="email" value="<?= $row['user_email']; ?>" id="user_email" name="user_email" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group" style="padding: 10px;">
                        <label for="user_category">Category</label>
                        <input type="text" readonly value="<?= $user_category; ?>" id="user_category" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group" style="padding: 10px;">
                        <label for="last_name">Username</label>
                        <input type="text" class="form-control" value="<?= $row['username']; ?>" id="username" name="username">
                      </div>
                    </div>
                    <div class="col-sm-4" style="margin-top: 10px;padding: 10px;">
                      <button type="submit" id="btn_profile" class="btn btn-primary"><span class="fa fa-check-circle"></span> Save Changes</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <!-- Form Basic -->
            <div class="card mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-warning">Update Password</h6>
              </div>
              <div class="card-body">
                <form action="" method='POST' id='frm_update_password'>
                  <div class="form-group" style="padding: 10px;">
                    <label for="old_password">Old Password</label>
                    <input type="password" class="form-control" id="old_password" name="old_password" required placeholder="Password">
                  </div>
                  <div class="form-group" style="padding: 10px;">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required placeholder="Password">
                  </div>
                  <div class="form-group" style="padding: 10px;">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required placeholder="Password">
                  </div>
                  <div class="form-group" style="text-align: right;margin-top: 10px;">
                    <button type="submit" id="btn_password" class="btn btn-success"><span class="fa fa-key"></span> Change Password</button>
                  </div>
                </form>
                <small class="m-0 font-weight-bold text-warning">Never share your password with anyone else.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {});


    $("#frm_update_password").submit(function(e) {
      e.preventDefault();
      $("#btn_password").prop("disabled", true);

      var old_password = $("#old_password").val();
      var new_password = $("#new_password").val();
      var confirm_password = $("#confirm_password").val();

      if (new_password != confirm_password) {
        alertNotify('Cannot Proceed!', "New and confirm password does not match!", "warning");
        $("#btn_password").html("<span class='fas fa-key'></span> Change Password");
        $("#btn_password").prop("disabled", false);
      } else {
        $.ajax({
          type: "POST",
          url: "ajax/updatePassword.php",
          data: new FormData(this),
          processData: false,
          contentType: false,
          success: function(data) {
            if (data == 1) {
              alertNotify('All Good!', "Successfully updated password!", "success");
              $('#frm_update_password').each(function() {
                this.reset();
              });
            } else if (data == 2) {
              alertNotify('Cannot Proceed!', "Old password does not match!", "warning");
            } else {
              failed_query("Profile");
              //alert(data);
            }
            $("#btn_password").prop("disabled", false);
          }

        });
      }

    });

    $("#frm_manage_profile").submit(function(e) {
      e.preventDefault();
      $("#btn_profile").prop("disabled", true);
      $("#btn_profile").html("<span class='fa fa-spin fa-spinner'></span>");
      var username = $("#username").val();
      var email = $("#user_email").val();
      $.ajax({
        type: "POST",
        url: "ajax/manageProfile.php",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function(data) {
          if (data == 1) {
            alertNotify('All Good!', "Successfully updated details!", "success");
          } else if (data == 2) {
            alertNotify('Cannot Proceed!', "" + username + " username already exist!", "warning");
          } else if (data == -1) {
            alertNotify('Cannot Proceed!', "" + email + " already used!", "warning");
          } else {
            failed_query("Profile");
            //alert(data);
          }
          $("#btn_profile").html("<span class='fas fa-check-circle'></span> Save Changes");
          $("#btn_profile").prop("disabled", false);
        }

      });

    });
  </script>