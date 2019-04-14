<?php

   $userObject = new user;
    if($_SESSION['userID'] != "None") {
        $userObject->username = $_SESSION['userID'];

        $result = $userObject->get_customer();

        while($row = $result->fetch()) {
    
?>

<section class="changeForm">
    <form method="post" action="index.php">
        <div>
            <div>
                Förnamn
            </div>
            <div>
                <input type="text" name="firstName" value="<?php echo $row['firstName']; ?>" id="firstName" onkeyup="validateFirstName();checkValidationCustomerDetails()" onpaste="validateFirstName();checkValidationCustomerDetails()" onclick="validateFirstName();checkValidationCustomerDetails()">
                <span></span>
            </div>
        </div>
        <div>
            <div>
                Efternamn
            </div>
            <div>
                <input type="text" name="lastName" value="<?php echo $row['lastName']; ?>"id="lastName" onkeyup="validateLastName();checkValidationCustomerDetails()" onpaste="validateLastName();checkValidationCustomerDetails()" onclick="validateLastName();checkValidationCustomerDetails()">
                <span></span>
            </div>
        </div>
        <div>
            <div>
                Email
            </div>
            <div>
                <input type="text" name="username" value="<?php echo $row['username']; ?>"id="email" onkeyup="validateEmail();checkValidationCustomerDetails()" onpaste="validateEmail();checkValidationCustomerDetails()" onclick="validateEmail();checkValidationCustomerDetails()">
                <span></span>
            </div>
        </div>
        <div>
            <div>
                <input type="hidden" name="page" value="customerProfile">
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