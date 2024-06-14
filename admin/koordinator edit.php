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
	<!------------------------Proses EditKoordinator-------------------->
	<?php

      $id_koordinator = $_GET['id_koordinator']; // assigment nim dengan nilai nim yang akan diedit
      $cek = $koneksi->query("select * from koordinator natural join fakultas natural join prodi WHERE id_koordinator='$id_koordinator'"); // query untuk memilih entri data dengan nilai nim terpilih
      if($cek->num_rows == 0){
        echo "";
      }else{
        $erow = $cek->fetch_assoc();
      }
      if(isset($_POST['simpan'])){ // jika tombol 'Simpan' dengan properti name="simpan" ditekan
        $nama           = $_POST['nama'];
        $jenis_kelamin  = $_POST['jenis_kelamin'];
        $tempat_lahir   = $_POST['tempat_lahir'];
        $tanggal_lahir  = $_POST['tanggal_lahir'];
        $kelas          = $_POST['kelas'];
        $id_fakultas       = $_POST['id_fakultas'];
        $id_prodi          = $_POST['id_prodi'];
        
        $update = $koneksi->query("update koordinator set 
                                  nama='$nama',
                                  jenis_kelamin='$jenis_kelamin',
                                  tempat_lahir='$tempat_lahir',
                                  tanggal_lahir='$tanggal_lahir',
                                  kelas='$kelas',
                                  id_fakultas='$id_fakultas',
                                  id_prodi='$id_prodi'
                                  WHERE id_koordinator='$id_koordinator'") or die(mysqli_error()); 
        if($update){ 
          
           $pesan = '<p>Data berhasil disimpan,  kembali ke <a href="koordinator data.php" class="a"> -> Data Koordinator. </a></p>';
        }else{ 
           $pesan = '<p>Data gagal disimpan, silahkan coba lagi. Atau kembali ke <a href="koordinator data
           .php"> -> Data Koordinator. </a></p>'; 
        }
      }else{
         $pesan='';
      }

    ?>


				<form method="post" action="">
            	  <h3>Edit Koordinator</h3>
            	    <hr>
                    <?php echo $pesan; ?>	
					<fieldset class="filset">
                      <legend>Identitas :</legend>
            			<input class="kotak" type="text" name="nama" value="<?php echo $erow['nama']; ?>" style="width: 100%;" placeholder="Nama Lengkap" required="">
            			<input class="kotak" type="text" name="tempat_lahir" value="<?php echo $erow['tempat_lahir']; ?>" style="width: 50%;" placeholder="Tempat Lahir" required="">
            			<input class="kotak" type="text" name="tanggal_lahir" value="<?php echo $erow['tanggal_lahir']; ?>" style="width: 49%;" placeholder="Tanggal Lahir      Tahun-Bulan-Tanggal" required="">

            					<select name="jenis_kelamin" class="kotak" style="width: 100%;" required="">
            						<option value="<?php echo $erow['jenis_kelamin']; ?>"><?php echo $erow['jenis_kelamin']; ?></option>
            						<option value="laki-laki">Laki-laki</option>
            						<option value="perempuan">Perempuan</option>
            					</select>

            					<select name="kelas" class="kotak" style="width: 100%;" required="">
            						<option value="<?php echo $erow['kelas']; ?>"><?php echo $erow['kelas']; ?></option>
            						<option value="4A">4A</option>
            						<option value="4B">4B</option>
            						<option value="4C">4C</option>
            						<option value="4D">4D</option>
            						<option value="4E">4E</option>
            						<option value="4F">4F</option>
            					</select>

            					<select name="id_fakultas" class="kotak" style="width: 100%;" id="fakultas" required="">
            						<option value="<?php echo $erow['id_fakultas']; ?>"><?php echo $erow['fakultas']; ?></option>
            						<?php 
						   				$result = $koneksi->query("select*from fakultas");        
								 			while ($erow = mysqli_fetch_array($result))
											 {    
									 			echo '<option value="'.$erow['id_fakultas'].'">'.$erow['fakultas'].'</option>';   
								 			}      
									     ?>
            					</select>

            					<select name="id_prodi" class="kotak" id="prodi" style="width: 100%;" required="">
            						<option value="<?php echo $erow['id_prodi']; ?>"><?php echo $erow['prodi']; ?></option>
            					</select>     
            					<button type="submit" name="simpan" class="kotak" style="width: 100px;">Simpan</button>
            					<button type="reset" class="kotak" style="width: 100px;">Batal</button>
            		</fieldset>
        		</form>
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
	<script type="text/javascript">    
		<?php echo $jsArray; ?>  
			function changeValue(nik)
			{  
			document.getElementById('nm').value = user[nik].nama;  
			};  
    </script>
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>

		<script>
		    $("#fakultas").change(function(){
        		// variabel dari nilai combo box Fakultas
       			var id_fakultas = $("#fakultas").val();
        		// mengirim dan mengambil data
        		$.ajax({
            		type: "POST",
            		dataType: "html",
            		url: "include/prodi.php",
            		data: "fakul="+id_fakultas,
            		success: function(msg){
                		// jika tidak ada data
                		if(msg == ''){
                		    alert('Tidak ada data Jurusan');
                		}
                		// jika dapat mengambil data,, tampilkan di combo box jurusan
                		else{
                    		$("#prodi").html(msg);
                		}
            		}
        		});
    		});
		</script>
</html>