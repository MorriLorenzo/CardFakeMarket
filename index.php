<?php

require_once("bootstrapt.php");


foreach($dbh->getGames() as $game){
    echo $game;
    echo "<br>";
};
?>