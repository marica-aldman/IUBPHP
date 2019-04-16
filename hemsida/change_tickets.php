<?php

    include_once "functions.php";

    $errOrNot = "";
    //check if the showing has been saved
    if(isset($_POST['saveUnsoldTickets'])) {

        //sort thisout
        $event = filter_input(INPUT_POST, 'event', FILTER_SANITIZE_NUMBER_INT);
        $venue = filter_input(INPUT_POST, 'venue', FILTER_SANITIZE_NUMBER_INT);

        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_MAGIC_QUOTES);
        $time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_MAGIC_QUOTES);

        $movieDateObject = new unsoldTicket;
        $movieDateObject->eventDateID = filter_input(INPUT_POST, 'eventDateID', FILTER_SANITIZE_NUMBER_INT);
        $movieDateObject->venueID = $venue;
        $movieDateObject->eventID = $event;
        $movieDateObject->dateAndTime = $date . " " . $time;
        
        $success = $movieDateObject->update_unsoldtickets();

        if($success) {
            $errOrNot = "Klart";
        } else {
            $errOrNot = "Nått gick fel.";
        } 
    }
?>

<section class="addAndChange">
        <div>
            <?php echo $errOrNot; ?>&nbsp;
        </div>
        <table>
            <tbody>
<?php
    //get the specific screening

    $movieDateObject = new unsoldTicket;
    $movieDateObject->eventDateID = filter_input(INPUT_POST, 'eventDateID', FILTER_SANITIZE_NUMBER_INT);
    $result2 = $movieDateObject->get_unsoldtickets_eventDateID();
    $movie = $result2->fetch();
    $dateTime = $movie['dateAndTime'];
    $dateTimeSplit = str_split($dateTime, 10);
    $date = $dateTimeSplit[0];
    $time = $dateTimeSplit[1];
    unset($_POST['eventDateID']);

?>
                <form method="post" action="index.php">
                    <tr>
                        <td>
                            Titel:
                        </td>
                        <td>
<?php  
    echo get_event_options_with_select($movie['eventID']);
?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Datum:
                        </td>
                        <td>
                            <input class="date" type="date" name="date" id="date" value="<?php echo $date; ?>">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tid:
                        </td>
                        <td>
                            <input class="timeAndText" type="text" name="time" id="time" value="<?php echo $time; ?>" onkeyup="validate_add_tickets();validate_time()" onclick="validate_add_tickets();validate_time()" onpaste="validate_add_tickets();validate_time()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Venue:
                        </td>
                        <td>
<?php  
    echo get_venue_options_with_select($movie['venueID']);
?>
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="page" value="changeTickets">
                            <input type="hidden" name="eventDateID" value="<?php echo $movie['eventDateID']; ?>">
                            <button class="loginButton" name="saveUnsoldTickets" value="yes" id="submit" disabled>Spara</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    <form method="post" action="index.php">
        <div>
                <button class="generalButton" name="page" value="tickets">Tillbaka</button>
        </div>
    </form>
    </section>