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

    //Gestione carrello per i bottoni di rimozione, aggiunta e sottrazione
    public function increaseQuantity($itemId, $userEmail) {
        $query = "UPDATE cart_card cc
                  JOIN cart ca ON ca.id = cc.cart_id
                  SET cc.quantity = cc.quantity + 1
                  WHERE cc.card_code = ? AND ca.user_email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is', $itemId, $userEmail);
        $stmt->execute();
    }
    
    public function decreaseQuantity($itemId, $userEmail) {
        $query = "UPDATE cart_card cc
                  JOIN cart ca ON ca.id = cc.cart_id
                  SET cc.quantity = cc.quantity - 1
                  WHERE cc.card_code = ? AND ca.user_email = ? AND cc.quantity > 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is', $itemId, $userEmail);
        $stmt->execute();
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

    public function getCart($userEmail){
        $query = "SELECT 
        c.code AS card_code,
        c.description AS card_description,
        c.image AS card_image,
        c.price AS card_price,
        cc.quantity AS card_quantity
    FROM 
        cart_card cc
    JOIN 
        cart ca ON ca.id = cc.cart_id
    JOIN 
        card c ON c.code = cc.card_code
    WHERE 
        ca.user_email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        $cart = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cart[] = array(
                    'card_code' => $row['card_code'],
                    'card_description' => $row['card_description'],
                    'card_image' => $row['card_image'],
                    'card_price' => $row['card_price'],
                    'card_quantity' => $row['card_quantity']
                );
            }
        }
        return $cart;
    }

    public function removeItemFromCart($itemId, $userEmail) {
        $query = "DELETE cc FROM cart_card cc
                  JOIN cart ca ON ca.id = cc.cart_id
                  WHERE cc.card_code = ? AND ca.user_email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is', $itemId, $userEmail);
        $stmt->execute();
    }
    


    public function removeAllItemsFromCart($userEmail) {
        $query = "DELETE cc FROM cart_card cc
                  JOIN cart ca ON ca.id = cc.cart_id
                  WHERE ca.user_email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();
    }

}