<?php
  session_start();
  if(!isset($_SESSION["userName"]))
    {
        echo "<script>alert('Please login before playing');</script>";
        echo "<script>setTimeout(\"location.href = 'homepage1.php';\",800);</script>";
    }
    else 
    $user = $_SESSION["userName"];
?>

<html>
<body style="background-color:black; color:white">
  <h1><center> HOST PAGE </center> </h1>
  <h2><center> Welcome to your host page! </center></h2>
  <h3><center> Customize your game </center> </h3>
  <form method="POST" action="createnew.php">
  <center> 
      <input type="radio" name="game1" value="sportspersons" > <b> Sportspersons </b>
      <input type="radio" name="game1" value="hollywood"> <b> Hollywood </b>
      <input type="radio" name="game1" value="4thsem"> <b> 4th Semester Students </b>
      <input type="radio" name="game1" value="bollywood"> <b> Bollywood </b> <br>
      <input type="radio" name="game1" value="All"> <b> All </b> <br>
      <center><input type="submit" name="submit" value="Start Game"> </center>
    </center>
  <p> <center> <b> (You can name your game if you like below ) </b> </center> </p>
  <center> <input type="text" name="GN" placeholder="Game Name"> </center>

  <h3 id="code" align="center"> Game Code <br> </h3>

<script>
  var i;
  var cod=document.getElementById("code");
  for(i=0;i<4;i++)
  {
    var letter = String.fromCharCode(65 + Math.floor(Math.random() * 26));
    cod.innerHTML+=letter;
  }
  </script>
  <h4><center> Share the code with the concerned players, and enjoy the game! </center> </h4>
  
</form>
<?php
    if(isset($_POST["submit"])){
       if($_POST["game1"] == "sportspersons")
       {$_SESSION["game1"] = "sportspersons";
        header('Location:maingame.php');}

       else if($_POST["game1"] == "hollywood")
       {$_SESSION["game1"] = "hollywood";
        header('Location:maingame.php');}

       else if($_POST["game1"] == "4thsem")
       {$_SESSION["game1"] = "4thsem";
        header('Location:maingame.php');}                

       else if($_POST["game1"] == "bollywood")
       {$_SESSION["game1"] = "bollywood";
        header('Location:maingame.php');}

       else if($_POST["game1"] == "All")
       {$_SESSION["game1"] = "All";
        header('Location:maingame.php');}
       }
       else
       {
           echo "";
       }
?>
</body>
</html>
