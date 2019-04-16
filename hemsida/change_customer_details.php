<?php

    //check if we have change the details of the user

    $userObject = new user;
    $newEmail = true;
    $done = "";

    if(isset($_POST['saveDetails'])) {
        //sanitize input
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_MAGIC_QUOTES);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_MAGIC_QUOTES);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_EMAIL);
        
        $userObject->username = $username;
        if($_SESSION['userID'] != $username) {
            $test = $userObject->check_username();
            $newEmail = true;
        } else {
            $test = false;
            $newEmail = false;
        }
        if($test) {
            $errMessage = "Det finns redan en användare med den emailadressen.";
        } else {
            $userObject->firstName = $firstName;
            $userObject->lastName = $lastName;
            $test2 = $userObject->update_customer();

            if($test2) {
                $done = "Klart.";
            } else {
                $done = "Kunde inte spara.";
            }
        }
    }

    if($_SESSION['userID'] != "None") {
        $userObject->username = $_SESSION['userID'];

        $result = $userObject->get_customer();

        while($row = $result->fetch()) {
    
?>

<section class="changeForm">
    <div>&nbsp;
<?php
            if($done != "") {
                echo $done;
            }
?>
    </div>
    <form method="post" action="index.php">
        <div>
            <div>
                Förnamn
            </div>
            <div>
                <input type="text" name="firstName" class="valid" value="<?php echo $row['firstName']; ?>" id="firstName" onkeyup="validate_first_name();check_validation_customer_details()" onpaste="validate_first_name();check_validation_customer_details()" onclick="validate_first_name();check_validation_customer_details()">
                <span></span>
            </div>
        </div>
        <div>
            <div>
                Efternamn
            </div>
            <div>
                <input type="text" name="lastName" class="valid" value="<?php echo $row['lastName']; ?>"id="lastName" onkeyup="validate_last_name();check_validation_customer_details()" onpaste="validate_last_name();check_validation_customer_details()" onclick="validate_last_name();check_validation_customer_details()">
                <span></span>
            </div>
        </div>
        <div>
            <div>
                Email
            </div>
            <div>
                <input type="text" name="username" class="valid" value="<?php echo $row['username']; ?>"id="email" onkeyup="validate_email();check_validation_customer_details()" onpaste="validate_email();check_validation_customer_details()" onclick="validate_email();check_validation_customer_details()">
                <span><?php
                    if($newEmail) {
                        echo $errMessage;
                    }?></span>
            </div>
        </div>
        <div>
            <div>
                <input type="hidden" name="page" value="changeDetails">
                <button name="saveDetails" class="generalButton" value="yes" id="submit" disabled>Spara</button>
            </div>
        </div>
    </form>
    <form method="post" action="index.php">
        <div>
                <button name="page" class="generalButton" value="customerProfile">Tillbaka</button>
        </div>
    </form>
</section>

<?php
        }
    }
?>