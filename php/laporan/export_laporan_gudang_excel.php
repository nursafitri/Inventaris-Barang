	<?php
		
		$conn = mysqli_connect("localhost","root","","stockbarang");

		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Laporan_Stok_Gudang(".date('d-m-Y').").xls");

	?>	

	<!-- date('F Y') | nama bulan (dalam bentuk teks penuh) diikuti oleh tahun saat ini. -->
	<h2>Laporan Stok Gudang <?php echo date('F Y'); ?></h2>


	<table border="1">
		<tr>
			<th>No</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Jumlah Barang</th>
		</tr>
		
		<?php 
		$ambilsemuadatastock = mysqli_query($conn, "select * from barang");
		$no = 1;
		while($data=mysqli_fetch_array($ambilsemuadatastock)){
			$namabarang = $data['namabarang'];
			$jumlahbarang = $data['jumlahbarang'];
			$satuan = $data['satuan'];
			$idb = $data['idbarang'];
		?>

		<tr>
			<td><?=$no++;?></td>
			<td><?=$namabarang;?></td>
			<td><?=$satuan;?></td>
			<td><?=$jumlahbarang;?></td>
		</tr>
		<?php }?>
	</table>

	<table>
		<tr></tr>
	</table>
									