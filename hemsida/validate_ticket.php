<div class="validationForms">

    <section>
        <form method="post" action="index.php">
            <div>
<?php
            if(isset($_POST['validateTicketButton'])) {
                echo $err_message; 
            }
?>
                <input type="hidden" name="page" value="validateTicket">
            </div>
            <div>
                <label for="ticketID">Biljettnummer</label>
                <input type="number" name="ticketID" id="ticketID1" onkeyup="validateTicket()" onpaste="validateTicket()" onclick="validateTicket()">
            </div>
            <button class="generalButton" name="validateTicketButton">Validera biljett</button>
        </form>
    </section>

    <section>
        <form method="post" action="index.php">
            <div>
<?php
            if(isset($_POST['invalidateTicketButton'])) {
                echo $err_message; 
            }
?>
                <input type="hidden" name="page" value="validateTicket">
            </div>
            <div>
                <label for="ticketID2">Biljettnummer</label>
                <input type="text" name="ticketID2" id="ticketID2" onkeyup="invalidateTicket()" onpaste="invalidateTicket()" onclick="invalidateTicket()">
            </div>
            <button class="generalButton" name="invalidateTicketButton">Avvalidera biljett</button>
        </form>
    </section>

    <section>
        <form method="post" action="index.php">
            <div>
<?php
            if(isset($_POST['validateOrderButton'])) {
                echo $err_message; 
            }
?>
                <input type="hidden" name="page" value="validateTicket">
            </div>
            <div>
                <label for="orderID">Ordernummer</label>
                <input type="text" name="orderID" id="orderID1" onkeyup="validateOrder()" onpaste="validateOrder()" onclick="validateOrder()">
            </div>
            <button class="generalButton" name="validateOrderButton">Validera Order</button>
        </form>
    </section>

    <section>
        <form method="post" action="index.php" class="changeForm">
            <div>
<?php
            if(isset($_POST['invalidateOrderButton'])) {
                echo $err_message; 
            }
?>
                <input type="hidden" name="page" value="validateTicket">
            </div>
            <div>
                <label for="orderID2">Ordernummer</label>
                <input type="text" name="orderID2" id="orderID2" onkeyup="invalidateOrder()" onpaste="invalidateOrder()" onclick="invalidateOrder()">
            </div>
            <button class="generalButton" name="invalidateOrderButton">Avvalidera Order</button>
        </form>
    </section>

</div>