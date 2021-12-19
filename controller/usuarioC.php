<?php
class  UsuarioC
{
    public function LoadUC()
    {
        $table = "usuario";
        $resp = UsuarioM::GetUsuarioC($table);

        foreach ($resp as $key => $value) {
            echo '<option value = "' . $value["UsuarioId"] . '">' . $value["Usuario"] . '</option>';
        }
    }

    


    public function InsertU()
    {
        if (isset($_POST["UsuarioI"])) {

            $table = "usuario";
            $userinfo = array(
                "Usuario" => $_POST["UsuarioI"],
                "Pass" => $_POST["PassI"],
                "Nombre" => $_POST["NombreI"],
                "FechaR" => date("Y-m-d H:i:s"),
                "PerfilId" => $_POST["PerfilI"]
            );

            $resp = UsuarioM::InsertU($userinfo, $table);

            if ($resp == true) {
                echo '<script type="text/javascript">
                $(function ()
                {notifylogin("success","Información guardada correctamente !")}); 
              </script>';
                if (!headers_sent()) {
                    header("Refresh 3;");
                }
            } else {
                echo  '<script type="text/javascript">
                $(function ()
                {notifylogin("error","No se pudo guardar la información !")});
                </script>';
                if (!headers_sent()) {
                    header("Refresh 3;");
                }
            }
        }
    }

    public function GetAll()
    {
        $table = "usuario";
        $resp = UsuarioM::GetAll($table);
        foreach ($resp as $key => $value) {
            echo '<tr>
            <td>' . $value["UsuarioId"] . '</td>
            <td>' . $value["Usuario"] . '</td>
            <td>' . $value["Nombre"] . '</td>
            <td>' . $value["FechaR"] . '</td>
            <td>' . $value["Perfil"] . '</td>
            <td><a class="btn btn-primary text-white" title="eliminar" href="inicio.php?root=usuarios&idb=' . $value["UsuarioId"] . '"><i class="mdi mdi-delete-circle"></i></a></td>
             </tr>';
        }
    }

    public function DeleteU()
    {
        if (isset($_GET["idb"])) {

            $table = "usuario";
            $id = $_GET["idb"];
            $resp = UsuarioM::DeleteU($table, $id);

            if ($resp == true) {
                echo '<script type="text/javascript">
          $(function ()
          {
              window.location.replace("inicio.php?root=usuarios");
          }); 
        </script>';
            } else {

                echo  '<script type="text/javascript">
          $(function ()
          {notifylogin("error","No se pudo eliminar la información !")});
          </script>';
                if (!headers_sent()) {
                    header("Refresh 3;");
                }
            }
        }
    }

    public function LoadUD()
    {
        $table = "usuario";
        $resp = UsuarioM::GetUsuarioD($table);

        foreach ($resp as $key => $value) {
            echo '<option value = "' . $value["UsuarioId"] . '">' . $value["Usuario"] . '</option>';
        }
    }

    public function LoadAll()
    {
        $table = "usuario";
        $resp = UsuarioM::GetUsuarioAll($table);

        foreach ($resp as $key => $value) {
            echo '<option value = "' . $value["UsuarioId"] . '">' . $value["Usuario"] . '</option>';
        }
    }

}
