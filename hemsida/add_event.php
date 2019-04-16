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

<section class="addAndChange">
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
                            ?>" onkeyup="validate_add_event();validate_event_name()" onpaste="validate_add_event();validate_event_name()"
                            onclick="validate_add_event();validate_event_name()">
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
                            ?>">
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
                            ?>" onkeyup="validate_add_event();validate_director()" onpaste="validate_add_event();validate_director()" onclick="validate_add_event();validate_director()">
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
                            ?>" onkeyup="validate_add_event();validate_original_language()" onpaste="validate_add_event();validate_original_language()" onclick="validate_add_event();validate_original_language()">
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
                            ?>" onkeyup="validate_add_event();validate_info()" onpaste="validate_add_event();validate_info()" onclick="validate_add_event();validate_info()">
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
                            ?>" onkeyup="validate_add_event();validate_price()" onpaste="validate_add_event();validate_price()" onclick="validate_add_event();validate_price()">
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
                            ?>" onkeyup="validate_add_event();validate_picture()" onpaste="validate_add_event();validate_picture()" onclick="validate_add_event();validate_picture()">
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