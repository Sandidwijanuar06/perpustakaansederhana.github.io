<?php
    require 'fungsi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Halaman Admin | Pengembalian</title>
  <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" href="../node_modules/flag-icon-css/css/flag-icon.min.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="shortcut icon" href="../images/5.png" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
  <div class=" container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="bg-white text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="index.html"><img src="../images/logo_star_black.png" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo_star_mini.jpg" alt=""></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-toggle="minimize">
          <span class="navbar-toggler-icon"></span>
        </button>
        <form class="form-inline mt-2 mt-md-0 d-none d-lg-block">
          <input class="form-control mr-sm-2 search" type="text" placeholder="Search">
        </form>
        <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
          <li>
            <a class="profile-pic" href="#">
                <?php

                    if (!isset($_SESSION['namapetugas'])) {
                    }
                ?>
                <i class="fas fa-user"></i> <span class="text-white font-medium"><?php echo $_SESSION['namapetugas'] ?></span></a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <!-- partial -->
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-info">
            <?php
              if (!isset($_SESSION['foto'])) {
              }
            ?>
          <img src="../images/petugas/<?php echo $_SESSION['foto']?>">
            <?php
            if (!isset($_SESSION['namapetugas'])) {
            }
            ?>
            <p class="name"><?php echo $_SESSION['namapetugas'] ?></p><br>
            <span class="online"></span>
          </div>
          <ul class="nav">
            <li class="nav-item active">
              <a class="nav-link" href="dashboard.php">
                <img src="../images/icons/1.png" alt="">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="daftarbuku.php">
                <i class="fas fa-book mr-3"></i>
                <span class="menu-title">Daftar Buku</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="bukumasuk.php">
                <i class="fas fa-inbox mr-3"></i>
                <span class="menu-title">Daftar Buku Masuk</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="peminjaman.php">
              <img src="../images/icons/003-outbox.png" alt="">
                <span class="menu-title">Peminjaman</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="pengembalian.php">
              <i class="fas fa-check-square mr-3"></i>
                <span class="menu-title">Data Pengembalian</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="petugas.php">
              <i class="fas fa-users mr-3"></i>
                <span class="menu-title">Dafar Petugas</span>
              </a>
            </li>
          </ul>
        </nav>

        <!-- partial -->
        <div class="content-wrapper">
        <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <label class="badge badge-success" style="margin-bottom: 30px;"><h4 style="color: black; margin-top: 10px;">Daftar Buku</h4></label>
                  <!-- Button trigger modal -->
                  <!-- <button type="button" class="btn btn-primary mb-2" style="margin-left: 875px;" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-plus"> Tambah Buku Masuk</i>
                  </button> -->
                  <div class="table-responsive">
                    <table class="table center-aligned-table table-bordered table-dark">
                      <thead>
                        <tr class="text-primary">
                          <th class="text-center">No</th>
                          <th class="text-center">Nama Peminjam</th>
                          <th class="text-center">Kelas</th>
                          <th class="text-center">Tanggal Pinjam</th>
                          <th class="text-center">Tanggal Kembali</th>
                          <th class="text-center">Keterangan</th>
                          <!-- <th>Aksi</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $query = mysqli_query($con, "SELECT * FROM pengembalian");
                            $i=1;
                            while ($getbukumasuk = mysqli_fetch_array($query)) {
                                $namapeminjam   = $getbukumasuk['namapeminjam'];
                                $kelas          = $getbukumasuk['kelas'];
                                $tanggalpinjam  = $getbukumasuk['tanggalpinjam'];
                                $tanggalkembali = $getbukumasuk['tanggalkembali'];
                                $keterangan     = $getbukumasuk['keterangan'];
                                $idkembali      = $getbukumasuk['idkembali'];
                                $idpeminjaman   = $getbukumasuk['idpeminjaman'];
                        ?>
                        <tr class="">
                          <td><?=$i++;?></td>
                          <td><?=$namapeminjam;?></td>
                          <td><?=$kelas;?></td>
                          <td><?=$tanggalpinjam;?></td>
                          <td><?=$tanggalkembali;?></td>
                          <td><?=$keterangan;?></td>
                          <!-- <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td> -->
                        </tr>
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
        </div>
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="float-right">
                <a href="#">Star Admin</a> &copy; 2017
            </span>
          </div>
        </footer>

        <!-- partial -->
      </div>
    </div>

  </div>

  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/misc.js"></script>
  <script src="../js/chart.js"></script>
  <script src="../js/maps.js"></script>
</body>
</html>
