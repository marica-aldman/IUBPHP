<?php

    $ticketObject = new ticket;
    $orderObject = new order;
    $errMessage = "";

    //check if there is a ticket to validate

    if(isset($_POST['ticketID'])){
        //make sure it isnt something other than a possible id
        $ticketID = FILTER_INPUT(INPUT_POST, 'ticketID', FILTER_SANITIZE_NUMBER_INT);
        $ticketObject->ticketID = $ticketID;
        //get possible tickets
        $result = $ticketObject->get_ticket();
        //if there is a ticket validate it return to validate_ticket.php with all clear message
        if($test = $result->fetch()){
            //check if the ticket has already been used
            if($test['used'] == 1){
                //ticket has already been used
                $errMessage = "Biljetten är redan använd.";
            } else {
            $ticketObject->validate_ticket();
            $errMessage = "Klart.";
            }
        } else {
        //if there is no ticket return to validate_ticket.php with errMessage
            $errMessage = "Felaktigt biljettnummer.";
        }

    // check if there is a ticket to invalidate
    } else if(isset($_POST['ticketID2'])){
        //make sure it isnt something other than a possible id
        $ticketID2 = FILTER_INPUT(INPUT_POST, 'ticketID2', FILTER_SANITIZE_NUMBER_INT);
        $ticketObject->ticketID = $ticketID2;
        //get possible tickets
        $result = $ticketObject->get_ticket();
        //if there is a ticket validate it return to validate_ticket.php with all clear message
        if($test = $result->fetch()){
            //check if the ticket has already been used
            if($test['used'] == 1){
                $ticketObject->invalidate_ticket();
                $errMessage = "Klart.";
            } else {
            //ticket hasn't been used
            $errMessage = "Biljetten är inte använd.";
            }
        } else {
        //if there is no ticket return to validate_ticket.php with errMessage
            $errMessage = "Felaktigt biljettnummer.";
        }
        
    // check if there is an order to validate
    } else if(isset($_POST['orderID'])){
        //attempt to validate the order, sett $errMessage if any errors
        $orderID = FILTER_INPUT(INPUT_POST, 'orderID', FILTER_SANITIZE_NUMBER_INT);
        $orderObject->orderID = $orderID;
        $errMessage = $orderObject->validate_order();

        if($errMessage == ""){
            $errMessage = "Klart.";
        }
        
    // check if there is an order to invalidate
    } else if(isset($_POST['orderID2'])){
        //attempt to invalidate the order, sett $errMessage if any errors
        $orderID = FILTER_INPUT(INPUT_POST, 'orderID2', FILTER_SANITIZE_NUMBER_INT);
        $orderObject->orderID = $orderID;
        $errMessage = $orderObject->invalidate_order();

        if($errMessage == ""){
            $errMessage = "Klart.";
        }
    }
    // show the forms
    
    include_once "validate_ticket.php";

?>