<?php

    $ticketObject = new ticket;
    $orderObject = new order;

    //check if there is a ticket to validate

    if(isset($_POST['ticketID'])){
        //make sure it isnt something other than a possible id
        $ticketID = filter_var($_POST['ticketID'], FILTER_VALIDATE_INT);
        $ticketObject->ticketID = $ticketID;
        //get possible tickets
        $result = $ticketObject->get_ticket();
        //if there is a ticket validate it return to validate_ticket.php with all clear message
        if($test = $result->fetch()){
            //check if the ticket has already been used
            if($test['used'] == 1){
                //ticket has already been used
                $err_message = "Biljetten är redan använd.";
            } else {
            $ticketObject->validate_ticket();
            $err_message = "Klart.";
            }
        } else {
        //if there is no ticket return to validate_ticket.php with err_message
            $err_message = "Felaktigt biljettnummer.";
        }

    // check if there is a ticket to invalidate
    } else if(isset($_POST['ticketID2'])){
        //make sure it isnt something other than a possible id
        $ticketID2 = filter_var($_POST['ticketID2'], FILTER_VALIDATE_INT);
        $ticketObject->ticketID = $ticketID2;
        //get possible tickets
        $result = $ticketObject->get_ticket();
        //if there is a ticket validate it return to validate_ticket.php with all clear message
        if($test = $result->fetch()){
            //check if the ticket has already been used
            if($test['used'] == 1){
                $ticketObject->invalidate_ticket();
                $err_message = "Klart.";
            } else {
            //ticket hasn't been used
            $err_message = "Biljetten är inte använd.";
            }
        } else {
        //if there is no ticket return to validate_ticket.php with err_message
            $err_message = "Felaktigt biljettnummer.";
        }
        
    // check if there is an order to validate
    } else if(isset($_POST['orderID'])){
        //attempt to validate the order, sett $err_message if any errors
        $orderID = filter_var($_POST['orderID'], FILTER_VALIDATE_INT);
        $orderObject->orderID = $orderID;
        $err_message = $orderObject->validate_order();

        if($err_message == ""){
            $err_message = "Klart.";
        }
        
    // check if there is an order to invalidate
    } else if(isset($_POST['orderID2'])){
        //attempt to invalidate the order, sett $err_message if any errors
        $orderID = filter_var($_POST['orderID2'], FILTER_VALIDATE_INT);
        $orderObject->orderID = $orderID;
        $err_message = $orderObject->invalidate_order();

        if($err_message == ""){
            $err_message = "Klart.";
        }
    }
    // show the forms
    
    include_once "validate_ticket.php";

?>