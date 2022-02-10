                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><b>Scan QR Code   </b></h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Print Report</a> -->
                    </div>

                    
                    <div class="row">

    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-success shadow h-100 py-2">
            <div class="card-body">
                <div class="text-center">
                    <h1 class="display-3">Silahkan Absen</h1>
                    <h1 class="display-4">Klik Tombol Dibawah</h1>
                    <a href="scan.php?id_siswa=<?php echo $ID_USER ?>&kelas=<?php echo $_SESSION['kelas']; ?>" class="btn btn-primary"><i class="fas fa-scan" aria-hidden="true"></i> Scan Kelas</a>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg">
<div class="modal-content">

    <div class="modal-header border-bottom-secondary">
    <h5 class="modal-title text-gray-900">Tambah</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>

    <form action="controller_addqrcode.php" method="POST" enctype="multipart/form-data">
    <div class="modal-body text-gray-900">
        <input type="hidden" name="id_guru" value="<?php echo $ID_USER; ?>">
        <div class="form-group">
            <label for="data2">Pilih Mata Pelajaran</label>
            <select name="id_mapel" class="form-control show-tick" required="required">
                <?php 
                    $qry = mysqli_query($mysqli, "SELECT * FROM tb_mapel");
                    while ($data = mysqli_fetch_array($qry)) {
                        echo "<option value='".$data['id_mapel']."'>".$data['nama_mapel']."</option>";
                    }
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="data2">Tanggal</label>
            <input type="date" class="form-control" name="tgl" required="required">
        </div>

        <div class="form-group">
            <label for="data2">Pilih Jam Pelajaran</label>
            <select name="waktu" class="form-control show-tick" required="required">
                <?php 
                    $qry = mysqli_query($mysqli, "SELECT * FROM ref_jam");
                    while ($data = mysqli_fetch_array($qry)) {
                        echo "<option value='".$data['jam']."'>".$data['jam']."</option>";
                    }
                ?>
            </select>
        </div>
        
    </div>
    <div class="modal-footer border-top-0 d-flex justify-content-center">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Generate</button>
    </div>
    </form>

</div>
</div>
</div>

                    