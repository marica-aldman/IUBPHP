<?php

    //get user
    
    if($_SESSION['userID'] != "None") {
        $userObject->username = $_SESSION['userID'];

        $result = $userObject->get_customer();

        while($row = $result->fetch()) {
    
?>

<section class="customerProfile">
        <div>
            <div>
                <?php echo $errMessage; ?>
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