<form action="" method='POST' id='frm_add' enctype="multipart/form-data">
  <div class="modal modal-blur modal-xl fade" id="modal_entry" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">CITATION TICKET</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <input type="hidden" class="form-control modal_type" name="type">
            <input type="hidden" class="form-control" id="complaint_id" name="complaint_id">
            <div class="col-sm-6" style="border:1px dashed #ccc; padding:10px;">
              <div class="col-sm-12">
                <div class="mb-3">
                  <label class="form-label">Attach File </label>
                  <input type="file" class="form-control" id="file" name="file">
                </div>
              </div>

              <div class="col-sm-12">
                <div class="mb-3">
                  <label class="form-label"><strong>Violations:</strong> <strong style="color:red;">*</strong></label>
                  <?php
                  $fetch_violation = $mysqli_connect->query("SELECT * FROM tbl_violations") or die(mysqli_error());
                  ?>

                  <?php while ($row = $fetch_violation->fetch_assoc()) { ?>
                    <div class="form-check">

                      <input class="form-check-input" type="checkbox" name="violations[]" value="<?php echo $row['violation_id']; ?>"> <label class="form-check-label"><?php echo $row['violation_name']; ?></label>
                    </div>
                  <?php } ?>

                  <i>Other violations; Please specify the nature of violation:</i> <input type="text" class="form-control" id="other_violations" name="other_violations">
                  <br>
                </div>
              </div>

            </div>
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label class="form-label"><strong>Complainant:</strong></label>
                    <span class="badge bg-blue"><?= getUser($user_id) ?></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label class="form-label"><strong>Degree Program:</strong></label>
                    <span class="badge bg-blue"><?= degree_name($user__row['degree_id']) ?></span>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="mb-3">
                    <label class="form-label"><strong>Year:</strong></label>
                    <input type="text" class="form-control" id="year" name="year" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="mb-3">
                    <label class="form-label"><strong>Section:</strong></label>
                    <input type="text" class="form-control" id="section" name="section" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="mb-3">
                    <label class="form-label"><strong>Selection Type:</strong></label>
                    <select class="form-control" id="section_type" name="section_type" required>
                      <option value="">Please Select:</option>
                      <option value="Student">Student</option>
                      <option value="Admin">Admin</option>
                      <option value="Staff">Staff</option>
                      <option value="Guidance">Guidance</option>
                      <option value="Dean">Dean</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label class="form-label"><strong>Complainee:</strong> <strong style="color:red;">*</strong></label>
                    <input type="text" class="form-control" id="complainee" name="complainee" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label class="form-label"><strong>Complainee's Degree Program:</strong></label>
                    <select class="form-control" id="complainee_program" name="complainee_program" required>
                      <option value="">Please Select:</option>
                      <?php
                      $fetch_degree = $mysqli_connect->query("SELECT * FROM tbl_degree") or die(mysqli_error());
                      while ($row = $fetch_degree->fetch_assoc()) {
                      ?>
                        <option value="<?php echo $row['degree_id']; ?>"><?php echo $row['degree_name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label class="form-label"><strong>Complainee's Year:</strong></label>
                    <input type="text" class="form-control" id="complainee_year" name="complainee_year" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label class="form-label"><strong>Complainee's Section:</strong></label>
                    <input type="text" class="form-control" id="complainee_section" name="complainee_section" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label class="form-label"><strong>Selection Type:</strong></label>
                    <select class="form-control" id="complainee_section_type" name="complainee_section_type" required>
                      <option value="">Please Select:</option>
                      <option value="Student">Student</option>
                      <option value="Admin">Admin</option>
                      <option value="Staff">Staff</option>
                      <option value="Guidance">Guidance</option>
                      <option value="Dean">Dean</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label class="form-label"><strong>Date and Time Reported:</strong></label>
                    <input type="datetime-local" class="form-control" id="date_reported" name="date_reported" required>
                  </div>
                </div>

                
                <div class="col-sm-12">
                  <div class="mb-3">
                    <label class="form-label">Violation Description: </label>
                    <textarea class="form-control" id="remarks" name="remarks" autocomplete="off"></textarea>
                  </div>
                </div>
                
                <div class="col-sm-12">
                  <div class="mb-3">
                    <label class="form-label">Person Involved: </label>
                    <input class="form-control" id="person_involved" name="person_involved" require autocomplete="off" required>
                  </div>
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