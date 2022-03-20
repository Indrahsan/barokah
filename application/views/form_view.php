<div class="container">
  <form class="kotak" action="" method="post">
    <div class="row">
      <div class="col-lg-6">
        <div class="mb-2">
          <label class="form-label">Paket : </label><br />
          <input readonly type="text" class="form-control" id="paket" name="paket" value="<?= isset($menu) ? $menu : "" ?>">
        </div>
        <div class="mb-2">
          <label class="form-label">Nama : </label> <br />
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-2">
          <label class="form-label">No Telepon : </label> <br />
          <input type="tel" class="form-control" id="telp" name="telp" required>
        </div>
        <div class="mb-2">
          <label class="form-label">Email : </label>
          <img src="<?= base_url() ?>assets/images/tool.png" style="width: 10px; height: 10px;" alt="" data-bs-toggle="tooltip" data-bs-placement="top" title="Anda akan menerima kode OTP, dikirim melalui email yang didaftarkan">
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-2">
          <label class="form-label">Tanggal Pengiriman :</label> <br />
          <input type="date" class="form-control" id="book_date" name="book_date" required>
        </div>
        <div class="mb-2">
          <label class="form-label">Alamat :</label> <br />
          <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="mb-2">
          <label class="form-label">Jumlah Pesanan : </label>
          <img src="<?= base_url() ?>assets/images/tool.png" style="width: 10px; height: 10px;" alt="" data-bs-toggle="tooltip" data-bs-placement="top" title="Jumlah Pesanan harus lebih dari 50" required>
          <br />
          <input type="int" class="form-control" id="jumlah" name="jumlah">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="vl">
          <h3>Paket yang dipilih</h3>
          <div class="text-center">
            <br />
            <img class="pkt" src="<?= base_url() ?>assets/images/<?= $gambar ?>" class="d-block w-100" alt="..." style="margin-bottom: 20px;">
          </div>
          <h4>Pilih Metoder Bayar</h4>
          <br />
          <div class="container">
            <div class="row">
              <div class="col-lg">
                <div class="mb-2">
                  <label class="rad">
                    <input type="radio" name="mtd_bayar" id="BCA" value="BCA">
                    <img src="<?= base_url() ?>assets/images/bca.png" style="height: 20px;" class="d-block w-100" alt="bni">
                  </label>
                  <label class="rad">
                    <input type="radio" name="mtd_bayar" id="BNI" value="BNI">
                    <img src="<?= base_url() ?>assets/images/bni.png" style="height: 20px;" class="d-block w-100" alt="bni">
                  </label>
                </div>
                <div class="col-lg">
                  <label class="rad">
                    <input type="radio" name="mtd_bayar" id="OVO" value="OVO">
                    <img src="<?= base_url() ?>assets/images/ovo.png" style="height: 20px;" class="d-block w-100" alt="bni">
                  </label>
                  <label class="rad">
                    <input type="radio" name="mtd_bayar" id="GOPAY" value="GOPAY">
                    <img src="<?= base_url() ?>assets/images/gopay.png" style="height: 20px;" class="d-block w-100" alt="bni">
                  </label>
                </div>
              </div>
            </div>
          </div>

        </div>
        <button style="float: right;" type="submit" id="submit" name="submit" class="btn btn-primary tombol">Submit</button>
      </div>
    </div>
</div>
</form>
</div>

<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>