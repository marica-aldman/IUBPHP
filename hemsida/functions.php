<?php

function get_event_options_with_select($eventID) {

    //get the possible events

    $eventObject = new event;
    $result = $eventObject->get_all_events();

    //build the option string

    $options = "";

    while($allEvents = $result->fetch()){

        if($allEvents['eventID'] == $eventID) {
            $options = $options . "<option value=" . $allEvents['eventID'] . " selected>" . $allEvents['eventName'] . "</option>";
        } else {
            $options = $options . "<option value=" . $allEvents['eventID'] . ">" . $allEvents['eventName'] . "</option>";
        }

    }

    $allOptions = "<select class='date' name='event'>" . $options . "</select>";

    return $allOptions;
}

function get_event_options() {

    //get the possible events

    $eventObject = new event;
    $result = $eventObject->get_all_events();

    //build the option string

    $options = "";

    while($allEvents = $result->fetch()){

        $options = $options . "<option value=" . $allEvents['eventID'] . ">" . $allEvents['eventName'] . "</option>";

    }

    $allOptions = "<select class='date' name='event'>" . $options . "</select>";

    return $allOptions;
}

function get_venue_options() {

    //get the possible venues

    $venueObject = new venue;
    $result = $venueObject->get_all_venues();

    //build the option string

    $options = "";

    while($allVenues = $result->fetch()){

        $options = $options . "<option value=" . $allVenues['venueID'] . ">" . $allVenues['theater'] . "</option>";

    }

    $allOptions = "<select class='date' name='venue'>" . $options . "</select>";

    return $allOptions;

}

function get_venue_options_with_select($venueID) {

    //get the possible venues

    $venueObject = new venue;
    $result = $venueObject->get_all_venues();

    //build the option string

    $options = "";

    while($allVenues = $result->fetch()){

        if($allVenues['venueID'] == $venueID) {
            $options = $options . "<option value=" . $allVenues['venueID'] . " selected>" . $allVenues['theater'] . "</option>";
        } else {
            $options = $options . "<option value=" . $allVenues['venueID'] . ">" . $allVenues['theater'] . "</option>";
        }

    }

    $allOptions = "<select class='date' name='venue'>" . $options . "</select>";

    return $allOptions;
}

?>