<?php 
    $ext = explode('||', $_GET['val']);
    $mapel = $ext[1];
    $tgl = $ext[2];
    $jam = $ext[3];
    $qry = mysqli_query($mysqli, "SELECT * FROM tb_mapel WHERE id_mapel = $mapel");
    $data = mysqli_fetch_array($qry);
?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="index.php" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
        <h1 class="h3 mb-0 text-gray-800"><b>Scan Qr Code Kelas</b></h1>
    </div>

    
    <div class="row">


    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-success shadow h-100 py-2">
            <div class="card-body">
                <div class="text-center ">
                    <center id="hasilqr" style="width:100%"></center>
                    <h4 class="display-4 mt-4">Silhkan Scan QR Code </h4>
                    <div class="display-5">Mata Pelajaran : <?php echo $data['nama_mapel'];?></div>
                    <div class="display-5">Tanggal : <?php echo TanggalIndo($tgl); ?></div>
                    <div class="display-5">Pukul : <?php echo $jam; ?></div>
                    <a href="closeqrcode.php" class="btn btn-primary mt-4"><i class="fas fa-trash fa-sm text-white-50"></i> Tutup</a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var value = "<?php echo $_GET['val'] ?>";
        var qrcode = new QRCode(document.getElementById("hasilqr"), {
            width : 200,
            height : 200
        });

        function makeCode() {

            if (!value) {
                alert("Silahkan buat kelas terlebih dahulu");
                return;
            }
            qrcode.makeCode(value); //kode utama
        }

        $(document).ready(function() {
            makeCode();
        });
    </script>