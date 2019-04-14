

<section class="ticket_list">
        <table>
            <thead>
                <tr>
                    <th>Ordernummer
                    </th>
                    <th>Film
                    </th>
                    <th>Datum
                    </th>
                    <th>Tid
                    </th>
                    <th>Salong
                    </th>
                    <th>Antal
                    </th>
                    <th>Se biljett
                    </th>
                </tr>
            </thead>
            <tbody>
<?php
    if(isset($_SESSION['userID'])) {

        //get the order

        $orderObject = new order;
        $orderObject->username = $_SESSION['userID'];
        $result = $orderObject->get_all_orders_by_customer();

        while($order = $result->fetch()) {

            $ticketObject = new ticket;
            $ticketObject->orderID = $order['orderID'];
            $result2 = $ticketObject->get_ticket_by_orderID();
            $numberOfTickets = 0;
            $ticketIDs = [];
            $eventDateID = "";
            $eventID = "";
            $venueID = "";

            while($ticketCount = $result2->fetch()){
                $numberOfTickets++;
                $eventDateID = $ticketCount['eventDateID'];
                array_push($ticketIDs, $ticketCount['ticketID']);
            }

            //get the specific screening

            $movieDateObject = new unsoldTicket;
            $movieDateObject->eventDateID = $eventDateID;
            $result2 = $movieDateObject->get_unsoldtickets_eventDateID();
            $movie = $result2->fetch();
            $dateTime = $movie['dateAndTime'];
            $dateTimeSplit = str_split($dateTime, 10);
            $date = $dateTimeSplit[0];
            $time = $dateTimeSplit[1];
            $eventID = $movie['eventID'];
            $venueID = $movie['venueID'];

            //get the event

            $singleMovieObject->eventID = $eventID;
            $result3 = $singleMovieObject->get_event();
            $event = $result3->fetch();

            //get the venue

            $venueObject = new venue;
            $venueObject->venueID = $venueID;
            $result4 = $venueObject->get_venue();
            $venue = $result4->fetch();
 
            // finish sorting out the mess of event Date, event, venue etc

?>
                <tr>
                    <td>
                        <?php echo $order['orderID']; ?>
                    </td>
                    <td>
                        <?php echo $event['eventName']; ?>
                    </td>
                    <td>
                        <?php echo $date; ?>
                    </td>
                    <td>
                        <?php echo $time; ?>
                    </td>
                    <td>
                        <?php echo $venue['theater']; ?>
                    </td>
                    <td>
                        <?php echo $numberOfTickets; ?>
                    </td>
                    <td>
                        <form method="post" action="index.php">
                            <input type="hidden" name="page" value="myTicket">
                            <input type="hidden" name="eventDateID" value="<?php echo $eventDateID; ?>">
                            <input type="hidden" name="event" value="<?php echo $eventID; ?>">
                            <input type="hidden" name="venue" value="<?php echo $venueID; ?>">
<?php
                            for($i=0;$i<$numberOfTickets;$i++){
?>
                            <input type="hidden" name="ticketID<?php echo $i; ?>" value="<?php echo $ticketIDs[$i]; ?>">
<?php
                            }
?>
                            <button class="generalButton" name="showTicket">Visa Biljetter</button>
                        </form>
                    </td>
                </tr>

<?php
        } //show tickets
    } //if logged in
?>
            </tbody>
        </table>
    </section>