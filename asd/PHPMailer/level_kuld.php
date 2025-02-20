<?php
include 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;

use function PHPSTORM_META\sql_injection_subst;

function VerificationSend(){

    //$email = $_POST['email'];

    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/SMTP.php";
    require_once "../PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //SMTP Settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "72517552872@szily.hu";//ide jön a küldő Gmail cím
    $mail->Password = "smgyyqoevqinypnw";//jelszó
    $mail->Port = 465; //587
    $mail->SMTPSecure = "ssl"; //tls

$email=$_GET["c"];//ide küldi az e-mail-t

//küldendő adatok

$targy="Jelszó megerősítés";
$oldal_cime="Gladiator.com";
$sql="SELECT kod FROM felhasznalo Where email='$email'";
mysqli_query($conn,$sql);
$tartalma="Önnek az aktíváló kódja a következő: "+$sql;



    //Email Settings
              //$mail->charSet = "UTF-8";
    $mail->isHTML(true);
    $mail->setFrom($email, $oldal_cime);
    $mail->addAttachment('../PHPMailer/level_kuld.php'); //csatolmány küldése
    $mail->addAddress($email);

    $mail->Subject = $targy;
    $mail->Body =$tartalma;
    $mail->CharSet = 'UTF-8';  //karakterkódolás
    //$mail->send();
              if(!$mail->Send())
{
   echo "Hiba a levél küldésekor. Próbálja újra!";
   exit;
}

echo "Az üzenet sikeresen továbbítva.";
}
//levél küldése
VerificationSend();

       

?>
