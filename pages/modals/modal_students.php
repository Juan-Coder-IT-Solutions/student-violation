<form action="" method='POST' id='frm_add'>
  <div class="modal modal-blur fade" id="modal_entry" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <input type="hidden" class="form-control modal_type" name="type">
            <input type="hidden" class="form-control" id="student_id" name="student_id">
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">First Name <strong style="color:red;">*</strong></label>
                <input type="text" class="form-control" id="student_fname" name="student_fname" autocomplete="off" required>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="student_mname" name="student_mname" autocomplete="off">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">Last Name <strong style="color:red;">*</strong></label>
                <input type="text" class="form-control" id="student_lname" name="student_lname" autocomplete="off" required>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="mb-3">
                <label class="form-label">Email <strong style="color:red;">*</strong></label>
                <input type="email" class="form-control" id="student_email" name="student_email" autocomplete="off" required>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="mb-3">
                <label class="form-label">Gender <strong style="color:red;">*</strong></label>
                <select class="select2 form-control" id="gender" name="gender" required>
                    <option value="">Please Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="mb-3">
                <label class="form-label">Degree Program <strong style="color:red;">*</strong></label>
                <select class="select2 form-control" id="degree_id" name="degree_id" required>
                    <option value="">Please Select</option>
                    <?php
                    $fetch_degree = $mysqli_connect->query("SELECT * FROM tbl_degree") or die(mysqli_error());
                    while ($cRow = $fetch_degree->fetch_array()) { ?>
                      <option value='<?= $cRow['degree_id'] ?>'><?= $cRow['degree_name'] ?></option>";
                    <?php }  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">Year Level <strong style="color:red;">*</strong></label>
                <select class="select2 form-control" id="year_level" name="year_level" required>
                    <option value="">Please Select</option>
                    <option value="First Year">First Year</option>
                    <option value="Second Year">Second Year</option>
                    <option value="Third Year">Third Year</option>
                    <option value="Fourth Year">Fourth Year</option>
                  </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">Section <strong style="color:red;">*</strong></label>
                <input type="text" class="form-control" id="section" name="section" autocomplete="off" required>
              </div>
            </div>
            <div class="col-sm-4 div_user_acc">
              <div class="mb-3">
                <label class="form-label">Username <strong style="color:red;">*</strong></label>
                <input type="text" class="form-control user_input" id="username" name="username" autocomplete="off" required>
              </div>
            </div>
            <div class="col-sm-12 div_user_acc">
              <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control user_input" name="password" id="password" required placeholder="Your password" autocomplete="off">
                  <span class="input-group-text eye-icon" id="togglePassword">
                    <i class="fa fa-eye-slash" id="eyeIcon"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="btn_submit_entry" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
</form>