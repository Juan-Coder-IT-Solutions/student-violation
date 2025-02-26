<form action="" method='POST' id='frm_add' enctype="multipart/form-data">
  <div class="modal modal-blur fade" id="modal_entry" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Complaint Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <input type="hidden" class="form-control modal_type" name="type">
            <input type="hidden" class="form-control" id="complaint_id" name="complaint_id">
            <div class="col-sm-12">
              <div class="mb-3">
                <label class="form-label">Complainee <strong style="color:red;">*</strong></label>
                <select class="select2 form-control" id="complainee_id" name="complainee_id" required>
                  <option value="">Please Select</option>
                  <?php
                  $fetch_student = $mysqli_connect->query("SELECT * FROM tbl_users WHERE user_category='S'") or die(mysqli_error());
                  while ($sRow = $fetch_student->fetch_array()) { ?>
                    <option value='<?= $sRow['user_id'] ?>'>
                      <?= $sRow['user_fname'] . " " . $sRow['user_mname'] . " " . $sRow['user_lname'] ?></option>
                    ";
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="mb-3">
                <label class="form-label">Violation <strong style="color:red;">*</strong></label>
                <select class="select2 form-control" id="violation_id" name="violation_id" required>
                  <option value="">Please Select</option>
                  <?php
                  $fetch_violation = $mysqli_connect->query("SELECT * FROM tbl_violations") or die(mysqli_error());
                  while ($vRow = $fetch_violation->fetch_array()) { ?>
                    <option value='<?= $vRow['violation_id'] ?>'>
                      <?= $vRow['violation_name'] ?>
                    </option>";
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="mb-3">
                <label class="form-label">Description </label>
                <textarea class="form-control" id="remarks" name="remarks" autocomplete="off"></textarea>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="mb-3">
                <label class="form-label">Attach File </label>
                <input type="file" class="form-control" id="file" name="file">
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
