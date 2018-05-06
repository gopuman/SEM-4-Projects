<?php
    session_start();
    $game1 = $_SESSION["game1"];
    $user = $_SESSION["userName"];
?>
<html>
<style>
    body{
        font-size:50px;
        text-align:center;
    }

    table,th,td{
        border-collapse:collapse;
        border: 1px solid black;
        padding: 15px;
        text-align:center;
        background-color:#00cc7a;
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
        background-color:#527a7a;
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

    $query = "select * from $user";
    $result = mysqli_query($con,$query);

    echo "<center>";
    echo "<table>"; 
    echo "<caption>SCORECARD</caption>";
    echo "<th>Letter</th><th>Name</th><th>Place</th><th>Animal</th><th>Thing</th>";
    while($row = mysqli_fetch_array($result))
    {   
    echo "<tr><td>" . $row['letter'] . "</td><td>" . $row['name'] . "</td><td>" . $row['place'] . "</td><td>" . $row['animal'] . "</td><td>" . $row['thing'] . "</td></tr>";}             
    echo "</table>";
    echo "</center>";

    $score = 0;
    $i = 0;

    $x = "SELECT * FROM $user";
    while($row = mysqli_fetch_array($x))
    {
        for($i=0;$i<5;$i++)
        {
            ${'l'.$i} = $row['letter'];
            ${'n'.$i} = $row['name'];
            ${'p'.$i} = $row['place'];
            ${'a'.$i} = $row['animal'];
            ${'t'.$i} = $row['thing'];
        }
    }

    if($game1 == "sportspersons"){
        $sql = "select * from football_cat where player = '$n' union select * from tennis_cat where player = '$n'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count == 1)
            $score = $score + 1;
    
    /*
    $y = mysqli_query($con,$x);
    $res2 = mysqli_query($con,"SELECT * FROM $user WHERE letter = 'b' ");
    $res3 = mysqli_query($con,"SELECT * FROM $user WHERE letter = 'c' ");
    $res4 = mysqli_query($con,"SELECT * FROM $user WHERE letter = 'd' ");
    $res5 = mysqli_query($con,"SELECT * FROM $user WHERE letter = 'e' ");

    while($row2 = mysqli_fetch_array($y))
    {
        $l = $row2['letter'];
        $n = $row2['name'];
        $p = $row2['place'];
        $a = $row2['animal'];
        $t = $row2['thing'];
    }

    while($row3 = mysqli_fetch_array($res2))
    {
        $l3 = $row3['letter'];
        $n3 = $row3['name'];
        $p3 = $row3['place'];
        $a3 = $row3['animal'];
        $t3 = $row3['thing'];
    }

    while($row4 = mysqli_fetch_array($res3))
    {
        $l4 = $row4['letter'];
        $n4 = $row4['name'];
        $p4 = $row4['place'];
        $a4 = $row4['animal'];
        $t4 = $row4['thing'];
    }


    if($game1 == "sportspersons"){
        $sql = "select * from football_cat where player = '$n' union select * from tennis_cat where player = '$n'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count == 1)
            $score = $score + 1;

        $sql = "select * from football_cat where player = '$n3' union select * from tennis_cat where player = '$n3'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count == 1)
            $score = $score + 1;

        $sql = "select * from football_cat where player = '$n4' union select * from tennis_cat where player = '$n4'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count == 1)
            $score = $score + 1;
        }
        
    else if($game1 == "hollywood"){
            $sql = "select * from hollywood_cat where name = '$n'";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if($count == 1)
                $score = $score + 1;

            $sql = "select * from hollywood_cat where name = '$n3'";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if($count == 1)
                $score = $score + 1;

            $sql = "select * from hollywood_cat where name = '$n4'";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if($count == 1)
            $score = $score + 1;
            }

    else if($game1 == "4thsem"){
        $sql = "select * from student_cat where player = '$n'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count == 1)
            $score = $score + 1;

        $sql = "select * from student_cat where player = '$n3'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count == 1)
            $score = $score + 1;

        $sql = "select * from student_cat where player = '$n4'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count == 1)
            $score = $score + 1;
        }

    else if($game1 == "bollywood"){
            $sql = "select * from actors_cat where player = '$n'";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if($count == 1)
                $score = $score + 1;

            $sql = "select * from actors_cat where player = '$n3'";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if($count == 1)
                $score = $score + 1;

            $sql = "select * from actors_cat where player = '$n4'";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if($count == 1)
                $score = $score + 1;
            }

    else if($game1 == "All"){
                $sql = "select * from actors_cat where name = '$n' UNION select * from name_cat where name = '$n' UNION select * from football_cat where player = '$n' UNION select * from hollywood_cat where name = '$n'UNION select * from student_cat where name = '$n' UNION select * from football_cat where player = '$n'";
                $result = mysqli_query($con,$sql);
                $count = mysqli_num_rows($result);
                if($count == 1)
                    $score = $score + 1;
                  

                $sql = "select * from actors_cat where name = '$n3' UNION select * from name_cat where name = '$n3' UNION select * from football_cat where player = '$n3' UNION select * from hollywood_cat where name = '$n3'UNION select * from student_cat where name = '$n3' UNION select * from football_cat where player = '$n3'";
                $result = mysqli_query($con,$sql);
                $count = mysqli_num_rows($result);
                if($count == 1)
                    $score = $score + 1;
                  
            
                $sql = "select * from actors_cat where name = '$n4' UNION select * from name_cat where name = '$n4' UNION select * from football_cat where player = '$n4' UNION select * from hollywood_cat where name = '$n4'UNION select * from student_cat where name = '$n4' UNION select * from football_cat where player = '$n4'";
                $result = mysqli_query($con,$sql);
                $count = mysqli_num_rows($result);
                if($count == 1)
                    $score = $score + 1;
                }  
        
        $sel1 = "select * from place_cat where place = '$p'";
        $res12 = mysqli_query($con,$sel1);
        $count = mysqli_num_rows($res12);
        if($count == 1)
            $score = $score + 1;

        $sel1 = "select * from place_cat where place = '$p3'";
        $res12 = mysqli_query($con,$sel1);
        $count = mysqli_num_rows($res12);
        if($count == 1)
            $score = $score + 1;

        $sel1 = "select * from place_cat where place = '$p4'";
        $res12 = mysqli_query($con,$sel1);
        $count = mysqli_num_rows($res12);
        if($count == 1)
            $score = $score + 1;

        $sel2 = "select * from animal_cat where animal = '$a'";
        $res13 = mysqli_query($con,$sel2);
        $count = mysqli_num_rows($res13);
        if($count == 1)
            $score = $score + 1;

        $sel2 = "select * from animal_cat where animal = '$a3'";
        $res13 = mysqli_query($con,$sel2);
        $count = mysqli_num_rows($res13);
        if($count == 1)
            $score = $score + 1;

        $sel2 = "select * from animal_cat where animal = '$a4'";
        $res13 = mysqli_query($con,$sel2);
        $count = mysqli_num_rows($res13);
        if($count == 1)
            $score = $score + 1;
                
        $score = $score + 1;
*/
        //echo "Your score is ".$score;

        //$final = "update highscores set npat_score = '$score' where userName = '$user'";

        $q = "DELETE FROM $user";
        $sql = mysqli_query($con,$q);
        
?>
</body>
</html>