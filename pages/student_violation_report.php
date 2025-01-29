<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Student violation Report
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <!-- Print Button -->
                    <button class="btn btn-primary" onclick="printTable()">
                        <i class="fas fa-print"></i> Print Report
                    </button>
                    <!-- Export to Excel Button -->
                    <button class="btn btn-success" onclick="exportToExcel('dt_details', 'Violation_Report')">
                        <i class="fas fa-file-excel"></i> Export to Excel
                    </button>
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
                                <div class="col-6 col-sm-6 col-md-2 col-xl py-3">
                                    <label class="form-label">Student</label>
                                    <select class="select2 form-control" id="student_id" name="student_id" onchange="getEntry()">
                                        <option>Please Choose:</option>
                                        <?php
                                        $fetch_course = $mysqli_connect->query("SELECT * FROM tbl_students") or die(mysqli_error());
                                        while ($row = $fetch_course->fetch_array()) { ?>
                                        <option value='<?= $row['student_id'] ?>'><?= $row['student_fname'] . " " . $row['student_mname'] . " " . $row['student_lname']; ?></option>";
                                        <?php }  ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush table-hover" id="dt_details">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Student</th>
                                            <th>Violations</th>
                                            <th>Date Reported</th>
                                            <th>Violation Description</th>
                                            <th>Offense Type</th>
                                            <th>Disciplinary Action</th>
                                            <th>Remarks</th>
                                            <th>Date Updated</th>
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
<?php require_once 'modals/modal_violations.php'; ?>

<!-- Include SheetJS Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<script>
    $(document).ready(function() {
        getEntry();
    });

    function getEntry() {
        var student_id = $("#student_id").val();

        $("#dt_details").DataTable().destroy();
        $("#dt_details").DataTable({
            "processing": true,
            "responsive": true,
            "paging": false,
            "ordering": false,
            "info": false,
            "bFilter": false,
            "ajax": {
                "type": "POST",
                "url": "ajax/datatables/student_violation_report.php",
                "dataSrc": "data",
                "data": {
                    student_id: student_id
                }
            },
            "columns": [
                { "data": "count" },
                { "data": "student" },
                { "data": "violation_name" },
                { "data": "offense_date" },
                { "data": "violation_desc" },
                { "data": "offense_type" },
                { "data": "discplinary_action" },
                { "data": "offense_remarks" },
                { "data": "date_added" }
            ]
        });
    }

    function printTable() {
        var printWindow = window.open('', '', 'height=700,width=900');
        var tableHtml = document.getElementById('dt_details').outerHTML;

        printWindow.document.write('<html><head><title>Student Violation Report</title>');
        printWindow.document.write('<style>table { border-collapse: collapse; width: 100%; } table, th, td { border: 1px solid black; text-align: left; padding: 8px; } th { background-color: #f2f2f2; }</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<h1>Student Violation Report</h1>');
        printWindow.document.write(tableHtml);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }

    function exportToExcel(tableID, filename) {
        // Get table HTML element
        var table = document.getElementById(tableID);

        // Convert table to SheetJS-compatible array
        var wb = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });

        // Generate Excel file and trigger download
        XLSX.writeFile(wb, filename + ".xlsx");
    }
</script>

