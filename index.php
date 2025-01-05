<?php
session_start();
require_once("bootstrapt.php");

//pagina di default
$page = "select_game.php";
$games = $dbh->getGames();

require 'template/base.php';
?>