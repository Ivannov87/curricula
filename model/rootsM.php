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
            $page = $roots . ".php";
        } else if ($roots == "registrar" || $roots == "usuarios") {
            $page = "view/modules/" . $roots . ".php";
        } else if ($roots == "index") {
            $page = "view/modules/ingreso.php";
        } else {
            $page = "view/modules/ingreso.php";
        }

        return $page;
    }
}
