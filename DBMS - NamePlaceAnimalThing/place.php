<?php
    session_start();
    $_SESSION["game"] = "place";
?>
<html>
    <head>
        <style>
            h1
            {
                font-size:70px;
                color:white;
                text-align:center;
            }
            body
            {
                background-color:black;
            }
            input[type = "text"]
            {
                font-size:100%;
                color:black;
                margin-left:15%;
                margin-top: 5%;
                height:25%;
                width:53%;
            }
            #submit:hover{
                color:white;
                background-color:black;
                border:1px solid white;
            }
        </style>
    </head>
    <body>
    <h1><u>Practice Mode</u><h1>
            <form id = "form" method = "post" action = "place.php">
                PLACE:<input type = "text" name = "place">
                <input id = "submit" name = "submit" type = "submit" value = "ENTER">
            </form>
            <div id = "div1">

            </div>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "catalog";

        $con = mysqli_connect($servername,$username,$password,$dbname);

        if(!$con)
        {
            die('connection failed'.mysqli_error());
        }

        if(!isset($_POST["place"])){
            echo ' ';}
        
        else{

        $place = $_POST["place"];    
        
        $q = "SELECT * FROM place_cat where place = '$place'";
        $result = mysqli_query($con,$q);
        $count = mysqli_num_rows($result);

        if($count == 1)
        {
            $q = "INSERT INTO points values(5)";
            mysqli_query($con,$q);
            echo "The place you entered is in the database :)";
        }
        else
        {   
            $q = "INSERT INTO points values(-5)";
            mysqli_query($con,$q);
            echo "The place you entered is not in the database :(";
        }
    }
    
    ?>
    <script>
        function countdown(secs,elem){
            var element = document.getElementById(elem);
            element.innerHTML = "You have "+secs+" seconds remaining";
            if(secs < 1) {
		    clearTimeout(timer);
		    window.location.href = "dummy.php";
            }
            secs--;
            var timer = setTimeout('countdown('+secs+',"'+elem+'")',1000);
        }
    </script>
    <script>
        countdown(10,"div1");
    </script>
    </body>
</html>