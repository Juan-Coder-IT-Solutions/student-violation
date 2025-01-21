<form action="" method='POST' id='frm_import_students'>
  <div class="modal modal-blur fade" id="modal_import_students" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Import Students</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Course <strong style="color:red;">*</strong></label>
                <select class="select2 form-control" id="import_course_id" name="import_course_id" required>
                    <option value="">Please Select</option>
                    <?php
                    $fetch_course = $mysqli_connect->query("SELECT * FROM tbl_courses") or die(mysqli_error());
                    while ($cRow = $fetch_course->fetch_array()) { ?>
                      <option value='<?= $cRow['course_id'] ?>'><?= $cRow['course_name'] ?></option>";
                    <?php }  ?>
                </select>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Year Level <strong style="color:red;">*</strong></label>
                <select class="select2 form-control" id="import_year_level" name="import_year_level" required>
                    <option value="">Please Select</option>
                    <option value="First Year">First Year</option>
                    <option value="Second Year">Second Year</option>
                    <option value="Third Year">Third Year</option>
                    <option value="Fourth Year">Fourth Year</option>
                  </select>
              </div>
            </div>

            <div class="col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Import file <strong style="color:red;">*</strong></label>
                    <input type="file" class="form-control" id="import_file" name="import_file" accept=".csv" required>
                </div>
            </div>


          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="btn_import_submit_entry" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  $(document).ready(function() {
 
  });

    $("#frm_import_students").submit(function(e) {
      e.preventDefault();
      var formData = new FormData(this);

      $.ajax({
        type: "POST",
        url: "ajax/importStudents.php", 
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
          if(data==1){
            success_add();
            
            $('#frm_import_students').each(function() {
              this.reset();
            });

            getEntry();
            $("#modal_import_students").modal("hide");
          }else{
            alert(data);
          }
        },
        error: function(xhr, status, error) {

          console.error(xhr.responseText); 
          alert("Error occurred while importing students."); 
        }
      });
    });
</script>