<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="<?= base_url() ?>assets/img/sidebar-1.jpg">
    <div class="logo">
        <a href="<?= base_url() ?>dashboard" class="simple-text">
            Barokah Dashboard
        </a>
    </div>
    <div class="logo logo-mini">
        <a href="<?= base_url() ?>dashboard" class="simple-text">
            BD
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="https://www.icegif.com/wp-content/uploads/anime-icegif-11.gif" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <?= $user['username'] ?>
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="collapseExample" aria-expanded="true">
                    <ul class="nav">
                        <li>
                            <a href="<?= base_url() ?>dashboard/logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="<?php if ($judul == "Dashboard | Barokah Catering") { ?> active <?php } ?>">
                <a href="<?= base_url() ?>dashboard">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="<?php if ($judul == "User Management" || $judul == 'Edit User') { ?> active <?php } ?>">
                <a href="<?= base_url() ?>dashboard/user">
                    <i class="material-icons">person_outline</i>
                    <p>User</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#formsExamples">
                    <i class="material-icons">content_paste</i>
                    <p>Order
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="<?php if ($judul == "Booked Order" || $judul == "Verify Order" || $judul == "Complete Order" || $judul == 'Booked Order | Detail' || $judul == 'Verify Order | Detail' || $judul == 'Complete Order | Detail') { ?> collapse in <?php } else { ?>
                            collapse
                        <?php } ?>" id="formsExamples" aria-expanded="true">
                    <ul class="nav">
                        <li class="<?php if ($judul == "Booked Order" || $judul == 'Booked Order | Detail') { ?> active <?php } ?>">
                            <a href="<?= base_url() ?>dashboard/bookedorder">Booked Order</a>
                        </li>
                        <li class="<?php if ($judul == "Verify Order" || $judul == 'Verify Order | Detail') { ?> active <?php } ?>">
                            <a href="<?= base_url() ?>dashboard/verifyorder">Verify Order</a>
                        </li>
                        <li class="<?php if ($judul == "Complete Order" || $judul == 'Complete Order | Detail') { ?> active <?php } ?>">
                            <a href="<?= base_url() ?>dashboard/completeorder">Complete Order</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="<?php if ($judul == "Summary") { ?> active <?php } ?>">
                <a href="<?= base_url() ?>dashboard/user">
                    <i class="material-icons">summarize</i>
                    <p>Summary</p>
                </a>
            </li>
        </ul>
    </div>
</div>