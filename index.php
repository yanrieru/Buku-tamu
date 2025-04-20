<?php
$host       ="localhost";
$user       ="root";
$pass       ="";
$db         ="iyan_db";

$koneksi    = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){ //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
$nama_lengkap        = "";
$email      = "";
$alamat     = "";
$pesan   = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id_bukutamu         = $_GET['id'];
    $sql1       = "delete from bukutamu where id_bukutamu = '$id_bukutamu'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id_bukutamu         = $_GET['id'];
    $sql1       = "select * from bukutamu where id_bukutamu = '$id_bukutamu'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $nama_lengkap       = $r1['nama_lengkap'];
    $email      = $r1['email'];
    $alamat     = $r1['alamat'];
    $pesan   = $r1['pesan'];

    if ($nama_lengkap == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $nama_lengkap        = $_POST['nama_lengkap'];
    $email       = $_POST['email'];
    $alamat     = $_POST['alamat'];
    $pesan   = $_POST['pesan'];

    if ($nama_lengkap && $email && $alamat && $pesan) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update bukutamu set nama_lengkap = '$nama_lengkap',email='$email',alamat = '$alamat',pesan='$pesan' where id_bukutamu = '$id_bukutamu'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into bukutamu(nama_lengkap,email,alamat,pesan) values ('$nama_lengkap','$email','$alamat','$pesan')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku tamu | Aprilyan Candra Utama</title>
    <link href="/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <div class="head text-center">
    <img src="smk.png" width="400">
        <h1 class="text-Montserrat">Sistem Informasi Buku Tamu <br> SMK Muhamadiyah 1 Sukoharjo </h1>
        <h6 class="text-Montserrat">Aprilyan Candra Utama </h6>
    </div>

    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Identitas Pengunjung 2024 - <?= date('Y') ?>
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $nama_lengkap ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $email ?>"  required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>"  required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pesan" name="pesan" value="<?php echo $pesan ?>"  required>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Buku Tamu
            </div>
            <div class="card-body">
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung Dinten Niki [<?=date('d-m-Y')?>]</h6>
                        </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama lengkap</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Pesan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from bukutamu order by id_bukutamu desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id_bukutamu         = $r2['id_bukutamu'];
                            $nama_lengkap        = $r2['nama_lengkap'];
                            $email       = $r2['email'];
                            $alamat     = $r2['alamat'];
                            $pesan   = $r2['pesan'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $nama_lengkap ?></td>
                                <td scope="row"><?php echo $email ?></td>
                                <td scope="row"><?php echo $alamat ?></td>
                                <td scope="row"><?php echo $pesan ?></td>
                                <td scope="row">
                                    <a href="index.php?op=edit&id=<?php echo $id_bukutamu ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="index.php?op=delete&id=<?php echo $id_bukutamu?>" onclick="return confirm('Yakin Nih?')"><button type="button" class="btn btn-danger">Delete</button></a>            
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</body>

</html>
