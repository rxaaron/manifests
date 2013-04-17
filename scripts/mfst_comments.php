<?php

include_once('dbconn.php');

if (!$db) {
    echo 'ERROR: Could not connect to the database.';
} else {
    $query=$db->query("SELECT Comments FROM Enc_Manifest WHERE ID=".$_POST['ID'].";");
    if ($query){
        while($result=$query->fetch_object()){
            echo $result->Comments;
        }
    }
}
?>
