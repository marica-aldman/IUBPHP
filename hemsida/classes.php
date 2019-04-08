<?php

class db_connection {

    public function create_connection() {
        $host = 'localhost'; //'my73b.sqlserver.se';
        $db   = 'biljettsystem'; //'236969-biljettsystem';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        $user = 'root'; //'236969_gl70572';
        $pass =  '';//'keyncat2';

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
        
        $sql = "SELECT * FROM admins WHERE username = " .  $this->username;

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;
    }

    public function get_admin_by_adminID() {
        
        $sql = "SELECT * FROM admins WHERE adminID = " .  $this->adminID;

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;
    }

    public function admin_login() {
        
        $sql = "SELECT * FROM admins WHERE username = " .  $this->username;

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

        $result = $toGet->fetch();

    }

    function create_admin() {
        
        $sql = "INSERT INTO admins (adminID, username, password)
                VALUES ('" . $this->adminID . "', '" . $this->username . "', '" . $this->password ."')";

        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

    }

    function delete_admin() {

        $sql = "DELETE FROM admins
                WHERE adminID = $this->adminID"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

    }
}

class user {
    public $customerNumber;
    public $username;
    public $password;
    public $firstName;
    public $lastName;
    public $email;
    private $pdo;

    function __construct() {
        $db_con = new db_connection;
        $this->pdo = $db_con->create_connection();
    }
    
