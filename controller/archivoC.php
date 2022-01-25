<?php

class ArchivoC
{
    public function InsertF()
    {

        if (isset($_POST["usuarioIdI"])) {

            //creamos directorio
            $directory = "documents/" . $_POST["usuarioIdI"];
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            //revisar el documento por hash
            $table = "files";
            $params = array("nombre" => $_FILES["documentoI"]["name"], "uId" => $_POST["usuarioIdI"]);
            $version = ArchivoM::Version($params, $table);
            $newversion = intval($version[0]) + 1;

            $file = $_FILES["documentoI"]["tmp_name"];
            $filename = strval($newversion) . "_" . $_FILES["documentoI"]["name"];
            $size = $_FILES["documentoI"]["size"];
            $type = $_FILES["documentoI"]["type"];

            $fileinfo = array(
                "AreaId" => $_POST["areaId"],
                "Directory" => $directory,
                "Nombre" => $filename,
                "Materia"=> $_POST["materiaI"],
                "Type" => $type,
                "Size" => $size,
                "Version" => $newversion,
                "FechaR" =>  date("Y-m-d H:i:s"),
                "UsuarioId" => $_POST["usuarioIdI"],
                "DescCambio" => $_POST["cambioI"]
            );

            if (move_uploaded_file($file, $directory . "/" . $filename)) {

                $resp = ArchivoM::InsertF($fileinfo, $table);

                if ($resp == true) {

                    //consultar totales y cargados y actualizar los contadores de las variables de sesion
                    if (isset($_SESSION["usrId"])) {
                        $table = "files";
                        $cargados = AdminM::Cargados($_SESSION["usrId"], $table);

                        if (is_null($cargados[0]))
                            $cargados[0] = 0;

                        if ($_SESSION["IsAdmin"] == true) {
                            $totales = AdminM::Totales($table);
                        } else {
                            $totales[0] = 0;
                        }

                        if (is_null($totales[0]))
                            $totales[0] = 0;

                        $_SESSION["Tot"] = $totales[0];
                        $_SESSION["Ups"] = $cargados[0];
                    }

                    // para los totales en la pagina principal 
                    echo '<script type="text/javascript">
                    $(function ()
                    {notifylogin("success","Archivo Cargado Correctamente !")}); 
                  </script>';
                    if (!headers_sent()) {
                        header("Refresh 3;");
                    }
                } else {
                    //echo'error';
                    echo '<script type="text/javascript">
                    $(function ()
                    {notifylogin("error","No se pudo cargar su archivo !")});
                  
                  </script>';
                    if (!headers_sent()) {
                        header("Refresh 3;");
                    }
                }
            } else {

                echo  '<script type="text/javascript">
                    $(function ()
                    {notifylogin("error","No se pudo cargar su archivo, el archivo no se pudo mover a destino !")});
                    </script>';
                if (!headers_sent()) {
                    header("Refresh 3;");
                }
            }
        }
    }

    //cargados
    public function GetCharged($id)
    {
        $table = "files";
        $resp = ArchivoM::GetCharged($table, $id);


        foreach ($resp as $key => $value) {

            //     echo '<tr>
            //     <td>' . $value["FileId"] . '</td>
            //     <td>' . $value["Nombre"] . '</td>
            //     <td>' . $value["Version"] . '</td>
            //     <td>' . $value["DescCambio"] . '</td>
            //     <td>' . $value["FechaR"] . '</td>
            //     <td>
            //     <button type="button" class="btn btn-primary text-white" onclick="inicio.php?root=download&id=' . base64_encode($value["Directory"] . "/" . $value["Nombre"]) . '"><i class="mdi mdi-download"></i></button>

            //     </td>
            // </tr>';


            echo '<tr>
        <td>' . $value["FileId"] . '</td>
        <td>' . $value["Area"] . '</td>
        <td>' . $value["Nombre"] . '</td>
        <td>' . $value["Materia"] . '</td>
        <td>' . $value["Version"] . '</td>
        <td>' . $value["DescCambio"] . '</td>
        <td>' . $value["FechaR"] . '</td>
        <td>
        <button type="button" class="btn btn-primary text-white" onclick="DF(\'' . base64_encode($value["Directory"] . "/" . $value["Nombre"]) . '\');"><i class="mdi mdi-download"></i></button>
        </td>
         </tr>';
        }
    }
    //generados
    public function GetDoctos()
    {
        if (isset($_SESSION["usrId"])) {
            $id = $_SESSION["usrId"];
            $table = "files";
            $resp = ArchivoM::GetDoctos($table, $id);

            if (!is_null($resp)) {

                foreach ($resp as $key => $value) {
                    echo '<tr>
                        <td>' . $value["FileId"] . '</td>
                        <td>' . $value["Area"] . '</td>
                        <td>' . $value["Nombre"] . '</td>
                        <td>' . $value["Materia"] . '</td>
                        <td>' . $value["Version"] . '</td>
                        <td>' . $value["DescCambio"] . '</td>
                        <td>' . $value["FechaR"] . '</td>
                        <td>' . $value["Usuario"] . '</td>
                        <td>
                            <button type="button" class="btn btn-primary text-white" onclick="DF(\'' . base64_encode($value["Directory"] . "/" . $value["Nombre"]) . '\');"><i class="mdi mdi-download"></i></button>
                        </td>
                    </tr>';

                }
            }
        }
    }

    public function DownloadFile()
    {


        if (!is_null($_POST["Id"])) {


            $table = "files";
            $id = $_POST["Id"];
            $resp = ArchivoM::GetFile($table, $id);
            //if (headers_sent()) {
            //header("Pragma: public");
            //header("Expires: 0");
            //header("Cache-Control: no-cache, must-revalidate");
            // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            // header("Cache-Control: public");
            // header('Content-Type: application/octet-stream');
            // header('Content-Disposition: attachment; filename=' . $resp["Nombre"]);
            // header("Content-Description: File Transfer");
            // header("Content-Transfer-Encoding: binary");
            //header('Content-Length: ' . $resp["size"] . '');
            $fullname = $resp["Directory"] . "/" . $resp["Nombre"];

            echo $fullname;
            exit;
            // if (!headers_sent()) {
            //     header("location:inicio.php?root=cargados");
            //     exit;
            // }

            // $fullname = $resp["Directory"] . "/" . $resp["Nombre"];
            // echo '<script type="text/javascript">
            //     $(function ()
            //     {window.open("' . $fullname . '", "_blank")});

            //     </script>';


            //}
        } else {
            echo '<script type="text/javascript">
            $(function ()
            {notifylogin("error","No se pudo descargar su archivo !")});

          </script>';
            if (!headers_sent()) {
                header("Refresh 3;");
            }
        }
    }
}
