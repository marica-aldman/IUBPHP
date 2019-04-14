<?php

class db_connection {

    public function create_connection() {
        $host = 'my73b.sqlserver.se';
        $db   = '236969-biljettsystem';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        $user = '236969_gl70572';
        $pass =  'keyncat2';

        try {
            $pdo = new PDO($dsn, $user, $pass);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        return $pdo;
    }
}

class admin {
    public $adminID;
    public $username;
    public $password;
    private $pdo;

    function __construct() {
        $db_con = new db_connection;
        $this->pdo = $db_con->create_connection();
    }

    public function get_admin_by_username() {
        
        $sql = "SELECT * FROM admins WHERE username = '" .  $this->username . "'";

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;
    }

    public function check_admin_username() {
        
        $sql = "SELECT * FROM admins WHERE username = '" .  $this->username . "'";

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;
    }

    public function admin_login() {
        
        $sql = "SELECT * FROM admins WHERE username = '" .  $this->username . "'";

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        $result = $toGet->fetch();

        if($result != NULL) {
            if($this->password === $result['password']) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }

    }

    function get_all_admins() {
        
        $sql = "SELECT * FROM admins";

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;
    }

    function create_admin() {
        
        $sql = "INSERT INTO admins (username, password)
                VALUES ('" . $this->username . "', '" . $this->password ."')";

        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment

        return $test;
    }

    function update_admin_password() {
        
        $sql = "UPDATE admins
                SET password = '" . $this->password . "'
                WHERE username = '" . $this->username . "'";

        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment

        return $test;
    }

    function delete_admin() {

        $sql = "DELETE FROM admins
                WHERE adminID = '" . $this->username . "'"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment

        return $test;
    }
}

class user {
    public $username;
    public $password;
    public $firstName;
    public $lastName;
    private $pdo;

    function __construct() {
        $db_con = new db_connection;
        $this->pdo = $db_con->create_connection();
    }

    public function client_login() {

        $sql = "SELECT * FROM customer_login WHERE username = '" . $this->username . "'";

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        $result = $toGet->fetch();

        if($result != NULL) {
            if(password_verify($this->password, $result['password'])) {
                return "same";
            } else {
                return "not same";
            }
        } else {
            return "no such user";
        }

    }
    
    public function change_password() {
        
        $sql = "UPDATE customer_login
                SET password = '" .  $this->password . "'
                WHERE username = '" .  $this->username . "'";

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

    }

    function check_username() {
        $sql = "SELECT * FROM customer_login WHERE username = '" .  $this->username . "'";

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        if ($test = $toGet->fetch()) {
            return true;
        } else {
        return false;
        }
    }

    function get_customer_login_by_username() {
        
        $sql = "SELECT * FROM customer_login WHERE username = '" .  $this->username . "'";

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;
    }

    function get_customer() {
        
        $sql = "SELECT * FROM customers WHERE username = '" .  $this->username . "'";

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;
    }

    function get_all_customers() {
        
        $sql = "SELECT * FROM customers";

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;
        
    }
    
    function update_customer() {
        
        $sql = "UPDATE customers
                SET lastName = '" . $this->lastName . "',
                    firstname = '" . $this->firstName . "'
                WHERE username = '" . $this->username . "'";

        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

    }

    function create_customer() {
        
        $sql = "INSERT INTO customers (username, lastName, firstName)
                VALUES ('" . $this->username . "', '" . $this->lastName . "', '" . $this->firstName ."')";

        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

        $sql = "INSERT INTO customer_login (username, password)
                VALUES ('" . $this->username . "', '" .  $this->password . "')"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

    }
    
    function delete_customer() {

        $sql = "DELETE FROM customer_login
                WHERE username = '" . $this->username . "'"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

        $sql = "UPDATE customers
                SET lastName = 'deleted',
                    firstname = 'deleted'
                WHERE username = '" . $this->username . "'";

        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment
    }
}

class event {
    public $eventID;
    public $eventName;
    public $premere;
    public $finished;
    public $director;
    public $originalLanguage;
    public $info;
    public $price;
    public $picture;
    private $pdo;

    function __construct() {
        $db_con = new db_connection;
        $this->pdo = $db_con->create_connection();
    }

    function get_new_eventID() {

        $sql = "SELECT MAX(eventID) FROM events"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        $result = $toGet->fetch();
        $newID = $result['MAX(eventID)'] + 1;

        return $newID;

    }

    function get_all_events() {

        $sql = "SELECT * FROM events"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }

    function get_event() {

        $sql = "SELECT * FROM events WHERE eventID = '". $this->eventID . "'"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;
        
    }

