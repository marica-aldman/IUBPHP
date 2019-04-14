<?php

    //check if we have change the details of the user

    $userObject = new user;

    if(isset($_POST['saveDetails'])) {
        //sanitize input
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_MAGIC_QUOTES);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_MAGIC_QUOTES);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_EMAIL);
        
        $userObject->username = $username;
        $test = $userObject->check_username();
        if(!$test) {

        $userObject->firstName = $firstName;
        $userObject->lastName = $lastName;

        $userObject->update_customer();
        } else {
            $err_message = "There is already a user with that email adress.";
        }
    }

    //get user
    
    if($_SESSION['userID'] != "None") {
        $userObject->username = $_SESSION['userID'];

        $result = $userObject->get_customer();

        while($row = $result->fetch()) {
    
?>

<section class="customer_profile">
        <div>
            <div>
                <?php echo $err_message; ?>
            </div>
        </div>
        <div>
            <div>
                Förnamn
            </div>
            <div>
                <?php echo $row['firstName']; ?>
            </div>
        </div>
        <div>
            <div>
                Efternamn
            </div>
            <div>
                <?php echo $row['lastName']; ?>
            </div>
        </div>
        <div>
            <div>
                Email
            </div>
            <div>
                <?php echo $row['username']; ?>
            </div>
        </div>
        <div>
            <form method="post" action="index.php">
                <input type="hidden" name="username" value="<?php echo $row['username']; ?>">
                <button name="page" value="changeDetails">Ändra uppgifter</button>
                <button name="page" value="changeCustomerPassword">Ändra lösenord</button>
            </form>
        </div>
    </section>
<?php 

        } //selected data on customer
    } // if customer is logged in
?>