<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Felhasznaló Megerősítés</title>
</head>
<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="number" name="megerosites" required>
    <button type="submit">Küldés</button>
    </form>
    <?php
    include ("connection/connection.php");
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {
        if(isset($_GET['megerosites']))
        {
            $megerosites= $_GET['megerosites'];
            $kod="SELECT kod From felhasznalo WHERE megerositve=false";
            if($megerosites==$kod){
                $sql="UPDATE felhasznalo SET megerositve=true WHERE kod='$kod'";
                $result=$conn->query($sql);
                if($result){
                    echo "Sikeres megerősítés";
                    header("Location: http://localhost/Egeszegyben/asd/PHPMailer/index.php");
                }else{
                    echo "Sikertelen megerősítés";
                }
            }
        }
       
    }
?>
    
</body>
</html>


