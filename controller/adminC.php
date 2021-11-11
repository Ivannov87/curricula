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
                session_start();

                $_SESSION["Ingreso"] = true;
                if ($resp["PerfilId"] == 1) {
                    $_SESSION["IsAdmin"] = true;
                } else {
                    $_SESSION["IsAdmin"] = false;
                }
                $_SESSION["Usr"] = $resp["Usuario"];
                $_SESSION["Nom"] = $resp["Nombre"];

                header("location:inicio.php?root=usuarios");
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
