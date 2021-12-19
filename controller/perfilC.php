<?php

class PerfilC
{

    public  function InsertP()
    {
        if (isset($_POST["DescripcionI"])) {
            $table = "perfil";
            $desc = $_POST["DescripcionI"];

            $resp = PerfilM::InsertP($table, $desc);

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

    public function LoadP()
    {
        $table = "perfil";
        $resp = PerfilM::GetPerfiles($table);

        foreach ($resp as $key => $value) {

            echo '<option value = "' . $value["PerfilId"] . '">' . $value["Descripcion"] . '</option>';
        }
    }
    public function GetAll()
    {
        $table = "perfil";
        $resp = PerfilM::GetAll($table);
        foreach ($resp as $key => $value) {
            echo '<tr>
            <td>' . $value["PerfilId"] . '</td>
            <td>' . $value["Descripcion"] . '</td>
            <td><a class="btn btn-primary text-white" title="editar" href="inicio.php?root=eperfil&id=' . $value["PerfilId"] . '"><i class="mdi mdi-border-color"></i></a></td>
             </tr>';
        }
    }

    public function EditP()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $table = "perfil";
            $resp = PerfilM::EditP($table, $id);

            if (!is_null($resp)) {
                echo '<div class="form-group">
                        <label for="DescripcionE">Descripción</label>
                        <input type="text" class="form-control" id="DescripcionE" name="DescripcionE" placeholder="Descripción" value="' . $resp["Descripcion"] . '" required>
                        <input type="hidden" name="IdE" value = "' . $resp["PerfilId"] . '">
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Actualizar</button>
                      <a class="btn btn-light" href="inicio.php?root=principal">Cancelar</a>';
            }
        }
    }

    public function UpdateP()
    {
        if (isset($_POST["DescripcionE"])) {
            $perfil = array("Id" => $_POST["IdE"], "Desc" => $_POST["DescripcionE"]);
            $table = "perfil";
            $resp = PerfilM::UpdateP($table, $perfil);

            if ($resp == true) {


                echo '<script type="text/javascript">
                $(function ()
                {
                    window.location.replace("inicio.php?root=perfiles");
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
