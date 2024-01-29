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
            <!-- Main form -->
            <div class="col-md-6 offset-md-3  grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Ctegory</h4>
                  <form method="post" id="categoryForm" class="forms-sample">
                    <div class="form-group">
                      <li class="alert alert-success list-unstyled categorySuccess" style="display:none;"></li>
                      <li class="alert alert-danger list-unstyled categoryError" style="display:none;"></li>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Category</label>
                      <input type="text" class="form-control" name="category" id="exampleInputUsername1" placeholder="Category">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Sub Category</label>
                      <input type="text" class="form-control" name="sub_category" id="exampleInputEmail1" placeholder="Sub Category">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <input type="text" class="form-control" name="description" id="exampleInputPassword1" placeholder="Description">
                      <small class="text-danger">Description can not be more than 250 words</small>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Create Category</button>
                  </form>
                </div>
              </div>
            </div>
            <!-- Main form end -->
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  
  <?php require "../include/footer.php"; ?>

  <script>
    // Add Category
$('#categoryForm').submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    $.ajax({
        url: '../../libs/fetchAjax.php?pg=200',
        method: 'POST',
        dataType: 'json',
        data: formData,
        contentType: false,
        processData: false,
        // cache: false,
        success: (param) => { 
            if (param.success) {
                
                $('.categorySuccess').fadeIn()
                $('.categorySuccess').text(param.success);
                setInterval(() => {
                    $('.categorySuccess').fadeOut();
                    location.reload();
                }, 3000);
            }else if(param.error){
                $('.categoryError').fadeIn()
                $('.categoryError').text(param.error);
                setInterval(() => {
                    $('.categoryError').fadeOut();
                }, 3000);
            }
        },
    });
    return false;
});


  </script>