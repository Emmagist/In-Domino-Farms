<?php 
  require "../include/validation.php";
  require "../include/head.php";
  require "../include/header.php";
  require "../include/sidebar.php";
?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      
      <!-- Main Table -->
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Order List</h4>
            <div class="table-responsive">
              <table class="table">
              <li class="alert alert-success list-unstyled categoryTableSuccess" style="display:none;"></li>
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Order Number</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Ordered Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody class="orderList"></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php 
  require "../modal/modal.php";
  require "../include/footer.php";
 ?>

<script>
  // List Order
  $( document ).ready(function() {
    $.ajax({
        url: '../../libs/ajaxGet.php?get=204',
        method: 'GET',
        dataType: 'json',
        data: 200,
        contentType: false,
        processData: false,
        // cache: false,
        success: (param) => { 
            if (param) {
                $('.orderList').html(param);
            }
        },
    });
    return false;
});

// Edit function
function viewUserButton(id) {
  $('#staticBackdrop').modal('show');

  $.ajax({
    url: '../../libs/ajaxGet.php?get=203&viewUser='+id,
    method: 'GET',
    dataType: 'json',
    data: 200,
    contentType: false,
    processData: false,
    // cache: false,
    success: (param) => { 
      if (param) {
        $('#viewUserModalBody').html(param);
      }
    },
  });
}


</script>