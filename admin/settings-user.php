                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->
                  <?php 
                    $dt = mysqli_query($mysqli, "SELECT * FROM tb_users WHERE username = $ID_USER");
                    $data = mysqli_fetch_array($dt);
                  ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800 border-bottom">PROFIL PENGGUNA</h1>
                        <!-- ditambahin icon surat di kiri tulisannya -->
                    </div>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          EDIT AKUN
                        </div>
                        <div class="card-body">
                            <form action="controller_user.php" method="POST">
                              <div class="modal-body text-gray-900">
                                <div class="form-group">
                                  <label for="data1">Nama</label>
                                  <input type="text" class="form-control" id="data1" name="nama" value="<?php echo $_SESSION['nama'] ?>" readonly="on">
                                </div>
                                <div class="form-group">
                                  <label for="data2">Username</label>
                                  <input type="text" class="form-control" id="data2" name="username" value="<?php echo $data['username'] ?>" readonly="on">
                                </div>
                                <div class="form-group">
                                  <label for="data2">Password (Kosongkan Jika Tidak Ada Perubahan)</label>
                                  <input type="text" class="form-control" id="data2" name="password">
                                </div>

                              </div>
                              <div class="modal-footer border-top-0 d-flex justify-content-center">
                                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                              </div>
                            </form>
                        </div>
                    </div>

            <!-- </div> -->
            