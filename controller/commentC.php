<?php
class CommentC
{
    public function InsertComment()
    {
        if (isset($_POST["UsuarioI"])) {
            $table = "comentario";
            $info = array(
                "R" => $_SESSION["usrId"],
                "D" => $_POST["UsuarioI"],
                "C" => $_POST["CommentI"],
                "S" => "0",
                "FR" => date("Y-m-d H:i:s")
            );

            $resp = CommentM::InsertComment($table, $info);

            if ($resp == true) {

                echo '<script type="text/javascript">
                        $(function ()
                         {notifylogin("success"," Comentario enviado !")}); 
                      </script>';
                if (!headers_sent()) {
                    header("Refresh 3;");
                }
            } else {

                echo  '<script type="text/javascript">
                        $(function ()
                        {notifylogin("error","No se pudo enviar comentario !")});
                       </script>';
                if (!headers_sent()) {
                    header("Refresh 3;");
                }
            }
        }
    }

    public function Recibidos()
    {
        if (isset($_SESSION["usrId"])) {

            $table = "comentario";
            $id = $_SESSION["usrId"];
            $recibidos = AdminM::Recibidos($table, $id);
            $_SESSION["Recibidos"] = $recibidos[0];

            if ($recibidos[0] > 0) {

                $resp = CommentM::Recibidos($table, $id);

                foreach ($resp as $key => $value) {

                    // if ($value["Status"] == 0) {
                    echo '<div class="row justify-content-center">
                        <div class="col-md-3 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title text-lowercase">' . $value["Remitente"] . '</h4> &nbsp;
                                        <p class="card-text text-muted text-right">
                                            <a href="inicio.php?root=ucomment&idu=' .  $value["CommentId"] . '" title="marcar como leido">
                                                <i class="mdi mdi-check-circle-outline text-info"></i>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="media">
                                        <i class="mdi mdi-comment-outline icon-md text-info d-flex align-self-center me-3"></i>
                                        <div class="media-body">
                                            <p class="card-text">' . $value["Mensaje"] . '</p>
                                            <p class="card-text text-muted">' . $value["FechaR"] . '</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                    //     } else if ($value["Status"] == 1) {
                    //         echo '<div class="row justify-content-center">
                    //     <div class="col-md-3 grid-margin stretch-card">
                    //         <div class="card">
                    //             <div class="card-body">
                    //                 <div class="d-flex flex-row justify-content-between">
                    //                     <h4 class="card-title text-lowercase">' . $value["Remitente"] . '</h4> &nbsp;
                    //                     <p class="card-text text-muted text-right">
                    //                     </p>
                    //                 </div>
                    //                 <div class="media">
                    //                     <i class="mdi mdi-comment-outline icon-md text-info d-flex align-self-center me-3"></i>
                    //                     <div class="media-body">
                    //                         <p class="card-text text-muted">' . $value["Mensaje"] . '</p>
                    //                         <p class="card-text text-muted">' . $value["FechaR"] . '</p>
                    //                     </div>
                    //                 </div>
                    //             </div>
                    //         </div>
                    //     </div>
                    // </div>';
                    //     }
                }
            } else {

                echo '<div class="row justify-content-center">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                                <p class="card-title"> Aviso </p> &nbsp;
                            </div>
                            <div class="media">
                                <i class="mdi mdi-comment-remove-outline icon-md text-danger d-flex align-self-center me-3"></i>
                                <div class="media-body">
                                    <p class="card-text">No hay Mensajes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            }
        }
    }

    public function UpdateC()
    {
        if (isset($_GET["idu"])) {
            $info = array("id" => $_GET["idu"], "status" => 1);
            $table = "comentario";
            $resp = CommentM::UpdateC($table, $info);
            if ($resp == true) {

                $table = "comentario";
                $id = $_SESSION["usrId"];
                $recibidos = AdminM::Recibidos($table, $id);
                $_SESSION["Recibidos"] = $recibidos[0];

                echo '<script type="text/javascript">
                $(function ()
                {
                    window.location.replace("inicio.php?root=commentr");
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

    public function Enviados()
    {
        if (isset($_SESSION["usrId"])) {

            $table = "comentario";
            $id = $_SESSION["usrId"];
            $enviados = AdminM::Enviados($table, $id);
            $_SESSION["Enviados"] = $enviados[0];

            if ($enviados[0] > 0) {

                $resp = CommentM::Enviados($table, $id);

                foreach ($resp as $key => $value) {

                    if ($value["Status"] == 0) {
                        echo '<div class="row justify-content-center">
                        <div class="col-md-3 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title text-lowercase">' . $value["Remitente"] . '</h4> &nbsp;
                                        <p class="card-text text-muted text-right">
                                           
                                        </p>
                                    </div>
                                    <div class="media">
                                        <i class="mdi mdi-check icon-md text-info d-flex align-self-center me-3"></i>
                                        <div class="media-body">
                                            <p class="card-text">' . $value["Mensaje"] . '</p>
                                            <p class="card-text text-muted">' . $value["FechaR"] . '</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                    } else if ($value["Status"] == 1) {
                        echo '<div class="row justify-content-center">
                            <div class="col-md-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                            <p class="card-text text-muted text-right">
                                            <a href="inicio.php?root=ucomments&idu=' .  $value["CommentId"] . '" title="no volver a mostrar">
                                            <i class="mdi mdi-close text-info"></i>
                                            </a>
                                            </p>
                                        <div class="d-flex flex-row justify-content-between">
                                            <h4 class="card-title text-lowercase">' . $value["Remitente"] . '</h4> &nbsp;
                                        </div>
                                        <div class="media">
                                            <i class="mdi mdi-check-all icon-md text-info d-flex align-self-center me-3"></i>
                                            <div class="media-body">
                                                <p class="card-text text-muted">' . $value["Mensaje"] . '</p>
                                                <p class="card-text text-muted">' . $value["FechaR"] . '</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                }
            } else {

                echo '<div class="row justify-content-center">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                                <p class="card-title"> Aviso </p> &nbsp;
                            </div>
                            <div class="media">
                                <i class="mdi mdi-comment-remove-outline icon-md text-danger d-flex align-self-center me-3"></i>
                                <div class="media-body">
                                    <p class="card-text">No hay Mensajes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            }
        }
    }

    public function UpdateCR()
    {
        if (isset($_GET["idu"])) {
            $info = array("id" => $_GET["idu"], "status" => 2);
            $table = "comentario";
            $resp = CommentM::UpdateC($table, $info);
            if ($resp == true) {

                // $table = "comentario";
                // $id = $_SESSION["usrId"];
                // $recibidos = AdminM::Recibidos($table, $id);
                // $_SESSION["Recibidos"] = $recibidos[0];

                echo '<script type="text/javascript">
                $(function ()
                {
                    window.location.replace("inicio.php?root=comments");
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
