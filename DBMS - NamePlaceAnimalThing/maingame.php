<?php
    session_start();  
    if(isset($_SESSION["userName"]))
    $user = $_SESSION["userName"];
    else
    echo "Not set"; 
    $game1 = $_SESSION["game1"];     

?>
<html>
<head>
<style type="text/css">
h1{
    color:black;
    font-size:80px;
}

a{
    text-decoration:none;
    color:black;
}

a:hover{
    color:white;    
}

button {
		border-radius: 4px;
		background-color: #f4511e;
		border:3px black solid;
		color: white;
		text-align: center;
		font-size: 28px;
		padding: 20px;
		width: 220px;
		margin: 5px;
}

button:hover{
    border:3px #f4511e solid;
    color:white;
    background-color:black;
}

body{
    border:2px solid black;
    padding:50px;
    background-color:#207cca;
    
}

div{
    float:right;
    position: absolute;
    top: 35%;
    left: 47%;
    padding:50px;
    margin: -100px 0 0 -200px;
    background-color: rgba(0,0,0,0.7);
    border: 1px solid white;
    width: 400px;
    font-size: 15px;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    color:white;   

}

input[type = text]{
    float:right;
    padding-right:10px;
    margin-right:40px;
}

input[type=submit]{
   background-color: white;
   border: none;
   color: black;
   padding: 16px 32px;
   text-decoration: none;
   margin:20px;
}

input[type=submit]:hover{
    background-color:#2196f3;
    color:white;
}

</style>
</head>
    <body>
<center>
    <div>
    <form action="maingame.php" method="post">
        Enter Letter: <input type = "text" name = "letter">
        <br/><br/>
        Enter Name: <input type="text" name="name">
        <br/><br/>
        Enter Place: <input type="text" name="place">
        <br/><br/>
        Enter Animal: <input type="text" name="animal">
        <br/><br/>
        Enter Thing: <input type="text" name="thing">
        <br/><br/>
        <input type="submit" name = "submit1" value="Enter">
    </form>
    </div>
    <button><a href = "score.php"><span>END GAME</span></button>
</center>
</body>
<?php

    if(!isset($_POST["submit1"]))
    {
        echo "";
    }

    else{
    $letter = $_POST["letter"];
    $name = $_POST["name"];
    $place = $_POST["place"];
    $animal = $_POST["animal"];
    $thing = $_POST["thing"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "catalog";
 
    $con = mysqli_connect($servername,$username,$password,$dbname);
    
    $result = mysqli_query($con,"SHOW TABLES LIKE '".$user."'");
    if(mysqli_num_rows($result) == 1) {
            $q1 = "INSERT INTO $user VALUES('$letter','$name','$place','$animal','$thing')";
            mysqli_query($con,$q1);
        }
    
    else {
        $sql = "Create table $user (letter varchar(1),name varchar(50),place varchar(50),animal varchar(50),thing varchar(50))";
        mysqli_query($con,$sql);
        $q = "INSERT INTO $user VALUES('$letter','$name','$place','$animal','$thing')";
        mysqli_query($con,$q);
    }
    }
?>
</body>
</html>