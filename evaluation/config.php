<?php 
session_start();

$PARAM_hote='localhost';
$PARAM_port='';
$PARAM_nom_bd='exercice';
$PARAM_utilisateur='root';
$PARAM_mot_passe='';

try{
	$bdd = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
	echo addslashes($e->getMessage());
}
?>