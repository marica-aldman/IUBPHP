<?php

    include_once "functions.php";

    $movieDateObject = new unsoldTicket;
    $errOrNot = "";
    //check if the showing has been saved
    if(isset($_POST['saveUnsoldTickets'])) {

        //sort thisout
        $event = filter_input(INPUT_POST, 'event', FILTER_SANITIZE_NUMBER_INT);
        $venue = filter_input(INPUT_POST, 'venue', FILTER_SANITIZE_NUMBER_INT);

        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_MAGIC_QUOTES);
        $time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_MAGIC_QUOTES);

        $movieDateObject->eventDateID = $movieDateObject->get_new_eventDate();
        $movieDateObject->venueID = $venue;
        $movieDateObject->eventID = $event;
        $movieDateObject->dateAndTime = $date . " " . $time;
        
        $success = $movieDateObject->create_unsoldtickets();
        if($success) {
            $errOrNot = "Klart";
        } else {
            $errOrNot = "Nått gick fel.";
        } 
        unset($_POST['saveUnsoldTickets']);
    }
?>

<section class="addAndChange">
        <div>
            <?php echo $errOrNot; ?>&nbsp;
        </div>
        <form method="post" action="index.php">
            <table>
                <tbody>
                    <tr>
                        <td>
                            Titel:
                        </td>
                        <td>
<?php  
    if(isset($_POST['saveUnsoldTickets'])) {
        echo get_event_options_with_select($movieDateObject->eventID);
    } else {
        echo get_event_options();
    }
?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Datum:
                        </td>
                        <td>
                            <input class='date' type="date" name="date" id="date" value="<?php
                            if(isset($_POST['saveUnsoldTickets'])) {
                                echo $_POST['date'];
                            }
                            ?>">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tid:
                        </td>
                        <td>
                            <input class="timeAndText" type="text" name="time" id="time" value="<?php
                            if(isset($_POST['saveUnsoldTickets'])) {
                                echo $_POST['time'];
                            }
                            ?>" onkeyup="validate_add_tickets();validate_time()" onclick="validate_add_tickets();validate_time()" onpaste="validate_add_tickets();validate_time()" onfocusout="validate_add_tickets();validate_time()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Venue:
                        </td>
                        <td>
<?php  
    if(isset($_POST['saveUnsoldTickets'])) {
        echo get_venue_options_with_select($movieDateObject->venueID);
    } else {
        echo get_venue_options();
    }
?>
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <input type="hidden" name="page" value="addTickets">
                            <button class="loginButton" name="saveUnsoldTickets" value="yes" id="submit" disabled>Spara</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    <form method="post" action="index.php">
        <div>
                <button class="generalButton" name="page" value="tickets">Tillbaka</button>
        </div>
    </form>
    </section>