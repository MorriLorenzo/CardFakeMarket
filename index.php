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
    case "card_table.php":
        $game = $_GET['game'];
        if(isset($_POST['name'])){
            $name = $_POST['name'];
        }
        if(isset($_POST['set'])) {
            $set = $_POST['set'];
        }
        if(isset($_POST['language'])) {
            $language = $_POST['language'];
        }
        if(isset($_POST['name'])) {
            $name = $_POST['name'];
        }
        $cards = $dbh->getFilteredCards($game, $set, $language, $name);
        break;
    default:
        $page = "select_game.php";
        $games = $dbh->getGames();
        break;
}

require 'template/base.php';
?>
