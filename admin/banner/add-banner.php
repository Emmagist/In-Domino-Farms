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
            <div class="col-md-12  grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Product</h4>
                  <form method="post" id="productForm" class="forms-sample">
                    <div class="form-group">
                      <li class="alert alert-success list-unstyled productSuccess text-center" style="display:none;"></li>
                      <li class="alert alert-danger list-unstyled productError text-center" style="display:none;"></li>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="category">Category<span class="text-danger">*</span></label>
                        <select name="category" id="category" class="form-control"></select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="product">Product<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="product" id="product" placeholder="Product Name">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="price">Price<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Product Price">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="weight">Weight<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="weight" id="weight" placeholder="Weight">
                        <small class="text-danger">In unit e.g 1kg, 0.8kg, 4kg and so</small>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="short_description">Short Description</label>
                        <input type="text" class="form-control" name="short_description" id="short_description" placeholder="Short Description">
                        <small class="text-danger">Description can not be more than 250 words</small>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="upload_file">Product Image<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="fileUpload" id="upload_file">
                      </div>
                      <div class="form-group col-md-12">
                        <label for="description">Product Description<span class="text-danger">*</span></label>
                        <textarea name="description" id="description" class="form-control" placceholder="Product Description"></textarea>
                        <small class="text-success">Express the full product details here.</small>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Create Product</button>
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
    $(document).ready(function () {
      $.ajax({
        url: '../../libs/ajaxGet.php?get=205',
        method: 'GET',
        dataType: 'json',
        data: 205,
        contentType: false,
        processData: false,
        // cache: false,
        success: (param) => { 
            if (param) {
                $('#category').html(param);
            }
        },
    });
    return false;
    })

    // Add Product Form 
  $('#productForm').submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    $.ajax({
        url: '../../libs/fetchAjax.php?pg=202',
        method: 'POST',
        dataType: 'json',
        data: formData,
        contentType: false,
        processData: false,
        // cache: false,
        success: (param) => { 
            if (param.success) {
                
                $('.productSuccess').fadeIn()
                $('.productSuccess').text(param.success);
                setInterval(() => {
                    $('.productSuccess').fadeOut();
                    location.reload();
                }, 6000);
            }else if(param.error){
                $('.productError').fadeIn()
                $('.productError').text(param.error);
                setInterval(() => {
                    $('.productError').fadeOut();
                }, 6000);
            }
        },
    });
    return false;
  });
</script>