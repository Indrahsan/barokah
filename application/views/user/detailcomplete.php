<div class="main-panel">
    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                    <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons visible-on-sidebar-mini">view_list</i>
                </button>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"> Edit </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="separator hidden-lg hidden-md"></li>
                    <li>
                        <a href="<?= base_url() ?>dashboard/logout" class="dropdown-toggle" onclick="if(!confirm('Apakah Anda ingin keluar?')){ return false; }">
                            <i class="material-icons">power_settings_new</i>
                            <p class="hidden-lg hidden-md">Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">info</i>
                        </div>
                        <h4 class="card-title">Detail Complete Order</h4>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <?php foreach ($listuser->result_array() as $row) : ?>
                                            <tr>
                                                <th>Paket</th>
                                                <th>: <?= $row['paket'] ?></th>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <th>: <?= $row['nama'] ?></th>
                                            </tr>
                                            <tr>
                                                <th>No Telepon</th>
                                                <th>: <?= $row['no_telepon'] ?></th>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <th>: <?= $row['email'] ?></th>
                                            </tr>
                                            <tr>
                                                <th> Alamat </th>
                                                <th>: <?= $row['alamat'] ?></th>
                                            </tr>
                                            <tr>
                                                <th> Jumlah Pesanan </th>
                                                <th>: <?= $row['jml_pesanan'] ?></th>
                                            </tr>
                                            <tr>
                                                <th>Date Created</th>
                                                <th>: <?= $row['tgl_order'] ?></th>

                                            </tr>
                                            <tr>
                                                <th>Tanggal Pengiriman</th>
                                                <th>: <?= $row['tgl_pengiriman'] ?></th>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <th>: <?php if ($row['status'] == "0") { ?> Booked Order</p> <?php } ?>
                                                    <?php if ($row['status'] == "1") { ?> Verify Order</p> <?php } ?>
                                                    <?php if ($row['status'] == "2") { ?> Complete Order</p> <?php } ?></th>
                                            </tr>
                                        <?php endforeach; ?>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-6">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Detail Pembayaran</h4>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <?php foreach ($listuser->result_array() as $row) : ?>
                                            <tr>
                                                <th>Metode Pembayaran</th>
                                                <th>: <?= $row['metode_bayar'] ?></th>
                                            </tr>
                                            <tr>
                                                <th>Jumlah</th>
                                                <th>: Rp <?= $row['jml_harga'] ?>,-</th>
                                            </tr>
                                        <?php endforeach; ?>
                                    </thead>
                                </table>
                                <form action="<?=base_url()?>dashboard/action" method="POST">
                                    <div class="form-group is-empty">
                                        <label class="control-label">
                                            Action Pesanan
                                        </label>
                                        <select name="konfirmasi" class="form-control" id="konfirmasi" required>
                                            <option value=""></option>
                                            <option value="1">Konfirmasi Pesanan</option>
                                            <option value="2">Reject Pesanan</option>
                                        </select>
                                        <span class="material-input"></span>
                                        <input class="form-control" name="id" id="id" value="<?= $row['id'] ?>" type="hidden" required>
                                    </div>
                                    <div class="form-footer text-right">
                                        <button type="submit" class="btn btn-info btn-fill">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-6">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">image</i>
                        </div>
                        <h4 class="card-title">Bukti Transfer</h4>
                        <div class="card-content">
                        <img width="100px" src="<?= base_url() ?>assets/img/<?=$row ['gambar']?>">
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</div>
</body>
<!--   Core JS Files   -->
<script src="<?= base_url() ?>assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/material.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?= base_url() ?>assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="<?= base_url() ?>assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="<?= base_url() ?>assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="<?= base_url() ?>assets/js/bootstrap-notify.js"></script>
<!-- DateTimePicker Plugin -->
<script src="<?= base_url() ?>assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="<?= base_url() ?>assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="<?= base_url() ?>assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Select Plugin -->
<script src="<?= base_url() ?>assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="<?= base_url() ?>assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="<?= base_url() ?>assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?= base_url() ?>assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="<?= base_url() ?>assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="<?= base_url() ?>assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?= base_url() ?>assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= base_url() ?>assets/js/demo.js"></script>

</html>