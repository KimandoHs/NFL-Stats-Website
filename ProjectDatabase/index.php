
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
		<p style = "margin-top:1cm;margin-bottom:1cm;">Hi, this is a website designed by James Ngo. This is a project to learn html/php and databases. Graphic design is my passion. </p> 
		</div>
		<div class = "container">
			   
	   <div class = "container">
		
            <form id="showplayers" method="post" action="">
                <div class="input-group mb-3">
                    <input class = "btn btn-primary" type="submit" name = "showplayers" value = "Show players"> 
                </div>
            </form>
        </div>
		
		<div class="container">
            <?php
                if(isset($_POST['showplayers']))
                {
					$servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "project database";
					
					$con=new mysqli($servername,$username,$password,$dbname);
					if($con->connect_error){
						echo 'Connection Failed: '.$con->connect_error;
					}
					else{
						$sql="select * from player";
						$result = $con->query($sql);

						while($row=$result->fetch_assoc()){
						$name = $row["playerFirstName"] . $row["playerLastName"];
						$name1 = $row["playerFirstName"] . ' ' .$row["playerLastName"];
						
						$playerNamesSpace[] = $name1; 
						$playerNames[] = $name; 
						//echo 'First_name:  '.$row["playerFirstName"];


            }       

        }
                    echo "<table class='table table-md table-bordered'>";
                    echo "<thead class='thead-dark' style='text-align: center'>";
                    echo "<tr><th class='col-md-2'>QB ID</th><th class='col-md-2'>Year Drafted</th><th class='col-md-2'>Year Retired</th>
					<th class='col-md-2'>Position</th><th class='col-md-2'>No.</th><th class='col-md-2'>First Name</th>
					<th class='col-md-2'>Last Name</th><th class='col-md-2'>Hyperlink</th></thead></tr>";
					


                    class TableRows extends RecursiveIteratorIterator {
                        function __construct($it) {
                            parent::__construct($it, self::LEAVES_ONLY);
                        }

                        function current() {
                            // return "<td style='width: 30px; border: 1px solid black;'>" . parent::current(). "</td>";
                            return "<td style='text-align:center'>" . parent::current(). "</td>";
                        }
						
                        function beginChildren() {
                            echo "<tr>";
                        }
						
                        function endChildren() {
							global $playerNamesSpace; 
							global $playerNames;
							global $p;
							if(isset($playerNames)) {echo "<td><a href='playerPages/$playerNames[$p].php'>$playerNamesSpace[$p]</a></td>"; $p = $p + 1;}
							echo "</tr>" . "\n";
							
                        }
                    }


                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT * from player");
                        $stmt->execute();

                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
						$p = 0;
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            //echo $playerNames[$p];
							echo $v;
							//echo gettype($v);
							//echo $p; 
                        }
						
                    }
					
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
					
					/*
					 foreach(new TableRows(new RecursiveArrayIterator($playerNames)) as $k=>$v) {
                        
							echo $v;
							echo gettype($v);
							echo $p; 
                        }
					*/
					
                    $conn = null;
					
                    echo "</table>";
					//echo '<pre>'; print_r($playerNames); echo '</pre>';
					
					
					
					
                }
            ?>
        </div>

    </body>
</html>