<!-- Nur Safitri Wulandari
193040181
Universitas Pasundan
August - September 2022 -->

<?php

// session_start();

//Koneksi ke database stockbarang
$conn = mysqli_connect("localhost","root","","stockbarang");

//Menambahkan barang baru
if(isset($_POST['addnewbarang'])){
    $namabarang = $_POST['namabarang'];
    $satuan = $_POST['satuan'];
    $jumlahbarang = $_POST['jumlahbarang'];

    //gambar
    $allowed_extension = array('png', 'jpg');
    $nama = $_FILES['file']['name']; //ambil nama file gambar
    $dot = explode('.', $nama);
    $ekstensi = strtolower(end($dot)); //ambil ekstensinya
    $ukuran = $_FILES['file']['size']; //ambil size filenya
    $file_tmp = $_FILES['file']['tmp_name']; //ambil lokasi filenya
    
    //penamaan file -> enkripsi
    $image = md5(uniqid($nama, true) . time()).'.'.$ekstensi; //menggabungkan nama file yang dienkripsi dengan ekstensinya

    //proses upload gambar
    if(in_array($ekstensi, $allowed_extension) === true){
        //validasi ukuran filenya
        if($ukuran < 15000000){
            move_uploaded_file($file_tmp, 'img/'.$image);

            $addtotable = mysqli_query($conn, "insert into barang (namabarang, satuan, jumlahbarang, image) values('$namabarang', '$satuan', '$jumlahbarang', '$image')");
            if($addtotable){
                header('location: index.php');
            }else{
                echo 'Gagal';
                header('location: index.php');
            }
        }else{
            //kalau filenya lebih dari 15mb
            echo '
            <script>
                alert("Ukuran terlalu besar");
                window.location.href="index.php";
            </script>';
        }
    }else{
        $addtotable = mysqli_query($conn, "insert into barang (namabarang, satuan, jumlahbarang) values('$namabarang', '$satuan', '$jumlahbarang')");
            if($addtotable){
                header('location: index.php');
            }else{
                echo 'Gagal';
                header('location: index.php');
            }
    }
    
};

//Menambah barang masuk
if(isset($_POST['barangmasuk'])){
    $barangnya = $_POST['barangnya'];
    $jumlahbarang = $_POST['jumlahbarang'];
    $penerima = $_POST['penerima'];

    $cekstocksekarang = mysqli_query($conn, "SELECT * from barang where idbarang='$barangnya'");
    $ambildata = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildata['jumlahbarang'];
    $tambahkanstocksekarangdenganjumlah = $stocksekarang+$jumlahbarang;

    $addtomasuk = mysqli_query($conn, "insert into barangmasuk (idbarang, jumlahbarangmasuk, keteranganmasuk) values('$barangnya', '$jumlahbarang', '$penerima')");
    $updatestockmasuk = mysqli_query($conn, "update barang set jumlahbarang='$tambahkanstocksekarangdenganjumlah' where idbarang='$barangnya'");
    if($addtomasuk&&$updatestockmasuk){
        header('location: barangmasuk.php');
    }else{
        echo 'Gagal';
        header('location: barangmasuk.php');
    }
};

//Menambah barang keluar
if(isset($_POST['barangkeluar'])){
    $barangnya = $_POST['barangnya'];
    $jumlahbarang = $_POST['jumlahbarang'];
    $penerima = $_POST['penerima'];

    $cekstocksekarang = mysqli_query($conn, "select * from barang where idbarang='$barangnya'");
    $ambildata = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildata['jumlahbarang'];

    if($stocksekarang >= $jumlahbarang){
        //Jika stock barang mencukupi
        $tambahkanstocksekarangdenganjumlah = $stocksekarang-$jumlahbarang;

        $addtokeluar = mysqli_query($conn, "INSERT into barangkeluar (idbarang, jumlahbarangkeluar, keterangankeluar) values('$barangnya', '$jumlahbarang', '$penerima')");
        $updatestockmasuk = mysqli_query($conn, "UPDATE    barang set jumlahbarang='$tambahkanstocksekarangdenganjumlah' where idbarang='$barangnya'");
        if($addtokeluar&&$updatestockmasuk){
            header('location: barangkeluar.php');
        }else{
            echo 'Gagal';
            header('location: barangkeluar.php');
        }
    }else{
        //Jika stock barang tidak cukup
        echo'
            <script>
                alert("Stok saat ini tidak mencukupi");
                window.location.href="barangkeluar.php";
            </script>
        ';
    }
};

