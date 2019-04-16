<?php

?>
        <footer>
            <hr>
            <div class="footerColumn">
                <p>© Faringe Bio</p>
            </div>
            <div class="footerColumn">
<?php   if($mainpage == "admin"){ ?>
                <form method="post" action="index.php">
                    <button name="page" value="client">Huvudsida</button>
                </form>
            </div>
<?php   

        } else { ?>
                <form method="post" action="index.php">
                    <button name="page" value="admin">Admin sidor</button>
                </form>
<?php   } ?>
            </div>

        </footer>
        </div>
        <script src="js/validation.js"></script>
        
    </body>
</html>