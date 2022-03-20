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
                <a class="navbar-brand" href="#"> User </a>
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
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">perm_identity</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Filter Data
                            </h4>
                            <form action="" method="GET">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Email</label>
                                            <input type="text" id="email" name="email" class="form-control" value="<?= isset($email) ? $email : "" ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">No Handphone</label>
                                            <input type="text" id="no_telepon" name="no_telepon" class="form-control" value="<?= isset($no_telepon) ? $no_telepon : "" ?>">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-rose pull-right">Search</button>
                                    <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">perm_identity</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Complete Order</h4>
                            <h5 class="card-title">Total Data : <?= $total ?></h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Actions</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Nomor Handphone</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Date Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listuser->result_array() as $row) : ?>
                                        <tr>
                                            <td class="td-actions text-center">
                                                <a href="<?= base_url() ?>dashboard/detailcomplete?id=<?= $row['id'] ?>">
                                                    <button type="button" rel="tooltip" class="btn btn-success btn-round">
                                                        <i class="material-icons">visibility</i>
                                                    </button>
                                                </a>
                                                <a href="<?= base_url() ?>dashboard/deleteorder?id=<?= $row['id'] ?>" onclick="if(!confirm('Apakah Anda ingin menghapus data ini?')){ return false; }">
                                                    <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </a>
                                            </td>
                                            <td class="text-center"><?= $row['nama'] ?></td>
                                            <td class="text-center"><?= $row['email'] ?></td>
                                            <td class="text-center"><?= $row['no_telepon'] ?> </td>
                                            <td class="text-center"><?php if ($row['status'] == "0") { ?> <p class="statusbooked"> Booked Order</p> <?php } ?>
                                                <?php if ($row['status'] == "1") { ?> <p class="statusverify"> Verify Order</p> <?php } ?>
                                                <?php if ($row['status'] == "2") { ?> <p class="statuscomplete"> Complete Order</p> <?php } ?>
                                            </td>
                                            <td class="text-center"><?= date('d-m-Y  h:i:s a', $row['tgl_order']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                            </table>
                        </div>
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