<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Students
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
                                        Add Students
                                    </a>
                                </div>
                                <div class="col-6 col-sm-4 col-md-2 col-xl py-3">
                                    <a href="#" onclick="deleteEntry()" id="btn_delete" class="btn btn-danger w-100">
                                        Delete
                                    </a>
                                </div>
                                <div class="col-6 col-sm-6 col-md-2 col-xl py-3  w-100">
                                    <div class="dropdown w-100">
                                        <button class="btn btn-success dropdown-toggle w-100" type="button" id="csvActionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            CSV Actions
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="csvActionsDropdown">
                                            <li>
                                                <a class="dropdown-item" href="#" onclick="importCSVFile()">Import CSV File</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#" onclick="downloadCsvFormat()">Download Format</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush table-hover" id="dt_details">
                                    <thead class="thead-light">
                                        <tr>
                                            <th  style='width: 5px;'>
                                                <div class='form-check form-check-success'><label class='form-check-label'><input type='checkbox' class='dt_id form-check-input' onchange="checkAll(this,'dt_id')"><i class='input-helper'></i></label></div>
                                            </th>
                                            <th  style='width: 5px;'></th>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Course</th>
                                            <th>Year Level</th>
                                            <th>Section</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Date Added</th>
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
<?php require_once 'modals/modal_students.php'; ?>
<?php require_once 'modals/modal_import_students.php'; ?>
<script>
  $(document).ready(function() {
    getEntry();
  });

  function downloadCsvFormat() {
    // Define the CSV content
    const csvContent = [
      ["Firstname", "Middlename", "Lastname", "Section", "Email","Gender", "Username", "Password"]
    ];

    // Convert array to CSV string
    const csvString = csvContent.map(row => row.join(",")).join("\n");

    // Create a Blob object for the CSV data
    const blob = new Blob([csvString], { type: "text/csv" });

    // Create a link element for download
    const downloadLink = document.createElement("a");
    downloadLink.href = URL.createObjectURL(blob);
    downloadLink.download = "students_format.csv";

    // Trigger the download
    document.body.appendChild(downloadLink);
    downloadLink.click();

    // Clean up
    document.body.removeChild(downloadLink);
  }

  function importCSVFile(){
    $("#modal_import_students").modal("show");
  }

  function deleteEntry() {
    var count_checked = $(".dt_id:checked").length;
    var tb = "tbl_students";
    var keyword = "student_id";

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
                  failed_query("Students");
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
    var tb = "tbl_students";
    var keyword = "student_id";

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
        $("#student_fname").val(json.student_fname);
        $("#student_mname").val(json.student_mname);
        $("#student_lname").val(json.student_lname);
        $("#course_id").val(json.course_id);
        $("#year_level").val(json.year_level);
        $("#section").val(json.section);
        $("#student_email").val(json.student_email);
        $("#gender").val(json.gender);
        
        $('.user_input').removeAttr('required');
        
        $("#student_id").val(json.student_id);
        $(".modal_type").val("update");
        $(".div_user_acc").hide();
      }
    });
  }



  $("#frm_add").submit(function(e) {
    e.preventDefault();
    $("#btn_submit_entry").prop("disabled", true);
    var type = $(".modal_type").val();
    $.ajax({
      type: "POST",
      url: "ajax/manageStudents.php",
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
          failed_query("Students");
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
        "url": "ajax/datatables/students.php",
        "dataSrc": "data",
        "data": {
          //type:type
        }
      },
      "columns": [
        {
          "mRender": function(data, type, row) {
            return "<div class='form-check form-check-success'><label class='form-check-label'><input type='checkbox' value=" + row.student_id + " class='dt_id form-check-input'><i class='input-helper'></i></label></div>";
          }
        },
        {
          "mRender": function(data, type, row) {
            return "<center><button class='btn btn-primary' onclick='getEntryDetails(" + row.student_id + ")'><span class='mdi mdi-grease-pencil'></span></button></center>";
          }
        },
        {
          "data": "count"
        },
        {
          "data": "full_name"
        },
        {
          "data": "course"
        },
        {
          "data": "year_level"
        },
        {
          "data": "section"
        },
        {
          "data": "gender"
        },
        {
          "data": "student_email"
        },
        {
          "data": "date_added"
        }
      ]
    });

  }
</script>