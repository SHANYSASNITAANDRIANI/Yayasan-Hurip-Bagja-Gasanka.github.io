<?php if ($_GET['module']!=='kontak'): ?>
<footer class="container-fluid bg-warning py-5">
    <div class="container px-0 px-sm-2 text-muted">
    	<div class="row justify-content-center text-dark">
    		<div class="col-md-12 mb-5 text-center">
    			<h1 class="mb-3 mb-lg-4 fw-bolder text-uppercase">Kontak Kami</h1>
    			<h4 class="mb-3 mb-lg-4"><?= $nama_web ?> senang bisa berkenalan dan bersentuhan dengan kawan-kawan semua. Kontak kami melalui formulir dibawah ini atau dengan datang ke lokasi kantor kami.</h4>
    		</div>
    		<div class="col-10 col-sm-9 col-md-5 col-lg-4 my-auto">
    			<div class="d-flex flex-nowrap bd-highlight">
					<div class="order-1 p-2"><i class="fa-solid fa-location-dot fa-xl text-success"></i></div>
					<div class="order-2 p-2">
						<p class="text-uppercase fw-bolder mb-0">Alamat</p>
    					<span class="text-muted bg-warning"><?= $alamat ?></span>
					</div>
				</div>
    			<div class="d-flex flex-nowrap bd-highlight">
					<div class="order-1 p-2"><i class="fa-solid fa-phone fa-xl text-success"></i></div>
					<div class="order-2 p-2">
						<p class="text-uppercase fw-bolder mb-0">Hubungi Kami</p>
    					<span class="text-muted"><?= $nomorTelpSms ?></span>
					</div>
				</div>
    			<div class="d-flex flex-nowrap bd-highlight">
					<div class="order-1 p-2"><i class="fa-solid fa-envelope fa-xl text-success"></i></div>
					<div class="order-2 p-2">
						<p class="text-uppercase fw-bolder mb-0">Email</p>
    					<span class="text-muted"><?= $email ?></span>
					</div>
				</div>
    		</div>
    		<div class="col-md-7 col-lg-5 mt-4 mt-md-0 my-auto">
                <form action="sendSaran/" method="POST" accept-charset="utf-8" data-parsley-validate="">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Cth: John Doe" required="">
                        <label for="nama">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Cth: John Doe" required="">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Suliskan sesuatu ..." id="pesan" name="pesan" style="height: 100px" required=""></textarea>
                        <label for="pesan">Pesan</label>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" name="submit" class="btn btn-dark rounded-pill text-center" >Kirim Pesan <i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                </form>
    		</div>
    	</div>
    </div>
</footer>
<?php endif ?>

<?= $googleMaps ?>

<div class="container my-4 px-0 px-sm-2 text-center text-dark">
	<a target="_blank" href="<?= $linkInstagram ?>" title="Instagram Kami" class="link-success text-decoration-none m-1"><i class="fa-brands fa-instagram fa-xl"></i></a>
    <a target="_blank" href="<?= $linkFacebook ?>" title="Facebook Kami" class="link-success text-decoration-none m-1"><i class="fa-brands fa-facebook fa-xl"></i></a>
    <a href="mailto:<?= $email ?>" title="Email Kami" class="link-success text-decoration-none m-1"><i class="fa-solid fa-envelope fa-xl"></i></a>
    <br />
	<p class="mb-2 fw-bolder text-uppercase">&copy; <?= date("Y")." ".$nama_web ?></p>
	<span class="text-muted">Website by Lokalogi</span>
</div>