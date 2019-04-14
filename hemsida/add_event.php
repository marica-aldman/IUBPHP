<?php
    $errOrNot = "";
    //check if the event has been saved
    if(isset($_POST['saveEvent'])) {
        $eventName = filter_input(INPUT_POST, 'eventName', FILTER_SANITIZE_MAGIC_QUOTES);
        $premere = filter_input(INPUT_POST, 'premere', FILTER_SANITIZE_MAGIC_QUOTES);
        $director = filter_input(INPUT_POST, 'director', FILTER_SANITIZE_MAGIC_QUOTES);
        $originalLanguage = filter_input(INPUT_POST, 'originalLanguage', FILTER_SANITIZE_MAGIC_QUOTES);
        $info = filter_input(INPUT_POST, 'info', FILTER_SANITIZE_MAGIC_QUOTES);
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT);
        $picture = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_URL);

        $eventObject = new event;
        $eventObject->eventID = $eventObject->get_new_eventID();
        $eventObject->eventName = $eventName;
        $eventObject->premere = $premere;
        $eventObject->finished = NULL;
        $eventObject->director = $director;
        $eventObject->originalLanguage = $originalLanguage;
        $eventObject->info = $info;
        $eventObject->price = $price;
        $eventObject->picture = $picture;

        $success = $eventObject->create_event();
        if($success) {
            $errOrNot = "Klart";
        } else {
            $errOrNot = "Nått gick fel.";
        }
    }
?>

<section class="add_and_change">
        <div>
<?php
        if(isset($_POST['saveEvent'])) {
            echo $errOrNot;
        }
?>&nbsp;
        </div>
        <form method="post" action="index.php">
            <table>
                <tbody>
                    <tr>
                        <td>
                            Titel:
                        </td>
                        <td>
                            <input type="text" name="eventName" id="eventName" value="<?php
                            if(isset($_POST['saveEvent'])) {
                                echo $_POST['eventName'];
                            }
                            ?>" onkeyup="validateAddEvent();validateEventName()" onpaste="validateAddEvent();validateEventName()"
                            onclick="validateAddEvent();validateEventName()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Premiär:
                        </td>
                        <td>
                            <input class="date" type="date" name="premere" id="premere" value="<?php
                            if(isset($_POST['saveEvent'])) {
                                echo $_POST['premere'];
                            }
                            ?>" onkeyup="validateAddEvent();validatePremere()" onpaste="validateAddEvent();validatePremere()" onclick="validateAddEvent();validatePremere()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Regisör:
                        </td>
                        <td>
                            <input type="text" name="director" id="director" value="<?php
                            if(isset($_POST['saveEvent'])) {
                                echo $_POST['director'];
                            }
                            ?>" onkeyup="validateAddEvent();validateDirector()" onpaste="validateAddEvent();validateDirector()" onclick="validateAddEvent();validateDirector()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Orginalspråk:
                        </td>
                        <td>
                            <input type="text" name="originalLanguage" id="originalLanguage" value="<?php
                            if(isset($_POST['saveEvent'])) {
                                echo $_POST['originalLanguage'];
                            }
                            ?>" onkeyup="validateAddEvent();validateOriginalLanguage()" onpaste="validateAddEvent();validateOriginalLanguage()" onclick="validateAddEvent();validateOriginalLanguage()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Info:
                        </td>
                        <td>
                            <input type="text" name="info" id="info" value="<?php
                            if(isset($_POST['saveEvent'])) {
                                echo $_POST['info'];
                            }
                            ?>" onkeyup="validateAddEvent();validateInfo()" onpaste="validateAddEvent();validateInfo()" onclick="validateAddEvent();validateInfo()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Pris:
                        </td>
                        <td>
                            <input type="number" name="price" id="price" value="<?php
                            if(isset($_POST['saveEvent'])) {
                                echo $_POST['price'];
                            }
                            ?>" onkeyup="validateAddEvent();validatePrice()" onpaste="validateAddEvent();validatePrice()" onclick="validateAddEvent();validatePrice()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Bildlänk:
                        </td>
                        <td>
                            <input type="text" name="pictureLink" id="pictureLink" value="<?php
                            if(isset($_POST['saveEvent'])) {
                                echo $_POST['pictureLink'];
                            }
                            ?>" onkeyup="validateAddEvent();validatePicture()" onpaste="validateAddEvent();validatePicture()" onclick="validateAddEvent();validatePicture()">
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <input type="hidden" name="page" value="addEvent">
                            <button class="generalButton" name="saveEvent" value="yes" id="submit" disabled>Spara</button>
                        </td>
                    </tr>
                </tbody>
            </table>
    </form>
    <form method="post" action="index.php">
        <div>
                <button class="generalButton" name="page" value="event">Tillbaka</button>
        </div>
    </form>
    </section>