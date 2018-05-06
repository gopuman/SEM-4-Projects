<html>
   <head>
     <title>Sign Up</title>
     <link rel="stylesheet" type="text/css"  href="Signup-css.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
     #navbar{
	
	position:absolute;
	width:100%;
	height:80px;
	background-color:black;
	
}

#linkref{
	
	font-family: 'Spectral SC', serif;
	font-size: 35px;
	text-decoration:none;
	color:white;
	padding-left:20px;
	padding-right:20px;
	padding-bottom:26px;
}

.image{
	position:relative;
	width: 100%;
}

#linkref:hover{
	background-color:#01579B;
	color:black;
}
body{
  background-image: url("123.jpg");
  background-size: cover;
  background-repeat: no-repeat;
  margin: 0px;
  border: 0px;
  top: 0;
  
}

.logo-img{
	float:left;
	margin:0;
	padding:0;
}

div.transbox{
    float:left;
    position: relative;
    top:150px;
    left:35%;
    padding:50px;
    margin: 50 auto;
    background-color: rgba(0,0,0,0.7);
    border: 1px solid white;
    width: 400px;
    font-size: 15px;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    color:white;
    
}
input[type=button],input[type=submit]{
   background-color: #4CAF50;
   border: none;
   color: white;
   padding: 16px 32px;
   text-decoration: underline;
}

input[type = submit]{
    color: white;
    text-decoration: none;
    background-color: rgb(19, 94, 65);
}

input[type = submit]:hover{
    background-color:white;
    color:rgb(19, 94, 65);
}

input[type = text],input[type = password],[type = email]{
    float:right;
}

form{
     padding-right: 20px;
}
     </style>
   </head>
   <body>
    <center>
    <div class = "image">
    <div id = "navbar">
    <img class ="logo-img" src = "logo.png">
    <a id = "linkref" href = "homepage1.php">Home</a>
    <a id = "linkref" href = "npat.php">Practice</a>
    <a id = "linkref" href = "highscore.php">High scores</a>
    <a id = "linkref" href = "Aboutus.php">About Us</a>
    <a onclick = "document.getElementById('modal-wrapper').style.display='block'" id = "linkref1">Login</a>
  </div>
    </center>
     <div class="transbox">
       <form method = "POST" action = "Signup.php">
          Enter Your Name: <input type = "text" name = "name"></input>
          <br/><br/>
          Enter Your Email: <input type = "email" name = "email"></input>
          <br/><br/>
          Enter Your Username: <input type = "text" name = "user"></input>
          <br/><br/>
          Enter Password: <input type = "password" name = "pass"></input>
          <br/><br/>
          Confirm Password: <input type = "password" name = "cpass"></input>
          <br/><br/>
          <input type = "submit" name = "submit" value = "Sign-up"></input>
      </form>
      <?php
        session_start();
        if(!isset($_POST["submit"]))
        {
          echo " ";
        }
        else{
        if($_POST["pass"] == $_POST["cpass"])
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "catalog";
           
            $fullname = $_POST['name']; 
            $user = $_POST['user']; 
            $email = $_POST['email']; 
            $pwd = $_POST['pass'];

            $c = mysqli_connect($servername,$username,$password,$dbname);

            $query = "SELECT userName FROM websiteusers WHERE userName='$user'";
            $dupe = mysqli_query($c,$query);
            if (mysqli_num_rows($dupe) != 0)
            {
                echo "Username already exists";
            }
            else
            {
            $q = "INSERT INTO websiteusers (fullname,userName,email,pass) VALUES ('$fullname','$user','$email','$pwd')";            
            mysqli_query($c,$q);
            printf("Successfully signed up, check %s for a confirmation email",$email);
            header('Location: homepage1.php');
           }
        }

        else{
            echo("Re-Enter the password");
        }
      }
      ?>
      </div>
    </body>
</html>
      