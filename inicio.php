<?php

require_once "controller/rootsC.php";
require_once "controller/adminC.php";
require_once "controller/archivoC.php";
require_once "controller/areaC.php";
require_once "controller/usuarioC.php";
require_once "controller/perfilC.php";
require_once "controller/accesoC.php";
require_once "controller/estadisticaC.php";
require_once "controller/commentC.php";
require_once "controller/permisoC.php";

require_once "model/rootsM.php";
require_once "model/adminM.php";
require_once "model/archivoM.php";
require_once "model/areaM.php";
require_once "model/usuarioM.php";
require_once "model/perfilM.php";
require_once "model/accesoM.php";
require_once "model/estadisticaM.php";
require_once "model/commentM.php";
require_once "model/permisoM.php";
$roots = new Roots();
$roots -> PortalTemplate();


