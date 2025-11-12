<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // mengambil data dari form
  $judul = $_POST['judul'];
  $penulis = $_POST['penulis'];
  $penerbit = $_POST['penerbit'];
  $tahun_terbit = $_POST['tahun_terbit'];
  $stock = $_POST['stock'];

  // Menyiapkan Query (ganggu ini Ai)
  $sql = "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, stock) VALUES (?, ?, ?, ?, ?)";
  // utuk nama colume harus sesuai dengan yang ada di database.
  // Tidak boleh ada perbedaan, harus sama persis.

  // Prepared statement
  if ($stmt = $mysqli->prepare($sql)){
    $stmt->bind_param("sssii", $judul, $penulis, $penerbit, $tahun_terbit, $stock);
    if ($stmt->execute()){
      header("location: buku.php");
      exit();
    } else {
      echo "Error: Gagal menyimpan data.";
    }
    $stmt->close();
  }
  $mysqli->close();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
   <div class="container mt-4">
    <!-- ini untuk title -->
    <h2>Tambah buku Baru</h2>
    <form action="tambah_buku.php" method="post">

        <!-- Form judul -->
        <div class="mb-3">
                <label for="judul" class="form-label">judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <!-- form penulis -->
        <div class="mb-3">
                <label for="penulis" class="form-label">penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" required>
        </div>
        <!-- form penerbit -->
        <div class="mb-3">
          <label for="penerbit" class="form-label">penerbit</label>
          <input type="text" class="form-control" id="penerbit" name="penerbit" required>
        </div>
        <!-- form tahun terbit -->
        <div class="mb-3">
                <label for="tahun_terbit" class="form-label">tahun terbit</label>
                <input type="date" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
        </div>
        <!-- form stock -->
        <div class="mb-3">
                <label for="stock" class="form-label">stock</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
        </div>

        <!-- tombol -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="buku.php"class="btn btn-secondary">Batal</a>
    </form>
   </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
