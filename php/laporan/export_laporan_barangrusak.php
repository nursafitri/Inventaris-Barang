<?php
		
		$conn = mysqli_connect("localhost","root","","stockbarang");

		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Laporan_Barang_Rusak(".date('d-m-Y').").xls");

	?>	

	<h2>Laporan Barang Rusak</h2>

	<table border="1">
		<tr>
                <th>No</th>
				<th>Tanggal Pencatatan</th>
				<th>Nama Barang</th>
                <th>Satuan</th>
				<th>Jumlah Barang</th>
				<th>Keterangan</th> 
		</tr>
		
		<?php
            if(isset($_POST['filter_tgl'])){
                $mulai = $_POST['tgl_mulai'];
                $selesai = $_POST['tgl_selesai'];

                if($mulai!=null || $selesai!=null){
                    $ambilsemuadatastock = mysqli_query($conn, "select * from barangrusak br, barang b where b.idbarang = br.idbarang and tanggalrusak BETWEEN '$mulai' and DATE_ADD('$selesai',INTERVAL 1 DAY)");
                }else{
                    $ambilsemuadatastock = mysqli_query($conn, "select * from barangrusak br, barang b where b.idbarang = br.idbarang");
                }
                }else{
                    $ambilsemuadatastock = mysqli_query($conn, "select * from barangrusak br, barang b where b.idbarang = br.idbarang");
                }
                $no = 1;
                while($data=mysqli_fetch_array($ambilsemuadatastock)){
                    $tanggal = $data['tanggalrusak'];
                    $namabarang = $data['namabarang'];
                    $jumlahbarangrusak = $data['jumlahbarangrusak'];
                    $keteranganrusak = $data['keteranganrusak'];
                    $satuanbarang   =   $data['satuan'];
                    $idb = $data['idbarang'];
                    $idk = $data['idrusak'];
        ?>

            <tr>
                <td><?=$no++;?></td>
                <td><?=$tanggal;?></td>
                <td><?=$namabarang;?></td>
                <td><?=$satuanbarang;?></td>
                <td><?=$jumlahbarangrusak;?></td>
                <td><?=$keteranganrusak;?></td>
            </tr>

            <?php 
				}
				?>
	</table>
									