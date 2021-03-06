<?php
    include_once('dbconn.php');
    
    if(!$db){
        echo 'ERROR: Could not connect to the database.';
    }  else {
        $query=$db->query("SELECT DISTINCT DateSent FROM Enc_Manifest WHERE Status = 1 OR Status = 3 ORDER BY DateSent DESC;");
        if ($query){
            while($result=$query->fetch_object()){
                $subquery=$db->query("SELECT A.ID, B.Name, A.NumPages, A.Comments FROM Enc_Manifest AS A INNER JOIN Enc_Locations AS B ON A.Location=B.ID WHERE A.DateSent=\"".$result->DateSent."\" AND (A.Status=1 OR A.Status=3) ORDER BY B.Name;");
                if ($subquery){
                    echo "<h2>".date("m/d/Y",strtotime($result->DateSent))."</h2>";
                    while($subresult=$subquery->fetch_object()){
                        echo "<div id=\"mfst".$subresult->ID."\" class=\"manifests\"><h3><a href=\"http://gmapserver.grcs.local/manifests/index.php?ID=".$subresult->ID."\">".$subresult->Name."</a></h3>Number of Pages: ".$subresult->NumPages;
                        echo "</div>";
                    }
                }
            }
        }
    }
?>