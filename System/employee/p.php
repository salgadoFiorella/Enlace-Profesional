<!doctype html>
<html lang="es_ES">
<body>
    <div>
    <form action="../send_emails.php" method="post">
        <input id ="mail" name="mail"></input>
        <button type = "submit">enviar correo</button>
    </form>
        <input type="hidden" value="<?php echo $row['id'];?>" name="id">
        <button type="submit" class="btn btn-danger"><i class="fa fa-ban"></i></button>
        </form>
    </div>

    <?php
        // $s = "h";
        // if(empty($s)){
        //     echo "hola";
        // }else{
        //     echo "no";
        // }

    ?>
</body>
</html>