    public function client_login() {
        
        $sql = "SELECT * FROM customer_login WHERE username = " .  $this->username;

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
    
    public function change_password() {
        
        $sql = "SELECT * FROM customer_login WHERE username = " .  $this->username;

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

    function get_customer_login_by_username() {
        
        $sql = "SELECT * FROM customer_login WHERE username = " .  $this->username;

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        $result = $toGet->fetch();
    }

    function get_customer_login_by_customerNumber() {
        
        $sql = "SELECT * FROM customer_login WHERE customerNumber = " .  $this->customerNumber;

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        $result = $toGet->fetch();
    }

    function get_customer_by_customerNumber() {
        
        $sql = "SELECT * FROM customers WHERE customerNumber = " .  $this->customerNumber;

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        $result = $toGet->fetch();
    }

    function get_all_customers() {
        
        $sql = "SELECT * FROM customers";

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        $result = $toGet->fetch();
        
    }
    
    function update_customer() {
        
        $sql = "UPDATE customers
                SET lastName = $this->lastName,
                    firstname = $this->firstName
                WHERE customerNumber = $this->customernumber";

        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

    }

    function create_customer() {
        
        $sql = "INSERT INTO customers (customerNumber, lastName, firstName)
                VALUES ('" . $this->customerNumber . "', '" . $this->lastName . "', '" . $this->firstName ."')";

        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

        $sql = "INSERT INTO customer_login (customerNumber, username, password)
                VALUES ('" . $this->customerNumber . "', '" . $this->username . "', '" .  $this->password . "')"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

    }
    
    function delete_customer() {
        
        $sql = "UPDATE customers
                SET lastName = 'deleted',
                    firstname = 'deleted'
                WHERE customerNumber = $this->customernumber";

        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

        $sql = "DELETE FROM customer_login
                WHERE customerNumber = $this->customerNumber"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment
    }
}

class adress {
    public $adressID;
    public $customerNumber;
    public $streetadress;
    public $postalnumber;
    public $postaltown;
    private $pdo;
    
    function __construct() {
        $db_con = new db_connection;
        $this->pdo = $db_con->create_connection();
    }
    
    public function get_all_adresses() {
        
        $sql = "SELECT * FROM adresses";

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        $result = $toGet->fetch();

    }
    
    public function get_customer_adresses() {
        
        $sql = "SELECT * FROM adresses WHERE customerNumber = " .  $this->customerNumber;

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }
    
    public function update_customer_adress() {
        
        $sql = "UPDATE adresses
                SET streetadress = $this->streetadress,
                    postalnumber = $this->postalnumber,
                    postaltown = $this->postaltown
                WHERE adressID = $this->adressID";

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }
    
    public function create_customer_adress() {
        
        $sql = "INSERT INTO adresses (adressID, customerNumber, streetadress, postalnumber, postaltown)
                VALUES ('" . $this->adressID . "', '" . $this->customerNumber . "', '" .  $this->streetadress . "', '" .  $this->postalnumber . "', '" .  $this->postaltown . "')"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

    }
    
    public function delete_customer_adress() {
        
        $sql = "SELECT * FROM adresses WHERE customerNumber = " .  $this->customerNumber;

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

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
        $toDo->execute(); // execute sql statment
        
    }

    function update_event() {

        $sql = "UPDATE events
                SET eventName = $this->eventName,
                    premere = $this->premere,
                    finished = $this->finished,
                    director = $this->director,
                    originalLanguage = $this->originalLanguage,
                    info = $this->info,
                    price = $this->price,
                    picture = $this->picture
                WHERE eventID = $this->eventID"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment
        
    }

    function delete_event() {
        //OBS do never delete an event unless it was never supposed to be there AND no ticketes have been sold/created. If tickets have been sold/created use update and set the events finished date

        $sql = "DELETE FROM events
                WHERE eventID = $this->eventID"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment
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

    function get_venue() {

        $sql = "SELECT * FROM venue WHERE venueID = $this->venueID"; // sql statement

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
        $toDo->execute(); // execute sql statment

    }

    function update_venue() {

        $sql = "INSERT INTO venue (venueID, theater, size)
                VALUES ('" . $this->venueID . "', '" . $this->theater . "', '" .  $this->size . "')"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

    }

    function delete_venue() {
        //OBS do never delete a venue that has been in use. If tickets have ever been created/sold for that venue do not delete it

        $sql = "DELETE FROM venue
                WHERE venueID = $this->customerNumber"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

    }

}

class ticket {
    public $ticketID;
    public $eventDateID;
    public $customerNumber;
    public $used;
    private $pdo;
    
    function __construct() {
        $db_con = new db_connection;
        $this->pdo = $db_con->create_connection();
    }

    function get_ticket() {

        $sql = "SELECT * FROM tickets WHERE ticketID = $this->ticketID"; // sql statement

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

    function create_ticket() {

        $sql = "INSERT INTO tickets (ticketID, eventDateID, customerNumber, used)
                VALUES ('" . $this->ticketID . "', '" . $this->eventDateID . "', '" .  $this->customerNumber . "', '" .  $this->used . "')"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

    }

    function update_ticket() {

        $sql = "UPDATE tickets
                SET eventDateID = $this->eventDateID,
                    customerNumber = $this->customerNumber,
                    used = $this->used
                WHERE ticketID = $this->ticketID"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

    }

    function delete_ticket() {

        $sql = "DELETE FROM tickets
                WHERE ticketID = $this->ticketID"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

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

    function get_unsoldticket_by_eventID() {

        $sql = "SELECT * FROM eventdate WHERE eventID = $this->eventID"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }

    function get_unsoldtickets() {

        $sql = "SELECT * FROM eventdate"; // sql statement

        $toGet = $this->pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }

    function create_unsoldtickets() {

        $sql = "INSERT INTO eventdate (eventDateID, eventID, venueID, dateAndTime)
                VALUES ('" . $this->eventDateID . "', '" . $this->eventID . "', '" .  $this->venueID . "', '" .  $this->dateAndTime . "')"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

    }

    function update_unsoldtickets() {

        $sql = "UPDATE eventdate
                SET eventID = $this->eventID,
                    venueID = $this->venueID,
                    dateAndTime = $this->dateAndTime
                WHERE eventDateID = $this->eventDateID"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

    }

    function delete_unsoldtickets() {

        //OBS do never delete this unless it was never supposed to be there AND no ticketes have been sold. If tickets have been sold make sure all tickets have been payed back/changed before deleting

        $sql = "DELETE FROM events
                WHERE eventID = $this->eventID"; // sql statement
                
        $toDo = $this->pdo->prepare($sql); // prepared statement
        $toDo->execute(); // execute sql statment

    }
}

?>