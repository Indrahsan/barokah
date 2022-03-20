<div class="container">
    <div class="row">
        <div class="col-lg-8 mt-4 mb-4 ">
            <p style="font-size: 26px; font-weight:500; margin-top: 70px" class="seccontact">Silakan isi formulir di bawah, kami akan segera menjawab pesan Anda.</p>
        </div>
    </div>
</div>

<!-- Form -->
<div class="container contact">
    <div class="row">
        <div class="col-lg-7">
            <form action="" method="POST">
                <div class="mb-1">
                    <label for="nama">Nama </label><br>
                    <input class="contact" type="text" id="nama" name="nama"><br>
                    <div class="text-danger"><?= form_error('nama'); ?></div>
                </div>
                <div class="mb-1">
                    <label for="email">Email </label><br>
                    <input class="contact" type="email" id="email" name="email"><br>
                    <div class="text-danger"><?= form_error('email'); ?></div>
                </div>
                <div class="mb-1">
                    <label for="subject">Subject </label><br>
                    <input class="contact" type="text" id="subject" name="subject"><br>
                    <div class="text-danger"><?= form_error('subject'); ?></div>
                </div>
                <div class="mb-1">
                    <label for="pesan">Pesan </label><br>
                    <textarea class="contact" style="height: 150px;" type="text" id="pesan" name="pesan"></textarea><br>
                    <div class="text-danger"><?= form_error('pesan'); ?></div>
                </div>
                <button type="submit" id="submit" name="submit" class="btn btn-primary tombol" data-toggle="modal" data-target="#exampleModalCenter">Send</button>
            
        </form>
    </div>
    <div class="col-lg-3 mb-5 geserdikit">
        <p style="font-size: 22px; font-weight:500; color: white;">Alamat</p>
        <div class="mb-2" style="border-top: 3px solid #fccb06;"></div>
        <p class="mb-5" style="font-size: 20px; font-weight:lighter; color: white;">Jl. Boulevard Of Broken Dream<br>
            RT/RW 02/06<br>
            Karawaci Margasari<br>
            Kota Tangerang 15113<br></p>

        <p style="font-size: 22px; font-weight:500; color: white;">Maps</p>
        <div class="mb-2" style="border-top: 3px solid #fccb06;"></div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16098.806377132394!2d106.61549083315589!3d-6.170419761754844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ff267e568777%3A0x9dfd0f9278599f5d!2zNsKwMTAnNDEuNyJTIDEwNsKwMzYnNTIuNCJF!5e0!3m2!1sid!2sid!4v1636624257329!5m2!1sid!2sid" width="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>



    </div>
</div>
</div>
<!-- End Form -->