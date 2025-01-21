<?php
session_start();
require_once("bootstrapt.php");

// Controlla se 'page' è presente nell'array $_GET
$page = isset($_GET['page']) ? $_GET['page'] : null;

switch ($page) {
    case "select_gameset.php":
        $game = $_GET['game'];
        $sets = $dbh->getGameSets($game);
        break;
    default:
        $page = "select_game.php";
        $games = $dbh->getGames();
        break;
}

require 'template/base.php';
?>
