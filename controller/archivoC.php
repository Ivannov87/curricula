<?php

class ArchivoC
{
    public function InsertF()
    {

        if (isset($_POST["usuarioIdI"])) {

            

            $table = "files";
            $params = array("nombre" => $_FILES["documentoI"]["name"], "uId" => $_POST["usuarioIdI"]);

            $version = ArchivoM::Version($params, $table);


            $newversion = intval($version[0]) + 1;
            

            $file = fopen($_FILES["documentoI"]["tmp_name"], 'rb');


            $fileinfo = array(
                "Nombre" => $_FILES["documentoI"]["name"],
                "Data" => $file,
                "FechaR" => date("Y-m-d H:i:s"), "UsuarioId" => $_POST["usuarioIdI"],
                "DescCambio" => $_POST["cambioI"]
            );

            $resp = ArchivoM::InsertF($fileinfo, $table);

            if ($resp == true) {
                echo'ok';
                echo '<script type="text/javascript">
                    $(function ()
                    {notifylogin("success","Archivo Cargado Correctamente !")}); 
                  </script>';
               // header("Refresh 3;");
            } else {
                echo'error';
                echo '<script type="text/javascript">
                    $(function ()
                    {notifylogin("error","No se pudo cargar su archivo !")});
                  
                  </script>';
                //header("Refresh 3;");
            }
        }

    }

    public function GetCharged($id)
    {
        $table = "files";
        $resp = ArchivoM::GetCharged($table, $id);


        foreach ($resp as $key => $value) {
            echo '<tr>
            <td>' . $value["FileId"] . '</td>
            <td>' . $value["Nombre"] . '</td>
            <td>' . $value["Version"] . '</td>
            <td>' . $value["DescCambio"] . '</td>
            <td>' . $value["FechaR"] . '</td>
            <td><button>Descargar<button></td>
        </tr>';
        }
    }
    public function GetDoctos()
    {
        $table = "files";
        $resp = ArchivoM::GetDoctos($table);

        foreach ($resp as $key => $value) {
            echo '<tr>
            <td>' . $value["FileId"] . '</td>
            <td>' . $value["Nombre"] . '</td>
            <td>' . $value["Version"] . '</td>
            <td>' . $value["DescCambio"] . '</td>
            <td>' . $value["FechaR"] . '</td>
            <td><button>Descargar<button></td>
        </tr>';
        }
    }
}