    function create_event() {

        $sql = "INSERT INTO events (eventID, eventName, premere, finished, director, originalLanguage, info, price, picture)
                VALUES ('" . $this->eventID . "', '" . $this->eventName . "', '" .  $this->premere . "', '" .  $this->finished . "', '" .  $this->director . "', '" .  $this->originalLanguage . "', '" .  $this->info . "', '" .  $this->price . "', '" .  $this->picture . "')"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment
        
        return $test;
        
    }

    function update_event() {
        $sql = "";

        if ($this->finished == null) {
        $sql = "UPDATE events
                SET eventName = '" . $this->eventName . "',
                    premere = '" . $this->premere . "',
                    director = '" . $this->director . "',
                    originalLanguage = '" . $this->originalLanguage . "',
                    info = '" . $this->info . "',
                    price = '" . $this->price . "',
                    picture = '" . $this->picture . "'
                WHERE eventID = '" . $this->eventID . "'"; // sql statement
        } else {
            $sql = "UPDATE events
                    SET eventName = '" . $this->eventName . "',
                        premere = '" . $this->premere . "',
                        finished = '" . $this->finished . "',
                        director = '" . $this->director . "',
                        originalLanguage = '" . $this->originalLanguage . "',
                        info = '" . $this->info . "',
                        price = '" . $this->price . "',
                        picture = '" . $this->picture . "'
                    WHERE eventID = '" . $this->eventID . "'"; // sql statement
        }
        
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment
        
        return $test;
    }

    function delete_event() {
        //OBS do never delete an event unless it was never supposed to be there AND no ticketes have been sold/created. If tickets have been sold/created use update and set the events finished date

        $sql = "DELETE FROM events
                WHERE eventID = '" . $this->eventID . "'"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment
        
        return $test;
    }

}

class venue {
    public $venueID;
    public $theater;
    public $size;
    private $pdo;
    
    function __construct() {
        $db_con = new db_connection;
        $this->pdo = $db_con->create_connection();
    }

    function get_new_venueID() {

        $sql = "SELECT MAX(venueID) FROM venue"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        $result = $toGet->fetch();
        $newID = $result['MAX(venueID)'] + 1;

        return $newID;

    }

    function get_venue() {

        $sql = "SELECT * FROM venue WHERE venueID = '" . $this->venueID . "'"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }

    function get_all_venues() {

        $sql = "SELECT * FROM venue"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }

    function create_venue() {

        $sql = "INSERT INTO venue (venueID, theater, size)
                VALUES ('" . $this->venueID . "', '" . $this->theater . "', '" .  $this->size . "')"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment

        return $test;
    }

    function update_venue() {

        $sql = "UPDATE venue
                SET theater = '" . $this->theater . "',
                    size = '" . $this->size . "'
                WHERE venueID = '" . $this->venueID . "'"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment

        return $test;
    }

    function delete_venue() {
        //OBS do never delete a venue that has been in use. If tickets have ever been created/sold for that venue do not delete it

        $sql = "DELETE FROM venue
                WHERE venueID = '" . $this->username . "'"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment

        return $test;
    }

}

class order {
    public $orderID;
    public $username;
    private $pdo;
    
    function __construct() {
        $db_con = new db_connection;
        $this->pdo = $db_con->create_connection();
    }

    function get_all_orders_by_customer() {

        $sql = "SELECT * FROM orders WHERE username = '" . $this->username . "'"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }

    function get_order() {
        
        $sql = "SELECT * FROM orders WHERE orderID = '" . $this->orderID . "'"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;
    }

    function get_new_orderID() {
        
        $sql = "SELECT MAX(orderID) FROM orders"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment
        
        $result = $toGet->fetch();

        $orderID = $result['MAX(orderID)'] + 1;

        return $orderID;
        
    }

    function create_order() {

        $sql = "INSERT INTO orders (orderID, username)
                VALUES ('" . $this->orderID . "', '" .  $this->username . "')"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment

        return $test;

    }

    function validate_order() {
        
        $sql = "SELECT * FROM tickets WHERE orderID = '" . $this->orderID . "'"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment
        $i = 0;
        $err = "";
        while($tickets = $toGet->fetch()) {
            $ticketObject = new ticket;
            $ticketObject->ticketID = $tickets['ticketID'];
            $result = $ticketObject->get_ticket();
            $ticketData = $result->fetch();
            if($ticketData['used'] == 1) {
                $err = $err . $ticketData['ticketID'] . " already used. ";
            } else if($err == "") {
            $ticketObject->validate_ticket();
            }
            $i++;
        }

        if($i == 0) {
            $err = "No matching tickets";
        }

        return $err;

    }

