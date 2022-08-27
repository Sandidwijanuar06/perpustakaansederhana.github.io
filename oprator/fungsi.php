<?php
session_start();

// koneksi ke db
$con = mysqli_connect('localhost','root','','perpustakaan');

//function login
if(isset($_POST['login'])){
	$role = $_POST['role'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$namapetugas = $_POST['namapetugas'];

	$query = mysqli_query($con,"SELECT * FROM login WHERE namapetugas='$namapetugas' and username='$username' and password='$password' and role='$role'");
	$hitung   = mysqli_num_rows($query);

	if($hitung > 0){

		$data = mysqli_fetch_array($query);

		// jika admin
		if($data['role']=="Admin"){
            $_SESSION['foto'] = $data ['foto'];
			$_SESSION['role'] = $data ['role'];
			$_SESSION['namapetugas'] = $data ['namapetugas'];
			$_SESSION['username'] = $data ['username'];
			$_SESSION['password'] = $data ['password'];

			header('location:admin/dashboard.php');

		} else if($data['role']=="Oprator"){
			session_start();
            $_SESSION['foto'] = $data ['foto'];
			$_SESSION['role'] = $oprator;
			$_SESSION['namapetugas'] = $namapetugas;
			$_SESSION['username'] = "username";
			$_SESSION['password'] = "password";

			header('location:oprator/dashboard.php');

	} else {
		header('location:login.php?pesan=gagal');
	}
} else {
	header('location:login.php?pesan=gagal');
}
}


//Tambah Buku
if (isset($_POST['bukumasuk'])) {
    $judulbuku    = $_POST['judulbuku'];
    $nomorbuku    = $_POST['nomorbuku'];
    $jenisbuku    = $_POST['jenisbuku'];
    $jumlah_buku  = $_POST['jumlah_buku'];
    $tanggalmasuk = $_POST['tanggalmasuk'];
    $keterangan   = $_POST['keterangan'];

    $query1 = mysqli_query($con, "INSERT INTO bukumasuk (judulbuku, nomorbuku, jenisbuku, jumlah_buku, tanggalmasuk, keterangan)
    VALUES ('$judulbuku','$nomorbuku','$jenisbuku','$jumlah_buku','$tanggalmasuk','$keterangan')");

    $query2 = mysqli_query($con, "INSERT INTO daftarbuku (judulbuku, nomorbuku, jenisbuku, jumlah_buku, tanggalmasuk, keterangan)
    VALUES ('$judulbuku','$nomorbuku','$jenisbuku','$jumlah_buku','$tanggalmasuk','$keterangan')");

    if ($query1&&$query2) {
        echo'
        <script>alert("Buku Berhasil di Tambahkan");
        window.location.href="bukumasuk.php"
        </script>
        ';
    } else {
        echo'
        <script>alert("Buku Gagal di Tambahkan");
        window.location.href="bukumasuk.php"
        </script>
        ';
    }
}

// Edit Buku Masuk
if (isset($_POST['editbukumasuk'])) {
    $judulbuku    = $_POST['judulbuku'];
    $nomorbuku    = $_POST['nomorbuku'];
    $jenisbuku    = $_POST['jenisbuku'];
    $jumlah_buku  = $_POST['jumlah_buku'];
    $tanggalmasuk = $_POST['tanggalmasuk'];
    $keterangan   = $_POST['keterangan'];
    $id           = $_POST['id'];

    $query1 = mysqli_query($con, "UPDATE bukumasuk SET judulbuku='$judulbuku',nomorbuku='$nomorbuku',jenisbuku='$jenisbuku',
    jumlah_buku='$jumlah_buku',tanggalmasuk='$tanggalmasuk',keterangan='$keterangan' WHERE id='$id'");

    $query2 = mysqli_query($con, "UPDATE daftarbuku SET judulbuku='$judulbuku',nomorbuku='$nomorbuku',jenisbuku='$jenisbuku',
    jumlah_buku='$jumlah_buku',tanggalmasuk='$tanggalmasuk',keterangan='$keterangan' WHERE id='$id'");

    if ($query1&&$query2) {
        echo'
        <script>alert("Buku Berhasil di Edit");
        window.location.href="bukumasuk.php"
        </script>
        ';
    } else {
        echo'
        <script>alert("Buku Gagal di Edit");
        window.location.href="bukumasuk.php"
        </script>
        ';
    }
}
// hapus buku masuk
if (isset($_POST['hapusbukumasuk'])) {
    $id = $_POST['id'];

    $query1 = mysqli_query($con, "DELETE FROM bukumasuk WHERE id='$id'");
    $query2 = mysqli_query($con, "DELETE FROM daftarbuku WHERE id='$id'");

    if ($query1&&$query2) {
        echo'
        <script>alert("Buku Berhasil di Hapus");
        window.location.href="bukumasuk.php"
        </script>
        ';
    } else {
        echo'
        <script>alert("Buku Gagal di Hapus");
        window.location.href="bukumasuk.php"
        </script>
        ';
    }
}
// tambah Peminjam
if (isset($_POST['peminjam'])) {
    $namapeminjam   = $_POST['namapeminjam'];
    $kelas          = $_POST['kelas'];
    $tanggalpinjam  = $_POST['tanggalpinjam'];
    $tanggalkembali = $_POST['tanggalkembali'];

    $query1 = mysqli_query($con, "INSERT INTO peminjaman (namapeminjam, kelas, tanggalpinjam, tanggalkembali) VALUES
    ('$namapeminjam','$kelas','$tanggalpinjam','$tanggalkembali')");

    if ($query1) {
        echo'
        <script>alert("Buku Berhasil ditambahkan");
        window.location.href="peminjaman.php"
        </script>
        ';
    } else {
        echo'
        <script>alert("Buku Gagal ditambahkan");
        window.location.href="peminjaman.php"
        </script>
        ';
    }
}

// selesaikan Peminjaman
if (isset($_POST['selesaikan'])) {
    $namapeminjam   = $_POST['namapeminjam'];
    $kelas          = $_POST['kelas'];
    $tanggalpinjam  = $_POST['tanggalpinjam'];
    $tanggalkembali = $_POST['tanggalkembali'];
    $idpeminjaman   = $_POST['idpeminjaman'];

    $query1 = mysqli_query($con, "INSERT INTO pengembalian (namapeminjam, kelas, tanggalpinjam, tanggalkembali) VALUES
    ('$namapeminjam','$kelas','$tanggalpinjam','$tanggalkembali')");

    $query2 = mysqli_query($con, "DELETE FROM peminjaman WHERE peminjaman.idpeminjaman='$idpeminjaman'");
    if ($query1&&$query2) {
        echo'
        <script>alert("Berhasil menyelesaikan peminjaman");
        window.location.href="peminjaman.php"
        </script>
        ';
    } else {
        echo'
        <script>alert("Gagal menyelesaikan peminjaman");
        window.location.href="peminjaman.php"
        </script>
        ';
    }
}

// tambah detail
if(isset($_POST['detailbuku'])){
    $idpeminjaman   = $_POST['idpeminjaman'];
	$judulbuku	    = $_POST['judulbuku'];
	$nomorbuku 	    = $_POST['nomorbuku'];
	$jmlhpeminjaman = $_POST['jmlhpeminjaman'];
	$id 	        = $_POST['id'];

    $query2 = mysqli_query($con, "SELECT * FROM daftarbuku WHERE daftarbuku.id = '$id'");
    $data = mysqli_fetch_array($query2);
    $stok_awal = $data['jumlah_buku'];

	if($stok_awal >= $jmlhpeminjaman){

		// jika Cukup
		$stok_akhir1 = $stok_awal - $jmlhpeminjaman;
		$jmlhpeminjaman = $jmlhpeminjaman;
		$query = mysqli_query($con, "INSERT INTO detailpinjam (idpeminjaman, judulbuku, nomorbuku, jmlhpeminjaman, id) VALUES
		('$idpeminjaman','$judulbuku','$nomorbuku','$jmlhpeminjaman','$id')");
		$query3 = mysqli_query($con, "UPDATE daftarbuku SET jumlah_buku = '$stok_akhir1' WHERE daftarbuku.id = '$id' ");

		if($query&&$query3){
			header('location:detail.php?id='.$_GET['id']);
		} else {
			echo "gagal";
		}

	} else {
		echo"
		<script>
			alert('Mohon maaf stock saat ini tidak mencukupi');
			window.location='detail.php?id=$idpeminjaman';
		</script>
		";
	}
}

// fungsi Edit Detail
if(isset($_POST['editdetail'])){
	$jmlhpeminjaman = $_POST['jmlhpeminjaman'];
	$id 	        = $_POST['id'];
	$iddetail 	    = $_POST['iddetail'];

    $lihatstcok = mysqli_query($con,"SELECT * FROM daftarbuku WHERE daftarbuku.id='$id'");
    $stocknya = mysqli_fetch_array($lihatstcok);
    $stockskrg = $stocknya['jumlah_buku'];

    $jumlah = mysqli_query($con,"SELECT * FROM detailpinjam WHERE detailpinjam.iddetail='$iddetail'");
    $jmlhnya = mysqli_fetch_array($jumlah);
    $jmlhskrg = $jmlhnya['jmlhpeminjaman'];

    if($jmlhpeminjaman>$jmlhskrg){
        $selisih = $jmlhpeminjaman-$jmlhskrg;
        $kurangi = $stockskrg-$selisih;
        $kurangistocknya = mysqli_query($con,"UPDATE daftarbuku SET jumlah_buku='$kurangi' WHERE daftarbuku.id='$id'");
        $updatenya = mysqli_query($con,"UPDATE detailpinjam SET jmlhpeminjaman='$jmlhpeminjaman' WHERE detailpinjam.iddetail='$iddetail'");
            if($kurangistocknya&&$updatenya){
                header('location:detail.php?id='.$_GET['id']);
    } else {
        echo'gagal';
        }
    } else {
        $selisih = $jmlhskrg-$jmlhpeminjaman;
        $kurangi = $stockskrg+$selisih;
        $kurangistocknya = mysqli_query($con,"UPDATE daftarbuku SET jumlah_buku='$kurangi' WHERE daftarbuku.id='$id'");
        $updatenya = mysqli_query($con,"UPDATE detailpinjam SET jmlhpeminjaman='$jmlhpeminjaman' WHERE detailpinjam.iddetail='$iddetail'");
            if($kurangistocknya&&$updatenya){
                header('location:detail.php?id='.$_GET['id']);
    } else {
        echo'<script>alert("Gagal Mengubah");
        window.location.href=detail.php
        <?script>';
        }
    }
}

// menyelesaikan peminjaman
if(isset($_POST['selesai'])){
	$id           = $_POST['id'];
	$iddetail     = $_POST['iddetail'];
	$idpeminjaman = $_POST['idpeminjaman'];

	$updatestatus = mysqli_query($con,"DELETE FROM detailpinjam WHERE detailpinjam.iddetail='$iddetail'");
	$updatestatus2 = mysqli_query($con,"UPDATE peminjaman SET status='Proses Penyelesaian' WHERE idpeminjaman='$idpeminjaman'");

	$query2 = mysqli_query($con, "SELECT * FROM daftarbuku WHERE daftarbuku.id = '$id'");
    $data = mysqli_fetch_array($query2);
    $stok = $data['jumlah_buku'];

	$query1 = mysqli_query($con, "SELECT * FROM detailpinjam WHERE detailpinjam.iddetail = '$iddetail'");
    $data = mysqli_fetch_array($query1);
    $stok1 = $data['jmlhpeminjaman'];

    $stok_akhir1 = $stok1 + $stok;

    $query3 = mysqli_query($con, "UPDATE daftarbuku SET jumlah_buku = '$stok_akhir1' WHERE daftarbuku.id = '$id' ");


    if($query3&&$updatestatus){
        header('location:peminjaman.php');
    } else {
        echo "gagal";
    }
}
?>
