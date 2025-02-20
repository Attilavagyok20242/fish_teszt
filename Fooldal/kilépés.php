
<?php
include 'connection/connection.php';
session_start();
session_unset();
session_destroy();
header("Location: http://localhost/mappa/Egeszegyben/asd/index.php");
exit();
?>