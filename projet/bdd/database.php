<?php
$dbhost = 'mysql-gestion-chambre.alwaysdata.net';
$dbname = 'gestion-chambre_bdd';
$dbuser = '302799';
$dbpswd = 'mariane2002';


try{
    $connect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,
    array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        )
    );
}catch (PDOException $e){
    die("Une erreur ".$e->getMessage());
}
?>