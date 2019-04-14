<section class="list">
    <aside>
        <form method="post" action="index.php">
            <ul class="add_button">
                <li>
                    <button class="generalButton" name="page" value="addTickets">Lägg till ny visning</button>
                </li>
            </ul>
        </form>
    </aside>

    
    <section class="event_list">
        <table>
            <thead>
                <tr>
                    <th>
                        Titel
                    </th>
                    <th>
                        Visnings datum
                    </th>
                    <th>
                        Visnings tid
                    </th>
                    <th>
                        Salong
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
            
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

?>
        
                <form method="post" action="index.php">
                    <tr>
                        <td>
                            <?php echo $row2['eventName']; ?>
                        </td>
                        <td>
                            <?php echo $date; ?>
                        </td>
                        <td>
                            <?php echo $time; ?>
                        </td>
                        <td>
                            <?php echo $row3['theater']; ?>
                        </td>
                        <td>
                            <input type="hidden" name="page" value="changeTickets">
                            <input type="hidden" name="eventDateID" value="<?php echo $row['eventDateID']; ?>">
                            <button class="generalButton">Ändra</button>
                        </td>
                    </tr>

<?php 
    } //end of event list
?>
                </form>
            </tbody>
        </table>

    </section>
</section>