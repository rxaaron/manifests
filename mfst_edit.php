<?php

include_once('scripts/dbconn.php');

if (!$db) {
    echo 'ERROR: Could not connect to the database.';
} else {
    if (isset($_GET['ID'])){
        //specific manifest
        echo "I got pages!";
        
    }else{
        //general list
        $queryall=$db->query("SELECT A.ID, A.DateSent, B.Name, A.NumPages, A.Comments FROM Enc_Manifest AS A INNER JOIN Enc_Locations AS B ON A.Location=B.ID ORDER BY A.DateSent DESC;");
        if($queryall){
            echo "<table class=\"list\"><colgroup><col class=\"datesent\"><col class=\"location\"><col class=\"numpages\"><col class=\"comments\"></colgroup><tr><th>Date Sent</th><th>Location</th><th>Pages</th><th>Comments</th></tr>";
            while($resultall=$queryall->fetch_object()){
                echo "<tr><td>".$resultall->DateSent."</td><td><a href=\"index.php?ID=".$resultall->ID."\">".$resultall->Name."</a></td><td>".$resultall->NumPages."</td><td>".$resultall->Comments."</td></tr>";
            }
            echo "</table>";
        }
    }
}
?>
