<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><b>Rekapitulasi</b></h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Print Report</a> -->
                    </div>                    
                    <div class="row">
                    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-success shadow h-100 py-2">
            <div class="card-body">
                <div class="text-center">
                    <h1 class="display-3">Rekapitulasi Absen Bulanan</h1>
                    <h1 class="display-4">Guru</h1>
                </div>
                <div class="text-center mt-4">
                    <a  class="btn btn-primary" data-toggle="modal" data-target="#addDataModal"><i class="fas fa-plus-circle" aria-hidden="true"></i> Cetak Rekap</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg">
<div class="modal-content">

    
    <div class="modal-header border-bottom-secondary">
    <h5 class="modal-title text-gray-900">Cetak Rekap</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>

    <!-- Modal buat kelas -->
    <form action="cetak.php" method="POST" enctype="multipart/form-data">
    <div class="modal-body text-gray-900">
        <div class="form-group">
            <label for="data2">Kelas</label>
            <input type="hidden" name="id_guru" value="<?php echo $ID_USER ?>">
            <select id="kelas" name="kelas" class="form-control show-tick" required="required" >
                    <option value="">-- Pilih Kelas --</option>
                    <option value="VII-A">VII-A</option>
                    <option value="VII-B">VII-B</option>
                    <option value="VIII-A">VIII-A</option>
                    <option value="VIII-B">VIII-B</option>
                    <option value="IX-A">IX-A</option>
                    <option value="IX-B">IX-B</option>
            </select>
        </div>
        <div class="form-group">
            <label for="data2">Mata Pelajaran</label>
            <select name="id_mapel" class="form-control show-tick" required="required" >
                    <option value="">-- Pilih Mata Pelajaran --</option>
                    <?php 
                        $qry_mapel = mysqli_query($mysqli, "SELECT * FROM tb_mapel");
                        while ($mapel = mysqli_fetch_array($qry_mapel)) { ?>
                            <option value="<?php echo $mapel['id_mapel'] ?>"><?php echo "(".$mapel['id_mapel'].") ".$mapel['nama_mapel'] ?></option>
                    <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="data2">Jam Pelajaran</label>
            <select name="jam" class="form-control show-tick" required="required" >
                    <option value="">-- Pilih Jam Pelajaran --</option>
                    <?php 
                        $qry_jam = mysqli_query($mysqli, "SELECT * FROM ref_jam");
                        while ($jam = mysqli_fetch_array($qry_jam)) { ?>
                            <option value="<?php echo $jam['jam'] ?>"><?php echo $jam['jam']; ?></option>
                    <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="data2">Bulan</label>
            <select id="bulan" name="bln" class="form-control show-tick" required="required" >
                    <option value="">-- Pilih Bulan --</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
            </select>
        </div>
        <div class="form-group">
            <label for="data2">Tahun</label>
            <select name="thn" class="form-control show-tick" required="required" >
                    <option value="">-- Pilih Tahun --</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
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