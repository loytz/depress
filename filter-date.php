
<!-- Modal -->
<div class="modal fade" id="filter_table" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="staticBackdropLabel">Date Filter</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" id="disease_hp_filter_form" name="disease_hp_filter_form" method="post">
        <fieldset>

        <div class="mb-3">
        <label for="range_from" class="form-label">Date From:</label>
        <input  type="date" id="range_from" class="form-control   barangay-form text-sm-start shadow-sm"  placeholder="From">
        <div class="invalid-feedback">
        Invalid date from.
        </div>
        </div>

        <div class="mb-3">
        <label for="range_to" class="form-label">Date To:</label>
        <input  type="date" id="range_to" class="form-control  barangay-form text-sm-start shadow-sm"  placeholder="To">
        <div class="invalid-feedback">
        Invalid date to.
        </div>
        </div>

        </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="date_range_btn" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>