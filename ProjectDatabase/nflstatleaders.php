
<?php
// Start the session
session_start();
$playerNames = array();
global $playerNames;
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<style type = "text/css">
		.divider{
			width:5px;
			height:auto;
			display:inline-block;
		}
		
		#main-header{
			margin-top:2cm;
			margin-bottom:2cm;
			text-align:center;
			border:2px solid black;
			background-color:MediumSlateBlue;
			color:white;
			padding:45px;
		}
		
		#main-footer{ 
			text-align:center;
			font-size:18px;
		}
		
		.center {
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: 50%;
		}
	
		.sidenav {
		height: 100%;
		width: 160px;
		position: fixed;
		z-index: 1;
		top: 0;
		left: 0;
		background-color: Indigo;
		overflow-x: hidden;
		padding-top: 20px;
		border: 4px solid Black; 
		}

		.sidenav a {
		padding: 6px 8px 6px 16px;
		text-decoration: none;
		font-size: 16px;
		color: #818181;
		display: block;
  
		}

		.sidenav a:hover {
		color: #f1f1f1;
		}

		.main {
		margin-left: 160px; /* Same as the width of the sidenav */
		font-size: 28px; /* Increased text to enable scrolling */
		padding: 0px 10px;
		}

		@media screen and (max-height: 450px) {
		.sidenav {padding-top: 15px;}
		.sidenav a {font-size: 14px;}
		}
		
		</style>
    </head>

    <body>
		
		
		<div class="sidenav">
		<a href="index.php">Homepage</a>
		<a href="#services">NFL Stat Leaders</a>
		<a href="#services">NFL Standings</a>
		</div>
		
		<div class ="container">
		
		<form action = "" method = "post" style="text-align:right">
			Login to your email: <input name="inputEmail" input type ="text">
			<input class = "btn btn-primary" type ="submit" value = "Log in">
			<input class = "btn btn-primary" type="submit" name = "logout" value = "Log out"> 
		</form> 
		
		<form action = "registration.php" method = "post" style="text-align:left">
			<input class = "btn btn-primary" type="submit" name = "signup" value = "Sign up"> 
		</form> 
		
		</div>

		<?php         echo "<body style='background-color:Snow'>";

/*
		if(isset($_SESSION['user_name'])) {
			echo "<div id = 'User'> Welcome: " . htmlspecialchars($_SESSION['user_name']) . "</div>";
		
		}
		*/ ?>
		
		
		<div class="container">
            <?php
			if(!empty($_POST["inputEmail"])) {
			$loggedin = $_POST["inputEmail"] ?? "";
			$_SESSION['user_name'] = $loggedin;
			}
		  ?>
        </div>
		
		
		<div class="container">
            <?php
                if(isset($_POST['logout']))
				{ 
					$_SESSION = array();
					session_destroy(); 
				}
			?> 
		</div>	
		
		<div class="container">
		<li class='active' style ='float:right;'>
			<?php 
		if(isset($_SESSION['user_name'])) {
			echo "<div id = 'User'> You are logged in as: " . htmlspecialchars($_SESSION['user_name']) . "</div>";
		}
		else {
			echo "You have logged out.";
		}
		
		?>
		 </div>
		
		<div class="container">
			<header id = "main-header">
            <h1> NFL Stats </h1>
			</header>
        </div>
		
		<div class = "container">
		
		<div class="container" style = "text-align:center">
		
            <h2 style ="text-align:center;margin-top:1cm;margin-bottom:1cm;"> 2021 NFL Passing Yards Leaders: </h2>
			<?php 
					$servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "project database";
					
					$con=new mysqli($servername,$username,$password,$dbname);
					if($con->connect_error){
						echo 'Connection Failed: '.$con->connect_error;
					}
					else{
						$sql="select p.playerFirstName, p.playerLastName, SUM(q.yards) FROM player p, qbgames q WHERE p.playerId = q.PlayerId AND q.yearPlayed = 2021 GROUP BY q.playerId";
						$result = $con->query($sql);
						$k = 0;
						
						while($row=$result->fetch_assoc()){
							$k = $k + 1;
							$name = $row["playerFirstName"] . $row["playerLastName"];
							$name1 = $row["playerFirstName"] . ' ' .$row["playerLastName"];
							//debugging 
							//print_r($row);
							$playerNamesSpace[] = $name1; 
							$playerNames[] = $name; 
							
						
							$filename = 'playerimages/'. $row["playerFirstName"] . $row["playerLastName"] . '.png';

							if (file_exists($filename)) {
								//echo "The file $filename exists <br>"; //debug 
								echo "<img src = '$filename' alt='$filename' class='center' style='object-fit: cover;width:300px;height:300px;vspace=200px;hspace=200px;border: 3px solid DarkRed;'/><br><br>";
								echo $k . ': ' . $row["playerFirstName"] . ' ' . $row["playerLastName"] . '<br>';
								echo 'Passing Yards: '.$row["SUM(q.yards)"] . '<br>' ;
								echo '<br>' ;
							} 
							else {
								$filename = 'playerimages/'. $row["playerFirstName"] . $row["playerLastName"] . '.jpg';
								echo "<img src = '$filename' alt='$filename' class='center' style='object-fit: cover;width:300px;height:300px;vspace=200px;hspace=200px;border: 3px solid DarkRed;'/><br><br>";
								echo $k . ': ' . $row["playerFirstName"] . ' ' . $row["playerLastName"] . '<br>';
								echo 'Passing Yards: '.$row["SUM(q.yards)"] . '<br>' ;
								echo '<br>' ;
								
							}
						}
					}
			
			
			?>
			
        </div>
	 
            <?php
			//code to check if a file exists 
/* $filename = 'playerimages/TomBrady.png';

if (file_exists($filename)) {
    echo "The file $filename exists";
} else {
    echo "The file $filename does not exist";
}
*/
?>

    </body>
</html>


