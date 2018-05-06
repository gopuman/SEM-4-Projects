<?php
    session_start();
    $game = $_SESSION["game"];
    $user = $_SESSION["userName"];
?>
<html>
    <head>
        <style>
            table,th,td{
                border-collapse:collapse;
                border: 1px solid black;
                padding: 15px;
                text-align:center;
                background-color:white;
                font-size:20px;
            }

            td{
                font-weight:bold;
            }

            td:hover {background-color: black;
                        color:#00cc7a;}

            th{
                background-color:black;
                color:white;
            }

            caption{
                font-size:50px;
            }

            table{
                width:50%;
            }

            body{
                border:2px solid black;
                padding:50px;
                background-color:#2196f3;
            }
            form {
                width:500px;
                margin:50px auto;
            }
            input[type="text"] {
                padding:8px 15px;
                background:black;
                border:0px solid #dbdbdb;
                color:white;
            }
            input[type="submit"] {
                position:relative;
                padding:6px 15px;
                left:-8px;
                border:2px solid black;
                background-color:#207cca;
                color:#fafafa;
            }
            input[type="submit"]:hover  {
                background-color:#fafafa;
                color:#207cca;
            }

            caption{
                text-decoration:underline;
                padding-bottom:5px;
            }
            a{
                position:absolute;
                top:50px;
                color:black;
                font-size:30px;
                text-decoration:none;
            }
           
        </style>
    </head>
    <body>
        <form align = "center" method = "post">
            <input id = "text" placeholder = "Search for a user" name = "user" type = "text"/>
            <input name = "submit" type = submit>
        </form>
        <a href = "homepage1.php"><--- Go back</a>
    </body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "catalog";

        $con = mysqli_connect($servername,$username,$password,$dbname);
        
        if(!isset($_POST["user"])){
        $query = "select * from highscores";
        $result = mysqli_query($con,$query);
        $result1 = mysqli_query($con,$query);
        $result2 = mysqli_query($con,$query);
        $result3 = mysqli_query($con,$query);
        $result4 = mysqli_query($con,$query);  

        echo "<center>";
        echo "<table>"; // start a table tag in the HTML
        echo "<caption>Highscores for NPAT</caption>";
        echo "<th>Username</th><th>Highscore</th>";
        while($row = mysqli_fetch_array($result4)){   //Creates a loop to loop through results
        echo "<tr><td>" . $row['userName'] . "</td><td>" . $row['npat_score'] . "</td></tr>";}
        echo "</table>";
        echo "</center>";        

        echo "<br>";    
        echo "<center>";
        echo "<table>"; // start a table tag in the HTML
        echo "<caption>Highscores for Name practice</caption>";
        echo "<th>Username</th><th>Highscore</th>";
        while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
        echo "<tr><td>" . $row['userName'] . "</td><td>" . $row['name_score'] . "</td></tr>";}
        echo "</table>";
        echo "</center>";

        echo "<br>";
        echo "<center>";
        echo "<table>"; // start a table tag in the HTML
        echo "<caption>Highscores for Place practice</caption>";
        echo "<th>Username</th><th>Highscore</th>";
        while($row = mysqli_fetch_array($result1)){   //Creates a loop to loop through results
        echo "<tr><td>" . $row['userName'] . "</td><td>" . $row['place_score'] . "</td></tr>";}
        echo "</table>";
        echo "</center>";

        echo "<br>";
        echo "<center>";
        echo "<table>"; // start a table tag in the HTML
        echo "<caption>Highscores for Animal practice</caption>";
        echo "<th>Username</th><th>Highscore</th>";
        while($row = mysqli_fetch_array($result2)){   //Creates a loop to loop through results
        echo "<tr><td>" . $row['userName'] . "</td><td>" . $row['animal_score'] . "</td></tr>";}
        echo "</table>";
        echo "</center>";

        echo "<br>";
        echo "<center>";
        echo "<table>"; // start a table tag in the HTML
        echo "<caption>Highscores for Thing practice</caption>";
        echo "<th>Username</th><th>Highscore</th>";
        while($row = mysqli_fetch_array($result3)){   //Creates a loop to loop through results
        echo "<tr><td>" . $row['userName'] . "</td><td>" . $row['thing_score'] . "</td></tr>";}
        echo "</table>";
        echo "</center>";}

        else{
            $name = $_POST["user"];
            
            $q1 = "select * from highscores where userName like '%{$user}%'";
            $result = mysqli_query($con,$q1);
            $result1 = mysqli_query($con,$q1);
            $result2 = mysqli_query($con,$q1);
            $result3 = mysqli_query($con,$q1);
            $result4 = mysqli_query($con,$q1); 

            
        echo "<center>";
        echo "<table>"; // start a table tag in the HTML
        echo "<caption>Highscores for NPAT</caption>";
        echo "<th>Username</th><th>Highscore</th>";
        while($row = mysqli_fetch_array($result4)){   //Creates a loop to loop through results
        echo "<tr><td>" . $row['userName'] . "</td><td>" . $row['npat_score'] . "</td></tr>";}
        echo "</table>";
        echo "</center>";        

        echo "<br>";    
        echo "<center>";
        echo "<table>"; // start a table tag in the HTML
        echo "<caption>Highscores for Name practice</caption>";
        echo "<th>Username</th><th>Highscore</th>";
        while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
        echo "<tr><td>" . $row['userName'] . "</td><td>" . $row['name_score'] . "</td></tr>";}
        echo "</table>";
        echo "</center>";

        echo "<br>";
        echo "<center>";
        echo "<table>"; // start a table tag in the HTML
        echo "<caption>Highscores for Place practice</caption>";
        echo "<th>Username</th><th>Highscore</th>";
        while($row = mysqli_fetch_array($result1)){   //Creates a loop to loop through results
        echo "<tr><td>" . $row['userName'] . "</td><td>" . $row['place_score'] . "</td></tr>";}
        echo "</table>";
        echo "</center>";

        echo "<br>";
        echo "<center>";
        echo "<table>"; // start a table tag in the HTML
        echo "<caption>Highscores for Animal practice</caption>";
        echo "<th>Username</th><th>Highscore</th>";
        while($row = mysqli_fetch_array($result2)){   //Creates a loop to loop through results
        echo "<tr><td>" . $row['userName'] . "</td><td>" . $row['animal_score'] . "</td></tr>";}
        echo "</table>";
        echo "</center>";

        echo "<br>";
        echo "<center>";
        echo "<table>"; // start a table tag in the HTML
        echo "<caption>Highscores for Thing practice</caption>";
        echo "<th>Username</th><th>Highscore</th>";
        while($row = mysqli_fetch_array($result3)){   //Creates a loop to loop through results
        echo "<tr><td>" . $row['userName'] . "</td><td>" . $row['thing_score'] . "</td></tr>";}
        echo "</table>";
        echo "</center>";
    
        }          
        
    ?>
</html>



















