<?php
class AccesoC
{


  public  function InsertAccess()
  {
    if (isset($_POST["UsuarioI"])) {
      $table = "accesos";
      $access = array("UsuarioId" => $_POST["UsuarioI"], "AreaId" => $_POST["AreaI"]);

      $resp = AccesoM::InsertAccess($table, $access);

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
    $table = "accesos";
    $resp = AccesoM::GetAll($table);
    foreach ($resp as $key => $value) {
      echo '<tr>
            <td>' . $value["AccesoId"] . '</td>
            <td>' . $value["Usuario"] . '</td>
            <td>' . $value["Area"] . '</td>
            <td><a class="btn btn-primary text-white" title="eliminar" href="inicio.php?root=accesos&idb=' . $value["AccesoId"] . '"><i class="mdi mdi-delete-circle"></i></a></td>
             </tr>';
    }
  }

  public function DeleteAccess()
  {
    if (isset($_GET["idb"])) {

      $table = "accesos";
      $id = $_GET["idb"];
      $resp = AccesoM::DeleteAccess($table, $id);

      if ($resp == true) {
        echo '<script type="text/javascript">
          $(function ()
          {
              window.location.replace("inicio.php?root=accesos");
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
