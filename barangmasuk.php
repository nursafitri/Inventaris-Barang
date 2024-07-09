<?php
require 'function.php';
// require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Barang Masuk</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center sidebar-fixed" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-globe"></i>
                </div>
                <div class="sidebar-brand-text mx-3">DINAS PERHUBUNGAN KARAWANG</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Barang
            </div>

            <!-- Nav Item - Stok Barang -->
            <li class="nav-item">
                <a class="nav-link" href="stokbarang.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Stok Barang</span></a>
            </li>

            <!-- Nav Item - Barang Masuk -->
            <li class="nav-item active">
                <a class="nav-link" href="barangmasuk.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Barang Masuk</span></a>
            </li>

            <!-- Nav Item - Barang Keluar -->
            <li class="nav-item">
                <a class="nav-link" href="barangkeluar.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Barang Keluar</span></a>
            </li>

            <!-- Nav Item - Barang Rusak -->
            <li class="nav-item">
                <a class="nav-link" href="barangrusak.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Barang Rusak</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- divider -->
            <hr>
            <hr>

            <!-- Nav Item - Logout -->
            <li class="nav-item ">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-solid fa-arrow-left"></i>
                    <span>Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <h1 class="h3 mb-2 text-gray-800"> Gudang</h1>

                    <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Barang Masuk</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i> Tambah barang
                            </button>
                            <br>
                                <div class="row mt-4">
                                    <div class="col">
                                        <form method="post" class="form-inline">
                                            <input type="date" name="tgl_mulai" class="form-control">
                                            <input type="date" name="tgl_selesai" class="form-control ml-3">
                                            <button type="submit" name="filter_tgl" class="btn btn-info ml-3">Filter</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <form action="php/laporan/export_laporan_barangmasuk.php" method="post" class="form-inline">
                                            <input type="date" name="tgl_mulai" class="form-control">
                                            <input type="date" name="tgl_selesai" class="form-control ml-3">
                                            <button type="submit" name="filter_tgl" class="btn btn-info ml-3"> Export</button>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Nama Barang</th>
                                            <th>Satuan</th>
                                            <th>Jumlah Barang</th>
                                            <th>Penerima</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
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
                                                <td>
                                                <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#edit<?=$idm;?>">
                                                <i class="fas fa-pen"></i> 
                                                </button>
                                                <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delete<?=$idm;?>">
                                                <i class="fas fa-trash"></i> 
                                                </button>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?=$idm;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ubah Data Barang</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="idb" value="<?=$idb;?>">
                                                            <input type="hidden" name="idm" value="<?=$idm;?>">
                                                            <p>Nama Barang</p>
                                                            <input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control" readonly>
                                                            <br>
                                                            <p>Jumlah</p>
                                                            <input type="text" name="jumlahbarangmasuk" value="<?=$jumlahbarangmasuk;?>" class="form-control" required>
                                                            <br>
                                                            <p>Penerima</p>
                                                            <input type="text" name="keteranganmasuk" value="<?=$keteranganmasuk;?>" class="form-control" required>
                                                            <br>
                                                            <button type="submit"class="btn btn-primary" name="updatebarangmasuk">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete<?=$idm; ?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Barang?</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus <?=$namabarang;?>?
                                                            <input type="hidden" name="idb" value="<?=$idb;?>">
                                                            <input type="hidden" name="idm" value="<?=$idm;?>">
                                                            <input type="hidden" name="jumlahbarangmasuk" value="<?=$jumlahbarangmasuk;?>">
                                                            <br>
                                                            <br>
                                                            <button type="submit"class="btn btn-danger" name="hapusbarangmasuk">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>

                                        <?php
                                            };
                                        ?>

                                    </tbody>
                                    
                                </table>
                                
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2023 Nur Safitri Wulandari</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> -->
    <script src="js/demo/datatables-demo.js"></script>

</body>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Tambah Barang Masuk</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <form method="post">
                <div class="modal-body">

                <select name="barangnya" class="form-control">
                    <?php
                        $ambildata = mysqli_query($conn, "select * from barang order by namabarang");
                        while($fetcharray = mysqli_fetch_array($ambildata)){
                            $namabarangnya = $fetcharray['namabarang'];
                            $idbarangnya = $fetcharray['idbarang'];
                        
                    ?>

                    <option value="<?=$idbarangnya;?>"><?=$namabarangnya;?></option>

                    <?php
                        }
                    ?>
                </select>

                <br>
                       
                    <input type="number" name="jumlahbarang" placeholder="Jumlah Barang" class="form-control" required>
                    <br>
                    <input type="text" name="penerima" placeholder="Penerima" class="form-control" required>
                    <br>
                    <button type="submit"class="btn btn-primary" name="barangmasuk">Submit</button>
                </div>
                </form>
            </div>
            </div>
        </div>
</html>