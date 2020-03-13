<h2>Detail Pembelian</h2>

<?php 
$ambil = $koneksi->query("SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan=tb_pelanggan.id_pelanggan WHERE tb_pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<!-- <pre><?php print_r($detail); ?></pre> -->

<h3><strong><?php echo $detail ['nama_pelanggan']; ?></strong> <br></h3>
<p>
	<?php echo $detail['telepon_pelanggan']; ?> <br>
	<?php echo $detail['email_pelanggan']; ?>
</p>

<p>
	Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
	Total : <?php echo $detail['total_pembelian']; ?>
</p>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM tb_pembelian_produk JOIN tb_produk ON tb_pembelian_produk.id_produk=tb_produk.id_produk WHERE tb_pembelian_produk.id_pembelian='$_GET[id]'"); ?>
		<?php while ($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['harga_produk']; ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td>
				<?php echo $pecah['harga_produk']*$pecah['jumlah']; ?>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>