<?php
		
		$conn = mysqli_connect("localhost","root","","stockbarang");

		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Laporan_Barang_Masuk(".date('d-m-Y').").xls");

	?>	

	<h2>Laporan Barang Masuk</h2>

	<table border="1">
		<tr>
                <th>No</th>
				<th>Tanggal Masuk</th>
				<th>Nama Barang</th>
                <th>Satuan</th>
				<th>Jumlah Barang</th>
				<th>Penerima</th> 
		</tr>
		
		<?php
				if(isset($_POST['filter_tgl'])){
					$mulai = $_POST['tgl_mulai'];
					$selesai = $_POST['tgl_selesai'];

					if($mulai!=null || $selesai!=null){
						$ambilsemuadatastock = mysqli_query($conn, "select * from barangmasuk bm, barang b where b.idbarang = bm.idbarang and tanggalmasuk BETWEEN '$mulai' and DATE_ADD('$selesai',INTERVAL 1 DAY)");
					}else{
						$ambilsemuadatastock = mysqli_query($conn, "select * from barangmasuk bm, barang b where b.idbarang = bm.idbarang");
					}
				}else{
					$ambilsemuadatastock = mysqli_query($conn, "select * from barangmasuk bm, barang b where b.idbarang = bm.idbarang");
				}
					$no = 1;
					while($data=mysqli_fetch_array($ambilsemuadatastock)){
						$idb = $data['idbarang'];
						$idm = $data['idmasuk'];
						$tanggal = $data['tanggalmasuk'];
						$namabarang = $data['namabarang'];
						$jumlahbarangmasuk = $data['jumlahbarangmasuk'];
						$keteranganmasuk = $data['keteranganmasuk'];
						$satuanbarang   =   $data['satuan'];                 
					
					?>
					<tr>
						<td><?=$no++;?></td>
						<td><?=$tanggal;?></td>
						<td><?=$namabarang;?></td>
						<td><?=$satuanbarang;?></td>
						<td><?=$jumlahbarangmasuk;?></td>
						<td><?=$keteranganmasuk;?></td>
					</tr>
				<?php 
				}
				?>
	</table>
									