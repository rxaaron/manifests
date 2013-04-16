<form name="msft" action="scripts/mfst_commit.php" method="POST" autocomplete="off">
    <table>
        <tr>
            <td>Location:</td>
            <td>
                <select name="location"><?php include_once('scripts/locations.php'); ?></select>
            </td>
        </tr>
        <tr>
            <td>Number of Pages:</td>
            <td>
                <input type="text" name="numpages" value="" size="24" autocomplete="off" />
            </td>
        </tr>
        <tr>
            <td>Date Sent:</td>
            <td>
                <input type="text" name="datesent" value="<?php echo date("m/d/Y"); ?>" size="24" autocomplete="off" />
            </td>
        </tr>
    </table>
    <br />
    <br />
    <input type="submit" value="Submit" name="submit" class="entry" />
</form>