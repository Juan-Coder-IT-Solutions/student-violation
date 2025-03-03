<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Complaints Report</h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <button class="btn btn-primary" onclick="printTable()">
                        <i class="fas fa-print"></i> Print Report
                    </button>
                    <button class="btn btn-success" onclick="exportToExcel('dt_details', 'Complaints_Report')">
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
                            <div class="row align-items-center">
                                <div class="col-md-12 py-6">
                                    <label class="form-label">Status</label>
                                    <select class="select2 form-control" id="status" name="status" onchange="getComplaints()">
                                        <option value="All">All</option>
                                        <option value="Reported">Reported</option>
                                        <option value="Accepted by Admin">Accepted by Admin</option>
                                        <option value="Cleared">Cleared</option>
                                        <option value="For Counseling">For Counseling</option>
                                        <option value="Finished">Finished</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dt_details">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Complainee</th>
                                            <th>Complainant</th>
                                            <th>Violation</th>
                                            <th>Remarks</th>
                                            <th>Status</th>
                                            <th>Date Reported</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>


<script>
    $(document).ready(function() {
        getComplaints();
    });

    function getComplaints() {
        var status = $("#status").val();

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
                "url": "ajax/datatables/complaints_report.php",
                "dataSrc": "data",
                "data": { status: status }
            },
            "columns": [
                { "data": "count" },
                { "data": "complainee" },
                { "data": "complainant" },
                { "data": "violation" },
                { "data": "remarks" },
                { "data": "status" },
                { "data": "date_reported" }
            ]
        });
    }

    function printTable() {
        var printWindow = window.open('', '', 'height=700,width=900');
        var tableHtml = document.getElementById('dt_details').outerHTML;
        printWindow.document.write('<html><head><title>Complaints Report</title>');
        printWindow.document.write('<style>table { border-collapse: collapse; width: 100%; } table, th, td { border: 1px solid black; padding: 8px; } th { background-color: #f2f2f2; }</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<h1>Complaints Report</h1>');
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
