<?php

class DatabaseHelper{
    public $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        
    }

    function getFilteredCards($game, $language, $set, $name) {
        // Costruisci dinamicamente la query in base ai parametri passati
        $query = "SELECT C.code,C.description,C.image,C.price,C.quantity,GS.name FROM CARD AS C
                                    JOIN GAMESET AS GS ON C.set_code=GS.code 
                                    JOIN GAME ON GAME.name=GS.game_name 
                                    WHERE GAME.name = ?"; // Aggiungi una condizione base che non influisce
        $params = [];
        $params[] = $game;
        $paramTypes = 's'; // Stringa per i tipi di parametri
    
        // Aggiungi la condizione per la lingua se è fornita
        if ($language !== "") {
            $query .= " AND C.language = ?";
            $params[] = $language;
            $paramTypes .= 's'; // 's' per stringa
        }
    
        // Aggiungi la condizione per il set se è fornito
        if ($set !== "") {
            $query .= " AND GS.name = ?";
            $params[] = $set;
            $paramTypes .= 's'; // 's' per stringa
        }

        if ($name !== "") {
            $query .= " AND C.description = ?";
            $params[] = $name;
            $paramTypes .= 's'; // 's' per stringa
        }
        
        // Prepara la query
        $stmt = $this->db->prepare($query);
    
        // Associa i parametri se presenti
        if (!empty($params)) {
            $stmt->bind_param($paramTypes, ...$params);
        }
    
        // Esegui la query
        $stmt->execute();
        
        // Ottieni i risultati
        $result = $stmt->get_result();
        $cards = $result->fetch_all(MYSQLI_ASSOC);
    
        // Chiudi la dichiarazione
        $stmt->close();
    
        return $cards;
    }
    

    public function getLanguages(){
        $query = "SELECT DISTINCT language FROM CARD";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $languages = array();
        // Verifica se è stato trovato un risultato
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                // Aggiungo all'array
                $languages[] = $row['language'];
            }
        }
        return $languages;
    }

    //dato un numero e un gioco, prende carte randomico di esso, restituisce solo il path image
    public function getRandomCards($n,$game){
        $stmt = $this->db->prepare("SELECT * FROM CARD JOIN GAMESET ON CARD.set_code=GAMESET.code 
                                    JOIN GAME ON GAME.name=GAMESET.game_name 
                                    WHERE GAME.name = ? ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('si',$game,$n);
        $stmt->execute();
        $result = $stmt->get_result();

        $cards = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $cards;
    }

    public function getGames(){
        $query = "SELECT * FROM GAME";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $games = array();
        // Verifica se è stato trovato un risultato
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                // Aggiungo all'array
                $games[] = $row['name'];
            }
        }
        return $games;
    }

    public function getGameSets($game){
        $query = "SELECT name FROM GAMESET WHERE GAME_NAME = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $game);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $sets = array();
        // Verifica se è stato trovato un risultato
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                // Aggiungo all'array
                $sets[] = $row['name'];
            }
        }
        return $sets;
    }

    public function checkUser($email, $password){
        $query = "SELECT * FROM USER WHERE Email = ? AND Password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return ($result->num_rows > 0);
    }

    public function insertUser($email, $firstName, $lastName, $address, $isAdmin, $password){
        $query = 'INSERT INTO `user` (`email`, `first_name`, `last_name`, `address`, `is_admin`, `password`) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssis', $email, $firstName, $lastName, $address, $isAdmin, $password);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function insertCart($userEmail){
        $query = 'INSERT INTO `cart` (`user_email`) VALUES (?)';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $userEmail);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEmail($email){
        $query = "SELECT * FROM USER WHERE Email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return ($result->num_rows > 0);
    }
}