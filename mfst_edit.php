<?php

include_once('scripts/dbconn.php');

if (!$db) {
    echo 'ERROR: Could not connect to the database.';
} else {
    if (isset($_GET['ID'])){
        //specific manifest
        $queryone=$db->query("SELECT A.ID, A.DateSent, B.Name AS Location, A.NumPages, A.Status, A.Comments FROM Enc_Manifest AS A INNER JOIN Enc_Locations AS B ON A.Location=B.ID WHERE A.ID=".$_GET['ID'].";");
        if($queryone){
            $status=$db->query("SELECT ID, Name FROM Enc_MfstStatus WHERE Active=true;");
            echo "<form name=\"mfst_edit\" action=\"scripts/mfst_update.php\" method=\"POST\" autocomplete=\"off\">";
            echo "<table><colgroup><col name=\"label\" style=\"width:250px;\"><col name=\"boxes\" style=\"width:300px;\"></colgroup>";
            while($resultone=$queryone->fetch_object()){
                echo "<tr><td>Database ID:</td><td>".$resultone->ID."<input type=\"hidden\" id=\"ID\" name=\"ID\" value=\"".$resultone->ID."\"></td></tr>";
                echo "<tr><td>Location:</td><td>".$resultone->Location."</td></tr>";
                echo "<tr><td>Date Sent:</td><td>".date("m/d/Y",strtotime($resultone->DateSent))."</td></tr>";
                echo "<tr><td>Number of Pages:</td><td><input type=\"text\" name=\"numpages\" id=\"numpages\" value=\"".$resultone->NumPages."\"></td></tr>";
                echo "<tr><td>Status:</td><td><select name=\"status\" id=\"status\">";
                while($stats=$status->fetch_object()){
                    if($resultone->Status==$stats->ID){
                        echo "<option value=\"".$stats->ID."\" label=\"".$stats->Name."\" selected>".$stats->Name."</option>";
                    }else{
                        echo "<option value=\"".$stats->ID."\" label=\"".$stats->Name."\">".$stats->Name."</option>";
                    }
                }
                echo "</select></td></tr>";
                echo "<tr><td>Comments:</td><td><textarea name=\"comments\" id=\"comments\" rows=10 columns=30>".$resultone->Comments."</textarea></td></tr></table>";
                echo "<input type=\"submit\" id=\"gobtn\" value=\"Update Manifest\" style=\"padding:10px 40px 10px 40px;\" /></form>";
            }
        }
        
    }else{
        //general list
        $queryall=$db->query("SELECT A.ID, A.DateSent, B.Name AS Location, A.NumPages, C.Name AS Status, A.Comments FROM Enc_Manifest AS A INNER JOIN Enc_Locations AS B ON A.Location=B.ID INNER JOIN Enc_MfstStatus AS C ON A.Status = C.ID  WHERE (A.Status=1 OR A.Status=2 OR A.Status=3) ORDER BY A.DateSent DESC, B.Name ASC;");
        if($queryall){
            echo "<table class=\"list\"><colgroup><col class=\"datesent\"><col class=\"location\"><col class=\"numpages\"><col class=\"status\"><col class=\"comments\"></colgroup><tr><th>Date Sent</th><th>Location</th><th>Pages</th><th>Status</th><th>Comments</th></tr>";
            while($resultall=$queryall->fetch_object()){
                echo "<tr><td>".date("m/d/Y",strtotime($resultall->DateSent))."</td><td><a href=\"index.php?ID=".$resultall->ID."\">".$resultall->Location."</a></td><td>".$resultall->NumPages."</td><td>".$resultall->Status."</td><td>".$resultall->Comments."</td></tr>";
            }
            echo "</table>";
        }
    }
}
?>
