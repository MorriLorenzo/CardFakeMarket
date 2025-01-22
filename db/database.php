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
    /*
    function insertCard(...){
        //TODO
    }*/
}