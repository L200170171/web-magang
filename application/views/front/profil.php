<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tentang SD Negeri Kadipaten 2</title>
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
							<li <?php if($judul=="About"){echo "class='active'";}?> ><a href="<?= base_url('About')?>">Profil</a></li>
							<li class="has-dropdown">
								<a href="#">Direktori</a>
								<ul class="dropdown">
									<li <?php if($judul=="Daftar Guru")?> ><a href="<?= base_url('Guru')?>">Direktori Guru</a></li>
									<li <?php if($judul=="Daftar Siswa")?> ><a href="<?= base_url('Siswa')?>">Direktori Siswa</a></li>
									<li <?php if($judul=="Daftar Kelas")?> ><a href="<?= base_url('Kelas')?>">Direktori Kelas</a></li>
								</ul>
							</li>
							<li class="has-dropdown">
								<a href="#">Akademik</a>
								<ul class="dropdown">
									<li <?php if($judul=="Agenda")?> ><a href="<?= base_url('Agenda')?>">Agenda</a></li>
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
		   	<li style="background-image: url(<?= base_url('asset/')?>foto/galeri/3.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1 class="heading-section">Profil</h1>
									<h2>SDN Kadipaten 2 Boyolali</h2>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	<div id="fh5co-about">
		<div class="container">
			<div class="col-md-6 animate-box">
				<span>Profil Sekolah</span>
				<h2>SD Negeri Kadipaten 2 Boyolali</h2>
				<table style="width:100%">
					<tr>
						<td>Nama Sekolah</td>
						<td>:</td>
						<td>SD Kadipaten 2</td>
					</tr>
					<tr>
						<td>Status Sekolah</td>
						<td>:</td>
						<td>Negeri</td>
					</tr>
					<tr>
						<td>Akreditasi</td>
						<td>:</td>
						<td>A</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td>Jetis RT 037 RW 002, Kadipaten</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>Andong, Boyolali, 57348</td>
					</tr>
					<tr>
						<td>NPSN</td>
						<td>:</td>
						<td>20309031</td>
					</tr>
					<tr>
						<td>SK Pendirian Sekolah</td>
						<td>:</td>
						<td>421.2/013/XIV/40/85</td>
					</tr>
					<tr>
						<td>SK Izin Operasional</td>
						<td>:</td>
						<td>Perbub No. 06 Tahun 2019</td>
					</tr>
					<tr>
						<td>Tanggal SK Pendirian</td>
						<td>:</td>
						<td>1985-04-01</td>
					</tr>
					<tr>
						<td>Tanggal SK Izin Operasi</td>
						<td>:</td>
						<td>2019-02-18</td>
					</tr>
				</table>
			</div>
			<div class="col-md-6">
				<img class="img-responsive" src="<?= base_url('asset/')?>foto/galeri/13.jpg">
			</div>
		</div>
	</div>

	<div id="fh5co-course-categories">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Visi & Misi Sekolah</h2>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-6">
					<h4 class="text-center">Visi Sekolah</h4>
					<p>Untuk mewujudkan tujuan pendidikan di Indonesia di jenjang pendidikan dasar, maka SD Negeri Baluwarti berkeinginan mewujudkannya dengan disesuaikan  visi sekolah yaitu<br> “ Terciptanya sekolah ramah anak, unggul dalam prestasi, berkarakter, berakar pada budaya bangsa dan berwawasan lingkungan berdasarkan ketakwaan dan ilmu pengetahuan”</p>
				</div>
				<div class="col-md-6">
					<h4 class="text-center">Misi Sekolah</h4>
					<p>Untuk bisa mencapai Visi SDN Kadipaten 2 maka kami telah melaksanakannya melalui misi yaitu dengan :</p>
					<p>1. Mewujudkan/menciptakan siswa yang taat beribadah kepada Tuhan Yang Maha Esa.
					<br>2. Membentuk sikap dan perilaku yang baik, santun, sopan dan berkarakter.
					<br>3. Mewujudkan siswa/i yang disiplin.
					<br>4. Menciptakan suasana pembelajaran yang aktif, inovatif, kreatif, efektif, menyenangkan, gembira, serta berbobot.
					<br>5. Mewujudkan siswa/i yang berprestasi di bidang akademik maupun non-akademik.
					<br>6. Mewujudkan suasana kekeluargaan antar warga sekolah.
					<br>7. Mewujudkan sekolah hijau (Green School).
					</p>
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

