<?php

$goTo = $_REQUEST["path"];

// Make routes here.
switch (strtolower($goTo)){
    case "index.php": 
        require_once "controller/CostumerController.php";
        $cc = new CostumerController();
        $cc->show();
        break;
    default:
        require_once "view/404.php";
        break;
}
// Config
// require_once 'config.php';

?>