//Menambah barang rusak
if(isset($_POST['barangrusak'])){
    $barangnya = $_POST['barangnya'];
    $jumlahbarang = $_POST['jumlahbarang'];
    $penerima = $_POST['penerima'];

    $cekstocksekarang = mysqli_query($conn, "select * from barang where idbarang='$barangnya'");
    $ambildata = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildata['jumlahbarang'];

    if($stocksekarang >= $jumlahbarang){
        //Jika stock barang mencukupi
        $tambahkanstocksekarangdenganjumlah = $stocksekarang-$jumlahbarang;

        $addtorusak = mysqli_query($conn, "INSERT into barangrusak (idbarang, jumlahbarangrusak, keteranganrusak) values('$barangnya', '$jumlahbarang', '$penerima')");
        $updatestockrusak = mysqli_query($conn, "UPDATE    barang set jumlahbarang='$tambahkanstocksekarangdenganjumlah' where idbarang='$barangnya'");
        if($addtorusak&&$updatestockrusak){
            header('location: barangrusak.php');
        }else{
            echo 'Gagal';
            header('location: barangrusak.php');
        }
    }else{
        //Jika stock barang tidak cukup
        echo'
            <script>
                alert("Stok saat ini tidak mencukupi");
                window.location.href="barangrusak.php";
            </script>
        ';
    }
};

//Update stok barang
if(isset($_POST['updatebarang'])){
    $idb = $_POST['idb'];
    $namabarang = $_POST['namabarang'];
    $satuan = $_POST['satuan'];
    $jumlahbarang = $_POST['jumlahbarang'];

    //gambar
    $allowed_extension = array('png', 'jpg');
    $nama = $_FILES['file']['name']; //ambil nama file gambar
    $dot = explode('.', $nama);
    $ekstensi = strtolower(end($dot)); //ambil ekstensinya
    $ukuran = $_FILES['file']['size']; //ambil size filenya
    $file_tmp = $_FILES['file']['tmp_name']; //ambil lokasi filenya
    
    //penamaan file -> enkripsi
    $image = md5(uniqid($nama, true) . time()).'.'.$ekstensi; //menggabungkan nama file yang dienkripsi dengan ekstensinya
    
    if($ukuran==0){
        //Jika tidak ingin upload
        $update = mysqli_query($conn, "UPDATE barang SET namabarang='$namabarang', satuan='$satuan', jumlahbarang='$jumlahbarang' WHERE idbarang='$idb'");
        if($update){
            header('location: index.php');
        }else{ 
            echo 'Gagal';
            header('location: index.php');
        }
    }else{
        //Jika ingin
        move_uploaded_file($file_tmp, 'img/'.$image);
        $update = mysqli_query($conn, "UPDATE barang SET namabarang='$namabarang', satuan='$satuan', jumlahbarang='$jumlahbarang', image='$image' WHERE idbarang='$idb'");
        if($update){
            header('location: index.php');
        }else{
            echo 'Gagal';
            header('location: index.php');
        }
    }

}

//Hapus Barang dari stock
if(isset($_POST['hapusbarang'])){
    $idb = $_POST['idb']; //id barang

    $gambar = mysqli_query($conn, "SELECT * FROM barang WHERE idbarang='$idb'");
    $get = mysqli_fetch_array($gambar);
    $img = 'img/'.$get['image'];
    unlink($img);

    $hapus = mysqli_query($conn, "DELETE FROM barang WHERE idbarang='$idb'");
    if($hapus){
        echo 'Data Berhasil dihapus!';
        header('location: index.php');
    }else{
        echo 'Gagal';
        header('location: index.php');
    }
}

