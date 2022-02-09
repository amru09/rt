<!-- Begin Page Content -->
<!-- <div class="container-fluid"> -->

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h4 mb-0 text-gray-800 border-bottom">‎<b>Rekapitulasi Kehadiran</b></h1>
<!-- ditambahin icon surat di kiri tulisannya -->


</div>

<!-- DataTables Example -->
<div class="card shadow mb-4">
  <!--
<div class="card-header py-3">
</div>
-->
<div class="card-body">
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>MATA PELAJARAN</th>
                <th>JAM</th>
                <th>TANGGAL</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $dt = mysqli_query($mysqli, "SELECT * FROM tb_mapel");
                while($data = mysqli_fetch_array($dt)){
            ?>
            <tr>
                <td><?php echo $data['nama_mapel'];?></td>
                <td><?php echo $data['nama_mapel'];?></td>
                <td><?php echo $data['nama_mapel'];?></td>
                <td><?php echo $data['nama_mapel'];?></td>
                <td>
                    <ul class="list-inline m-0">
                    <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#EditAnggota".$no; ?>">
                        <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Lihat Rekap"><i class="fa fa-edit"></i></button>
                    </li>
                </ul>
                </td>
            </tr>
            <!-- Modal Delete -->
            <!-- Modal DELETE DATA -->
            <div class="modal fade" id="<?php echo "deleteModal".$no ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModal">Yakin ingin menghapus data ini?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Klik "Hapus" jika anda yakin ingin menghapus data ini.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                            <a class="btn btn-danger" href="controller_mapel.php?action=delete&id=<?php echo $data['id_mapel'] ?>">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Edit Update -->
            <div class="modal fade" id="<?php echo "EditAnggota".$no; ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                  <div class="modal-header border-bottom-secondary">
                    <h5 class="modal-title text-gray-900">Edit - Data Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="controller_mapel.php?action=update" method="POST" enctype="multipart/form-data">
                    <div class="modal-body text-gray-900">
                      <div class="form-group">
                        <label for="data2">Kode MaPel</label>
                        <input type="text" class="form-control" name="kode" value="<?php echo $data['id_mapel']; ?>" readonly="on">
                      </div>
                      <div class="form-group">
                        <label for="data2">Nama MaPel</label>
                        <input type="text" class="form-control" name="nama_mapel" value="<?php echo $data['nama_mapel'] ?>">
                      </div>
                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
            <!-- Tutup Mdal Edit -->
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            <!-- Modal ADD DATA -->
            <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                  <div class="modal-header border-bottom-secondary">
                    <h5 class="modal-title text-gray-900">Tambah - Data Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="controller_mapel.php?action=insert" method="POST" enctype="multipart/form-data">
                    <div class="modal-body text-gray-900">
                      <div class="form-group">
                        <label for="data2">Kode Mata Pelajaran</label>
                        <input type="text" class="form-control" name="kode">
                      </div>
                      <div class="form-group">
                        <label for="data2">Nama Mata Pelajaran</label>
                        <input type="text" class="form-control" name="nama_mapel">
                      </div>
                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>

            

            <!-- Modal EDIT DATA -->

<script type="text/javascript">
    $('.confirmation').on('click', function(e) {
       return confirm('Anda Yakin Menghapus Data Ini?');
    }); </script>