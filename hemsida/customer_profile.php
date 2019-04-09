<?php
    $userObject = new user;
    if(isset($_SESSION['userID'])) {
        $userObject->username = $_SESSION['userID'];

        $result = $userObject->get_customer();

        while($row = $result->fetch()) {
    
?>

<section>
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
            <div>
                Adresser
            </div>
<?php
                // get all adresses and create a row each for them
                $adressObject = new adress;
                $adressObject->adressID = $_POST['change_adress'];

                $adressResult = $adressObject->get_customer_adresses();

                while($row = $adressResult->fetch()) {
                    $i++;
?>
            <div>
                <div>
                    <div>
                        Adress <?php echo $i; ?>
                    </div>
                    <div>
                        <div>
                            Gatuadress
                        </div>
                        <div>
                            <?php echo $row2['streetadress']; ?>
                        </div>
                    </div>
                    <div>
                        <div>
                            Postnummer
                        </div>
                        <div>
                            <?php echo $row2['postalnumber']; ?>
                        </div>
                    </div>
                    <div>
                        <div>
                            Postort
                        </div>
                        <div>
                            <?php echo $row2['postaltown']; ?>
                        </div>
                    </div>
                    <div>
                        <div>
                            <button page="changeAdress" value="<?php echo $row2['adressID']; ?>">Ändra Adress</button>
                        </div>
                        <div>
                            <button page="removeAdress" value="<?php echo $row2['adressID']; ?>">Tabort Adress</button>
                        </div>
                    </div>
                </div>
            </div>
<?php
            }    // all adresses
?>
        </div>
    </section>
<?php 

        } //selected data on customer
    } // if customer is logged in
?>