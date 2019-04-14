<?php
    if(isset($_POST['order'])) {
        //order save and confirm
    
        $errOrNot = [];
        $username = $_SESSION['userID'];
        $numberOfProductTypes = FILTER_INPUT(INPUT_COOKIE, 'basketTotalProductTypes', FILTER_SANITIZE_NUMBER_INT);
        $orderObject->orderID = $orderObject->get_new_orderID();
        $orderObject->username = $username;

        $success = $orderObject->create_order();

        // if order then save tickets

        if($success){
            for($i=1; $numberOfProductTypes >= $i; $i++) {
                $numberOfTickets = FILTER_INPUT(INPUT_COOKIE, 'noOfTickets' . $i, FILTER_SANITIZE_NUMBER_INT);
                for($j=1; $numberOfTickets>=$j; $j++){
                    $ticketObject->ticketID = $ticketObject->get_new_ticketID();
                    $ticketObject->eventDateID = FILTER_INPUT(INPUT_COOKIE, 'eventDateID' . $i, FILTER_SANITIZE_NUMBER_INT);
                    $ticketObject->orderID = $orderObject->orderID;
                    $ticketObject->username = $username;
                    $ticketObject->used = 0;

                    $test = $ticketObject->create_ticket();
                    if($test){
                    } else {
                        array_push($errOrNot, "Biljett" . $i . " inte sparad");
                    }
                }
            }
        } else {
            array_push($errOrNot, "Kunde inte spara order. Kontakta kundservice.");
        }

?>

<section class="confirmation">
    <div>
        &nbsp;<?php
    for($k=0; $k<sizeof($errOrNot) ; $k++) {
        echo $errOrNot[$k] . " ";
    }
?>        
    </div>
<div>
    <table>
        <thead>
            <tr>
                <th>OrderID
                </th>
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
                        <td>
                            <?php echo $row2['eventName']; ?>
                        </td>
                        <td>
                            <?php echo $row2['eventName']; ?>
                        </td>
                        <td>
                            <?php echo $row3['theater']; ?>
                        </td>
                        <td>
                            <?php echo $date; ?>
                        </td>
                        <td>
                            <?php echo $time; ?>
                        </td>
                        <td>
                            <?php echo $_COOKIE["noOfTickets" . $i]; ?>
                        </td>
                        <td>
                            <?php $price = (int) $row2['price'] * (int) $_COOKIE["noOfTickets" . $i]; echo $price; ?>
                        </td>
                    </tr>

<?php
                    $totalPrice = $totalPrice + $price;
                        }
                    }
?>
                    
                    <tr>
                        <td colspan=6>
                            Total Summa:
                        </td>
                        <td>
                            <?php echo $totalPrice; ?>
                        </td>
                    </tr>
        </tbody>
    </table>

</section>

<?php
    }
    unset($_POST['order']);
?>