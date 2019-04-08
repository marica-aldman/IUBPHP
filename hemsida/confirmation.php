<section>


<div>
    <table>
        <thead>
            <tr>
                <th>Film
                </th>
                <th>Salong
                </th>
                <th>Datum
                </th>
                <th>Tid
                </th>
                <th>Antal Biljetter
                </th>
                <th>Pris
                </th>
            </tr>
        </thead>
        <tbody>
<?php
                    $totalPrice = 0;
                    if($basketTotalProductTypes>0) {
                        $i=0;
                        for($i=1; isset($_COOKIE["eventID" . $i]); $i++) {
                            $singleMovieObject->eventID = $_COOKIE["eventID" . $i];
                            $result = $singleMovieObject->get_event();
                            $row = $result->fetch();
                        
?>
                    <tr>
                        <td><?php echo $row['eventName']; ?>
                        </td>
                        <td><?php echo "venue"; // change to venue ?>
                        </td>
                        <td><?php echo "datum"; // change to date ?>
                        </td>
                        <td><?php echo "tid"; // change to time ?>
                        </td>
                        <td>
                            <div class="basketText noOfTickets" id="noOfTickets<?php echo $i; ?>"><?php echo $_COOKIE["noOfTickets" . $i]; ?></div>
                        </td>
                        <td ><div class="basketText" id="price<?php echo $i; ?>"><?php $price = (int) $row['price'] * (int) $_COOKIE["noOfTickets" . $i]; echo $price; ?></div>
                        </td>
                    </tr>

<?php
                    $totalPrice = $totalPrice + $price;
                        }
                    }
?>
                    
                    <tr>
                        <td colspan=5>
                            Total Summa:
                        </td>
                        <td>
                            <?php echo $totalPrice; ?>
                        </td>
                    </tr>
        </tbody>
    </table>
</div>

</section>