<?php
   class  UsuarioC{
       public function LoadUC()
       {
           $table="usuario";
           $resp= UsuarioM::GetUsuarioC($table);

           foreach ($resp as $key => $value) {
            echo '<option value = "' . $value["UsuarioId"] . '">' . $value["Usuario"] . '</option>';
        }
        
       }
   }
