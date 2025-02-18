<?php
ini_set('display errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require_once"dbcontroller.php";
$db=new  DBController();
if($db->connectDB()){
    echo "Az adatbázis kapcsolat sikeres<br>";
}
else{
    echo "Az adatbázis kapcsolat sikertelen <br>";
}
$query="Select * FROM fishingrod";
$eredmeny=$db->executeSelectQuery($query);
if($eredmeny !== "Hiba") {
echo "Lekérdezés sikeres! <br>";
echo "<pre>";
print_r($eredmeny);
}
else{
 print_r($eredmeny);
 echo "Lekérdezés hiba<br>";
}