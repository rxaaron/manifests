<?php

include_once('dbconn.php');

if (!$db) {
    echo 'ERROR: Could not connect to the database.';
} else {
    $update=$db->query("UPDATE Enc_Manifest SET Status=".$_POST['status'].", Comments='".$_POST['comments']."', NumPages = ".$_POST['numpages']." WHERE ID=".$_POST['ID'].";");
    
    if($update){
        header("Location:/manifests/index.php?goto=edit");
    }
}
?>
