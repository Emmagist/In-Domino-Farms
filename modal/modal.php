<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Let's know you more</h1>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" class="modalForm">
        <div class="modal-body">
          <p class="">Your details will be store for your product delivery.</p>
          <div class="form-group">
            <li class="alert alert-success list-unstyled modalSuccess text-center" style="display:none;"></li>
            <li class="alert alert-danger list-unstyled modalError text-center" style="display:none;"></li>
          </div>
          <div class="form-group mb-3"><input type="text" name="name" class="form-control" placeholder="Full Name"></div>
          <div class="form-group mb-3"><input type="email" name="email" class="form-control" placeholder="Email"></div>
          <div class="form-group mb-3"><input type="tel" name="phone" class="form-control" placeholder="Phone Number"></div>
          <div class="form-group"><input type="text" name="address" class="form-control" placeholder="Address"></div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" style="background:grey !important;" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>