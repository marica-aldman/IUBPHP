<div class="validationForms">

    <section>
        <form method="post" action="index.php">
            <div>
<?php
            if(isset($_POST['validateTicketButton'])) {
                echo $errMessage; 
            }
?>
                <input type="hidden" name="page" value="validateTicket">
            </div>
            <div>
                <label for="ticketID">Biljettnummer</label>
                <input type="number" name="ticketID" id="ticketID1" onkeyup="validate_ticket()" onpaste="validate_ticket()" onclick="validate_ticket()">
            </div>
            <button class="generalButton" name="validateTicketButton">Validera biljett</button>
        </form>
    </section>

    <section>
        <form method="post" action="index.php">
            <div>
<?php
            if(isset($_POST['invalidateTicketButton'])) {
                echo $errMessage; 
            }
?>
                <input type="hidden" name="page" value="validateTicket">
            </div>
            <div>
                <label for="ticketID2">Biljettnummer</label>
                <input type="text" name="ticketID2" id="ticketID2" onkeyup="invalidate_ticket()" onpaste="invalidate_ticket()" onclick="invalidate_ticket()">
            </div>
            <button class="generalButton" name="invalidateTicketButton">Avvalidera biljett</button>
        </form>
    </section>

    <section>
        <form method="post" action="index.php">
            <div>
<?php
            if(isset($_POST['validateOrderButton'])) {
                echo $errMessage; 
            }
?>
                <input type="hidden" name="page" value="validateTicket">
            </div>
            <div>
                <label for="orderID">Ordernummer</label>
                <input type="text" name="orderID" id="orderID1" onkeyup="validate_order()" onpaste="validate_order()" onclick="validate_order()">
            </div>
            <button class="generalButton" name="validateOrderButton">Validera Order</button>
        </form>
    </section>

    <section>
        <form method="post" action="index.php" class="changeForm">
            <div>
<?php
            if(isset($_POST['invalidateOrderButton'])) {
                echo $errMessage; 
            }
?>
                <input type="hidden" name="page" value="validateTicket">
            </div>
            <div>
                <label for="orderID2">Ordernummer</label>
                <input type="text" name="orderID2" id="orderID2" onkeyup="invalidate_order()" onpaste="invalidate_order()" onclick="invalidate_order()">
            </div>
            <button class="generalButton" name="invalidateOrderButton">Avvalidera Order</button>
        </form>
    </section>

</div>