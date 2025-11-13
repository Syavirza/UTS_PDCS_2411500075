<?php
session_start();

// kita pakai session admin_logged_in
if (!isset($_SESSION['admin_logged_in'])) {
    // jika tidak ada, arahkan ke login.php
    header("location: login.php");
    exit(); // hentikan proses selanjutnya 
}

require_once "includes/config.php";

define('MY_APP', true); // ini berfungsi untuk proteksi, ada di halaman page.

// Get hal
$page = isset($_GET['hal']) ? $_GET['hal'] : 'dashboard';
// title untuk di header
$title = ucwords(str_replace('-', ' ', $page));
?>

<!DOCTYPE html>
<html lang="en">
    <?php include "includes/header.php" ?>

    <body class="sb-nav-fixed">
        <!-- ini untuk navbar -->
        <?php include "includes/nav.php" ?>

        <div id="layoutSidenav">
            <!-- ini untuk sidebar -->
            <?php include "includes/sidebar.php" ?>
            <div id="layoutSidenav_content">
                <main>
                    <!-- ini untuk pemanggilan index.php?page=dasboard -->
                    <?php 
                    $file = "pages/" . $page . ".php";
                    if(file_exists($file)) {
                        // jika file ditemukan "page/dashboard.php"
                        include $file;
                    } else {
                        // jika file tidak ditemukan
                        echo "<h1 class='text-center mt-5'>Halaman tidak ditemukan!</h1>";
                    }
                    ?>
                </main>
                <!-- footer -->
                <?php include "includes/footer.php" ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/datatables-simple-demo.js"></script>
    </body>
</html>
