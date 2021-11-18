<?php

require_once "controller/rootsC.php";
require_once "controller/adminC.php";
require_once "controller/archivoC.php";
require_once "model/rootsM.php";
require_once "model/adminM.php";
require_once "model/archivoM.php";

$roots = new Roots();
$roots -> PortalTemplate();


