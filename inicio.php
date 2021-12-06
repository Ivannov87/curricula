<?php

require_once "controller/rootsC.php";
require_once "controller/adminC.php";
require_once "controller/archivoC.php";
require_once "controller/areaC.php";
require_once "controller/usuarioC.php";

require_once "model/rootsM.php";
require_once "model/adminM.php";
require_once "model/archivoM.php";
require_once "model/areaM.php";
require_once "model/usuarioM.php";

$roots = new Roots();
$roots -> PortalTemplate();


