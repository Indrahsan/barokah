<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-md-6">
      <form class="kotakotp" action="<?= base_url() ?>verifikasi/actionotp" method="post">
        <div>
          <label class="form-label">Silakan masukan 4 digit angka kode verifikasi yang kami kirimkan melalui Email</label> <br />
          <input type="text" class="form-control" id="otp" name="otp">
        </div>
        <button type="submit" id="submit" name="submit_otp" class="btn btn-primary tombol">Submit</button>
      </form>
    </div>
  </div>
</div>