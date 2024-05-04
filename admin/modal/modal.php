<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button>

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div> -->

<!-- Edit Category Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Edit Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" title="Cancel">&times;</span>
        </button>
      </div> 
      <form action="" method="post" id="editCategoryForm">
            <div class="form-group">
                <li class="alert alert-success list-unstyled editCategorySuccess" style="display:none;"></li>
                <li class="alert alert-danger list-unstyled editCategoryError" style="display:none;"></li>
            </div>
            <div class="modal-body" id="editModalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit Category</button>
            </div>
     </form>
    </div>
  </div>
</div>

<!-- View User Modal -->
<div class="modal fade" id="viewUserModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">View User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" title="Close">&times;</span>
        </button>
      </div> 
      <form action="" method="post" id="editUsergoryForm">
            <div class="form-group">
                <li class="alert alert-success list-unstyled editCategorySuccess" style="display:none;"></li>
                <li class="alert alert-danger list-unstyled editCategoryError" style="display:none;"></li>
            </div>
            <div class="modal-body" id="viewUserModalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary">Edit Category</button> -->
            </div>
     </form>
    </div>
  </div>
</div>

<!-- View Product Modal -->
<div class="modal fade" id="productModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">View Product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" title="Close">&times;</span>
        </button>
      </div> 
      <form action="" method="post" id="editUsergoryForm">
            <div class="modal-body" id="viewProductModalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary">Edit Category</button> -->
            </div>
     </form>
    </div>
  </div>
</div>

<!--Edit Product Modal -->
<div class="modal fade" id="editproductModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Edit Product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" title="Close">&times;</span>
        </button>
      </div> 
      <form action="" method="post" id="editProductForm">
            <div class="form-group">
                <li class="alert alert-success list-unstyled editProductSuccess" style="display:none;"></li>
                <li class="alert alert-danger list-unstyled editProductError" style="display:none;"></li>
            </div>
            <div class="modal-body" id="editProductModalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit Product</button>
            </div>
     </form>
    </div>
  </div>
</div>