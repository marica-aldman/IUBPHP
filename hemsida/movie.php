<section>

<?php //list the movies 

$ticketsLeft = 0;

if(isset($_POST['showMovie'])) {

    $showingObject->eventDateID = $_POST['showMovie'];

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

    $ticketObject->eventDateID = $row['eventDateID'];
    $result4 = $ticketObject->get_ticket_by_eventDateID();
    $i = 0;
    while($row4 = $result4->fetch()){
        $i++;
    }

    $ticketsLeft = $row3['size'] - $i;

?>
        <div>
            <img src="<?php echo $row2['picture']; ?>">
        </div>
        <div>
            <h1>
                <?php echo $row2['eventName']; ?>
            </h1>
            <p>
                <?php echo $row3['theater']; ?>
            </p>
            <p>
                <?php echo $row2['info']; ?>
            </p>
            <p>
                <?php echo $row2['price']; ?> kr
            </p>
            <p>
                Antal biljetter kvar <?php echo $ticketsLeft; ?> av <?php echo $row3['size']; ?>
            </p>
            <p>
                Datum: <?php echo $date; ?>
            </p>
            <p>
                Kl: <?php echo $time; ?>
            </p>
            <div>
                <form method="post" action="index.php">
                    <input type="hidden" name="eventDateID" id="eventDateID" value="<?php echo $row['eventDateID']; ?>">
                    <input type="hidden" name="eventName" id="eventName" value="<?php echo $row2['eventName']; ?>">
                    <input type="hidden" name="eventPrice" id="eventPrice" value="<?php echo $row2['price']; ?>">
                    <input type="hidden" name="page" value="movie">
                    <input type="hidden" name="showMovie" id="showing" value="<?php echo $row['eventDateID']; ?>">
                    <input type="number" id="noOfTickets" name="numberOfTickets" value="1" max="<?php
                    if($ticketsLeft >10) {
                        echo 10;
                    } else {
                        echo $ticketsLeft;
                    }
                    ?>" min="1">
                    <button name="buyTicket" id="buyButton" onclick="return addNewTicket(<?php echo $row['eventDateID']; ?>, '<?php echo $page; ?>', '<?php echo $date; ?>')"<?php
                    if($ticketsLeft == 0) {
                        echo "disabled";
                    }
                    ?> class="loginButton">Köp</button>
                </form>
            </div>
        </div>
    </section>

<?php


} else {
?>

        <p>Something went wrong. Try going back again. If the problem persists contact IT support.</p>
    </section>


<?php
}
?>