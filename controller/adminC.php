<?php

class AdminC
{
    public function Login()
    {
        if (isset($_POST["usuarioI"])) {
            $user = array("usuario" => $_POST["usuarioI"], "pass" => $_POST["claveI"]);
            $table = "usuario";

            $resp = AdminM::Login($user, $table);

            if ($resp["Usuario"] == $_POST["usuarioI"] && $resp["Pass"] == $_POST["claveI"]) {

                // consultar archivos cargados y totales
               
                $table = "files";
                $cargados = AdminM::Cargados($resp["UsuarioId"], $table);

                if (is_null($cargados[0]))
                    $cargados[0] = 0;

                if ($resp["PerfilId"] == 1) {
                    $totales = AdminM::Totales($table);
                } else {
                    $totales[0] = 0;
                }

                if (is_null($totales[0]))
                    $totales[0] = 0;

                // enviar información a variables de sesion
                session_start();

                $_SESSION["Ingreso"] = true;
                if ($resp["PerfilId"] == 1) {
                    $_SESSION["IsAdmin"] = true;
                } else {
                    $_SESSION["IsAdmin"] = false;
                }
                //info general del usuario
                $_SESSION["usrId"] = $resp["UsuarioId"];
                $_SESSION["Usr"] = $resp["Usuario"];
                $_SESSION["Nom"] = $resp["Nombre"];

                // info para estadisticas iniciales 
                $_SESSION["Tot"] = $totales[0];
                $_SESSION["Ups"] = $cargados[0];

                header("location:inicio.php?root=principal");
            } else {

                echo '<script type="text/javascript">
                
                  $(function ()
                  {notifylogin("warning","Credenciales no validas !")});
                
                </script>';
                header("Refresh 3;");
            }
        }
    }
}
