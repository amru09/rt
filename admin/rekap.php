<!-- Begin Page Content -->
<!-- <div class="container-fluid"> -->
<script type="text/javascript" src="assets/barcode/jquery.min.js"></script>
<script type="text/javascript" src="assets/barcode/qrcode.js"></script>
<script type="text/javascript" src="assets/barcode/dom-to-image.min.js"></script>
<script type="text/javascript" src="assets/barcode/FileSaver.min.js"></script>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="index.php?page=riwayat-absen" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
        <h1 class="h3 mb-0 text-gray-800"><b>Daftar Absen</b></h1>
<!-- ditambahin icon surat di kiri tulisannya -->

<?php 
    $ID_KELAS = $_GET['id'];
    $qry_kelas = mysqli_query($mysqli, "SELECT * FROM tb_qrcode WHERE id = $ID_KELAS");
    $data_kelas = mysqli_fetch_array($qry_kelas);

?>
</div>

<!-- DataTables Example -->
<div class="card shadow mb-4">
  <!--
<div class="card-header py-3">
</div>
-->

<div class="card-body row">
<div class="par col-3">
    <input type="hidden" id="id_guru<?php echo $data_kelas['id']; ?>" value="<?php echo $data_kelas['id_guru']; ?>">
    <input type="hidden" id="id_mapel<?php echo $data_kelas['id']; ?>" value="<?php echo $data_kelas['id_mapel']; ?>">
    <input type="hidden" id="tgl<?php echo $data_kelas['id']; ?>" value="<?php echo $data_kelas['tgl']; ?>">
    <input type="hidden" id="waktu<?php echo $data_kelas['id']; ?>" value="<?php echo $data_kelas['waktu']; ?>">
    <div id="qrcode<?php echo $data_kelas['id']; ?>" style="width: 100%;"></div>
</div>
<script type="text/javascript">
  var qrcode<?php echo $data_kelas['id']; ?> = new QRCode(document.getElementById("qrcode<?php echo $data_kelas['id']; ?>"), {
    width : 223,
    height : 223
  });

  function makeCode<?php echo $data_kelas['id']; ?>() {   
    var id_guru<?php echo $data_kelas['id']; ?> = document.getElementById("id_guru<?php echo $data_kelas['id']; ?>").value;
    var id_mapel<?php echo $data_kelas['id']; ?> = document.getElementById("id_mapel<?php echo $data_kelas['id']; ?>").value;
    var tgl<?php echo $data_kelas['id']; ?> = document.getElementById("tgl<?php echo $data_kelas['id']; ?>").value;
    var waktu<?php echo $data_kelas['id']; ?> = document.getElementById("waktu<?php echo $data_kelas['id']; ?>").value;

    var data_siswa<?php echo $data_kelas['id']; ?> = 
      id_guru<?php echo $data_kelas['id']; ?>+'||'+
      id_mapel<?php echo $data_kelas['id']; ?>+'||'+
      tgl<?php echo $data_kelas['id']; ?>+'||'+
      waktu<?php echo $data_kelas['id']; ?>;

    if (!data_siswa<?php echo $data_kelas['id']; ?>) {
      alert("Maaf Input STB dan Nama Langkap Terlebih Dahulu!");
      return;
    }

    qrcode<?php echo $data_kelas['id']; ?>.makeCode(data_siswa<?php echo $data_kelas['id']; ?>);
  }

  $(window).on('load', function(e) {
    makeCode<?php echo $data_kelas['id']; ?>();
  });

</script>
<div class="table-responsive col-9">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>NIM</th>
                <th>NAMA</th>
                <th>KELAS</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $ID_GURU = $data_kelas['id_guru'];
                $ID_MAPEL = $data_kelas['id_mapel'];
                $TGL = $data_kelas['tgl'];
                $WAKTU = $data_kelas['waktu'];
                $dt = mysqli_query($mysqli, "SELECT * FROM tb_kehadiran a LEFT JOIN tb_siswa b ON  a.id_siswa = b.id_siswa WHERE a.id_guru = '$ID_GURU' AND a.id_mapel = '$ID_MAPEL' AND a.tgl = '$TGL' AND a.waktu = '$WAKTU'");
                while($data = mysqli_fetch_array($dt)){
            ?>
            <tr>
                <td><?php echo $data['id_siswa'];?></td>
                <td><?php echo $data['nama'];?></td>
                <td><?php echo $data['kelas'];?></td>
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