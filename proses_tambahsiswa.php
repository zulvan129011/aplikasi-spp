<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

  // membuat variabel untuk menampung data dari form
    $nis    = $_POST['nis'];
  $nama_siswa     = $_POST['nama'];
  $kelas  = $_POST['id_kelas'];
  $alamat =$_POST['alamat'];
   $no_telp =$_POST['no_telp'];
    $tahun  =$_POST['tahun'];
 $spp_pertahun =$_POST['nominal'];

                  $query = "INSERT INTO siswa VALUES ('','$nisn', '$nis', '$nama', '$alamat', '$no_telp', '$tahun,')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='siswa.php';</script>";
                  }

            ?>
      