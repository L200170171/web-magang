<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Agenda SDN Kadipaten 2</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">
	
	<link rel="stylesheet" href="<?= base_url('asset/')?>front/css/animate.css">
	<link rel="stylesheet" href="<?= base_url('asset/')?>front/css/icomoon.css">
	<link rel="stylesheet" href="<?= base_url('asset/')?>front/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url('asset/')?>front/css/magnific-popup.css">
	<link rel="stylesheet" href="<?= base_url('asset/')?>front/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url('asset/')?>front/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?= base_url('asset/')?>front/css/flexslider.css">
	<link rel="stylesheet" href="<?= base_url('asset/')?>front/css/pricing.css">
	<link rel="stylesheet" href="<?= base_url('asset/')?>front/css/style.css">
	<script src="<?= base_url('asset/')?>front/js/modernizr-2.6.2.min.js"></script>

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-3">
						<div id="fh5co-logo"><a href="index.php"><i class="icon-study"></i>SDN KADIPATEN 2</a></div>
					</div>
					<div class="col-xs-9 text-right menu-1">
						<ul>
							<li <?php if($judul=="Home")?> ><a href="<?= base_url('Welcome')?>">Home</a></li>
							<li <?php if($judul=="About")?> ><a href="<?= base_url('About')?>">Profil</a></li>
							<li class="has-dropdown">
								<a href="#">Direktori</a>
								<ul class="dropdown">
									<li class="active" <?php if($judul=="Daftar Guru")?> ><a href="<?= base_url('Guru')?>">Direktori Guru</a></li>
									<li <?php if($judul=="Daftar Siswa")?> ><a href="<?= base_url('Siswa')?>">Direktori Siswa</a></li>
									<li <?php if($judul=="Daftar Kelas")?> ><a href="<?= base_url('Kelas')?>">Direktori Kelas</a></li>
								</ul>
							</li>
							<li class="has-dropdown">
								<a href="#">Akademik</a>
								<ul class="dropdown">
									<li class="active" <?php if($judul=="Agenda")?> ><a href="<?= base_url('Agenda')?>">Agenda</a></li>
									<li <?php if($judul=="Pengumuman")?> ><a href="<?= base_url('Pengumuman')?>">Pengumuman</a></li>
									<li <?php if($judul=="Materi")?> ><a href="<?= base_url('Download')?>">Materi</a></li>
								</ul>
							</li>
							<li <?php if($judul=="Galeri")?> ><a href="<?= base_url('Galeri')?>">Galeri</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>
	
	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url(<?= base_url('asset/')?>foto/galeri/5.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1 class="heading-section">Agenda Terdekat</h1>
									<h2>SDN Kadipaten 2 Boyolali</h2>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	<div id="fh5co-blog">
		<div class="container">
			<div class="row animate-box">
				<?php
					$no=0;
					foreach ($data->result() as $row) :
						$judul=$row->agenda_nama;
						$deskripsi=$row->agenda_deskripsi;
						$mulai=date_create($row->agenda_mulai);        
				?>
				<div class="col-md-4 animate-box">
					<div class="fh5co-event">
						<div class="date text-center"><span><?= date_format($mulai,'j'); ?><br><?= date_format($mulai,'F'); ?></span></div>
						<h3><a href="#"><?= $judul ?></a></h3>
						<p><?= $deskripsi ?></p>
					</div>
				</div>
				<?php endforeach;?>
			</div>
			<div class="row">
				<div class="col">
					<?php echo $pagination; ?>
				</div>
			</div>
		</div>
	</div>

	<footer id="fh5co-footer" role="contentinfo">
		<div class="overlay"></div>
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-12 fh5co-widget text-center">
					<h3>Hubungi Kami</h3>
					<p>SDN 2 KADIPATEN BOYOLALI ⋅ Where Tomorrow's Leaders Come Together</p>
					<ul class="fh5co-footer-links">
						<li><span class="icon"><i class="icon-phone"></i> 085-556-656-565</li>
						<li><span class="icon"><i class="icon-location"></i> Jalan Raya Jetis - Kemusu</li>
						<li><span class="icon"><i class="icon-mail"></i> sdnkadipaten2@sekolah.sch.id</li>
					</ul>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2020. All Rights Reserved.</small> 
						<small class="block">SD Negeri Kadipaten 2 Boyolali</small>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<script src="<?= base_url('asset/')?>front/js/jquery.min.js"></script>
	<script src="<?= base_url('asset/')?>front/js/jquery.easing.1.3.js"></script>
	<script src="<?= base_url('asset/')?>front/js/bootstrap.min.js"></script>
	<script src="<?= base_url('asset/')?>front/js/jquery.waypoints.min.js"></script>
	<script src="<?= base_url('asset/')?>front/js/jquery.stellar.min.js"></script>
	<script src="<?= base_url('asset/')?>front/js/owl.carousel.min.js"></script>
	<script src="<?= base_url('asset/')?>front/js/jquery.flexslider-min.js"></script>
	<script src="<?= base_url('asset/')?>front/js/jquery.countTo.js"></script>
	<script src="<?= base_url('asset/')?>front/js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url('asset/')?>front/js/magnific-popup-options.js"></script>
	<script src="<?= base_url('asset/')?>front/js/simplyCountdown.js"></script>
	<script src="<?= base_url('asset/')?>front/js/main.js"></script>
	<script>

    var d = new Date(new Date().getTime() + 1000 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
	</script>
	</body>
</html>

