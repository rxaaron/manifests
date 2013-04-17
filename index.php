<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Manifest Management</title>
        <link rel="stylesheet" href="rsc/manifest.css" type="text/css" />
        <link rel="shortcut icon" href="rsc/favicon.ico" />
        <script>
            function changepage(pagename){
                var xmlhttp;
                xmlhttp=new XMLHttpRequest();
                xmlhttp.open("POST",pagename,false);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send();
                document.getElementById("content").innerHTML=xmlhttp.responseText;  
                return false;
            };
         </script>
    </head>
    <body>
        <div id="banner">
            <a href="http://gmapserver/"><img src="rsc/ENC_Logo.png" alt="Encore!!!" width ="250" height="100"></a>
        </div>            
        <div id="menu">
            <a href="index.php" onclick="return changepage('mfst_entry.php');">Enter Manifest</a>
            <a href="index.php" onclick="return changepage('mfst_edit.php');">Change Manifest</a>
        </div>
        <div id="main">
            <div id="title">
                <h1>Manifest Management</h1>
            </div>
            <div id="content">
                <?php 
                    if(isset($_GET['ID'])){
                        include_once 'mfst_edit.php';
                    }else{
                        include_once 'mfst_entry.php';
                    }
                ?>
            </div>
        </div>            
        <div id="sidebar">
        &nbsp;</div>
    </body>
</html>
