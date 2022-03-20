<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $judul; ?></title>
  <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/custom.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" />
  <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Chewy&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">


</head>

<body>
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light ">
  <div class="container">
  <a class="navbar-brand" href="<?=base_url()?>">
  <img src="<?=base_url()?>assets/images/logo.png" style="width: 35px; height: 35px" class="d-block w-100" alt="">
</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item">
      <a class="nav-item nav-link" href="<?=base_url()?>" style="<?php if($judul == "Home | Barokah Catering") {?> color: #FCBA1E !important; <?php } ?>">Beranda<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
        <a class="nav-item nav-link" href="<?=base_url()?>menu" style="<?php if($judul == "Menu | Barokah Catering") {?> color: #FCBA1E !important; <?php } ?>">Menu</a>
        </li>
        <li class="nav-item">
        <a class="nav-item nav-link" href="<?=base_url()?>contact" style="<?php if($judul == "Contact Us | Barokah Catering") {?> color: #FCBA1E !important; <?php } ?>">Kontak</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <!-- End Navbar -->

 <?= $isi?>

  <!-- Footer -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12" style="padding:0%">
        <div class="d-flex justify-content-center footer">
          <a href="#" class="kaki"><img src="<?=base_url()?>assets/images/fb.png" class="kaki" alt=""></a>
          <a href="#" class="kaki" style="margin-left: 100px; margin-right: 100px;"><img src="<?=base_url()?>assets/images/tw.png" class="kaki" alt=""></a>
          <a href="#" class="kaki"><img src="<?=base_url()?>assets/images/instagram.png" class="kaki" alt=""></a>
        </div>
      </div>
    </div>
  </div>
  <!-- End Footer -->


</body>

</html>