<?php
    $errOrNot = "";
    //check if the event has been saved
    if(isset($_POST['saveEvent'])) {
        $eventName = filter_input(INPUT_POST, 'eventName', FILTER_SANITIZE_MAGIC_QUOTES);
        $premere = filter_input(INPUT_POST, 'premere', FILTER_SANITIZE_MAGIC_QUOTES);
        $finished = filter_input(INPUT_POST, 'finished', FILTER_SANITIZE_MAGIC_QUOTES);
        $director = filter_input(INPUT_POST, 'director', FILTER_SANITIZE_MAGIC_QUOTES);
        $originalLanguage = filter_input(INPUT_POST, 'originalLanguage', FILTER_SANITIZE_MAGIC_QUOTES);
        $info = filter_input(INPUT_POST, 'info', FILTER_SANITIZE_MAGIC_QUOTES);
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT);
        $picture = filter_input(INPUT_POST, 'pictureLink', FILTER_SANITIZE_URL);

        $eventObject = new event;
        $eventObject->eventID = filter_input(INPUT_POST, 'eventID', FILTER_SANITIZE_NUMBER_INT);
        $eventObject->eventName = $eventName;
        $eventObject->premere = $premere;
        if($finished == ""){
            $eventObject->finished = null;
        } else {
            $eventObject->finished = $finished;
        }
        $eventObject->director = $director;
        $eventObject->originalLanguage = $originalLanguage;
        $eventObject->info = $info;
        $eventObject->price = $price;    
        $eventObject->picture = $picture;
        
        $success = $eventObject->update_event();
        if($success) {
            $errOrNot = "Klart";
        } else {
            $errOrNot = "Nått gick fel.";
        } 
    }
?>

<section class="add_and_change">
        <div>
            <?php echo $errOrNot; ?>&nbsp;
        </div>
        <table>
            <tbody>
<?php

    $eventObject = new event;
    $eventObject->eventID = filter_input(INPUT_POST, 'eventID', FILTER_SANITIZE_NUMBER_INT);
    unset($_POST['eventID']);
    $result = $eventObject->get_event();

    while($row = $result->fetch()) {
?>
                <form method="post" action="index.php">
                    <tr>
                        <td>
                            Titel:
                        </td>
                        <td>
                            <input type="text" class="timeAndText valid" name="eventName" id="eventName" value="<?php echo $row['eventName']; ?>" onkeyup="validateChangeEvent();validateEventName()" onpaste="validateChangeEvent();validateEventName()" onclick="validateChangeEvent();validateEventName()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Premiär:
                        </td>
                        <td>
                            <input class="date" type="date" name="premere" value="<?php 
                            if($row['premere'] == NULL){
                            } else {
                                echo $row['premere'];
                            }
                            ?>">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Slutar gå:
                        </td>
                        <td>
                            <input class="date" type="date" name="finished" value="<?php 
                            if($row['finished'] == NULL){
                            } else {
                                echo $row['finished'];
                            }
                            ?>">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Regisör:
                        </td>
                        <td>
                            <input type="text" class="timeAndText valid" name="director" id="director" value="<?php echo $row['director']; ?>" onkeyup="validateChangeEvent();validateDirector()" onpaste="validateChangeEvent();validateDirector()" onclick="validateChangeEvent();validateDirector()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Orginalspråk:
                        </td>
                        <td>
                            <input type="text" class="timeAndText valid" name="originalLanguage" id="originalLanguage" value="<?php echo $row['originalLanguage']; ?>" onkeyup="validateChangeEvent();validateOriginalLanguage()" onpaste="validateChangeEvent();validateOriginalLanguage()" onclick="validateChangeEvent();validateOriginalLanguage()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Info:
                        </td>
                        <td>
                            <input type="text" class="timeAndText valid" name="info" id="info" value="<?php echo $row['info']; ?>" onkeyup="validateChangeEvent();validateInfo()" onpaste="validateChangeEvent();validateInfo()" onclick="validateChangeEvent();validateInfo()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Pris:
                        </td>
                        <td>
                            <input type="number" class="timeAndText valid" name="price" id="price" value="<?php echo $row['price']; ?>" onkeyup="validateChangeEvent();validatePrice()" onpaste="validateChangeEvent();validatePrice()" onclick="validateChangeEvent();validatePrice()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Bildlänk:
                        </td>
                        <td>
                            <input type="text" class="timeAndText valid" name="pictureLink" id="pictureLink" value="<?php echo $row['picture']; ?>" onkeyup="validateChangeEvent();validatePicture()" onpaste="validateChangeEvent();validatePicture()" onclick="validateChangeEvent();validatePicture()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="page" value="changeEvent">
                            <input type="hidden" name="eventID" value="<?php echo $row['eventID']; ?>">
                            <button class="loginButton" name="saveEvent" value="yes" id="submit">Spara</button>
                        </td>
                    </tr>
                </form>
<?php
    }
?>
            </tbody>
        </table>
    <form method="post" action="index.php">
        <div>
                <button class="generalButton" name="page" value="event">Tillbaka</button>
        </div>
    </form>
    </section>