<form action="" method='POST' id='frm_add'>
  <div class="modal modal-blur fade" id="modal_entry" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Course Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <input type="hidden" class="form-control modal_type" name="type">
            <input type="hidden" class="form-control" id="course_id" name="course_id">


            <div class="col-sm-12">
              <div class="mb-3">
                <label class="form-label">Course <strong style="color:red;">*</strong></label>
                <input type="text" class="form-control" id="course_name" name="course_name" autocomplete="off" required>
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