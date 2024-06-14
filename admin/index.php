<?php 
  include('../include/koneksi.php');
  include("include/akses admin.php"); 
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
        	$email = $_SESSION['email']; // mengambil username dari session yang login
      
        	$cek = $koneksi->query("select*from user where email='$email'"); // query memilih entri username pada database
        	if($cek->num_rows == 0){
          		header("Location:../index admin.php");
        	}else{
         	 $row = $cek->fetch_assoc();
        	}

        	$nama = $row['nama'];
      	?>

		<div class="halaman">
			<header class="header">
				<div class="isi-header">	
					<div class="logo">
						<img src="./public/logo.png" alt="">
					</div>
					<div class="menu-atas">
						<ul>
						<li><a href="#">Tentang</a></li>
						<li><a href="#">Kontak</a></li>
						<li><a href="#">Bantuan</a></li>
						<li><a href="#"><?php echo (strtoupper($row['nama'])); ?></a></li>
						</ul>
					</div>
					<div class="hapus"></div>
				</div>
			</header>
			<div class="judul">
				<div class="isi-judul"></div>
			</div>
		
	
			<div class="halaman1">
				<div class="isi-halaman">
				
					<div class="isi">
						<div class="artikel">
							<p>Selamat Datang <?php echo $row['nama']; ?>.....</p>
						</div>
					</div>
					
					<nav class="menu">
						<div class="menu1">
							<h3><?php echo (strtoupper($row['nama'])); ?></h3>
							<hr>
							<ul>
							<li><a href="ruangan data.php">Ruangan</a></li>
							<li><a href="koordinator data.php">Koordinator</a></li>
							<?php
							$cek = $koneksi->query("select*from koordinator where status='non-aktif'");
							if($cek->num_rows == 0){
								echo '<li><a href="#">Konfirmasi</a></li>';
							}else{
								echo '<li><a href="akun.php"><font color="red">Konfirmasi</font></a></li>';
							}
							?>
							<li><a href="komentar.php">Komentar</a></li>
							<li><a href="laporan.php">Laporan</a></li>
							<li><a href="../logout.php">Logout</a></li>
							</ul>
						</div>
					</nav>
					
					<div class="hapus"></div>
				</div>
			</div>
		
			<?php include("include/footer.php"); ?>
		</div>
	</body>
</html>