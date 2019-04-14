<?php
    if(isset($_POST['showTicket'])) {
    
        //get the specific screening

        $movieDateObject = new unsoldTicket;
        $movieDateObject->eventDateID = $_POST['eventDateID'];
        $result2 = $movieDateObject->get_unsoldtickets_eventDateID();
        $movie = $result2->fetch();
        $dateTime = $movie['dateAndTime'];
        $dateTimeSplit = str_split($dateTime, 10);
        $date = $dateTimeSplit[0];
        $time = $dateTimeSplit[1];

        //get the event

        $singleMovieObject->eventID = $_POST['event'];
        $result3 = $singleMovieObject->get_event();
        $event = $result3->fetch();

        //get the venue

        $venueObject = new venue;
        $venueObject->venueID = $_POST['venue'];
        $result4 = $venueObject->get_venue();
        $venue = $result4->fetch();

        for($i=0;isset($_POST['ticketID' . $i]);$i++){
            // write out each ticket
            $ticketID = $_POST['ticketID' . $i];
?>

<section class="single_ticket">
        <table>
            <tbody>
                <!-- temp row-->
                <tr>
                    <td>Biljettnummer:
                    </td>
                    <td><?php echo $ticketID; ?>
                    </td>
                </tr>
                <tr>
                    <td>Film:
                    </td>
                    <td><?php echo $event['eventName']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Datum:
                    </td>
                    <td><?php echo $date; ?>
                    </td>
                </tr>
                <tr>
                    <td>Tid:
                    </td>
                    <td><?php echo $time; ?>
                    </td>
                </tr>
                <tr>
                    <td>Salong:
                    </td>
                    <td><?php echo $venue['theater']; ?>
                    </td>
                </tr>
            </tbody>
        </table>
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