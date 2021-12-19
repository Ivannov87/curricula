<?php 
 class EstadisticaC{
        public function Resumen(){
            $table="files";

            $resp=EstadisticaM::Totales($table);

            if(!is_null($resp))
            {
                $TotAreas="";
                foreach($resp as $key => $value)
                {
                    $TotAreas .= $value["Total"].',';
                }

                $TotAreas = chop($TotAreas,',');
                echo $TotAreas;

            }
        }
 }
     
?>