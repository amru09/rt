<!-- Begin Page Content -->
<!-- <div class="container-fluid"> -->

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h4 mb-0 text-gray-800 border-bottom"><b>Kelola Data Rekapitulasi Absen</b></h1>
<!-- ditambahin icon surat di kiri tulisannya -->


</div>

<!-- DataTables Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <div class="row py-12">
        <div class="col-md-3">
            <div class="form-group">
                <label for="data2">Kelas</label>
                <select id="kelas" name="kelas" class="form-control show-tick" required="required" >
                        <option value="">-- Pilih Kelas --</option>
                        <option value="VII">VII</option>
                        <option value="VIII">VIII</option>
                        <option value="IX">IX</option>
                        
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="data2">Mata Pelajaran</label>
                <select id="mape;" name="mapel" class="form-control show-tick" required="required" >
                        <option value="">-- Pilih Mata Pelajaran --</option>
                        <?php 
                            $qry_mapel = mysqli_query($mysqli, "SELECT * FROM tb_mapel");
                            while ($mapel = mysqli_fetch_array($qry_mapel)) { ?>
                                <option value="<?php echo $mapel['id_mapel'] ?>"><?php echo "(".$mapel['id_mapel'].") ".$mapel['nama_mapel'] ?></option>
                        <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="data2">Tahun</label>
                <select id="mape;" name="mapel" class="form-control show-tick" required="required" >
                        <option value="">-- Pilih Tahun --</option>
                        <?php 
                            $qry_mapel = mysqli_query($mysqli, "SELECT * FROM tb_mapel");
                            while ($mapel = mysqli_fetch_array($qry_mapel)) { ?>
                                <option value="<?php echo $mapel['id_mapel'] ?>"><?php echo "(".$mapel['id_mapel'].") ".$mapel['nama_mapel'] ?></option>
                        <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="data2">Bulan</label>
                <select id="bulan" name="bulan" class="form-control show-tick" required="required" >
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
        </div>
    </div>
</div>
<div class="card-body">
<div class="table-responsive">
    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <td rowspan="2" align="center">Nama</td>
            <td colspan="30" align="center">Tanggal</td>

        </tr>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
            <td>10</td>
            <td>11</td>
            <td>12</td>
            <td>13</td>
            <td>14</td>
            <td>15</td>
            <td>16</td>
            <td>17</td>
            <td>18</td>
            <td>19</td>
            <td>20</td>
            <td>21</td>
            <td>22</td>
            <td>23</td>
            <td>24</td>
            <td>25</td>
            <td>26</td>
            <td>27</td>
            <td>28</td>
            <td>29</td>
            <td>30</td>
        </tr>
        <tbody>
            <?php 
                $dt = mysqli_query($mysqli, "SELECT * FROM tb_mapel");
                while($data = mysqli_fetch_array($dt)){
            ?>
            <tr>
                <td>Rizky Husain</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                
            </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<div class="card-footer float-end">
    <a class="btn btn-warning" href="#"> Cetak </a>
</div>
</div>

<script type="text/javascript">
    $('.confirmation').on('click', function(e) {
       return confirm('Anda Yakin Menghapus Data Ini?');
    }); </script>