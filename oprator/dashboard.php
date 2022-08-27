<?php
    require 'fungsi.php';

    // Jumlah Data Peminjaman
    $get1 = mysqli_query($con, "SELECT * FROM peminjaman");
    $count1 = mysqli_num_rows($get1);
    // Jumlah Data Buku DIpinjam
    $get2 = mysqli_query($con, "SELECT * FROM Pengembalian");
    $count2 = mysqli_num_rows($get2);
    // Jumlah Daftar Buku
    $get3 = mysqli_query($con, "SELECT * FROM daftarbuku");
    $count3 = mysqli_num_rows($get3);
    // Jumlah Daftar Buku Masuk
    $get4 = mysqli_query($con, "SELECT * FROM bukumasuk");
    $count4 = mysqli_num_rows($get4);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Halaman Admin | Dashboard</title>
  <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" href="../node_modules/flag-icon-css/css/flag-icon.min.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <!-- <link rel="stylesheet" href="../../node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" href="../../css/style.css" /> -->
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

            <a class="profile-pic">
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
          </ul>
        </nav>

        <!-- partial -->
        <div class="content-wrapper">
          <h3 class="page-heading mb-4">Dashboard</h3>
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-danger">
                      <img src="../images/icons/003-outbox.png" style="height: 50px;">
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Peminjaman</p>
                      <h4 class="bold-text"><?=$count1;?></h4>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Data Peminjaman
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-warning">
                       <img src="../images/file-icons/128/002-tool.PNG" style="height: 50px;">
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Pengembalian</p>
                      <h4 class="bold-text"><?=$count2;?></h4>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Data Pengembalian
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-success">
                      <img src="../images/file-icons/128/001-interface-1.PNG" style="height: 50px;">
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Daftar Buku</p>
                      <h4 class="bold-text"><?=$count3;?></h4>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="mr-1" aria-hidden="true"></i>Data Daftar Buku
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                    <h4 class="text-success">
                        <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Buku Masuk</p>
                      <h4 class="bold-text"><?=$count4;?></h4>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-repeat mr-1" aria-hidden="true"></i>Data Buku Masuk
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- Tabel Data Peminajaman -->
          <div class="row mb-2">
            <div class="col-lg-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Data Peminjaman</h5>
                  <table class="table center-aligned-table table-bordered table-dark">
                    <thead>
                      <tr class="">
                        <th>NO.</th>
                        <th>Nama Peminjam</th>
                        <th>Kelas</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $query = mysqli_query($con, "SELECT * FROM peminjaman");
                      $i=1;
                      while ($getpeminjaman = mysqli_fetch_array($query)) {
                          $namapeminjam     = $getpeminjaman['namapeminjam'];
                          $kelas            = $getpeminjaman['kelas'];
                          $status           = $getpeminjaman['status'];
                    ?>
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$namapeminjam;?></td>
                        <td><?=$kelas;?></td>
                        <td><?=$status;?></td>
                      </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Data Pengembalian</h5>
                  <table class="table center-aligned-table table-bordered table-dark">
                    <thead>
                      <tr class="">
                        <th>NO.</th>
                        <th>Nama Peminjam</th>
                        <th>Kelas</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $query = mysqli_query($con, "SELECT * FROM pengembalian");
                      $i=1;
                      while ($getpeminjaman = mysqli_fetch_array($query)) {
                          $namapeminjam     = $getpeminjaman['namapeminjam'];
                          $kelas            = $getpeminjaman['kelas'];
                          $keterangan       = $getpeminjaman['keterangan'];
                    ?>
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$namapeminjam;?></td>
                        <td><?=$kelas;?></td>
                        <td><?=$keterangan;?></td>
                      </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Data Daftar Buku</h5>
                  <table class="table center-aligned-table table-bordered table-dark">
                    <thead>
                      <tr class="">
                        <th>NO.</th>
                        <th>Judul Buku</th>
                        <th>Jenis Buku</th>
                        <th>Jumlah Buku</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $query = mysqli_query($con, "SELECT * FROM daftarbuku");
                      $i=1;
                      while ($getpeminjaman = mysqli_fetch_array($query)) {
                          $judulbuku     = $getpeminjaman['judulbuku'];
                          $jenisbuku     = $getpeminjaman['jenisbuku'];
                          $jumlah_buku   = $getpeminjaman['jumlah_buku'];
                    ?>
                      <tr>
                        <th scope="row"><?=$i++;?></th>
                        <td><?=$judulbuku;?></td>
                        <td><?=$jenisbuku;?></td>
                        <td><?=$jumlah_buku;?></td>
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Buku Masuk</h5>
                  <table class="table center-aligned-table table-bordered table-dark">
                    <thead>
                      <tr class="">
                        <th>NO.</th>
                        <th>Judul Buku</th>
                        <th>Jenis Buku</th>
                        <th>Tanggal Masuk</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $query = mysqli_query($con, "SELECT * FROM bukumasuk");
                      $i=1;
                      while ($getpeminjaman = mysqli_fetch_array($query)) {
                          $judulbuku     = $getpeminjaman['judulbuku'];
                          $jenisbuku     = $getpeminjaman['jenisbuku'];
                          $tanggalmasuk   = $getpeminjaman['tanggalmasuk'];
                    ?>
                      <tr>
                        <th scope="row"><?=$i++;?></th>
                        <td><?=$judulbuku;?></td>
                        <td><?=$jenisbuku;?></td>
                        <td><?=$tanggalmasuk;?></td>
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
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
  <!-- <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script> -->
</body>

</html>
