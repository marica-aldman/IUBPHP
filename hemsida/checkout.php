<section>
<?php
        if ($_SESSION['userType'] == "Guest") {
?>
<div class="loginForm" id="loginForm">
    <p>
        För att köpa biljetter behöver du vara inloggad.
    </p>
<?php
        if($err_message !== "") {
?>
    <div>
        <?php echo $err_message; ?>
    </div>
<?php
        }
?>
    <form method="post" action="index.php">
        <div class="input-field">
        <input type="hidden" name="page" value="checkout">
        <input type="hidden" name="client_login" value="yes">
            <span></span>
        </div>
        <div class="input-field">
        <label for="username">Användarnamn</label>
        <input type="text" name="username" id="username" onfocusout="validateLoginUsername();validateLoginForm()">
            <span></span>
        </div>
        <div class="input-field">
        <label for="password">Lösenord</label>
        <input type="text" name="password" id="password" onfocusout="validateLoginPassword();validateLoginForm()">
            <span></span>
        </div>
        <button id="submit" disabled>Logga in</button>
    </form>
    <p>
        Om du inte har konto så kan du registrera dig här.
    </p>
    <form method="post" action="index.php">
        <input type="hidden" name="page" value="register">
        <input type="hidden" name="fromPage" value="checkout">
        <button>Registrera dig</button>
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
                        for($i=1; isset($_COOKIE["eventID" . $i]); $i++) {
                            $singleMovieObject->eventID = $_COOKIE["eventID" . $i];
                            $result = $singleMovieObject->get_event();
                            $row = $result->fetch();
                        
?>
                    <tr>
                        <td><?php echo $row['eventName']; ?>
                        </td>
                        <td><?php echo "venue"; // change to venue ?>
                        </td>
                        <td><?php echo "datum"; // change to date ?>
                        </td>
                        <td><?php echo "tid"; // change to time ?>
                        </td>
                        <td>
                            <button id="remove<?php echo $i; ?>" onclick="return removeTicket(<?php echo $_COOKIE['noOfTickets' . $i]; ?>, <?php echo $row['eventID']; ?>, <?php echo $row['price']; ?>, <?php echo $i; ?>)"><</button>
                            <input id="hidden_noOfTickets<?php echo $i; ?>" type="hidden" name="numberOfTickets<?php echo $row['eventID']; ?>" value="<?php echo $_COOKIE["noOfTickets" . $i]; ?>">
                            <div class="basketText noOfTickets" id="noOfTickets<?php echo $i; ?>"><?php echo $_COOKIE["noOfTickets" . $i]; ?></div>
                            <button id="add<?php echo $i; ?>" onclick="return addTicket(<?php echo $_COOKIE["noOfTickets" . $i]; ?>, <?php echo $row['eventID']; ?>, <?php echo $row['price']; ?>, <?php echo $i; ?>)">></button>
                        </td>
                        <td ><div class="basketText" id="price<?php echo $i; ?>"><?php $price = (int) $row['price'] * (int) $_COOKIE["noOfTickets" . $i]; echo $price; ?></div>
                        </td>
                        <td>
                            <form method="post" action="index.php">
                                <input type="hidden" name="page" value="movie">
                                <input type="hidden" name="showMovie" id="movieDelete" value="<?php echo $row['eventID']; ?>" class="movieIdForCheckout">
                                <input type="hidden" name="cartReload" id="cartReload" value="yes">
                                <button id="deleteButton<?php echo $i; ?>" onclick="return deleteTicket(<?php echo $i; ?>)">X</button>
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
    <form method="post" action="index.php">
        <input type="hidden" name="page" value="confirmation">
        <label for="firstName">Förnamn</label>
        <input type="text" name="firstName">
        <label for="lastName">Efternamn</label>
        <input type="text" name="lastName">
        <label for="adress">Gatuadress</label>
        <input type="text" name="adress">
        <label for="postalCode">Postnummer</label>
        <input type="text" name="postalCode">
        <label for="postalTown">Postort</label>
        <input type="text" name="postalTown">
        <button>Beställ</button>
    </form>
</div>

</section>