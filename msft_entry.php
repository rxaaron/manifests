<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form name="msft" action="scripts/mfst_commit.php" method="POST" autocomplete="off">
            <select name="location">
                <?php include_once('scripts/locations.php'); ?>
            </select>
            <br />
            <input type="text" name="numpages" value="" size="24" autocomplete="off" />
            <br />
            <input type="text" name="datesent" value="<?php echo date("m-d-Y", strtotime("2013-04-15")); ?>" size="24" autocomplete="off" />
            <br />
            <input type="submit" value="Submit" name="submit" />
        </form>
    </body>
</html>