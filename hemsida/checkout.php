<section class="checkout">
<?php
        if ($_SESSION['userType'] == "Guest") {
?>
<div class="loginForm" id="loginForm">
    <div>
        För att köpa biljetter behöver du vara inloggad.
    </div>
<?php
        if($errMessageLogin !== "") {
?>
    <div class="centerErrMessage">
        <?php echo $errMessageLogin; ?>
    </div>
<?php
        }
?>
    <form method="post" action="index.php">
        <div class="inputField">
            <input type="hidden" name="page" value="checkout">
            <input type="hidden" name="clientLogin" value="yes">
            <span></span>
        </div>
        <div class="inputField">
            <label for="username">Användarnamn</label>
            <input type="text" name="username" id="username" onkeyup="validate_login_username();validate_login_form()" onpaste="validate_login_username();validate_login_form()" onclick="validate_login_username();validate_login_form()">
            <span></span>
        </div>
        <div class="inputField">
            <label for="password">Lösenord</label>
            <input type="password" name="password" id="password" onkeyup="validate_login_password();validate_login_form()" onpaste="validate_login_password();validate_login_form()" onclick="validate_login_password();validate_login_form()">
            <span></span>
        </div>
        <div>
            <button class="loginButton" id="submit" disabled>Logga in</button>
        </div>
    </form>
    <p>
        Om du inte har konto så kan du registrera dig här.
    </p>
    <form method="post" action="index.php">
        <input type="hidden" name="page" value="register">
        <input type="hidden" name="toPage" value="checkout">
        <button class="generalButton">Registrera dig</button>
    </form>
</div>


<?php
        }
?>
<div>
    <table>
        <thead>
            <tr>
                <th>Film
                </th>
                <th>Salong
                </th>
                <th>Datum
                </th>
                <th>Tid
                </th>
                <th>Antal Biljetter
                </th>
                <th>Pris
                </th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
<?php
                    $totalPrice = 0;
                    if($basketTotalProductTypes>0) {
                        $i=0;
                        for($i=1; isset($_COOKIE["eventDateID" . $i]); $i++) {
                            $showingObject->eventDateID = $_COOKIE["eventDateID" . $i];
                            $result = $showingObject->get_unsoldtickets_eventDateID();

                            $row = $result->fetch();
                                
                            $singleMovieObject->eventID = $row['eventID'];
                            $result2 = $singleMovieObject->get_event();
                            $row2 = $result2->fetch();

                            $venueObject->venueID = $row['venueID'];
                            $result3 = $venueObject->get_venue();
                            $row3 = $result3->fetch();

                            $dateAndTime = $row['dateAndTime'];
                            $dateTimeSplit = str_split($dateAndTime, 10);
                            $date = $dateTimeSplit[0];
                            $time = $dateTimeSplit[1];
                        
?>
                    <tr>
                        <td><?php echo $row2['eventName']; ?>
                        </td>
                        <td><?php echo $row3['theater']; ?>
                        </td>
                        <td><?php echo $date; ?>
                        </td>
                        <td><?php echo $time; ?>
                        </td>
                        <td>
                            <button class="moreOrLess" id="removeCheckout<?php echo $i; ?>" onclick="remove_ticket_checkout(<?php echo $_COOKIE['noOfTickets' . $i]; ?>, <?php echo $row['eventDateID']; ?>, <?php echo $row2['price']; ?>, <?php echo $i; ?>);remove_ticket(<?php echo $_COOKIE['noOfTickets' . $i]; ?>, <?php echo $row['eventDateID']; ?>, <?php echo $row2['price']; ?>, <?php echo $i; ?>)"><</button>
                            <input id="hidden_noOfTicketsCheckout<?php echo $i; ?>" type="hidden" name="numberOfTickets<?php echo $row['eventDateID']; ?>" value="<?php echo $_COOKIE["noOfTickets" . $i]; ?>">
                            <div class="basketText noOfTicketsCheckout" id="noOfTicketsCheckout<?php echo $i; ?>"><?php echo $_COOKIE["noOfTickets" . $i]; ?></div>
                            <button class="moreOrLess" id="addCheckout<?php echo $i; ?>" onclick="add_ticket_checkout(<?php echo $_COOKIE['noOfTickets' . $i]; ?>, <?php echo $row['eventDateID']; ?>, <?php echo $row2['price']; ?>, <?php echo $i; ?>);add_ticket(<?php echo $_COOKIE['noOfTickets' . $i]; ?>, <?php echo $row['eventDateID']; ?>, <?php echo $row2['price']; ?>, <?php echo $i; ?>)">></button>
                        </td>
                        <td><div class="basketText" id="priceCheckout<?php echo $i; ?>"><?php $price = (int) $row2['price'] * (int) $_COOKIE["noOfTickets" . $i]; echo $price; ?></div>
                        </td>
                        <td>
                            <form method="post" action="index.php">
                                <input type="hidden" name="page" value="checkout">
                                <input type="hidden" name="showMovie" id="checkoutMovieDelete<?php echo $i; ?>" class="movieIdForCheckoutInCheckout" value="<?php echo $row['eventDateID']; ?>">
                                <button class="deleteButton" id="checkoutDeleteButton<?php echo $i; ?>" onclick="return delete_ticket(<?php echo $i; ?>)">X</button>
                            </form>
                        </td>
                    </tr>

<?php
                    $totalPrice = $totalPrice + $price;
                        }
                    }
?>
                    
                    <tr>
                        <td colspan=5>
                            Total Summa:
                        </td>
                        <td>
                            <?php echo $totalPrice; ?>
                        </td>
                    </tr>
        </tbody>
    </table>
 <?php
    // hämta user 
        $userObject->username = FILTER_INPUT(INPUT_COOKIE, 'userID', FILTER_SANITIZE_EMAIL);
        
        $result2 = $userObject->get_customer();
        $row2 = $result2->fetch();
 ?>   
    <form method="post" action="index.php">
        <input type="hidden" name="page" value="confirmation">
        <button name="order" value="yes" class="loginButton" <?php if($basketTotalProductTypes <= 0 || $basketTotalProductTypes == null) { echo "disabled"; } else { echo 'onclick="return to_confirm()"'; } ?>>Beställ</button>
    </form>
</div>

</section>