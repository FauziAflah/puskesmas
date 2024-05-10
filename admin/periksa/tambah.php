<!DOCTYPE html>
<html lang="en">
<?php
include_once('../include/meta.php');
require_once('../dbkoneksi.php');
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
                        <h1 class="h3 mb-0 text-gray-800">Periksa Pasien</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="card col-md-12">
                            <div class="card-body">
                                <?php
                                if (isset($_POST['tanggal'])) {
                                    $sql = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, paramedik_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
                                    $stmt = $dbh->prepare($sql);
                                    $stmt->execute([
                                        $_POST['tanggal'],
                                        $_POST['berat'],
                                        $_POST['tinggi'],
                                        $_POST['tensi'],
                                        $_POST['keterangan'],
                                        $_POST['pasien_id'],
                                        $_POST['paramedik_id'],
                                    ]);
                                    echo "<script>alert('Data Berhasil Ditambahkan</script>";
                                    echo '<meta http-equiv="refresh" content="0; url=index.php">';
                                }
                                ?>

                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal Periksa Pasien</label>
                                        <input type="hidden" name="id">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="berat">Berat Badan (Kg)</label>
                                        <input type="number" class="form-control" id="berat" name="berat" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tinggi">Tinggi Badan (cm)</label>
                                        <input type="number" class="form-control" id="tinggi" name="tinggi" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tensi">Tensi Darah (.. / ..)</label>
                                        <input type="text" class="form-control" id="tensi" name="tensi" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan Pasien</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pasien_id">Nama Pasien</label>
                                        <select name="pasien_id" id="pasien_id" class="form-control">
                                            <option value="">Pilih Nama Pasien</option>
                                            <?php 
                                            $sql = "SELECT * FROM pasien";
                                            $stmt = $dbh->prepare($sql);
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();
                                            foreach ($result as $kel) {
                                                echo "<option value='$kel[id]'>$kel[nama]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="paramedik_id">Dokter</label>
                                        <select name="paramedik_id" class="form-control" id="paramedik_id">
                                            <option value="">Pilih Dokter</option>
                                            <?php
                                            $sql = "SELECT * FROM paramedik";
                                            $stmt = $dbh->prepare($sql);
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();
                                            foreach ($result as $kel) {
                                                echo "<option value='$kel[id]'>$kel[nama]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
</body>

</html>