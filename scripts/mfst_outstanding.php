<?php
    include_once('dbconn.php');
    
    if(!$db){
        echo 'ERROR: Could not connect to the database.';
    }  else {
        $query=$db->query("SELECT DISTINCT DateSent FROM Enc_Manifest WHERE Status = 1 OR Status = 3 ORDER BY DateSent DESC;");
        if ($query){
            while($result=$query->fetch_object()){
                $subquery=$db->query("SELECT A.ID, B.Name FROM Enc_Manifest AS A INNER JOIN Enc_Locations AS B ON A.Location=B.ID WHERE A.DateSent=\"".$result->DateSent."\" AND (A.Status=1 OR A.Status=3);");
                if ($subquery){
                    echo "<h1>".date("m/d/Y",strtotime($result->DateSent))."</h1>";
                    while($subresult=$subquery->fetch_object()){
                        echo "<h2><a href=\"manifests/mfst_edit.php?ID=".$subresult->ID."\">".$subresult->Name."</a></h2><a href=\"index.php\" onclick=\"return expandbox(".$subresult->ID.");\">More</a><br /><br />";
                    }
                }
            }
        }
    }
?>