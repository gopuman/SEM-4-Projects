<?php 
    session_start();
?>
<html>
    <head>
        <style>
            h1
            {
                font-size:100px;
                color:white;
                text-align:center;
            }
            body
            {
                background-color:black;
            }
            /*
            input[type = "text"]
            {
                color:white;
                margin-left:28%;
                margin-top: 28%;
                height:30%%;
                width:40%;
            }*/
        </style>
    </head>
    <body>
        <h1><u>Practice Mode</u><h1>
        <form id = "form" action = "npat.php" method = "GET"/>
            NAME<input id = "name" type = "radio" name = "NPAT" value = "name">
            PLACE<input id = "place" type = "radio" name = "NPAT" value = "place">
            ANIMAL<input id = "animal" type = "radio" name = "NPAT" value = "animal">
            THING<input id = "thing" type = "radio" name = "NPAT" value = "thing">
            <input type = "submit" name = "submit" value = "submit">
        </form>
        
    <?php
        if(isset($_GET["submit"])){

        if($_GET["NPAT"] == "name")
            header('Location: name.php');

        else if($_GET["NPAT"] == "place")
            header('Location: place.php');

        else if($_GET["NPAT"] == "animal")
            header('Location: animal.php');    
            
        else if($_GET["NPAT"] == "thing")
            header('Location: thing.php');
        
        }
    ?>
    </body>    
</html> 