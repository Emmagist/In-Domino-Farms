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
      <div class="col-lg-10 offset-md-1 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Category List</h4>
            <div class="table-responsive">
              <table class="table">
              <li class="alert alert-success list-unstyled productTableSuccess" style="display:none;"></li>
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Product Image</th>
                    <th>Created</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody class="productList"></tbody>
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
  // List Products
  $( document ).ready(function() {
      $.ajax({
          url: '../../libs/ajaxGet.php?get=206',
          method: 'GET',
          dataType: 'json',
          data: 200,
          contentType: false,
          processData: false,
          // cache: false,
          success: (param) => { 
              if (param) {
                  $('.productList').html(param);
              }
          },
      });
      return false;
  });

//View Function
function viewProductButton(id) {
  $('#productModal').modal('show');

  $.ajax({
    url: '../../libs/ajaxGet.php?get=207&viewprod='+id,
    method: 'GET',
    dataType: 'json',
    data: 200,
    contentType: false,
    processData: false,
    // cache: false,
    success: (param) => { 
      if (param) {
        $('#viewProductModalBody').html(param);
      }
    },
  });
}

// Edit function
function editProductButton(id) {
  $('#editproductModal').modal('show');

  $.ajax({
    url: '../../libs/ajaxGet.php?get=208&editprod='+id,
    method: 'GET',
    dataType: 'json',
    data: 200,
    contentType: false,
    processData: false,
    // cache: false,
    success: (param) => { 
      if (param) { console.log(param)
        $('#editProductModalBody').html(param);
      }
    },
  });

  $('#editProductForm').submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    $.ajax({
      url: '../../libs/fetchAjax.php?pg=204',
      method: 'POST',
      dataType: 'json',
      data: formData,
      contentType: false,
      processData: false,
      // cache: false,
      success: (param) => { 
        if (param.success) {
          $('.editProductSuccess').fadeIn()
          $('.editProductSuccess').text(param.success);
          setInterval(() => {
              $('.editProductSuccess').fadeOut();
              location.reload();
          }, 3000);
        }else if(param.error){
          $('.editProductError').fadeIn()
          $('.editProductError').text(param.error);
          setInterval(() => {
              $('.editProductError').fadeOut();
          }, 3000);
        }
      },
    });
    return false;
  })
}

// Delete Function
function deleteProductButton(id) {
  $.ajax({
      url: '../../libs/ajaxDelete.php?delete=201&prod='+id,
      method: 'POST',
      dataType: 'json',
      data: id,
      contentType: false,
      processData: false,
      // cache: false,
      success: (param) => { 
        if (param) {
          $('.productTableSuccess').fadeIn()
          $('.productTableSuccess').text(param);
          setInterval(() => {
              $('.productTableSuccess').fadeOut();
              location.reload();
          }, 5000);
        }
      },
    });
    return false;
}

</script>