<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="thanks">

                <h4>Thanks for Order!</h4>
                <hr />
                <h5>Order Summary </h5>
                <div class="d-flex justify-content-center">
                    <table>
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $getAllData['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>Paket</td>
                                <td>: </td>
                                <td><?= $getAllData['paket'] ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: </td>
                                <td><?= $getAllData['alamat'] ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah </td>
                                <td>: </td>
                                <td><?= $getAllData['jml_pesanan'] ?></td>
                            </tr>
                            <tr>
                                <td>Total Harga</td>
                                <td>: </td>
                                <td>Rp <?= $getAllData['jml_harga'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr />
                <h5>Silakan lakukan upload bukti transfer untuk melanjutkan proses pesanan </h5>
                <form action="" method="POST" enctype="multipart/form-data">
                        <button class="btn btn-rose btn-fill">
                            <input class="form-control" type="file" name="gambar" onchange="document.getElementById('nama_banner_mob').value = this.value.split('\\').pop().split('/').pop()" accept="image/png, image/jpeg, image/jpg">
                        </button>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary tombol">Submit</button>
                        </div>
                </form>


            </div>
        </div>
    </div>
</div>