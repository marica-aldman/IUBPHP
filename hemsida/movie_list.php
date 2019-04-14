<section class="search_and_list">

    
    <section class="movie_list">

<?php //list the movies 
    $unsoldTicketObject = new unsoldTicket;

    $result = $unsoldTicketObject->get_unsoldtickets();

    while($row = $result->fetch()) {
        
        $eventObject = new event;
        $eventObject->eventID = $row['eventID'];
        $result2 = $eventObject->get_event();
        $row2 = $result2->fetch();
        $venueObject = new venue;
        $venueObject->venueID = $row['venueID'];
        $result3 = $venueObject->get_venue();
        $row3 = $result3->fetch();

        $dateAndTime = $row['dateAndTime'];
        $dateTimeSplit = str_split($dateAndTime, 10);
        $date = $dateTimeSplit[0];
        $time = $dateTimeSplit[1];

        $todaysDate = date('Y-m-d');
        if((!($row2['finished'] >= $todaysDate)) || $row2['finished']==null) {

            $ticketObject->eventDateID = $row['eventDateID'];
            $result4 = $ticketObject->get_ticket_by_eventDateID();
            $i = 0;
            while($row4 = $result4->fetch()){
                $i++;
            }

            $ticketsLeft = $row3['size'] - $i;
            if($ticketsLeft == 0) {

            } else {

?>

        <!-- template card -->

        <section class="movie_list_card">
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
                    <?php echo $date; ?>
                </p>
                <p>
                    <?php echo $time; ?>
                </p>
                <p>
                    <?php echo $ticketsLeft; ?> av <?php echo $row3['size']; ?> biljetter kvar
                </p>
                <div>
                    <form method="post" action="index.php">
                        <input type="hidden" name="page" value="movie">
                        <input type="hidden" name="showMovie" value="<?php echo $row['eventDateID']; ?>">
                        <button name="moreInfo">Mer info</button>
                    </form>
                </div>
            </div>
        </section>

<?php 
            }
        }
    } //end of movie list
?>

    </section>
</section>