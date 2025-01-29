<form action="" method='POST' id='frm_add'>
  <div class="modal modal-blur fade" id="modal_entry" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Offense Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <input type="hidden" class="form-control modal_type" name="type">
            <input type="hidden" class="form-control" id="offense_id" name="offense_id">
            <div class="col-sm-12">
              <div class="mb-3">
                <label class="form-label">Student Name <strong style="color:red;">*</strong></label>
                <select class="select2 form-control" id="student_id" name="student_id" required>
                  <option value="">Please Select</option>
                  <?php
                  $fetch_student = $mysqli_connect->query("SELECT * FROM tbl_students") or die(mysqli_error());
                  while ($sRow = $fetch_student->fetch_array()) { ?>
                    <option value='<?= $sRow['student_id'] ?>'>
                      <?= $sRow['student_fname'] . " " . $sRow['student_mname'] . " " . $sRow['student_lname'] ?></option>
                    ";
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-8">
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
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">Offense Date <strong style="color:red;">*</strong></label>
                <input type="date" class="form-control" id="offense_date" name="offense_date" required
                  autocomplete="off">
              </div>
            </div>
            <div class="col-sm-12">
            <div class="mb-3">
                <label class="form-label">Ofense type <strong style="color:red;">*</strong></label>
                <select class="select2 form-control" id="offense_type" name="offense_type" required>
                  <option value="">Please Select</option>
                  <option value="Minor">Minor</option>
                  <option value="Major">Major</option>
                </select>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="mb-3">
                <label class="form-label">Remarks</label>
                <textarea class="form-control" style="height: 100px;" id="offense_remarks" name="offense_remarks"
                  autocomplete="off"></textarea>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="mb-3">
                <label class="form-label">Disciplinary Action</label>
                <textarea class="form-control" style="height: 100px;" id="discplinary_action" name="discplinary_action"
                  autocomplete="off"></textarea>
              </div>
            </div>
            <!-- <div class="mb-3">
              <div class="form-label">Status</div>
              <label class="form-check form-switch">
                <input class="form-check-input" value="1" name="offense_status" id="offense_status" type="checkbox">
                <span class="form-check-label">Offense Cleared</span>
              </label>
            </div> -->
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