<div class="container">
    <form class="kotakotp" action="<?= base_url() ?>verifikasi/actionotp" method="post">
        <div class="row d-flex justify-content-center">
            <div class="col-lg">
                <div>
                    <label class="form-label">OTP : </label> <br />
                    <input type="text" class="form-control" id="otp" name="otp">
                </div>
                <button type="submit" id="submit" name="submit_otp" class="btn btn-primary tombol">Submit</button>
            </div>
        </div>
</form>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>