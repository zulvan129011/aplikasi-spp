<?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM petugas WHERE id_petugas='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='petugas.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='petugas.php';</script>";
  }         
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
        color: salmon;
      }
	  h2 {
        text-transform: uppercase;
        color: black;
      }
	  h3 {
        text-transform: uppercase;
        color: salmon;
      }
	  h5 {
        text-transform: uppercase;
        color:#999999;
      }
    button {
          background-color: silver;
          color: #000000;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
	  a {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
  </head>
<body>
 
  <?php
  
  include ('header.php');
?>
	

      <center>
	
        <h2>Edit PETUGAS <?php echo $data['nama_petugas']; ?></h2>
      <center>
      <form method="POST" action="proses_editpetugas.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['id_petugas']; ?>"  hidden />
  
	 <div>
          <label>USERNAME</label>
          <input type="text" name="username" value="<?php echo $data['username']; ?>"/>
        </div>
        <div>
          <label>PASSWORD</label>
         <input type="text" name="password" value="<?php echo $data['password']; ?>" />
        </div>
        <div>
          <label>NAMA PETUGAS</label>
         <input type="text" name="nama_petugas" value="<?php echo $data['nama_petugas']; ?>" />
        </div>
		<div>
          <label>LEVEL</label>
         <input type="text" name="level"value="<?php echo $data['level']; ?>" />
        </div>
       
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
</body>
</html>
