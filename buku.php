<!-- ini untuk buku.php, ini untuk melihat daftar buku -->
<?php
require_once "config.php";
?>
 <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>



    <div class="container mt-4">
        <h1 class="mb-4">Management data Buku </h1>
        <!-- tombol tambah buku yang mengarah ke tambah_buku.php -->
         <a href="tambah_buku.php" class="btn btn-primary mb-3 ">Tambah buku</a>
      <table class="table table-striped">
                <!-- ini untuk header tabel -->
                <thead>
                    <tr>
                        <th scope="col">no</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <!-- ini isi buku -->
                <tbody>
                  <!-- disini akan diulang -->
                <?php
                $sql = "SELECT * FROM buku ORDER BY id_buku DESC"; // ini untuk short buku dimulai dari yang terbaru
                $result = $mysqli->query($sql);
                //ini untuk nomor urut buku 
                $no = 1;
                ?>
                <!-- perulangan -->
                <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
              <!-- untuk penamaan row sesuai urutannnya dan nama sama dengan column di database -->
              <th scope="row"><?php echo $no ?></th>
              <td><?php echo $row['judul'] ?></td>
              <td><?php echo $row['penulis'] ?></td>
              <td><?php echo $row['penerbit'] ?></td>
              <td><?php echo $row['tahun_terbit'] ?></td>
              <td><?php echo $row['stock'] ?></td>
              <td>
                <a class="btn btn-success btn-sm">Edit</a>
                <a class="btn btn-danger btn-sm">Hapus</a>
              </td>
            </tr>
            <?php $no++; ?>
            <?php endwhile; ?>
            <!-- end perulangan -->
          </tbody>
                

      </table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>