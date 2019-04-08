<?php
$session = session_start();

include_once "classes.php";

$basketTotalProductTypes = 0 ;
$basket = [];
$i=0;
$singleMovieObject = new Event;
$userObject = new User;

if(isset($_POST['register'])) {
        $username = $_POST['username']; //sanitize
        $firstName = $_POST['firstName']; //sanitize
        $lastName = $_POST['lastName']; //sanitize
        $email = $_POST['email']; //sanitize
        $password = $_POST['password']; //sanitize

        $userObject->username = $username;
        $userObject->firstName = $firstName;
        $userObject->lastName = $lastName;
        $userObject->email = $email;
        $userObject->password = $password;

        $userObject->create_customer();
        $userObject->client_login();
        $_SESSION['user_type'] = "Customer";
        $toGet = $userObject->get_customer_login_by_username();
        $result = $toGet->fetch();
        $_SESSION['userID'] = $result['customerNumber'];
}

if(isset($_POST['client_login'])) {
        $username = $_POST['username']; //sanitize
        $password = $_POST['password']; //sanitize

        $userObject->username = $username;
        $userObject->password = $password;

        $success = $userObject->client_login();
        if($success) {
        $_SESSION['user_type'] = "Customer";
        $toGet = $userObject->get_customer_login_by_username();
        $result = $toGet->fetch();
        $_SESSION['userID'] = $result['customerNumber'];
        } else {

        }
}

if(isset($_POST['client_logout'])) {
        $_SESSION['user_type'] = "Guest";
        $_SESSION['userID'] = "None";
}

if(isset($_COOKIE['basketTotalProductTypes'])) {
    $basketTotalProductTypes = $_COOKIE['basketTotalProductTypes'];
}

include_once "head.php";
include_once "nav.php";

if($mainpage == "client") {
include_once "main.php";
} else {
include_once "mainadmin.php";
}
include_once "footer.php";

?>