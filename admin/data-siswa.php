                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800 border-bottom">‎<b>Kelola Data Siswa</b></h1>
                        <!-- ditambahin icon surat di kiri tulisannya -->j
                        
                        
                    </div>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a  class="btn btn-outline-dark" data-toggle="modal" data-target="#addDataModal"><i class="fas fa-plus-circle" aria-hidden="true"></i> Tambah Data Siswa</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NISN</th>
                                            <th>NAMA</th>
                                            <th>JENIS KELAMIN</th>
                                            <th>KELAS</th>
                                            <th>TEMPAT, TGL LAHIR</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $dt = mysqli_query($mysqli, "SELECT * FROM tb_siswa");
                                            while($data = mysqli_fetch_array($dt)){

                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $data['id_siswa'];?></td>
                                            <td><?php echo $data['nama'];?></td>
                                            <td><?php if ($data['jkel'] == "L") {
                                              echo "Laki - Laki";
                                            } else {
                                              echo "Perempuan";
                                            }?></td>
                                            <td><?php echo $data['kelas'];?></td>
                                            <td><?php echo $data['tempat_lahir'].", ".TanggalIndo($data['tgl_lahir']);?></td>
                                            
                                            <td>
                                              <ul class="list-inline m-0">
                                              <?php if ($_SESSION['status'] == 'ADMIN') { ?>
                                                <!-- action buttons -->
                                              
                                                <li class="list-inline-item edit-anggota" data-nama="<?php echo $data['nama'] ?>" data-nisn="<?php echo $data['id_siswa'] ?>" data-jkel="<?php echo $data['jkel'] ?>" data-kelas="<?php echo $data['kelas'] ?>" data-tempat_lahir="<?php echo $data['tempat_lahir'] ?>" data-tgl_lahir="<?php echo $data['tgl_lahir'] ?>">
                                                  <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#deleteModal".$no ?>">
                                                  <button class="confirmation btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                              
                                              <?php  }elseif ($_SESSION['status'] = 'USER') { ?>
                                                  -
                                                <?php } ?>
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
                                                        <a class="btn btn-danger" href="controller_siswa.php?action=delete&id=<?php echo $data['id_siswa'] ?>">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $no++;} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            <!-- </div> -->
            <!-- Modal Edit Update -->
            <div class="modal fade" id="EditAnggota" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                  <div class="modal-header border-bottom-secondary">
                    <h5 class="modal-title text-gray-900">Edit - Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="controller_siswa.php?action=update" method="POST" enctype="multipart/form-data">
                    <div class="modal-body text-gray-900">
                      <div class="form-group">
                        <label for="data2">NISN</label>
                        <input id="id_siswa" type="text" class="form-control" name="id_siswa" readonly="on">
                      </div>
                      <div class="form-group">
                        <label for="data2">Nama Lengkap</label>
                        <input id="nama" type="text" class="form-control" name="nama" required="required">
                      </div>
                      <div class="form-group">
                        <label for="data2">Jenis Kelamin</label>
                        <select id="jkel" name="jkel" class="form-control show-tick" required="required">
                          <option value="L">Laki - Laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="data2">Kelas</label>
                        <select id="kelass" name="kelas" class="form-control show-tick" required="required" >
                                <option value="">-- Pilih Kelas --</option>
                                <option value="VII">VII</option>
                                <option value="VIII">VIII</option>
                                <option value="IX">IX</option>
                                
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="data2">Tempat Lahir</label>
                        <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" required="required">
                      </div>
                      <div class="form-group">
                        <label for="data2">Tanggal Lahir</label>
                        <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" required="required">
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
            <!-- End of Main Content -->


            <!-- Modal ADD DATA -->
            <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                  <div class="modal-header border-bottom-secondary">
                    <h5 class="modal-title text-gray-900">Tambah - Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="controller_siswa.php?action=insert" method="POST" enctype="multipart/form-data">
                    <div class="modal-body text-gray-900">
                      <div class="form-group">
                        <label for="data2">NISN</label>
                        <input type="text" class="form-control" name="id_siswa" required="required">
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
                        <label for="data2">Kelas</label>
                        <select name="kelas" class="form-control show-tick" required="required" >
                                <option value="">-- Pilih Kelas --</option>
                                <option value="VII">VII</option>
                                <option value="VIII">VIII</option>
                                <option value="IX">IX</option>
                                
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

            

            <!-- Modal EDIT DATA -->

<script type="text/javascript">
    $('.confirmation').on('click', function(e) {
       return confirm('Anda Yakin Menghapus Data Ini?');
    }); </script>