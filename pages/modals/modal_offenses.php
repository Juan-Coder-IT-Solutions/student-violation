<form action="" method='POST' id='frm_add'>
  <div class="modal modal-blur fade" id="modal_entry" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Offense Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <input type="hidden" class="form-control modal_type" name="type">
            <input type="hidden" class="form-control" id="offense_id" name="offense_id">
            <div class="col-sm-12">
              <div class="mb-3">
                <label class="form-label">Student Name <strong style="color:red;">*</strong></label>
                <select class="select2 form-control" id="student_id" name="student_id" required>
                  <option value="">Please Select</option>
                  <?php
                  $fetch_student = $mysqli_connect->query("SELECT * FROM tbl_students") or die(mysqli_error());
                  while ($sRow = $fetch_student->fetch_array()) { ?>
                    <option value='<?= $sRow['student_id'] ?>'>
                      <?= $sRow['student_fname'] . " " . $sRow['student_mname'] . " " . $sRow['student_lname'] ?></option>
                    ";
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="mb-3">
                <label class="form-label">Violation <strong style="color:red;">*</strong></label>
                <select class="select2 form-control" id="violation_id" name="violation_id" required>
                  <option value="">Please Select</option>
                  <?php
                  $fetch_violation = $mysqli_connect->query("SELECT * FROM tbl_violations") or die(mysqli_error());
                  while ($vRow = $fetch_violation->fetch_array()) { ?>
                    <option value='<?= $vRow['violation_id'] ?>'>
                      <?= $vRow['violation_name'] ?>
                    </option>";
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">Offense Date <strong style="color:red;">*</strong></label>
                <input type="date" class="form-control" id="offense_date" name="offense_date" required
                  autocomplete="off">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="mb-3">
                <label class="form-label">Remarks</label>
                <textarea class="form-control" style="height: 100px;" id="offense_remarks" name="offense_remarks"
                  autocomplete="off"></textarea>
              </div>
            </div>
            <!-- <div class="mb-3">
              <div class="form-label">Status</div>
              <label class="form-check form-switch">
                <input class="form-check-input" value="1" name="offense_status" id="offense_status" type="checkbox">
                <span class="form-check-label">Offense Cleared</span>
              </label>
            </div> -->
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
<div class="modal fade bd-example-modal-lg" id="modalEntry2" aria-labelledby="myModalLabel">
  <div class="modal-dialog  modal-lg" style="margin-top: 50px;" role="document">
    <div class="modal-content">
      <div class="modal-header" style="display:block;">
        <div class="row" style="font-size: small;">
          <div class="col-sm-4">
            <div><b>Source Warehouse:</b> <span id="source_warehouse_label" class="label-item"></span></div>
            <div><b>Destination Warehouse:</b> <span id="destination_warehouse_label" class="label-item"></span></div>
            <div><b>Date:</b> <span id="stock_transfer_date_label" class="label-item"></span></div>
            <div><b>Reference:</b> <span id="reference_number_label" class="label-item"></span></div>
          </div>
          <div class="col-sm-8">
            <ul class="nav justify-content-end">
              <li class="nav-item">
                <a id="menu-edit-transaction" class="nav-link" href="#" style="font-size: small;"><i
                    class='ti ti-pencil'></i> Edit Sales</a>
              </li>
              <li class="nav-item">
                <a id="menu-delete-selected-items" class="nav-link" href="#" style="font-size: small;"><i
                    class='ti ti-trash'></i> Delete Selected Items</a>
              </li>
              <li class="nav-item">
                <a id="menu-finish-transaction" class="nav-link" href="#" style="font-size: small;"><i
                    class='ti ti-check'></i> Finish Transaction</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-dismiss="modal" style="font-size: small;"><i class='ti ti-close'></i>
                  Close</a>
              </li>
              <!--<li class="nav-item">
                                <a class="nav-link disabled" href="#">Disabled</a>
                            </li>-->
            </ul>
          </div>
        </div>
      </div>
      <div class="modal-body" style="padding: 15px;">
        <div class="row">
          <div class="col-4" id="col-item">
            <form method='POST' id='frm_submit_2'>
              <input type="hidden" id="hidden_id_2" name="input[stock_transfer_id]">
              <input type="hidden" id="hidden_source_id">

              <div class="form-group row">
                <div class="col">
                  <label><strong>Product</strong></label>
                  <div>
                    <select onchange="getCurrentQty()" class="form-control form-control-sm select2"
                      name="input[product_id]" id="product_id" required></select>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col">
                  <label><strong>Inventory Qty</strong></label>
                  <div>
                    <input type="number" class="form-control form-control-sm input-item" readonly
                      name="input[current_qty]" autocomplete="off" id="current_qty" required>
                  </div>
                </div>
                <div class="col">
                  <label><strong>Qty</strong></label>
                  <div>
                    <input type="number" class="form-control form-control-sm input-item" autocomplete="off"
                      name="input[qty]" id="qty" required>
                  </div>
                </div>
              </div>
              <div class='btn-group'>
                <button type="submit" class="btn btn-primary" id="btn_submit_2">Submit</button>
              </div>
            </form>
          </div>
          <div class="col-8" id="col-list">
            <div class="table-responsive">
              <table class="display expandable-table" id="dt_entries_2" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th><input type='checkbox' onchange="checkAll(this, 'dt_id_2')"></th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Cost</th>
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