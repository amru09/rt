<?php

date_default_timezone_set('Asia/Makassar');

class datetimeFormat {

    public function TampilPeriode($thn, $bln){
    
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

          $result = $BulanIndo[(int)$bln] . " ". $thn;   
          return($result);
    
    }


}


?>