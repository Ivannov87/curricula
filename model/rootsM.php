<?php

class Model
{

    static public function RootsModel($roots)
    {
        if ($roots == "ingreso" || $roots == "salir") {
            $page = "view/modules/" . $roots . ".php";
        } else if ($roots == "index") {
            $page = "view/modules/ingreso.php";
        } else {
            $page = "view/modules/ingreso.php";
        }

        return $page;
    }

    static public function InicioModel($roots)
    {
        if ($roots == "inicio") {
            $page = "view/modules/principal.php";
        } else if ($roots == "registrar" || $roots == "upload" || $roots=="principal" || $roots=="cargados" || $roots=="generados"|| $roots=="download") {
            $page = "view/modules/" . $roots . ".php";
        } else if ($roots == "index") {
            $page = "view/modules/ingreso.php";
        } else {
            $page = "view/modules/ingreso.php";
        }

        return $page;
    }
}
