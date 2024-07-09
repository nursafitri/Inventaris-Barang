<!-- Nur Safitri Wulandari
193040181
Universitas Pasundan -->

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

    <title>Stok Barang</title>

    <!-- Custom fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    

    <style>
        .zoomable{
            width: 100px;
        }
        .zoomable:hover{
            transform: scale(3.5);
            transition: 0.5s ease;
        }

    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav  bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
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
            <li class="nav-item active">
                <a class="nav-link" href="stokbarang.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Stok Barang</span></a>
            </li>

            <!-- Nav Item - Barang Masuk -->
            <li class="nav-item">
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4  shadow">

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
                    <h1 class="h3 mb-2 text-gray-800">Stok Barang</h1>

                    <!-- DataTales  -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i> Tambah barang
                            </button>
                            <a href="php/laporan/export_laporan_gudang_excel.php"  class="btn btn-primary" style="margin-top:8 px"><i class="fa fa-print"></i> Export</a>
                        </div>
                    
                        <div class="card-body">


                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Barang</th>
                                            <th>Satuan</th>
                                            <th>Jumlah Barang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ambilsemuadatastock = mysqli_query($conn, "select * from barang ");
                                        $no = 1;
                                        while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                            // $idb = $data['idbarang'];
                                            $namabarang = $data['namabarang'];
                                            $satuan = $data['satuan'];
                                            $jumlahbarang = $data['jumlahbarang'];

                                            //cek ada gambar atau tidak
                                            $gambar = $data['image']; //ambil gambar
                                            if($gambar==null){
                                                //jika tidak ada gambar
                                                $img = 'No Photo';
                                            }else{
                                                //Jika ada gambar
                                                $img = '<img src="img/'.$gambar.'" class="zoomable">';
                                            }
                                            
                                        ?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$img;?></td>
                                            <td><?=$namabarang;?></td>
                                            <td><?=$satuan;?></td>
                                            <td><?=$jumlahbarang;?></td>
                                            <td>
                                            <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#edit<?=$idb;?>">
                                            <i class="fas fa-pen"></i>
                                            </button>
                                            <input type="hidden" name="idbarangygmaudihapus" value="<?=$idb;?>">
                                            <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delete<?=$idb;?>">
                                            <i class="fas fa-trash"></i>
                                            </button>
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="edit<?=$idb; ?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Ubah Barang</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <form method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <p>Nama Barang</p>
                                                        <input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control" required>
                                                        <br>
                                                        <p>Satuan Barang</p>
                                                        <input type="text" name="satuan" value="<?=$satuan;?>" class="form-control" required>
                                                        <br>
                                                        <p>Jumlah Barang</p>
                                                        <input type="text" name="jumlahbarang" value="<?=$jumlahbarang;?>" class="form-control" required>
                                                        <br>
                                                        <input type="file" name="file" class="form-control">
                                                        <br>
                                                        <input type="hidden" name="idb" value="<?=$idb;?>">
                                                        <button type="submit" class="btn btn-primary" name="updatebarang">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="delete<?=$idb; ?>">
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
                                                        <br>
                                                        <br>
                                                        <button type="submit"class="btn btn-danger" name="hapusbarang">Hapus</button>
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

    <!-- Tombol Scroll ke atas // Scroll to Top Button-->
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Memanggil plugin jQuery dataTables // Call the dataTables jQuery plugin -->
    <script src="js/demo/datatables-demo.js"></script>

</body>
      <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Tambah Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control" required>
                    <br>
                    <input type="text" name="satuan" placeholder="Satuan" class="form-control" required>
                    <br>
                    <input type="number" name="jumlahbarang" placeholder="Jumlah Barang" class="form-control" required>
                    <br>
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button type="submit"class="btn btn-primary" name="addnewbarang">Submit</button>
                </div>
                </form>
            </div>
            </div>
        </div>
</html>