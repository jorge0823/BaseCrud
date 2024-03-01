<?php
    $serverName="10.48.100.63"; //serverName\instanceName;
    $connectinInfo=array("Database"=>"MultiServicios", "UID"=>"Conciliaciones", "PWD"=>"Conciliaciones", "CharacterSet" => "UTF-8");
    $con = sqlsrv_connect($serverName, $connectinInfo);    
?>

