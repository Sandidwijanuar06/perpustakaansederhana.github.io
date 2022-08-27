<?php
    require 'fungsi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Halaman Admin | Petugas</title>
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
                <span class="menu-title">Daftar Petugas</span>
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
                  <label class="badge badge-success" style="margin-top: 10px;"><h4 class="mt-20" style="color: black; margin-top: 10px;">Daftar Buku</h4></label>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary mb-2" style="margin-left: 886px;" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-plus"> Tambah Petugas</i>
                  </button>
                  <div class="table-responsive">
                    <table class="table center-aligned-table table-bordered table-dark">
                      <thead>
                        <tr class="text-primary">
                          <th  class="text-center">No</th>
                          <th  class="text-center">Nama Petugas</th>
                          <th  class="text-center">Username</th>
                          <th  class="text-center">Role</th>
                          <th  class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $query = mysqli_query($con, "SELECT * FROM login");
                            $i=1;
                            while ($getbukumasuk = mysqli_fetch_array($query)) {
                                $namapetugas = $getbukumasuk['namapetugas'];
                                $username    = $getbukumasuk['username'];
                                $role        = $getbukumasuk['role'];
                                $password        = $getbukumasuk['password'];
                                $foto        = $getbukumasuk['foto'];
                                $idlogin     = $getbukumasuk['idlogin'];
                        ?>
                        <tr class="">
                          <td><?=$i++;?></td>
                          <td><?=$namapetugas;?></td>
                          <td><?=$username;?></td>
                          <td><?=$role;?></td>
                          <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?=$idlogin?>">
                            <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?=$idlogin?>">
                            <i class="fas fa-trash"></i>
                            </button>
                          </td>
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

<!-- Modal Tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"> Tambah Petugas</i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form enctype="multipart/form-data" method="post">
      <div class="modal-body">
            Nama Petugas:
            <input type="text" name="namapetugas" class="form-control">
            Username:
            <input type="text" name="username" class="form-control">
            Password:
            <input type="password" name="password" class="form-control">
            Foto:
            <input type="file" name="foto" class="form-control">
            Role:
            <select name="role" class="form-control">
                <option value="">-PiLIH-</option>
                <option value="Admin">Admin</option>
                <option value="Oprator">Oprator</option>
            </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="tambahpetugas">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit<?=$idlogin;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
    <form method="post" enctype="multipart/form-data">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Petugas</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="idlogin" value="<?= $idlogin;?>">
          Nama Petugas:
          <input type="text" name="namapetugas" class="form-control" value="<?= $namapetugas;?>">
          Username:
          <input type="text" name="username" class="form-control" value="<?= $username;?>">
          Password:
          <input type="password" name="password" class="form-control" value="<?= $password;?>">
          Foto:
          <input type="file" name="foto" class="form-control">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="editpetugas" class="btn btn-success">update</button>
        </div>
        </div>
    </form>
    </div>
    </div>
<!-- Modal Delete -->
<div class="modal fade" id="hapus<?=$idlogin;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash"> Hapus <?=$namapetugas;?></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <input type="hidden" name="idlogin" value="<?=$idlogin;?>">
        <input type="hidden" name="foto" value="<?=$foto;?>">
        Apakah anda yakin ingin menghapus <strong><?=$namapetugas;?></strong> dari daftar petugas? Klik "<strong>Hapus</strong>" Jika Anda yakin
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-succes" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" name="hapuspetugas">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>
