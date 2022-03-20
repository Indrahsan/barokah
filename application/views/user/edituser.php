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
                <div class="col-md-12">
                    <div class="card">
                        <form action="" method="POST">
                            <input type="hidden">
                            <div class="card-header card-header-icon" data-background-color="rose">
                                <i class="material-icons">mail_outline</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Edit User</h4>
                                <div class="form-group label-floating is-empty">
                                    <input class="form-control" name="username" type="text" value="<?= $detail['username'] ?>" id="username" required>
                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                    <span class="material-input"></span>
                                </div>
                                <div class="text-danger"></div>

                                <div class="form-group label-floating is-empty">
                                    <input class="form-control" name="email" id="email" value="<?= $detail['email'] ?>" type="text" required>
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    <span class="material-input"></span>
                                </div>
                                <div class="text-danger"></div>

                                <div class="form-group label-floating is-empty">
                                    <label class="control-label">
                                        Password
                                        <small>*</small>
                                    </label>
                                    <input class="form-control" name="password" type="password" id="password">
                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                    <span class="material-input"></span>
                                </div>
                                <div class="text-danger"></div>

                                <div class="form-group label-floating">
                                    <label class="control-label">
                                        Status
                                        <small>*</small>
                                    </label>
                                    <select name="status" class="form-control valid" id="status" required="" aria-required="true" aria-invalid="false">
                                        <option value=""></option>
                                        <option value="0" <?php if ($detail['is_active'] === '0') { ?> selected="selected" <?php } ?>>Tidak Aktif</option>
                                        <option value="1" <?php if ($detail['is_active'] === '1') { ?> selected="selected" <?php } ?>>Aktif</option>
                                    </select>
                                    <span class="material-input"></span>
                                </div>

                                <div class="category form-category">
                                    <small>*</small> Required fields
                                </div>
                                
                                <div class="form-footer text-right">
                                    <button type="submit" class="btn btn-info btn-fill">Submit</button>
                                </div>
                            </div>
                        </form>
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