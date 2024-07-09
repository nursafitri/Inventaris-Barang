<?php
		
		$conn = mysqli_connect("localhost","root","","stockbarang");

		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Laporan_Barang_Keluar(".date('d-m-Y').").xls");

	?>	

	<h2>Laporan Barang Keluar</h2>

	<table border="1">
		<tr>
                <th>No</th>
				<th>Tanggal Keluar</th>
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
                    $ambilsemuadatastock = mysqli_query($conn, "select * from barangkeluar bm, barang b where b.idbarang = bm.idbarang and tanggalkeluar BETWEEN '$mulai' and DATE_ADD('$selesai',INTERVAL 1 DAY)");
                }else{
                    $ambilsemuadatastock = mysqli_query($conn, "select * from barangkeluar bm, barang b where b.idbarang = bm.idbarang");
                }
                }else{
                    $ambilsemuadatastock = mysqli_query($conn, "select * from barangkeluar bm, barang b where b.idbarang = bm.idbarang");
                }
                $no = 1;
                while($data=mysqli_fetch_array($ambilsemuadatastock)){
                    $tanggal = $data['tanggalkeluar'];
                    $namabarang = $data['namabarang'];
                    $jumlahbarangkeluar = $data['jumlahbarangkeluar'];
                    $keterangankeluar = $data['keterangankeluar'];
                    $satuanbarang   =   $data['satuan'];
                    $idb = $data['idbarang'];
                    $idk = $data['idkeluar'];
        ?>

            <tr>
                <td><?=$no++;?></td>
                <td><?=$tanggal;?></td>
                <td><?=$namabarang;?></td>
                <td><?=$satuanbarang;?></td>
                <td><?=$jumlahbarangkeluar;?></td>
                <td><?=$keterangankeluar;?></td>
            </tr>

            <?php 
				}
				?>
	</table>
									