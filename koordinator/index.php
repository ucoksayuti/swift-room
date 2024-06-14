<?php
include ('../include/koneksi.php');
include ("include/akses koordinator.php");
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Informasi Kelas</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

	<?php
	$email = $_SESSION['email'];

	$cek = $koneksi->query("select*from akun natural join koordinator where email='$email'");
	if ($cek->num_rows == 0) {
		header("Location:../index.php");
	} else {
		$row = $cek->fetch_assoc();
	}

	$foto = $row['foto'];
	?>

	<div class="halaman">
		<header class="header">
			<div class="isi-header" id="navbar">
				<div class="logo">
					<img src="./public/logo.png" alt="">
				</div>
				<div class="menu-atas">
					<ul>
						<li><a href="#">Tentang</a></li>
						<li><a href="#">Kontak</a></li>
						<li><a href="#">Bantuan</a></li>
					</ul>
				</div>

				<div class="nama-user-nav">
					<a href="profile.php"><?php echo (strtoupper($row['nama'])); ?></a>
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

						<a class="btn-pilih-ruangan" href="ruangan data.php">Lihat Ruangan</a>

					</div>

					<div class="welcoming-img">
						<img src="../public/hero-img-2.png" alt="">
					</div>
				</div>

			</div>
		</div>

		<main class="kotak-user-index">
			<div class="selamat-datang-title">
				<p>Selamat Datang <?php echo $row['nama']; ?>.....</p>
			</div>
			<a class="btn-pilih-ruangan" href="ruangan data.php">Cari Ruangan Pilihanmu</a>

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
		</main>
		<?php include ("../footer.php") ?>
	</div>
</body>

</html>