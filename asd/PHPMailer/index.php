<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<?php
// Registration and Login
include("connection/connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Nev']) && isset($_POST['Jelszo'])) {
             $nev = mysqli_real_escape_string($con, $_POST['Nev']);
             $jelszo = mysqli_real_escape_string($con, $_POST['Jelszo']);
             $email=mysqli_real_escape_string($con, $_POST['email']);
             $emailfoglalt=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM felhasznalo WHERE felhasznalo_gmail='$email'or felhasznalo_nev='$nev'"));
             $pattern = "/^([a-zA-Z0-9_\.-]+)@([a-zA-Z0-9_\.-]+)\.([a-zA-Z\.]{2,6})$/";
             if($email==$emailfoglalt["felhasznalo_gmail "] || $nev==$emailfoglalt["felhasznalo_nev"]){
                echo "<script>alert('Ez az email foglalt');</script>";
             }
             else if(preg_match($pattern, $email)){
                $rnd=rand(1000,9999);
                $kod="Select kod From felhasznalo";
                if($kod==$rnd){
                    $rnd=rand(1000,9999);
                    $rndupdate="UPDATE felhasznalo SET kod=$rnd WHERE felhasznalo_gmail='$email'";
                    $query = "INSERT INTO felhasznalo (felhasznalo_nev, felhasznalo_jel, felhasznalo_gmail,Szerep,megerositve,kod) VALUES ('$nev', '$jelszo', '$email',0,0,$rnd)";
                }
               else{
                $query = "INSERT INTO felhasznalo (felhasznalo_nev, felhasznalo_jel, felhasznalo_gmail,Szerep,megerositve,kod) VALUES ('$nev', '$jelszo', '$email',0,0,$rnd)";
               }
                $result = mysqli_query($con, $query);
                header('Refresh: 3; url=http://localhost/mappa/Egeszegyben/asd/PHPMailer/Felhasznalomegerosites.php');
            }   
        }
        else if (isset($_POST['Nevs']) && isset($_POST['Jelszos'])) {
        session_start();
        $nev = mysqli_real_escape_string($con, $_POST['Nevs']);
        $jelszo = mysqli_real_escape_string($con, $_POST['Jelszos']);
        $sor=mysqli_query($con,"SELECT * FROM felhasznalo WHERE felhasznalo_nev='$nev' AND felhasznalo_jel='$jelszo'");
        $bejelentkezett=mysqli_query($con,"UPDATE felhasznalo SET aktív=true WHERE felhasznalo_nev='$nev' AND felhasznalo_jel='$jelszo'");
        $row = mysqli_fetch_array($sor);
        if($row['Szerep']==1)
        {
            header('Refresh: 3; url=http://localhost/mappa/Egeszegyben/Administrator/index.php');
            $_SESSION['id'] = $row['id'];
            $_SESSION['nev'] = $row['felhasznalo_nev'];
            $_SESSION['jelszo'] = $row['felhasznalo_jel'];
        }
        else if($row['Szerep']==0)
        {
            header('Refresh: 3; url=http://localhost/mappa/Egeszegyben/Fooldal/weblap.html');
            $_SESSION['id'] = $row['id'];
            $_SESSION['nev'] = $row['felhasznalo_nev'];
            $_SESSION['jelszo'] = $row['felhasznalo_jel'];
            
        }
        else{
            echo "Hibás felhasználónév vagy jelszó!";
        }
        
    }
}
?>
    <div class="container">
        <div class="form-box login">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h1>Login</h1>
           
                <div class="input-box">
                <label for="Nevs"></label>
                    <input type="text" placeholder="Felhasználó név" name="Nevs"required>
                    <i class="bx bx-user"></i>                   
                </div>
                <div class="input-box">
                    <label for="Jelszos"></label>
                    <input type="password" placeholder="Jelszó" name="Jelszos" required>
                       <i class="bx bx-lock-alt"></i> 
                </div>
                <div class="forgot-link">
                    <a href="forgot-password.php">Elfelejtetted a Jelszavad?</a>
                </div>
                <button type="submit" class="btn" ">Bejelentkezés</button>
                <p>Egyéb bejelenkezési formák</p>
                    <div class="social-icons">
                        <a href="#"><i class="bx bxl-facebook"></i></a>
                        <a href="#"><i class="bx bxl-twitter"></i></a>
                        <a href="#"><i class="bx bxl-instagram"></i></a>
                        <a href="#"><i class="bx bxl-google"></i></a>
                    </div>
                
            </form>
        </div>
        <div class="form-box register">
            <form action="" method="post" id="register">
                <h1>Regisztráció</h1>
                <div class="input-box">
                <label for="Nev"></label>
                    <input type="text" placeholder="Felhasználó Név" name="Nev" required>
                    <i class="bx bx-user"></i>                   
                </div>
                <div class="input-box">
                <label for="email"></label>
                    <input type="email" placeholder="email" name="email" id="email" required>
                    <i class="bx bx-envelope"></i>               
                </div>
                <div class="input-box">
                <label for="Jelszo"></label>
                    <input type="password" placeholder="Jelszó" name="Jelszo"required>
                       <i class="bx bx-lock-alt"></i> 
                </div>
                <button type="submit" class="btn" onclick="atad()" >Regisztráció</button>
                <p>Egyéb regisztrácós formák</p>
                    <div class="social-icons">
                        <a href="#"><i class="bx bxl-facebook"></i></a>
                        <a href="#"><i class="bx bxl-twitter"></i></a>
                        <a href="#"><i class="bx bxl-instagram"></i></a>
                        <a href="#"><i class="bx bxl-google"></i></a>
                    </div>
               
            </form>
        </div>
            <div class="toggle-box">
                <div class="toggle-panel toggle-left">
                    <h1>Üdvözöllek</h1>
                    <p> Nincs fiókod? </p>
                    <button class="btn register-btn">
                         Regisztráció
                    </button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Köszöntünk ismét!</h1>
                    <p> Már van fiókód?</p>
                    <button class="btn login-btn">
                        Bejelenetkezés
                    </button>
                </div>
            </div>
    </div>

    <script src="javascript/script.js"></script>


</body>

</html>