<div class="page-wrapper">
  <!-- Page header -->
  <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            Complainant Portal
          </h2>
        </div>
      </div>
    </div>
  </div>
  <!-- Page body -->
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-cards">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <!-- <div class="row g-2 align-items-center">
                              <?php if ($user_category == "A" || $user_category == "C") { ?>
                                <div class="col-6 col-sm-4 col-md-2 col-xl py-3">
                                    <a href="#" onclick="addEntry()" class="btn btn-primary w-100">
                                        Add Complaint
                                    </a>
                                </div>
                                <div class="col-6 col-sm-4 col-md-2 col-xl py-3">
                                    <a href="#" onclick="deleteEntry()" id="btn_delete" class="btn btn-danger w-100">
                                        Delete
                                    </a>
                                </div>
                              <?php } ?>
                            </div> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table align-items-center table-flush table-hover" id="dt_details">
                  <thead class="thead-light">
                    <tr>
                      <th style='width: 5px;'></th>
                      <th style='width: 5px;'></th>
                      <th>#</th>
                      <th>Complainee</th>
                      <th>Complainant</th>
                      <th>Violation</th>
                      <th>Description</th>
                      <th>File Preview</th>
                      <th>Status</th>
                      <th>Reported Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once 'modals/modal_complaints.php'; ?>
<script>
  $(document).ready(function() {
    getEntry();
  });

  function deleteEntry() {
    var count_checked = $(".dt_id:checked").length;
    var tb = "tbl_complaints";
    var keyword = "complaint_id";

    if (count_checked > 0) {
      swal({
          title: "Are you sure?",
          text: "You will not be able to recover these entries!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm) {
          if (isConfirm) {
            var checkedValues = $(".dt_id:checked").map(function() { // Corrected checkbox value retrieval
              return $(this).val();
            }).get();

            console.log("sample", checkedValues);
            $("#btn_delete").prop('disabled', true);

            $.ajax({
              type: "POST",
              url: "ajax/deleteBulkEntries.php",
              data: {
                id: checkedValues,
                tb: tb,
                keyword: keyword
              },
              success: function(data) {
                if (data == 1) {
                  success_delete();
                  getEntry();
                } else {
                  failed_query("Users");
                }

                $("#btn_delete").prop('disabled', false);
              }
            });

          } else {
            swal("Cancelled", "Entries are safe :)", "error");
          }
        });
    } else {
      swal("Cannot proceed!", "Please select entries to delete!", "warning");
    }
  }

  function getEntryDetails(id) {
    $("#modal_entry").modal("show");
    var tb = "tbl_complaints";
    var keyword = "complaint_id";

    $.ajax({
      type: "POST",
      url: "ajax/getDetails.php",
      data: {
        id: id,
        tb: tb,
        keyword: keyword
      },
      success: function(data) {
        var json = JSON.parse(data);
        console.log(data);
        $("#complaint_id").val(json.complaint_id);
        $("#complainee").val(json.complainee);
        $("#section").val(json.section);
        $("#section_type").val(json.section_type);
        $("#year").val(json.year);
        $("#remarks").val(json.remarks);
        $("#date_reported").val(json.date_reported);

        $("#complainee_program").val(json.complainee_program);
        $("#complainee_section").val(json.complainee_section);
        $("#complainee_section_type").val(json.complainee_section_type);
        $("#complainee_year").val(json.complainee_year);
        $("#other_violations").val(json.other_violations);
        $("#person_involved").val(json.person_involved);

        $("input[name='violations[]']").prop("checked", false);

        if (json.violation_id) {
          var violationIds = json.violation_id.split(','); // Convert to array
          violationIds.forEach(function(violationId) {
            $("input[name='violations[]'][value='" + violationId.trim() + "']").prop("checked", true);
          });
        }
        $("#remarks").val(json.remarks);
        $(".modal_type").val("update");
      }
    });
  }

  $("#frm_add").submit(function(e) {
    e.preventDefault();
    $("#btn_submit_entry").prop("disabled", true);

    var type = $(".modal_type").val();
    var formData = new FormData(this); // Use FormData to handle file uploads

    $.ajax({
      type: "POST",
      url: "ajax/manageComplaints.php",
      data: formData,
      contentType: false, // Important for file upload
      processData: false, // Prevent jQuery from processing the data
      success: function(data) {
        if (data == 1) {
          if (type == "add") {
            success_add();
          } else {
            success_update();
          }
          $('#frm_add')[0].reset(); // Reset form after submission
          getEntry();
          $("#modal_entry").modal("hide");
        } else if (data == 2) {
          entry_already_exists();
        } else {
          failed_query("Complainant Portal");
          alert(data);
        }
        $("#btn_submit_entry").prop("disabled", false);
      },
      error: function(xhr, status, error) {
        alert("An error occurred: " + xhr.responseText);
        $("#btn_submit_entry").prop("disabled", false);
      }
    });
  });



  function getEntry() {
    $("#dt_details").DataTable().destroy();
    $("#dt_details").DataTable({
      "processing": true,
      "responsive": true,
      "ajax": {
        "type": "POST",
        "url": "ajax/datatables/complainant_portal.php",
        "dataSrc": "data",
        "data": {
          //type:type
        }
      },
      "columns": [
        {
          // "data": "btn_check"
          "mRender": function(data, type, row) {
            if (row.user_category != "A") {
              // return "<center><button class='btn btn-primary' onclick='getEntryDetails(" + row.complaint_id + ")'><span class='mdi mdi-grease-pencil'></span></button></center>";
              return row.btn_check;
            } else {
              return "";
            }

          }
        },
        {
          "mRender": function(data, type, row) {
            if (row.hide_this == "A" || row.hide_this == "C") {
              // return "<center><button class='btn btn-primary' onclick='getEntryDetails(" + row.complaint_id + ")'><span class='mdi mdi-grease-pencil'></span></button></center>";
              return "<center><button class='btn btn-primary' onclick='getEntryDetails(" + row.complaint_id + ")'><span class='mdi mdi-grease-pencil'></span></button></center>";
            } else {
              return "";
            }

          }
        },
        {
          "data": "count"
        },
        {
          "data": "complainee"
        },
        {
          "data": "cimplainant"
        },
        {
          "data": "violation"
        },
        {
          "data": "remarks"
        },
        {
          "data": "file", // Add file preview column
          "mRender": function(data, type, row) {
            return row.file ? row.file : "No File";
          }
        },
        {
          "data": "stat"
        },
        {
          "data": "date_added"
        }
      ]
    });

  }

  function changeStatus(id, status){
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover these entries!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, update it!",
          cancelButtonText: "No, cancel!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm) {
          if (isConfirm) {

            $.ajax({
              type: "POST",
              url: "ajax/changeStatus.php",
              data: {
                id: id,
                status: status
              },
              success: function(data) {
                if (data == 1) {
                  success_update();
                  getEntry();
                } else {
                  failed_query("Complaints");
                }
              }
            });


          } else {
            swal("Cancelled", "Entries are safe :)", "error");
          }
        });
    }
</script>