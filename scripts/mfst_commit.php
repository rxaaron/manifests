<?php

include_once('dbconn.php');

if (!$db) {
    echo 'ERROR: Could not connect to the database.';
} else {
    if (!isset($_POST['numpages'])){
        echo "Please enter number of pages.<br />Use the back button to return.";
    }else{
        $location=$_POST['location'];
        $datesent=date("Ydm",strtotime($_POST['datesent']));
        $numpages=$_POST['numpages'];
        
        $insert=$db->query("INSERT INTO Enc_Manifest (Location, DateSent, Status, NumPages) VALUES (".$location.",".$datesent.",1,'".$numpages."');");
    
        if ($insert){
            header("Location:/test/msft_entry.php");
        }
    }
}
?>
