<?php
		session_start();
?>
<html>
	<head>
		<style>
		#navbar{
			
			position:absolute;
			width:100%;
			height:80px;
			background-color:black;
			
		}

		p{
			margin-bottom:100px;
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
		
		#linkref1
		{
			font-family: 'Spectral SC', serif;
			font-size: 35px;
			text-decoration:none;
			color:white;
			padding-left:20px;
			padding-right:20px;
			padding-bottom:26px;
			float:right;
			margin:0;
		}

		#signup
		{
			padding:0px;
			margin:0;
			font-family: 'Spectral SC', serif;
			font-size: 35px;
			text-decoration:none;
			color:white;
			padding-left:20px;
			padding-right:20px;
			padding-bottom:26px;
			float:right;
		}

		#signup:hover{
			filter:contrast(30%);
			cursor: pointer;
		}
		
		#linkref1:hover{
			filter:contrast(30%);
			cursor: pointer;
		}
		
		#linkref:hover{
			background-color:#01579B;
			color:black;
		}
		
		.logo-img{
			float:left;
			margin:0;
			padding:0;
		}

		.button {
		display: inline-block;
		border-radius: 4px;
		background-color: #f4511e;
		border: none;
		color: #FFFFFF;
		text-align: center;
		font-size: 28px;
		padding: 20px;
		width: 220px;
		transition: all 0.5s;
		cursor: pointer;
		margin: 5px;
		}

		.button span {
		cursor: pointer;
		display: inline-block;
		position: relative;
		transition: 0.5s;
		color:black;
		}

		.button span:after {
		content: '\00bb';
		position: absolute;
		opacity: 0;
		top: 0;
		right: -20px;
		transition: 0.5s;
		}

		.button:hover span {
		padding-right: 25px;
		}

		.button:hover span:after {
		opacity: 1;
		right: 0;
		}
		
		body{
			margin: 0px;
			border: 0px;
			top: 0;
			background-image:url(123.jpg);
			background-repeat:none;
			overflow:hidden;
		}
		
		.show{
			width: 100%;
			height: 90%;
			
		}
		
		.image{
			position:relative;
			width: 100%;
		}

		.txt{
			position:absolute;
			bottom: 660px;
			right: 932px;
			color:white;
		}
		
		.txt:hover{
			filter:
		}
		
		.btn{
			position:relative;
			margin:auto;
			text-align:center;
		}
			
		#link{
			color:white;
		}
		
		#link:hover{
			color:blue;
		}
		
		#a{
			width:350px;
			height:200px;
			border:0;
			margin:0;
			color:black;
		}
		
		#wrapper{
			position:static;
			text-align:center;
			color:white;
			font-size: 20px;
			font-family: 'Montserrat', sans-serif;
			margin:auto;
			height:100%;
			width:72%;
			padding-top:100px;
		}
		
		#box1,#box2,#box3{
			float:left;
			width:350px;
			padding-right:10px;
			padding-top:none;
		}
		
		#box4{
			float:left;
			width:1050px;
		}
		
		#c{
			width:1050px;
		}
		
		#privacy{
			text-align:bottom;
		}
		
		#privacy a{
			text-decoration:none;
			color:black;
			bottom:15px;
			left:10px;
			position:absolute;
		}
		
		#pri,#aboutus{
			text-align:center;
			padding:100px;
			color:white;
			font-size:20px;
			font-family: 'Montserrat', sans-serif;
		}
		
		#us{
			position:relative;
			padding-left:40px;
			text-align:center;
			color:white;
			font-size: 20px;
			font-family: 'Montserrat', sans-serif;
		}
		
		#gopal,#arjun,#hrishi,#gautam{
			float:left;
			width:350px;
			padding-right: 10px;
			padding-top:10px;
		}
		
		#b{
			margin:0px;
			height:25%;
			border-radius:50%;
		}
		
		#tariff{
			position:relative;
			background-color:white;
			margin:0;
			padding:0;
			
		}
		
		#form1{
			position: absolute;
			height: 50%;
			width: 50%;
		}
		
		#x a{
			text-decoration: none;
		}
		
		#tandc{
			border:0;
			color:black;
			background-color: rgb(8, 187, 148);
			height:30px;
			border-radius: 10px;
		}
		
		#tandc:hover{
			color:white;
			background-color: black;
		}
		
		nav {
			list-style-type: none;
			background-color: #4950507e;
			height: 70px;
			padding: 10px;
			margin: 0;
		  }
		  
		  nav a{
			text-decoration: none;
			color: white;
			font-family: 'Lobster', Georgia, Times, serif;
			font-size: 45px;
			padding: 20px;
			padding-bottom: 70px;
		  }
		  
		  nav a:hover{
			animation: text-glow 2s ease-out infinite alternate;
			background-color: black;
			color:#00a4a2;
			text-decoration: underline;
		  }
			#belly {
    			background-color: #4CAF50;
    			color: white;
    			padding: 14px 20px;
    			margin: 8px 26px;
    			border: none;
    			cursor: pointer;
    			width: 90%;
				font-size:20px;
			}
			#belly:hover {
    			opacity: 0.8;
			}

			input[type=text], input[type=password] {
   				 width: 90%;
   				 padding: 12px 20px;
   				 margin: 8px 26px;
   				 display: inline-block;
   				 border: 1px solid #ccc;
   				 box-sizing: border-box;
				 font-size:16px;
			}

			.imgcontainer {
    			text-align: center;
    			margin: 24px 0 12px 0;
    			position: relative;
			}
			.avatar {
    			width: 200px;
				height:200px;
    			border-radius: 50%;
			}

			.modal {
				display:none;
    			position: fixed;
    			z-index: 1;
    			left: 0;
    			top: 0;
    			width: 100%;
    			height: 100%;
    			overflow: auto;
  			 	background-color: rgba(0,0,0,0.4);
			}

			.modal-content {
				    background-color: #fefefe;
					filter: drop-shadow(8px 8px 10px black);
    				margin: 4% auto 15% auto;
    				border: 1px solid #888;
    				width: 30%; 
					padding-bottom: 30px;
			}

			.close {
    			position: absolute;
    			right: 25px;
    			top: 0;
   			 	color: #000;
    			font-size: 35px;
    			font-weight: bold;	
			}
			.close:hover,.close:focus {
    				color: red;
    			cursor: pointer;
			}

			.animate {
				animation: zoom 0.6s
			}
			@keyframes zoom {
    			from {transform: scale(0)} 
    			to {transform: scale(1)}
				}
			}

			h2{
				color:black;
				font-size:100px;	
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
			<a onclick = "document.getElementById('modal-wrapper').style.display='block'" id = "linkref1">|Login</a>
			<a id = "signup" href = "Signup.php">Sign Up</a>
		</div>
	</center>
	<div id="modal-wrapper" class="modal">
			
			<form class="modal-content animate" action="homepage1.php" method = "post">
				  
			  <div class="imgcontainer">
				<span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
				<img src="xyz.png" alt="Avatar" class="avatar">
				<h1 style="text-align:center">Login Here</h1>
			  </div>
		  
			  <div class="container">
				<input type="text" placeholder="Enter username" name="userName">
				<input type="password" placeholder="Enter Password" name="pass">        
				<button type="submit" name = "submit" id = "belly">Login</button>
				<input type="checkbox" style="margin:26px 30px;"> Remember me      
				<a href="#" style="text-decoration:none; float:right; margin-right:34px; margin-top:26px;">Forgot Password ?</a>
			  </div>
			  
			</form>
			
		  </div>
		  <div id = "wrapper">
		<h2>Welcome to Name Place Animal Thing</h2>
		<p>Our project is based on one of the most popular games of the world, Name Place
		Animal Thing. It can involve any number of players. All the players are given a minute, and are
		simultaneously asked to name a name, place, animal and thing. The working of the game
		involves players giving distinct entries, points are lost if the same entry is given by two players.
		Both(or more) the players involved lose points.
		Points system:
		• 1 point for giving distinct entry
		• 0.5 points for giving an entry which was entered by the player previously
		• 0 points for matching entry with a different player
		For each round, a player can get anywhere from a maximum of 4 points, to a minimum of 0
		points. The number of rounds are decided unanimously in the lobby part of the game, which has
		been implemented as a table in SQL.
		1. The SQL implementation of this game that we have created allows players to have a
		practice round as well, and this practice score is visible to other players in the lobby.
		2. Based on the number of rounds, the maximum number of points available is decided
		accordingly, and the person who scores highest is judged the winner.
		3. SQL queries make all these actions possible, and this is involved in our implementation.
		4. The ER diagram presented with this write-up gives a much clearer view of how we intend
		to go ahead with our implementation.</p>

		<button class="button" style="vertical-align:middle"><a href = "createnew.php"><span>PLAY NOW </span></button>
	</div>

	

	<script>
		var modal = document.getElementById('modal-wrapper');
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>
	<?php
		if(!isset($_POST["userName"]) && !isset($_POST["pass"]))
		{
			echo " ";
		}
		
		else{
        $user = $_POST["userName"];
        $pass = $_POST["pass"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "catalog";

        $con = mysqli_connect($servername,$username,$password,$dbname);

        if(!$con)
        {
            die('connection failed'.mysqli_error());
        }

        $q = "SELECT * FROM websiteusers WHERE userName = '$user' and pass = '$pass'";
        $result = mysqli_query($con,$q);
        $count = mysqli_num_rows($result);

        if($count == 1)
        {	
			$_SESSION['userName'] = $user;
        }
        else
        {   
            $message = "Invalid Credentials. Try again!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
       
        if (isset($_SESSION['userName'])){
            $user = $_SESSION['userName'];
            $message = "Welcome $user";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<script type='text/javascript'>document.getElementById('linkref1').innerHTML = 'Logout'</script>";            
            echo "<script type='text/javascript'>document.getElementById('linkref1').href = 'logout.php'</script>";
		}
	}
    ?>
</body>
</html>