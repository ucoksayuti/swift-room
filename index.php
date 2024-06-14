<?php
include ('include/koneksi.php');
include ("include/akses koordinator.php");
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Informasi Kelas</title>
	<link href="./css/style.css" rel="stylesheet">
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="./js/index.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
	<div class="halaman">
		<header class="header">
			<div class="isi-header" id="navbar">
				<div class="logo">
					<img src="./public/logo.png" alt="">
				</div>
				<div class="menu-atas">
					<ul>
						<li><a class="coba" href="#">Tentang</a></li>
						<li><a href="#">Kontak</a></li>
						<li><a href="#">Bantuan</a></li>
					</ul>
				</div>
				<div class="login-con-btn">
					<a class="login-btn" href="login.php">Login</a>
				</div>
			</div>
		</header>


		<div class="halaman1">
			<div class="isi-halaman">
				<div class="hero-container-index">
					<div class="welcoming">
						<div class="welcoming-headline">
							<p class="welcoming-text1">20+ ROOMS WITH GREAT FACILITIES</p>
							<h1>Temukan Ruangan Terbaik Untuk Setiap Acaramu</h1>
						</div>
						<p>Temukan dan pilih ruangan yang sesuai dengan kebutuhan mu,
							mulai dari ruang pertemuan hingga acara spesial, dengan
							proses pemesanan yang praktis dan cepat</p>

						<div class="welcoming-btn">
							<button class="btn-login-welcoming">Get Started</button>
							<button class="btn-regis-welcoming">Register</button>
						</div>
					</div>

					<div class="welcoming-img">
						<img src="./public/hero-img-2.png" alt="">
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="chart-container-title">
		<h1 class="chart-title">Ruangan Paling Populer</h1>
	</div>

	<div class="hero-chart">
		<canvas id="myChart"></canvas>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script>
		const ctx = document.getElementById('myChart');

		new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ['J0408', 'J0407', 'LKOMFKI', 'JSEM1', 'JSEM2', 'J0403'],
				datasets: [{
					label: 'Peminjaman Bulan ini',
					data: [12, 19, 3, 5, 2, 3],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					y: {
						beginAtZero: true
					}
				}
			}
		});
	</script>


	<?php include ("footer.php") ?>
</body>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

<script>
	$("#fakultas").change(function () {
		// variabel dari nilai combo box Fakultas
		var id_fakultas = $("#fakultas").val();
		// mengirim dan mengambil data
		$.ajax({
			type: "POST",
			dataType: "html",
			url: "admin/include/prodi.php",
			data: "fakul=" + id_fakultas,
			success: function (msg) {
				// jika tidak ada data
				if (msg == '') {
					alert('Tidak ada data Jurusan');
				}
				// jika dapat mengambil data,, tampilkan di combo box jurusan
				else {
					$("#prodi").html(msg);
				}
			}
		});
	});
</script>

</html>