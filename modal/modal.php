<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 referenceModal" id="exampleModalLabel"></h1>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background:grey !important;" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Payment Modal -->
<div class="modal fade" id="exampleModalPay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 " id="exampleModalLabel">Kindly make paymet here.</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <form id="paymentForm">
  <div class="form-group">
    <!-- <label for="email">Email Address</label> -->
    <input type="hidden" class="form-control" id="email-address" value="<?=$_SESSION['email']?>" required/>
  </div>
  <div class="form-group">
    <label for="amount">Amount</label>
    <input type="tel" class="form-control" id="amount" disabled required />
  </div>
  <!-- <div class="form-group">
    <label for="first-name">First Name</label>
    <input type="text" id="first-name" />
  </div>
  <div class="form-group">
    <label for="last-name">Last Name</label>
    <input type="text" id="last-name" />
  </div> -->
  <div class="form-submit mt-3">
    <button type="submit" class="btn btn-sm btn-success" onclick="payWithPaystack()"> Pay </button>
  </div>
      </form>
        </div>
        
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background:grey !important;" data-bs-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>