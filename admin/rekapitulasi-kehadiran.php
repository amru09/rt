<!-- Begin Page Content -->
<!-- <div class="container-fluid"> -->

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h4 mb-0 text-gray-800 border-bottom">‎<b>Rekapitulasi Kehadiran</b></h1>
<!-- ditambahin icon surat di kiri tulisannya -->


</div>

<!-- DataTables Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>MATA PELAJARAN</th>
                <th>PROGRESS</th>
            </tr>
            </thead>
            <tbody>
            <?php 
                $no = 1;
                $dt = mysqli_query($mysqli, "SELECT * FROM tb_mapel");
                while($data = mysqli_fetch_array($dt)){

            ?>
            <tr>
                <td><?php echo $data['nama_mapel'];?></td>
                <td><?php ?></td>
            </tr>
        
                    <?php $no++;} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.confirmation').on('click', function(e) {
       return confirm('Anda Yakin Menghapus Data Ini?');
    }); </script>