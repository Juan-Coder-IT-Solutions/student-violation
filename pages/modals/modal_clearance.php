<!-- Modal Structure -->
<div class="modal fade" id="offenseFormModal" tabindex="-1" role="dialog" aria-labelledby="offenseFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 10px; border: 1px solid #ddd;">
            <div class="modal-header" style="background-color: green color: white; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                <h5 class="modal-title" id="offenseFormModalLabel">Student Offense Clearance Form</h5>
                <button type="button" class="btn btn-primary" onclick="printForm()" style="border-radius: 5px;">Print Form</button>
            </div>
            <div class="modal-body" id="formContent" style="font-family: 'Arial', sans-serif; line-height: 1.6; padding: 20px;">
                <div style="background-color: #f9f9f9; padding: 20px; border-radius: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <!-- Header -->
                    <div style="text-align: center; margin-bottom: 30px;">
                        <h3 style="font-weight: bold;">OFFENSE CLEARANCE FORM</h3>
                        <hr style="border: 1px solid green width: 60%; margin: auto;">
                    </div>

                    <!-- Student Information Section -->
                    <div style="margin-bottom: 20px;">
                        <h5 style="font-weight: bold; color: green">Student Information</h5>
                        <p><strong>Student Name:</strong> <span id="student_name"></span></p>
                        <p><strong>Course:</strong> <span id="student_course"></span></p>
                        <p><strong>Year Level:</strong> <span id="year_level"></span></p>
                        <p><strong>Email Address:</strong> <span id="student_email"></span></p>
                    </div>

                    <!-- Offense Details Section -->
                    <div style="margin-bottom: 20px;">
                        <h5 style="font-weight: bold; color: green">Offense Details</h5>
                        <p><strong>Violation:</strong> <span id="c_violation"></span></p>
                        <p><strong>Offense Description:</strong> <span id="c_offense_desc"></span></p>
                        <p><strong>Disciplinary Action Taken:</strong> <span id="c_discplinary_action"></span></p>
                        <p><strong>Date of Offense:</strong> <span id="offense_date"></span></p>
                    </div>

                    <!-- Clearance Status Section -->
                    <div style="margin-bottom: 20px;">
                        <h5 style="font-weight: bold; color: green">Clearance Status</h5>
                        <p><strong>Status:</strong> <span id="offense_status"></span></p>
                        <p><strong>Cleared By:</strong> <span id="cleared_by"></span></p>
                        <p><strong>Clearance Date:</strong> <?= date('F d,Y', strtotime(getCurrentDate())); ?></p>
                    </div>

                    <!-- Footer -->
                    <div style="margin-top: 40px;">
                        <p style="text-align: center; font-size: 14px; color: #555;">This document is issued as part of the student’s clearance process. Please verify all information before finalizing.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printForm()" style="border-radius: 5px;">Print Form</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to print the modal content -->
<script>
    function printForm() {
        var formContent = document.getElementById('formContent').innerHTML;
        var printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Print Form</title><style>body { font-family: Arial, sans-serif; margin: 20px; }</style></head><body>');
        printWindow.document.write('<h2 style="text-align: center; color: green">Student Offense Clearance Form</h2>');
        printWindow.document.write(formContent);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>
