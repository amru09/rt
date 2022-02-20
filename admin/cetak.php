<?php include('plugin/datetimeFormat.php'); ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "calibri";
    }
    .main {
    	width: 800px;
    	margin: 0 auto;
    	padding: 10px 0;
    }
    body {
        display: flex;
        justify-content: center;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        width: 100%;
    	font-size: 11px;
    	text-align: center;
    	padding: 3px 0;
        color: while;
    }
    .hadir {
        min-width: 20px;
        font-weight: 10px;
        text-align: center;
    }
    .header {
    	text-align: center;
    	margin-bottom: 5px;
    }
    .header h2 {
    	margin-bottom: 5px;
    	font-size: 1.4rem;
    }
    .header h6 {
    	font-size: 1.2rem;
    	font-weight: 500;
    }
</style>

<body>
    <div class=main>
    <div class="header">
			<h1>LAPORAN REKAPITULASI KEHADIRAN SISWA</h1>
			<h6>SMP NEGERI 05 MANDAI</h6>
			<h6>Jl. Poros Makassar - Maros KM.23, Kec. Marusu, Kabupaten Maros, Sulawesi Selatan 90552</h6>
             <h2><?php echo "Periode ".BulanIndo($_POST['bln'])." Tahun ".$_POST['thn']; ?></h2>
	</div>

    <table>
    <tr>
        <td rowspan="2" class="hadir">No.</td>
        <td rowspan="2" class="hadir" width="20px">NISN</td>
        <td rowspan="2" class="hadir" >Nama</td>
        <td colspan="31">Tanggal</td>
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
    $no   = 1;

    $qry = "CALL `rekapitulasi`('$id_guru', '$id_mapel', '$kelas', '$jam', '$bln', '$thn')";
    $dat  = mysqli_query($mysqli, $qry);

    while($d = mysqli_fetch_array($dat)){ ?>
            <tr>
                <td>&nbsp;<?php echo $no; ?></td>
                <td >&nbsp;&nbsp;<?php echo $d['id_siswa']; ?>&nbsp;&nbsp;</td>
                <td style="text-align: left;padding-left: 10px;"><?php echo $d['nama']; ?>  </td>
                <td style="background-color: <?php echo hadir($d['tgl_1']) ?>"><?php echo getValue($d['tgl_1']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_2']) ?>"><?php echo getValue($d['tgl_2']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_3']) ?>"><?php echo getValue($d['tgl_3']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_4']) ?>"><?php echo getValue($d['tgl_4']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_5']) ?>"><?php echo getValue($d['tgl_5']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_6']) ?>"><?php echo getValue($d['tgl_6']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_7']) ?>"><?php echo getValue($d['tgl_7']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_8']) ?>"><?php echo getValue($d['tgl_8']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_9']) ?>"><?php echo getValue($d['tgl_9']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_10']) ?>"><?php echo getValue($d['tgl_10']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_11']) ?>"><?php echo getValue($d['tgl_11']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_12']) ?>"><?php echo getValue($d['tgl_12']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_13']) ?>"><?php echo getValue($d['tgl_13']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_14']) ?>"><?php echo getValue($d['tgl_14']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_15']) ?>"><?php echo getValue($d['tgl_15']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_16']) ?>"><?php echo getValue($d['tgl_16']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_17']) ?>"><?php echo getValue($d['tgl_17']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_18']) ?>"><?php echo getValue($d['tgl_18']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_19']) ?>"><?php echo getValue($d['tgl_19']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_20']) ?>"><?php echo getValue($d['tgl_20']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_21']) ?>"><?php echo getValue($d['tgl_21']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_22']) ?>"><?php echo getValue($d['tgl_22']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_23']) ?>"><?php echo getValue($d['tgl_23']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_24']) ?>"><?php echo getValue($d['tgl_24']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_25']) ?>"><?php echo getValue($d['tgl_25']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_26']) ?>"><?php echo getValue($d['tgl_26']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_27']) ?>"><?php echo getValue($d['tgl_27']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_28']) ?>"><?php echo getValue($d['tgl_28']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_29']) ?>"><?php echo getValue($d['tgl_29']); ?>&nbsp;</td>
                <td style="background-color: <?php echo hadir($d['tgl_30']) ?>"><?php echo getValue($d['tgl_30']); ?>&nbsp;</td>    
                <td style="background-color: <?php echo hadir($d['tgl_31']) ?>"><?php echo getValue($d['tgl_31']); ?>&nbsp;</td>    
            </tr>
        <?php $no++;} ?>
    </tbody>
</table>
</div>
</body>
<?php 
    function getValue($val)
    {
    
        if($val == "0"){
          $value = "-";	
        }else{
          $value = "";
        }
    
        return $value;
    
    }
    function hadir($hadir) {
        if ($hadir == '1') {
            echo "green";
        }else {
            echo "red";
        }
    }

    function BulanIndo($date){
      $BulanIndo = array( 
                        "Januari", 
                        "Februari", 
                        "Maret", 
                        "April", 
                        "Mei", 
                        "Juni", 
                        "Juli", 
                        "Agustus", 
                        "September", 
                        "Oktober", 
                        "November", 
                        "Desember"
                        );
    
      $bulan = $date;
    
      $result = $BulanIndo[(int)$bulan-1];
      return($result);
    }
?>