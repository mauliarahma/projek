<h2>Tambah Produk</h2>

<form method="post" enctype="mulitpart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control"> 
	</div>
		<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" name="harga" class="form-control"> 
	</div>
	
		<div class="form-group">
		<label>Berat (gr)</label>
		<input type="number" name="berat" class="form-control"> 
	</div>
	
		<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	
		<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control"> 
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 
if (isset($_POST['save']))
{
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$berat = $_POST['berat'];
	$deskripsi = $_POST['deskripsi'];
	$foto = $_POST['foto'];
	// $nama_foto = $_FILES['nama_foto'];
	$lokasi = $_FILES['foto_produk']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/".$nama);
	$koneksi->query("INSERT INTO tb_produk (nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk) VALUES('".$nama."','".$harga."','".$berat."','".$nama_foto."','".$deskripsi."')");

	echo "<div class='alert alert-info'>Data Tersimpan!</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
} 
?>