<?php

class Roots{

    public function LoginTemplate()
    {
        include "view/template_login.php";
    }

    public function PortalTemplate()
    {
        include "view/template_portal.php";
    }
    
    public function BaseRoot()
    {
        if(isset($_GET["root"])){
            $roots= $_GET["root"];
        }
        else{
            $roots= "index";
        }

        $resp= Model::RootsModel($roots);
        include $resp;

    }

    public function InicioRoot()
    {
        if(isset($_GET["root"]))
        {
            $roots=$_GET["root"];
        }
        else
        {
            $roots="inicio";
        }

        $resp=Model::InicioModel($roots);
        include $resp;
    }
}

