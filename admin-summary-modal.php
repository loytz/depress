<div class="modal fade" id="chartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div  class="main-banner">
            <?php include ('chartArea.php'); ?>
        </div>

        <!--- Results --->
        <?php 
        include('./results.php');
        ?>
        <!--- Results --->
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>