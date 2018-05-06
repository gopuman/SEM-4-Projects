<?php
    session_start();
    $game = $_SESSION["game"];
    $user = $_SESSION["userName"];
?>
<html>
<style>
    html{
        background-color:black;
        color:white;
        font-size:50px;
        text-align:center;
    }
    a{
        color: white;
    }
    a:hover{
        color: #FF5733;
    }
</style>
        <body>
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

    $sql = "select sum(points) from points";
    $q = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($q);
    $pts = $row[0];
    
    echo 'Your score is: ' . $row[0];

    if($game == "name")
    {
        $sql = "select * from highscores where userName = '$user'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count == 1)
        {
            $q2 = "select name_score from highscores where userName = '$user'";
            $res = mysqli_query($con,$q2);
            $row2 = mysqli_fetch_array($res);
            $pt = $row2[0];

            if($pts>$pt)
            {
            $q = "update highscores set name_score = '$pts' where userName = '$user'";
            $k = mysqli_query($con,$q);
            }
        }
        else{
            $q = "insert into highscores values('$user','$pts',0,0,0,0)";
            $result = mysqli_query($con,$q);
        }
    }

    if($game == "place")
    {
        $sql = "select * from highscores where userName = '$user'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count == 1)
        {
            $q2 = "select place_score from highscores where userName = '$user'";
            $res = mysqli_query($con,$q2);
            $row2 = mysqli_fetch_array($res);
            $pt = $row2[0];

            if($pts>$pt)
            {
            $q = "update highscores set place_score = '$pts' where userName = '$user'";
            $k = mysqli_query($con,$q);
            }
        }
        else{
            $q = "insert into highscores values('$user','$pts',0,0,0,0)";
            $result = mysqli_query($con,$q);
        }
    }

    if($game == "animal")
    {
        $sql = "select * from highscores where userName = '$user'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count == 1)
        {
            $q2 = "select animal_score from highscores where userName = '$user'";
            $res = mysqli_query($con,$q2);
            $row2 = mysqli_fetch_array($res);
            $pt = $row2[0];

            if($pts>$pt)
            {
            $q = "update highscores set animal_score = '$pts' where userName = '$user'";
            $k = mysqli_query($con,$q);
            }
        }
        else{
            $q = "insert into highscores values('$user','$pts',0,0,0,0)";
            $result = mysqli_query($con,$q);
        }
    }

    if($game == "thing")
    {
        $sql = "select * from highscores where userName = '$user'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count == 1)
        {   
            $q2 = "select thing_score from highscores where userName = '$user'";
            $res = mysqli_query($con,$q2);
            $row2 = mysqli_fetch_array($res);
            $pt = $row2[0];

            if($pts>$pt)
            {
            $q = "update highscores set thing_score = '$pts' where userName = '$user'";
            $k = mysqli_query($con,$q);
            }
        }
        else{
            $q = "insert into highscores values('$user','$pts',0,0,0,0)";
            $result = mysqli_query($con,$q);
        }
    }
    
    $q = "DELETE FROM points";
    $sql = mysqli_query($con,$q);

?>
<h1><a href = "npat.php">GO BACK TO PRACTICE</a><h1>
<h1><a href = "homepage1.php">GO BACK HOME</a><h1>
</body>
</html>
