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

    public function getStock($cardCode) {
        $query = "SELECT quantity FROM card WHERE code = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $cardCode);
        $stmt->execute();
        $result = $stmt->get_result();
        $stock = $result->fetch_assoc();
        $stmt->close();
        return $stock['quantity'];
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
    
    public function getCartItemCount($userEmail) {
        $query = "SELECT COUNT(*) as item_count FROM cart_card cc
                  JOIN cart ca ON ca.id = cc.cart_id
                  WHERE ca.user_email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->fetch_assoc()['item_count'];
        $stmt->close();
        
        // Echo JSON direttamente dalla funzione
        echo json_encode(['item_count' => $count]);
        // DAVERIFICARE
        return $count;
    }


    public function removeAllItemsFromCart($userEmail) {
        $query = "DELETE cc FROM cart_card cc
                  JOIN cart ca ON ca.id = cc.cart_id
                  WHERE ca.user_email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();
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

    

    function editCard($code, $language, $image, $description, $set, $quantity, $price) {
        $query = "UPDATE card SET language = ?, image = ?, description = ?, set_code = ?, quantity = ?, price = ? WHERE code = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssidi', $language, $image, $description, $set, $quantity, $price, $code);
        $stmt->execute();
        $stmt->close();
    }

    function insertOrder($user_email, $quantity, $total_price) {
        $query = "INSERT INTO `order` (`order_date`, `quantity`, `total_price`, `user_email`)
                  VALUES (NOW(), ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ids', $quantity, $total_price, $user_email);
        $stmt->execute();
        return $this->db->insert_id;
    }



    function insertOrderCard($order_id, $card_code, $quantity) {
        $query = "INSERT INTO `order_card` (`order_id`, `card_code`, `quantity`)
                  VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii', $order_id, $card_code, $quantity);
        $stmt->execute();
        $stmt->close();
        return true;
    }

}
?>