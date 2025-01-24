<?php

class DatabaseHelper{
    public $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        
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

    function getOrdersByEmail($email) {
        $query = "SELECT * FROM `order` WHERE user_email = ? ORDER BY order_date DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        $orders = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    
        return $orders;
    }
    
    function getOrderDetail($orderId) {
        $query = "SELECT * FROM `order_card` WHERE order_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $orderId);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        $orderDetail = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    
        return $orderDetail;
    }

    function getCardById($cardCode) {
        $query = "SELECT * FROM `card` WHERE code = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $cardCode);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        $card = $result->fetch_assoc();
        $stmt->close();
    
        return $card;
    }

    function isAdmin($email) {
        $query = "SELECT * FROM user WHERE email = ? AND is_admin = 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        $isAdmin = $result->fetch_assoc();
        $stmt->close();
    
        return $isAdmin !== null; // Se esiste un risultato, ritorna true; altrimenti, false
    }
    
    function insertGame($gameName) {
        $query = "INSERT INTO game (name) VALUES (?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $gameName);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    function insertGameSet($name, $date, $game) {
        $query = "INSERT INTO gameset (name, date, game_name) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss', $name, $date, $game);
        $stmt->execute();
    
        $insertId = $this->db->insert_id; // Ottieni l'ID dell'inserimento (valore di 'code')
        $stmt->close();
    
        return $insertId;
    }
    function insertCard($language, $image, $description, $set, $quantity, $price) {
        $query = "INSERT INTO card (language, image, description, set_code, quantity, price) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssid', $language, $image, $description, $set, $quantity, $price);
        $stmt->execute();
        $stmt->close();
    }

    function getSets() {
        $query = "SELECT * FROM GAMESET";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $sets = array();
        
        // Verifica se è stato trovato un risultato
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Aggiungo la riga come array associativo
                $sets[] = $row;
            }
        }
        
        return $sets;
    }
    
    function getNextId($tableName){
        $query = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'cardfakemarket' AND TABLE_NAME = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $tableName);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['AUTO_INCREMENT'];
    }

    function deleteGame($gameName) {
        $query = "DELETE FROM game WHERE name = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $gameName);
        $stmt->execute();
        $stmt->close();
    }

    /**
     * Solo se non ha set associati
     * @param mixed $gameName
     * @param mixed $newGameName
     * @return void
     */
    function editGame($gameName, $newGameName) {
        $query = "UPDATE game SET name = ? WHERE name = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $newGameName, $gameName);
        $stmt->execute();
        $stmt->close();
    }

    function deleteGameSet($gameSetCode) {
        $query = "DELETE FROM gameset WHERE code = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $gameSetCode);
        $stmt->execute();
        $stmt->close();
    }

    function getGameSet($gameSetCode) {
        $query = "SELECT * FROM gameset WHERE code = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $gameSetCode);
        $stmt->execute();
        $result = $stmt->get_result();
        $gameSet = $result->fetch_assoc();
        $stmt->close();
        return $gameSet;
    }

    function editGameSet($gameSetCode, $name, $date, $game) {
        $query = "UPDATE gameset SET name = ?, date = ?, game_name = ? WHERE code = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssi', $name, $date, $game, $gameSetCode);
        $stmt->execute();
        $stmt->close();
    }

    function getCards() {
        $query = "SELECT * FROM card";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $cards = array();
        
        // Verifica se è stato trovato un risultato
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Aggiungo la riga come array associativo
                $cards[] = $row;
            }
        }
        
        return $cards;
    }

    function deleteCard($cardCode) {
        $query = "DELETE FROM card WHERE code = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $cardCode);
        $stmt->execute();
        $stmt->close();
    }
}