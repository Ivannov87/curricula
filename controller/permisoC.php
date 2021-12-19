<?php
class PermisoC
{

    public  function InsertPermiso()
    {
        if (isset($_POST["UsuarioI"])) {
            $table = "permisos";
            $permiso = array("UsuarioId" => $_POST["UsuarioI"], "AreaId" => $_POST["AreaI"]);

            $resp = PermisoM::InsertP($table, $permiso);

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
        $table = "permisos";
        $resp = PermisoM::GetAll($table);
        foreach ($resp as $key => $value) {
            echo '<tr>
            <td>' . $value["PermisoId"] . '</td>
            <td>' . $value["Usuario"] . '</td>
            <td>' . $value["Area"] . '</td>
            <td><a class="btn btn-primary text-white" title="eliminar" href="inicio.php?root=permisos&idb=' . $value["PermisoId"] . '"><i class="mdi mdi-delete-circle"></i></a></td>
             </tr>';
        }
    }

    public function DeletePermiso()
    {
        if (isset($_GET["idb"])) {

            $table = "permisos";
            $id = $_GET["idb"];
            $resp = PermisoM::DeletePermiso($table, $id);

            if ($resp == true) {
                echo '<script type="text/javascript">
            $(function ()
            {
                window.location.replace("inicio.php?root=permisos");
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
}
