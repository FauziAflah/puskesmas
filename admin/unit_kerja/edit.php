<!DOCTYPE html>
<html lang="en">

<?php
// Include file meta.php dan dbkoneksi.php
include_once('../include/meta.php');
require_once('../dbkoneksi.php');

// Proses ketika formulir dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Tangkap data dari form
    $id = $_POST['id'];
    $unit_kerja = $_POST['unit_kerja'];

    // Siapkan SQL untuk mengupdate data unit kerja
    $sql = "UPDATE unit_kerja SET nama = :unit_kerja WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':unit_kerja', $unit_kerja);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Redirect ke halaman index.php setelah mengupdate data
    echo '<meta http-equiv="refresh" content="0; url=index.php"><script>alert("Data berhasil diubah!")</script>';
}

// Ambil data unit kerja berdasarkan ID yang diterima dari parameter GET
if (isset($_GET['id'])) {
    $sql = "SELECT * FROM unit_kerja WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $unit_kerja = $stmt->fetch();
}
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once('../include/header.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('../include/sidebar.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Unit Kerja</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="card col-md-12">
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="unit_kerja">Unit Kerja</label>
                                        <!-- Set nilai awal input field dengan data yang sudah ada -->
                                        <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" value="<?php echo $unit_kerja['nama']; ?>" required>
                                        <!-- Sertakan input hidden untuk mengirimkan ID unit kerja -->
                                        <input type="hidden" name="id" value="<?php echo $unit_kerja['id']; ?>">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once('../include/footer.php') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>