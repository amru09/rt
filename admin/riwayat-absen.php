<!-- Begin Page Content -->
<!-- <div class="container-fluid"> -->

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h4 mb-0 text-gray-800 border-bottom">‎<b>Riwayat</b></h1>
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
    <table class="table table-bordered" id="dataTable"  width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>MATA PELAJARAN</th>
                <th>TANGGAL</th>
                <th>JAM</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;
                $dt = mysqli_query($mysqli, "SELECT * FROM tb_qrcode a LEFT JOIN tb_mapel b ON a.id_mapel = b.id_mapel ORDER BY a.tgl DESC");
                while($data = mysqli_fetch_array($dt)){
            ?>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data['nama_mapel'];?></td>
                <td><?php echo TanggalIndo($data['tgl']);?></td>
                <td><?php echo $data['waktu'];?></td>
                <td><?php echo statusQRCode($data['tgl'], $data['waktu'])?></td>
                <td>
                    <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <a href="index.php?page=rekapitulasi-absen&id=<?php  echo $data['id']; ?>" class="btn btn-success btn-sm rounded-0" title="Lihat Rekap"><i class="fa fa-eye"></i> Lihat Data</a>
                    </li>
                </ul>
                </td>
            </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

            