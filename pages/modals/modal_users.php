<form action="" method='POST' id='frm_add'>
  <div class="modal modal-blur fade" id="modal_entry" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <input type="hidden" class="form-control modal_type" name="type">
            <input type="hidden" class="form-control" id="user_id" name="user_id">
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" id="user_fname" name="user_fname" autocomplete="off" required>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="user_mname" name="user_mname" autocomplete="off">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">Last Name <strong style="color:red;">*</strong></label>
                <input type="text" class="form-control" id="user_lname" name="user_lname" autocomplete="off" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Email <strong style="color:red;">*</strong></label>
                <input type="email" class="form-control" id="user_email" name="user_email" autocomplete="off" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Catergory <strong style="color:red;">*</strong></label>
                <select class="select2 form-control" id="user_category" name="user_category" required>
                  <option value="">Please Select</option>
                  <option value="A">Admin/OSA</option>
                  <option value="C">Complainant</option>
                  <option value="D">Dean</option>
                  <option value="DO">Disciplinary Officer</option>
                  <option value="G">Counselor/Guidance</option>
                  <option value="S">Student</option>
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
                  while ($dRow = $fetch_degree->fetch_array()) { ?>
                    <option value='<?= $dRow['degree_id'] ?>'>
                      <?= $dRow['degree_name'] ?>
                    </option>";
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Username <strong style="color:red;">*</strong></label>
                <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
              </div>
            </div>
            <div class="col-sm-6 div_password" id="div_password">
              <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" name="password" id="password" required placeholder="Your password" autocomplete="off">
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