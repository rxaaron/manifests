<?php
 
include_once('scripts/dbconn.php');

if (!$db) {
    echo 'ERROR: Could not connect to the database.';
} else {
    $query = $db->query("SELECT ID, Name FROM Enc_Locations WHERE Active=TRUE ORDER BY Priority DESC, Name ASC;");
    if($query){
        while($result = $query->fetch_object()){
            echo "<option value=\"".$result->ID."\" label=\"".$result->Name."\" />";
        }
    }
}
?>
