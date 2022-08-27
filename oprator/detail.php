<?php
    require 'fungsi.php';

    $idpeminjaman= $_GET['id'];
    $query="SELECT * FROM peminjaman WHERE idpeminjaman='$idpeminjaman'";
    $sql = mysqli_query($con, $query) or die (mysqli_error($con));
    $data = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Halaman Admin | Detail Peminjaman</title>
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
          </ul>
        </nav>

        <!-- partial -->
        <div class="content-wrapper">
        <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <label class="badge badge-success" style="margin-top: 10px;"><h4 class="mt-20" style="color: black; margin-top: 10px;">Daftar Buku</h4></label>
                  <div class="row ml-1 mt-5">

                    <div class="col-xs-4">
                        Nama Peminjam:
                        <input type="text" class="form-control" value="<?=$data['namapeminjam']?>" disabled>

                        Kelas:
                        <input type="text" class="form-control" value="<?=$data['kelas']?>" disabled>
                    </div>
                    <div class="col-xs-3 ml-2">
                        Tanggal Pinjam:
                        <input type="text" class="form-control" value="<?=$data['tanggalpinjam']?>" disabled>

                        Tanggal Kembali:
                        <input type="text" class="form-control" value="<?=$data['tanggalkembali']?>" disabled>
                    </div>
                    </form>
                  </div>
                  <hr color="black">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary mb-2" style="margin-left: 5px;" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-plus"> Tambah Peminjam</i>
                  </button>
                  <br>

                  <div class="table-responsive">
                    <table class="table center-aligned-table table-bordered table-dark">
                      <thead>
                        <tr class="text-primary">
                          <th  class="text-center">No</th>
                          <th  class="text-center">Id Peminjam</th>
                          <th  class="text-center">Judul Buku</th>
                          <th  class="text-center">Nomor Buku</th>
                          <th  class="text-center">Jumlah Pinjam</th>
                          <th  class="text-center">Status Peminjaman</th>
                          <th  class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                           $query = mysqli_query($con,"SELECT detailpinjam.iddetail, detailpinjam.idpeminjaman, detailpinjam.judulbuku,
                           detailpinjam.nomorbuku, detailpinjam.jmlhpeminjaman, detailpinjam.statuspeminjaman, detailpinjam.id FROM
                           detailpinjam, peminjaman, daftarbuku WHERE detailpinjam.idpeminjaman=peminjaman.idpeminjaman AND
                           detailpinjam.judulbuku=daftarbuku.judulbuku AND detailpinjam.nomorbuku=daftarbuku.nomorbuku AND
                           detailpinjam.id=daftarbuku.id AND detailpinjam.idpeminjaman = '$idpeminjaman'")
                           or die (mysqli_error($con));
                           $i = 1;
                            while ($detail = mysqli_fetch_array($query)) {
                                $judulbuku        = $detail['judulbuku'];
                                $nomorbuku        = $detail['nomorbuku'];
                                $idpeminjaman     = $detail['idpeminjaman'];
                                $statuspeminjaman = $detail['statuspeminjaman'];
                                $jmlhpeminjaman   = $detail['jmlhpeminjaman'];
                                $iddetail         = $detail['iddetail'];
                                $id               = $detail['id'];
                        ?>
                        <tr class="">
                          <td><?=$i++;?></td>
                          <td><?=$idpeminjaman;?></td>
                          <td><?=$judulbuku;?></td>
                          <td><?=$nomorbuku;?></td>
                          <td><?=$jmlhpeminjaman;?></td>
                          <td><?=$statuspeminjaman;?></td>
                          <td>
                            <button type="button" class="btn btn-warning mb-2" style="margin-left: 5px;" data-toggle="modal" data-target="#example<?=$iddetail?>">
                              <i class="fas fa-edit"> Edit</i>
                            </button>
                            <button type="button" class="btn btn-success mb-2" style="margin-left: 5px;" data-toggle="modal" data-target="#selesai<?=$iddetail?>">
                              <i class="fas fa-check"> Selesai</i>
                            </button>
                          </td>
                        </tr>
                        <!-- Modal Selesai -->
                        <div class="modal fade" id="selesai<?=$iddetail;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-check"> Selesaikan Peminjaman</i></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="?id=<?= $_GET['id']?>" method="post">
                            <div class="modal-body">
                              apakah buku yang di pinjam sudah di kembalikan? Jika sudah klik SELESAI
                              <input type="hidden" name="iddetail" value="<?=$iddetail;?>" class="form-control mb-4" placeholder="Masukan Jumlah Pinjam">
                              <input type="hidden" name="id" value="<?=$id;?>" class="form-control mb-4" placeholder="Masukan Status Peminjaman">
                              <input type="hidden" name="idpeminjaman" value="<?=$idpeminjaman;?>" class="form-control mb-4" placeholder="Masukan Status Peminjaman">
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" name="selesai">SELESAI</button>
                            </div>
                            </div>
                            </form>
                          </div>
                        </div>
                        </div>
                        <!-- Modal Edit -->
                        <div class="modal fade" id="example<?=$iddetail;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-check"> Selesaikan Peminjaman</i></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="?id=<?= $_GET['id']?>" method="post">
                            <div class="modal-body">
                              <input type="hidden" name="iddetail" value="<?=$iddetail;?>" class="form-control mb-4" placeholder="Masukan Jumlah Pinjam">
                              <input type="hidden" name="id" value="<?=$id;?>" class="form-control mb-4" placeholder="Masukan Status Peminjaman">
                              Judul Buku:
                              <input type="text" value="<?=$judulbuku;?>" class="form-control mb-4" disabled>
                              Nomor Buku:
                              <input type="text" value="<?=$nomorbuku;?>" class="form-control mb-4" disabled>
                              Jumlah Peminjaman:
                              <input type="number" name="jmlhpeminjaman" value="<?=$jmlhpeminjaman;?>" class="form-control mb-4">
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" name="editdetail">Update</button>
                            </div>
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
<!-- Modal Tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"> Tambah Peminjam</i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="?id=<?= $_GET['id']?>" method="post">
      <div class="modal-body">
            <input type="hidden" name="idpeminjaman" class="form-control" value="<?= $idpeminjaman;?>">
            Judul Buku:
            <select name="judulbuku" class="form-control">
                <option value="">-PiLIH-</option>
            <?php
            $getbuku = mysqli_query($con,"SELECT * FROM daftarbuku");

            while ($buku = mysqli_fetch_array($getbuku)) {
                $judulbuku= $buku['judulbuku'];
                $id= $buku['id'];
            ?>
            <option value="<?=$judulbuku;?>">Judul Buku: <?=$id;?>, <?=$judulbuku;?></option>
            <?php
            }
            ?>
            </select>
            ID Buku:
            <select name="id" class="form-control">
                <option value="">-PiLIH-</option>
            <?php
            $getbuku = mysqli_query($con,"SELECT * FROM daftarbuku");

            while ($buku = mysqli_fetch_array($getbuku)) {
                $judulbuku= $buku['judulbuku'];
                $id= $buku['id'];
            ?>
            <option value="<?=$id;?>">ID: <?=$id;?>, <?=$judulbuku;?></option>
            <?php
            }
            ?>
            </select>
            Nomor Buku:
            <select name="nomorbuku" class="form-control">
                <option value="">-PiLIH-</option>
            <?php
            $getbuku = mysqli_query($con,"SELECT * FROM daftarbuku");

            while ($buku = mysqli_fetch_array($getbuku)) {
                $nomorbuku= $buku['nomorbuku'];
            ?>
            <option value="<?=$nomorbuku;?>">Judul Buku: <?=$nomorbuku;?></option>
            <?php
            }
            ?>
            </select>
            Jumlah Pinjam:
            <input type="number" name="jmlhpeminjaman" class="form-control" placeholder="Masukan Jumlah">
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="detailbuku">Simpan</button>
      </div>
      </div>
      </form>
    </div>
  </div>
</div>
</html>
