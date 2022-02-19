<style>
    body {
        display: flex;
        justify-content: center;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    .hadir {
        min-width: 20px;
        font-weight: 10px;
        text-align: center;
    }
</style>
<table >
    <tr>
        <td rowspan="2" class="hadir"  width="20px" align="">Nisn</td>
        <td rowspan="2" class="hadir" >Nama</td>
        <td colspan="31" align="center">Tanggal</td>
    </tr>
    <tr>
        <td class="hadir">1</td>
        <td class="hadir">2</td>
        <td class="hadir">3</td>
        <td class="hadir">4</td>
        <td class="hadir">5</td>
        <td class="hadir">6</td>
        <td class="hadir">7</td>
        <td class="hadir">8</td>
        <td class="hadir">9</td>
        <td class="hadir">10</td>
        <td class="hadir">11</td>
        <td class="hadir">12</td>
        <td class="hadir">13</td>
        <td class="hadir">14</td>
        <td class="hadir">15</td>
        <td class="hadir">16</td>
        <td class="hadir">17</td>
        <td class="hadir">18</td>
        <td class="hadir">19</td>
        <td class="hadir">20</td>
        <td class="hadir">21</td>
        <td class="hadir">22</td>
        <td class="hadir">23</td>
        <td class="hadir">24</td>
        <td class="hadir">25</td>
        <td class="hadir">26</td>
        <td class="hadir">27</td>
        <td class="hadir">28</td>
        <td class="hadir">29</td>
        <td class="hadir">30</td>
        <td class="hadir">31</td>
    </tr>
<tbody>
<?php 
    include 'config/connect-db.php';

    $id_guru = $_POST['id_guru'];
    $id_mapel = $_POST['id_mapel'];
    $kelas = $_POST['kelas'];
    $jam = $_POST['jam'];
    $bln = $_POST['bln'];
    $thn = $_POST['thn'];

    $qry = "CALL `rekapitulasi`('$id_guru', '$id_mapel', '$kelas', '$jam', '$bln', '$thn')";
    $dat  = mysqli_query($mysqli, $qry);

    while($d = mysqli_fetch_array($dat)){ ?>
            <tr>
                <td >&nbsp;&nbsp;<?php echo $d['id_siswa']; ?>&nbsp;&nbsp;</td>
                <td >&nbsp;&nbsp;<?php echo $d['nama']; ?>&nbsp;&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_1']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_2']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_3']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_4']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_5']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_6']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_7']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_8']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_9']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_10']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_11']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_12']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_13']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_14']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_15']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_16']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_17']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_18']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_19']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_20']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_21']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_22']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_23']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_24']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_25']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_26']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_27']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_28']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_29']) ?>">&nbsp;</td>
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_30']) ?>">&nbsp;</td>    
                <td class="hadir" style="background-color: <?php echo hadir($d['tgl_31']) ?>">&nbsp;</td>    
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php 
    function hadir($hadir) {
        if ($hadir == '1') {
            echo "green";
        }else {
            echo "red";
        }
    }
?>