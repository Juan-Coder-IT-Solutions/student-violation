<div class="page-wrapper">
    <div class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="card card-md">
                        <div class="card-stamp card-stamp-lg">
                            <div class="card-stamp-icon bg-primary">
                                <img src="./static/chmsu.png">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h1 class="fw-bold">Welcome, <strong style="color:orange"><?= strtoupper(getUsername($user_id)) ?>!</strong></h1>
                                    <div class="my-2"><?= $user__row['user_email']  ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row g-3">

                <div class="col-lg-4">
                    <div class="row row-cards">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Personal Information</div>

                                    <div class="mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        </svg>
                                        Fullname: <strong><?= getUser($user_id) ?></strong>
                                    </div>

                                    <div class="mb-2">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/book -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                                            <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                                            <path d="M3 6l0 13"></path>
                                            <path d="M12 6l0 13"></path>
                                            <path d="M21 6l0 13"></path>
                                        </svg>
                                        Degree Program: <strong> <?= degree_name($user__row['degree_id']) ?></strong>
                                    </div>
                                    <div class="mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-mail-spark">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M19 22.5a4.75 4.75 0 0 1 3.5 -3.5a4.75 4.75 0 0 1 -3.5 -3.5a4.75 4.75 0 0 1 -3.5 3.5a4.75 4.75 0 0 1 3.5 3.5" />
                                            <path d="M11.5 19h-6.5a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v5" />
                                            <path d="M3 7l9 6l9 -6" />
                                        </svg>
                                        Email: <strong><?= $user__row['user_email'] ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin: 1rem 0;">
                    <div class="col-12" style="background-color: #FFF9C4;border: 2px dashed #FFD54F;">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h2 class="card-title text-primary mb-4"></h2>
                                <div class="row text-center">
                                    <a href="#" onclick="addEntry()" class="btn btn-lg btn-warning w-100">
                                        Add New Complaint
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col">

                    <div class="row row-cards">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush table-hover" id="dt_details">
                                            <thead class="thead-light">
                                                <tr>
                                                    <!-- <th style='width: 5px;'>
                                                        <div class='form-check form-check-success'><label class='form-check-label'><input type='checkbox' class='dt_id form-check-input' onchange="checkAll(this,'dt_id')"><i class='input-helper'></i></label></div>
                                                    </th> -->
                                                    <th style='width: 5px;'></th>
                                                    <th>#</th>
                                                    <th>Complainee</th>
                                                    <th>Complainant</th>
                                                    <th>Violation</th>
                                                    <th>Status</th>
                                                    <th>File Preview</th>
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
                // {
                //     "mRender": function(data, type, row) {
                //         if (row.hide_this == "A" || row.hide_this == "C") {
                //             return "<div class='form-check form-check-success'><label class='form-check-label'><input type='checkbox' value=" + row.complaint_id + " class='dt_id form-check-input'><i class='input-helper'></i></label></div>";
                //         } else {
                //             return "";
                //         }
                //     }
                // },
                {
                    "mRender": function(data, type, row) {
                        if (row.hide_this == "A" || row.hide_this == "C") {
                            return "<center><button class='btn btn-sm btn-primary' onclick='getEntryDetails(" + row.complaint_id + ")'><span class='mdi mdi-grease-pencil'></span></button></center>";
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
                    "data": "stat"
                },
                {
                    "data": "file", // Add file preview column
                    "mRender": function(data, type, row) {
                        return row.file ? row.file : "No File";
                    }
                },
                {
                    "data": "date_added"
                }
            ]
        });

    }

    function changeStatus(stat){

    }
</script>