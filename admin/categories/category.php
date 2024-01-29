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
      <div class="col-lg-9 offset-md-1 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Category List</h4>
            <div class="table-responsive">
              <table class="table">
              <li class="alert alert-success list-unstyled categoryTableSuccess" style="display:none;"></li>
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Category</th>
                    <th>Created</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody class="categoryList"></tbody>
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
  // List Category
  $( document ).ready(function() {
    $.ajax({
        url: '../../libs/ajaxGet.php?get=200',
        method: 'GET',
        dataType: 'json',
        data: 200,
        contentType: false,
        processData: false,
        // cache: false,
        success: (param) => { 
            if (param) {
                $('.categoryList').html(param);
            }
        },
    });
    return false;
});

// Edit function
function editButton(id) {
  $('#staticBackdrop').modal('show');

  $.ajax({
    url: '../../libs/ajaxGet.php?get=201&editCat='+id,
    method: 'GET',
    dataType: 'json',
    data: 200,
    contentType: false,
    processData: false,
    // cache: false,
    success: (param) => { 
      if (param) {
        $('#editModalBody').html(param);
      }
    },
  });

  $('#editCategoryForm').submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    $.ajax({
      url: '../../libs/fetchAjax.php?pg=201',
      method: 'POST',
      dataType: 'json',
      data: formData,
      contentType: false,
      processData: false,
      // cache: false,
      success: (param) => { 
        if (param.success) {
          $('.editCategorySuccess').fadeIn()
          $('.editCategorySuccess').text(param.success);
          setInterval(() => {
              $('.editCategorySuccess').fadeOut();
              location.reload();
          }, 3000);
        }else if(param.error){
          $('.editCategoryError').fadeIn()
          $('.editCategoryError').text(param.error);
          setInterval(() => {
              $('.editCategoryError').fadeOut();
          }, 3000);
        }
      },
    });
    return false;
  })
}

// Delete Function
function deleteButton(id) {
  $.ajax({
      url: '../../libs/ajaxDelete.php?delete=200&cat='+id,
      method: 'POST',
      dataType: 'json',
      data: id,
      contentType: false,
      processData: false,
      // cache: false,
      success: (param) => { 
        if (param) {
          $('.categoryTableSuccess').fadeIn()
          $('.categoryTableSuccess').text(param);
          setInterval(() => {
              $('.categoryTableSuccess').fadeOut();
              location.reload();
          }, 5000);
        }
      },
    });
    return false;
}

</script>