<?php
/* APLICACAO */
define("LOCALHOST", "/gerenciador/");

include_once('app/DB.php');
new DB;
include_once('app/rotas.php');

include('app/view/inc/topo.php');
Rota::usarRota();
include('app/view/inc/rodape.php');