    function invalidate_order() {
        
        $sql = "SELECT * FROM tickets WHERE orderID = '" . $this->orderID . "'"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment
        $i = 0;
        $err = "";
        while($tickets = $toGet->fetch()) {
            $ticketObject = new ticket;
            $ticketObject->ticketID = $tickets['ticketID'];
            $result = $ticketObject->get_ticket();
            $ticketData = $result->fetch();
            if(($ticketData['used'] == 1)) {
                $ticketObject->invalidate_ticket();
            } else {
                $err = $err . $ticketData['ticketID'] . " not used. ";
            }
            $i++;
        }

        if($i == 0) {
            $err = "No matching tickets";
        }

        return $err;

    }
}

class ticket {
    public $ticketID;
    public $eventDateID;
    public $username;
    public $used;
    private $pdo;
    
    function __construct() {
        $db_con = new db_connection;
        $this->pdo = $db_con->create_connection();
    }

    function get_ticket() {

        $sql = "SELECT * FROM tickets WHERE ticketID = '" . $this->ticketID . "'"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }

    function get_all_tickets() {

        $sql = "SELECT * FROM tickets"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }

    function get_new_ticketID() {
        
        $sql = "SELECT MAX(ticketID) FROM tickets"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment
        
        $result = $toGet->fetch();

        $ticketID = $result['MAX(ticketID)'] + 1;

        return $ticketID;

    }

    function get_ticket_by_eventDateID() {

        $sql = "SELECT * FROM tickets WHERE eventDateID = '" . $this->eventDateID . "'"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }

    function get_ticket_by_orderID() {

        $sql = "SELECT * FROM tickets WHERE orderID = '" . $this->orderID . "'"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }

    function create_ticket() {

        $sql = "INSERT INTO tickets (ticketID, eventDateID, username, orderID, used)
                VALUES ('" . $this->ticketID . "', '" . $this->eventDateID . "', '" .  $this->username . "', '" .  $this->orderID . "', '" .  $this->used . "')"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment

        return $test;

    }

    function update_ticket() {

        $sql = "UPDATE tickets
                SET eventDateID = '" . $this->eventDateID . ",
                    username = '" . $this->username . ",
                    used = '" . $this->used . "
                WHERE ticketID = '" . $this->ticketID . "'"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment

        return $test;

    }

    function delete_ticket() {

        $sql = "DELETE FROM tickets
                WHERE ticketID = '" . $this->ticketID . "'"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment

        return $test;

    }
    
    function validate_ticket() {

        $sql = "UPDATE tickets
                SET used = 1
                WHERE ticketID = '" . $this->ticketID . "'"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment

        return $test;

    }
    
    function invalidate_ticket() {

        $sql = "UPDATE tickets
                SET used = 0
                WHERE ticketID = '" . $this->ticketID . "'"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment

        return $test;

    }
}

class unsoldTicket {
    public $eventDateID;
    public $eventID;
    public $venueID;
    public $dateAndTime;
    private $pdo;
    
    function __construct() {
        $db_con = new db_connection;
        $this->pdo = $db_con->create_connection();
    }

    function get_unsoldtickets_by_eventID() {

        $sql = "SELECT * FROM eventDate WHERE eventID = '" . $this->eventID . "'"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }

    function get_unsoldtickets_eventDateID() {

        $sql = "SELECT * FROM eventDate WHERE eventDateID = '" . $this->eventDateID . "'"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }

    function get_new_eventDate() {

        $sql = "SELECT MAX(eventDateID) FROM eventDate"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        $result = $toGet->fetch();
        $newID = $result['MAX(eventDateID)'] + 1;

        return $newID;

    }

    function get_unsoldtickets() {

        $sql = "SELECT * FROM eventDate"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }

    function create_unsoldtickets() {

        $sql = "INSERT INTO eventDate (eventDateID, eventID, venueID, dateAndTime)
                VALUES ('" . $this->eventDateID . "', '" . $this->eventID . "', '" .  $this->venueID . "', '" .  $this->dateAndTime . "')"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment

        return $test;
    }

    function update_unsoldtickets() {

        $sql = "UPDATE eventDate
                SET eventID = '" . $this->eventID . ",
                    venueID = '" . $this->venueID . ",
                    dateAndTime = '" . $this->dateAndTime . "
                WHERE eventDateID = '" . $this->eventDateID . "'"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment

        return $test;
    }

    function delete_unsoldtickets() {

        //OBS do never delete this unless it was never supposed to be there AND no ticketes have been sold. If tickets have been sold make sure all tickets have been payed back/changed before deleting

        $sql = "DELETE FROM eventDate
                WHERE eventDateID = '" . $this->eventDateID . "'"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $test = $toDo->execute(); // execute sql statment

        return $test;
    }
}

?>