// Mengubah data barang masuk
if(isset($_POST['updatebarangmasuk'])){
    $idb = $_POST['idb'];
    $idm = $_POST['idm'];
    $keteranganmasuk = $_POST['keteranganmasuk'];
    $jumlahbarangmasuk = $_POST['jumlahbarangmasuk'];
    
    $lihatstock = mysqli_query($conn, "SELECT * FROM barang where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stocksekarang = $stocknya['jumlahbarang'];

    $jumlahsekarang = mysqli_query($conn, "SELECT * FROM barangmasuk WHERE idmasuk='$idm'");
    $jumlahnya = mysqli_fetch_array($jumlahsekarang);
    $jumlahsekarang = $jumlahnya['jumlahbarangmasuk'];

    if($jumlahbarangmasuk > $jumlahsekarang){
        $selisih = $jumlahbarangmasuk - $jumlahsekarang;
        $dikurangi = $stocksekarang + $selisih;
        $kurangistocknya = mysqli_query($conn, "UPDATE barang SET jumlahbarang='$dikurangi' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "UPDATE barangmasuk SET jumlahbarangmasuk='$jumlahbarangmasuk', keteranganmasuk ='$keteranganmasuk' WHERE idmasuk='$idm'");
        if($kurangistocknya&&$updatenya){
            header('location: barangmasuk.php');
        }else{
        echo 'Gagal';
        header('location: barangmasuk.php');
        }
    }else{
        $selisih = $jumlahsekarang - $jumlahbarangmasuk;
        $dikurangi = $stocksekarang - $selisih;
        $kurangistocknya = mysqli_query($conn, "UPDATE barang SET jumlahbarang='$dikurangi' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "UPDATE barangmasuk SET jumlahbarangmasuk='$jumlahbarangmasuk', keteranganmasuk ='$keteranganmasuk' WHERE idmasuk='$idm'");
        if($kurangistocknya&&$updatenya){
            header('location: barangmasuk.php');
        }else{
        echo 'Gagal';
        header('location: barangmasuk.php');
        }
    }
}

//Menghapus data barang masuk
if(isset($_POST['hapusbarangmasuk'])){
    $idb = $_POST['idb'];
    $jumlahbarangmasuk = $_POST['jumlahbarangmasuk'];
    $idm = $_POST['idm'];

    $getdatastock = mysqli_query($conn, "SELECT * FROM barang WHERE idbarang = '$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stok = $data['jumlahbarang'];

    $selisih = $stok - $jumlahbarangmasuk;

    $update = mysqli_query($conn, "UPDATE barang SET jumlahbarang='$selisih' WHERE idbarang = '$idb'");
    $hapusdata = mysqli_query($conn, "DELETE FROM barangmasuk WHERE idmasuk = '$idm'");

    if($update&&$hapusdata){
        header('location: barangmasuk.php');
    }else{
        echo 'Gagal';
        header('location: barangmasuk.php');
    }
}

//Mengubah data barang keluar
if(isset($_POST['updatebarangkeluar'])){
    $idb = $_POST['idb'];
    $idk = $_POST['idk'];
    $keterangankeluar = $_POST['keterangankeluar'];
    $jumlahbarangkeluar = $_POST['jumlahbarangkeluar'];
    
    $lihatstock = mysqli_query($conn, "SELECT * FROM barang where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stocksekarang = $stocknya['jumlahbarang'];

    $jumlahsekarang = mysqli_query($conn, "SELECT * FROM barangkeluar WHERE idkeluar='$idk'");
    $jumlahnya = mysqli_fetch_array($jumlahsekarang);
    $jumlahsekarang = $jumlahnya['jumlahbarangkeluar'];

    if($jumlahbarangkeluar > $jumlahsekarang){
        $selisih = $jumlahbarangkeluar - $jumlahsekarang;
        $dikurangi = $stocksekarang - $selisih;
        $kurangistocknya = mysqli_query($conn, "UPDATE barang SET jumlahbarang='$dikurangi' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "UPDATE barangkeluar SET jumlahbarangkeluar='$jumlahbarangkeluar', keterangankeluar ='$keterangankeluar' WHERE idkeluar='$idk'");
        if($kurangistocknya&&$updatenya){
            header('location: barangkeluar.php');
        }else{
        echo 'Gagal';
        header('location: barangkeluar.php');
        }
    }else{
        $selisih = $jumlahsekarang - $jumlahbarangkeluar;
        $dikurangi = $stocksekarang + $selisih;
        $kurangistocknya = mysqli_query($conn, "UPDATE barang SET jumlahbarang='$dikurangi' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "UPDATE barangkeluar SET jumlahbarangkeluar='$jumlahbarangkeluar', keterangankeluar ='$keterangankeluar' WHERE idkeluar='$idk'");
        if($kurangistocknya&&$updatenya){
            header('location: barangkeluar.php');
        }else{
        echo 'Gagal';
        header('location: barangkeluar.php');
        }
    }
}

//Menghapus data barang keluar
if(isset($_POST['hapusbarangkeluar'])){
    $idb = $_POST['idb'];
    $jumlahbarangkeluar = $_POST['jumlahbarangkeluar'];
    $idk = $_POST['idk'];

    $getdatastock = mysqli_query($conn, "SELECT * FROM barang WHERE idbarang = '$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stok = $data['jumlahbarang'];

    $selisih = $stok + $jumlahbarangkeluar;

    $update = mysqli_query($conn, "UPDATE barang SET jumlahbarang='$selisih' WHERE idbarang = '$idb'");
    $hapusdata = mysqli_query($conn, "DELETE FROM barangkeluar WHERE idkeluar = '$idk'");

    if($update&&$hapusdata){
        header('location: barangkeluar.php');
    }else{
        echo 'Gagal';
        header('location: barangkeluar.php');
    }
}

//Mengubah data barang rusak
if(isset($_POST['updatebarangrusak'])){
    $idb = $_POST['idb'];
    $idr = $_POST['idr'];
    $keteranganrusak = $_POST['keteranganrusak'];
    $jumlahbarangrusak = $_POST['jumlahbarangrusak'];
    
    $lihatstock = mysqli_query($conn, "SELECT * FROM barang where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stocksekarang = $stocknya['jumlahbarang'];

    $jumlahsekarang = mysqli_query($conn, "SELECT * FROM barangrusak WHERE idrusak='$idr'");
    $jumlahnya = mysqli_fetch_array($jumlahsekarang);
    $jumlahsekarang = $jumlahnya['jumlahbarangrusak'];

    if($jumlahbarangrusak > $jumlahsekarang){
        $selisih = $jumlahbarangrusak - $jumlahsekarang;
        $dikurangi = $stocksekarang - $selisih;
        $kurangistocknya = mysqli_query($conn, "UPDATE barang SET jumlahbarang='$dikurangi' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "UPDATE barangrusak SET jumlahbarangrusak='$jumlahbarangrusak', keteranganrusak ='$keteranganrusak' WHERE idrusak='$idr'");
        if($kurangistocknya&&$updatenya){
            header('location: barangrusak.php');
        }else{
        echo 'Gagal';
        header('location: barangrusak.php');
        }
    }else{
        $selisih = $jumlahsekarang - $jumlahbarangrusak;
        $dikurangi = $stocksekarang + $selisih;
        $kurangistocknya = mysqli_query($conn, "UPDATE barang SET jumlahbarang='$dikurangi' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "UPDATE barangrusak SET jumlahbarangrusak='$jumlahbarangrusak', keteranganrusak ='$keteranganrusak' WHERE idrusak='$idr'");
        if($kurangistocknya&&$updatenya){
            header('location: barangrusak.php');
        }else{
        echo 'Gagal';
        header('location: barangrusak.php');
        }
    }
}

//Menghapus data barang rusak
if(isset($_POST['hapusbarangrusak'])){
    $idb = $_POST['idb'];
    $jumlahbarangrusak = $_POST['jumlahbarangrusak'];
    $idr = $_POST['idr'];

    $getdatastock = mysqli_query($conn, "SELECT * FROM barang WHERE idbarang = '$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stok = $data['jumlahbarang'];

    $selisih = $stok + $jumlahbarangrusak;

    $update = mysqli_query($conn, "UPDATE barang SET jumlahbarang='$selisih' WHERE idbarang = '$idb'");
    $hapusdata = mysqli_query($conn, "DELETE FROM barangrusak WHERE idrusak = '$idr'");

    if($update&&$hapusdata){
        header('location: barangrusak.php');
    }else{
        echo 'Gagal';
        header('location: barangrusak.php');
    }
}
?>