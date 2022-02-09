                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800 border-bottom">‎<b>Kelola Data Guru</b></h1>
                        <!-- ditambahin icon surat di kiri tulisannya -->
                        
                        
                    </div>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a  class="btn btn-outline-dark" data-toggle="modal" data-target="#addDataModal"><i class="fas fa-plus-circle" aria-hidden="true"></i> Tambah Data Guru</a>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NUPTK</th>
                                            <th>NAMA</th>
                                            <th>JENIS KELAMIN</th>
                                            <th>TEMPAT, TANGGAL LAHIR</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $dt = mysqli_query($mysqli, "SELECT * FROM tb_guru WHERE nama != 'admin'");
                                            while($data = mysqli_fetch_array($dt)){

                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $data['id_guru'];?></td>
                                            <td><?php echo $data['nama'];?></td>
                                            <td><?php if ($data['jkel'] == "L") {
                                              echo "Laki - Laki";
                                            } else {
                                              echo "Perempuan";
                                            }?></td>
                                            <td><?php echo $data['tempat_lahir'].", ".TanggalIndo($data['tgl_lahir']);?></td>
                                            <td>
                                              <ul class="list-inline m-0">
                                                  <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#EditAnggota".$no; ?>">
                                                    <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                                  </li>
                                                  <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#deleteModal".$no ?>">
                                                    <button class="confirmation btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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
                                                        <a class="btn btn-danger" href="controller_guru.php?action=delete&id=<?php echo $data['id_guru'] ?>">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            <!-- Modal Edit Update -->
            <div class="modal fade" id="<?php echo "EditAnggota".$no; ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                  <div class="modal-header border-bottom-secondary">
                    <h5 class="modal-title text-gray-900">Edit - Data Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="controller_guru.php?action=update" method="POST" enctype="multipart/form-data">
                    <div class="modal-body text-gray-900">
                      <div class="form-group">
                        <label for="data2">NUPTK</label>
                        <input type="text" class="form-control" name="id_guru" value="<?php echo $data['id_guru']; ?>" readonly="on">
                      </div>
                      <div class="form-group">
                        <label for="data2">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $data['nama'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="data2">Jenis Kelamin</label>
                        <select name="jkel" class="form-control show-tick">
                          <option value="L" <?php if ($data['jkel'] == 'L') { echo "Selected";} ?>>Laki - Laki</option>
                          <option value="P" <?php if ($data['jkel'] == 'P') { echo "Selected";} ?>>Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="data2">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data['tempat_lahir'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="data2">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $data['tgl_lahir'] ?>">
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
                                        <?php $no++;} ?>
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

                  <form action="controller_guru.php?action=insert" method="POST" enctype="multipart/form-data">
                    <div class="modal-body text-gray-900">
                      <div class="form-group">
                        <label for="data2">NUPTK</label>
                        <input type="text" class="form-control" name="id_guru" required="required">
                      </div>
                      <div class="form-group">
                        <label for="data2">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" required="required">
                      </div>
                      <div class="form-group">
                        <label for="data2">Jenis Kelamin</label>
                        <select name="jkel" class="form-control show-tick" required="required">
                          <option value="L">Laki - Laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="data2">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" required="required">
                      </div>
                      <div class="form-group">
                        <label for="data2">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" required="required">
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
<script type="text/javascript">
    $('.confirmation').on('click', function(e) {
       return confirm('Anda Yakin Menghapus Data Ini?');
    }); </script>