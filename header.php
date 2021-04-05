<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: black;
      }
	  h5 {
        text-transform: uppercase;
        color:#000000;
      }
    table {
      border: silver 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: silver 1px #DDEEEE;
        color: #000000;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #C0C0C0;
        text-decoration: none;
    }
    table tbody td {
         background-color: #white;
        border: solid 1px #DDEFEF ;
        color: #000000 ;
        padding: 10px;
        text-shadow: 1px 1px 1px #C0C0C0;
    }
    a {
          background-color: silver;
          color: #000000;
          padding: 10px;
          text-decoration: #000000;
          font-size: 12px;
    }
    </style>
  </head>
<body>
  <?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=belummasuk");
	}

	?>
	<?php
	if($_SESSION['level']=="admin"){
	?>
	<h1 align="center">DASHBOARD ADMIN</h1>

	<p align="center"><h5 align="center">Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></h5></b></p>
  <p align="center"><a href="spp.php">SPP</a>
	<a href="kelas.php">KELAS</a> 
	<a href="petugas.php">PETUGAS</a> 
	<a href="siswa.php">SISWA</a> 
	<a href="pembayaran.php">TRANSAKSI PEMBAYARAN</a> 
	<a href="laporan.php">LAPORAN</a>  
  <a href="logout.php">LOGOUT</a> </p>
<?php 
}

else if($_SESSION['level']=="petugas"){

   ?>
   <h1 align="center">DASHBOARD PETUGAS</h1>

	<p align="center"><h5 align="center">Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></h5></b></p>
	
	<div align="center"><a href="pembayaran.php">TRANSAKSI PEMBAYARAN</a> 
	<a href="histori.php">HISTORY TRANSAKSI PEMBAYARAN</a> 
    
	    <a href="logout.php">LOGOUT</a> 
	  </p>
	<?php 
}

else if($_SESSION['level']=="siswa"){

   ?>
   <h1 align="center">APLIKASI PEMBAYARAN SPP SMK MAHARDHIKA</h1>

	<p align="center"><h5 align="center">Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></h5></b></p>
	
	<div align="center"><a href="histori.php">HISTORY TRANSAKSI PEMBAYARAN</a> 
	  
	    <a href="logout.php">LOGOUT</a> 
	  </p>
	    <?php
	}
	
	
	?>
	
    </div>
</body>
</html>