<?php
class AreaC
{

    public  function InsertA()
    {
        if (isset($_POST["DescripcionI"])) {
            $table = "area";
            $desc = $_POST["DescripcionI"];

            $resp = AreaM::InsertA($table, $desc);

            if ($resp == true) {

                echo '<script type="text/javascript">
                $(function ()
                {notifylogin("success","Información Guardada Correctamente !")}); 
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
    public function LoadA()
    {
        $table = "area";
        $resp = AreaM::GetAreas($table);

        foreach ($resp as $key => $value) {

            echo '<option value = "' . $value["AreaId"] . '">' . $value["Descripcion"] . '</option>';
        }
    }

    public function LoadAP()
    {
        if (isset($_SESSION["usrId"])) {

            $table = "area";
            $id= $_SESSION["usrId"];
            $resp = AreaM::GetAreasP($table,$id);

            foreach ($resp as $key => $value) {

                echo '<option value = "' . $value["AreaId"] . '">' . $value["Descripcion"] . '</option>';
            }
        }
    }

    public function GetAll()
    {
        $table = "area";
        $resp = AreaM::GetAll($table);
        foreach ($resp as $key => $value) {
            echo '<tr>
            <td>' . $value["AreaId"] . '</td>
            <td>' . $value["Descripcion"] . '</td>
            <td><a class="btn btn-primary text-white" title="editar" href="inicio.php?root=earea&id=' . $value["AreaId"] . '"><i class="mdi mdi-border-color"></i></a></td>
             </tr>';
        }
    }
    public function EditA()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $table = "area";
            $resp = AreaM::EditA($table, $id);

            if (!is_null($resp)) {
                echo '<div class="form-group">
                      <label for="DescripcionE">Descripción</label>
                      <input type="text" class="form-control" id="DescripcionE" name="DescripcionE" placeholder="Descripción" value="' . $resp["Descripcion"] . '" required>
                      <input type="hidden" name="IdE" value = "' . $resp["AreaId"] . '">
                  </div>
                  <button type="submit" class="btn btn-primary me-2">Actualizar</button>
                  <a class="btn btn-light" href="inicio.php?root=principal">Cancelar</a>';
            }
        }
    }

    public function UpdateA()
    {
        if (isset($_POST["DescripcionE"])) {
            $area = array("Id" => $_POST["IdE"], "Desc" => $_POST["DescripcionE"]);
            $table = "area";
            $resp = AreaM::UpdateA($table, $area);

            if ($resp == true) {


                echo '<script type="text/javascript">
                $(function ()
                {
                    window.location.replace("inicio.php?root=areas");
                }); 
              </script>';
            } else {

                echo  '<script type="text/javascript">
                $(function ()
                {notifylogin("error","No se pudo actualizar la información !")});
                </script>';
                if (!headers_sent()) {
                    header("Refresh 3;");
                }
            }
        }
    }
}
