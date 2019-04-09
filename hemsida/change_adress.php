<?php
            if($page == "changeAdress") {
                // get all adresses and create a row each for them
                $adressObject = new adress;
                $adressObject->username = $userObject->username;
                $i = 1;

                $adressResult = $adressObject->get_adress_by_id();

                while($row2 = $adressResult->fetch()) {
?>

    <section>
        <form method="post" action="index.php">
            <div>
                Adress 1
            </div>
            <div>
                <div>
                    Gatuadress
                </div>
                <div>
                    <input type="text" name="streetadress" value="<?php echo $row['streetadress']; ?>">
                </div>
            </div>
            <div>
                <div>
                    Postnummer
                </div>
                <div>
                    <!-- fill in -->
                    <input type="text" name="postnumber" value="<?php echo $row['postnumber']; ?>">
                </div>
            </div>
            <div>
                <div>
                    Postort
                </div>
                <div>
                    <!-- fill in -->
                    <input type="text" name="postadress" value="<?php echo $row['postadress']; ?>">
                </div>
            </div>
            <div>
                <div>
                    <input type="hidden" name="adressID" value="<?php //echo adressid ?>">
                    <input type="hidden" name="page" value="customerProfile">
                    <button name="page" value="saveAdress">Spara</button> 
                </div>
                <div>
                    <button name="page" value="myProfile">Ångra</button>
                </div>
            </div>
        </form>
    </section>

<?php
            } //adress
?>