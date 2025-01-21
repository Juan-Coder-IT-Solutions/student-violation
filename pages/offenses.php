<div class="page-wrapper">
  <!-- Page header -->
  <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            Offenses
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
              <div class="row g-2 align-items-center">
                <div class="col-6 col-sm-4 col-md-2 col-xl py-3">
                  <a href="#" onclick="addEntry()" class="btn btn-primary w-100">
                    Add Offenses
                  </a>
                </div>
                <div class="col-6 col-sm-4 col-md-2 col-xl py-3">
                  <a href="#" onclick="deleteEntry()" id="btn_delete" class="btn btn-danger w-100">
                    Delete
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table align-items-center table-flush table-hover" id="dt_details">
                  <thead class="thead-light">
                    <tr>
                      <th style='width: 5px;'>
                        <div class='form-check form-check-success'><label class='form-check-label'><input type='checkbox' class='dt_id form-check-input' onchange="checkAll(this,'dt_id')"><i class='input-helper'></i></label></div>
                      </th style='width: 5px;'>
                      <th></th>
                      <th>#</th>
                      <th>Student Name</th>
                      <th>Violation</th>
                      <th>Remarks</th>
                      <th>Status</th>
                      <th>Cleared By</th>
                      <th>Date</th>
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
<?php require_once 'modals/modal_offenses.php'; ?>
<?php require_once 'modals/modal_clearance.php'; ?>
<script>
  $(document).ready(function() {
    getEntry();
  });

  function clearOffense(id) {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover these entries!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Yes, make it cleared!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {


          $.ajax({
            type: "POST",
            url: "ajax/clearOffense.php",
            data: {
              offense_id: id
            },
            success: function(data) {
              if (data == 1) {
                success_update();
                getEntry();
              } else {
                failed_query("Offenses");
              }
            }
          });

        } else {
          swal("Cancelled", "Entries are safe :)", "error");
        }
      });
  }

  function deleteEntry() {
    var count_checked = $(".dt_id:checked").length;
    var tb = "tbl_offenses";
    var keyword = "offense_id";

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
                  failed_query("Offenses");
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
    var tb = "tbl_offenses";
    var keyword = "offense_id";

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
        $("#student_id").val(json.student_id);
        $("#violation_id").val(json.violation_id);
        $("#offense_remarks").val(json.offense_remarks);
        $("#offense_date").val(json.offense_date);
        $("#discplinary_action").val(json.discplinary_action);

        $("#offense_id").val(json.offense_id);
        $(".modal_type").val("update");
      }
    });
  }

  $("#frm_add").submit(function(e) {
    e.preventDefault();
    $("#btn_submit_entry").prop("disabled", true);
    var type = $(".modal_type").val();
    $.ajax({
      type: "POST",
      url: "ajax/manageOffenses.php",
      data: $("#frm_add").serialize(),
      success: function(data) {
        if (data == 1) {
          if (type == "add") {
            success_add();

            $('#frm_add').each(function() {
              this.reset();
            });
          } else {
            success_update();
            $('#frm_add').each(function() {
              this.reset();
            });
          }
          getEntry();
          $("#modal_entry").modal("hide");
        } else if (data == 2) {
          entry_already_exists();
        } else {
          failed_query("Offenses");
          alert(data);
        }
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
        "url": "ajax/datatables/offenses.php",
        "dataSrc": "data",
        "data": {
          //type:type
        }
      },
      "columns": [{
          "mRender": function(data, type, row) {
            return "<div class='form-check form-check-success'><label class='form-check-label'><input type='checkbox' value=" + row.offense_id + " class='dt_id form-check-input'><i class='input-helper'></i></label></div>";
          }
        },
        {
          "mRender": function(data, type, row) {
            var c_btn = row.offense_status == 1 ? 'display:none;' : '';
            var p_btn = row.offense_status == 1 ? '' : 'display:none;';
            return "<center><button class='btn btn-primary' onclick='getEntryDetails(" + row.offense_id + ")'><span class='mdi mdi-grease-pencil'></span></button><button class='btn btn-warning' style='" + c_btn + "' onclick='clearOffense(" + row.offense_id + ")'><span class='mdi mdi-checkbox-marked-circle-outline'></span></button><button class='btn btn-secondary' style='" + p_btn + "' onclick='offenseFormModal(" + row.offense_id + ")'><span class='mdi mdi-printer'></span></button></center>";
          }
        },
        {
          "data": "count"
        },
        {
          "data": "student_name"
        },
        {
          "data": "violation"
        },
        {
          "data": "offense_remarks"
        },
        {
          "data": "status"
        },
        {
          "data": "cleared_by"
        },
        {
          "data": "offense_date"
        }
      ]
    });

  }

  function offenseFormModal(id) {
    $("#offenseFormModal").modal("show");

    $.ajax({
      type: "POST",
      url: "ajax/getClearance.php",
      data: {
        id: id
      },
      success: function(data) {
        var json = JSON.parse(data);
        console.log(json);
        $("#student_name").html(json.student_name);
        $("#student_course").html(json.student_course);
        $("#year_level").html(json.year_level);
        $("#student_email").html(json.student_email);

        
        $("#c_offense_desc").html(json.offense_remarks);
        $("#c_violation").html(json.violation);
        $("#c_discplinary_action").html(json.discplinary_action);
        $("#offense_date").html(json.offense_date);
        $("#offense_status").html(json.offense_status);
        $("#cleared_by").html(json.cleared_by);
      }
    });

  }
</script>