
<?php
// Start the session
session_start();
$playerNames = array();
global $playerNames;
//$filename = "../playerimages/joshAllen.png";
?>

<!DOCTYPE html>
<html>
    <head>
	<title>Josh Allen</title>
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
			color:white;
			padding:45px;
			border:2px solid black;
			background-image: url("../banners/Bills.png");
			background-repeat: no-repeat;
			background-size: 1110px 240px;
			
		}
		
		#main-footer{ 
			text-align:center;
			font-size:18px;
		}
		
		.background-tint {
		background-color: DeepSkyBlue; /* Tint color */
		background-blend-mode: multiply;
		}
		
		.button2 {
			background-color: DodgerBlue;
			border-radius: 4px;
			color: Snow;
			}
		
		.button2:hover {
		color: yellow;
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
		background-color: DarkBlue;
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
		<!-- img {
		border: 2px solid red;
		background-color: red;
		
		}
		-->
		</style>
    </head>

    <body>
		
		<div class="sidenav">
		<a href="../index.php">Homepage</a>
		<a href="../nflstatleaders.php">NFL Stat Leaders</a>
		<a href="#services">NFL Standings</a>
		</div>

		
		<div class ="container">
		
		<form action = "" method = "post" style="text-align:right">
			Login to your email: <input name="inputEmail" input type ="text">
			<input class="button2" type ="submit" value = "Log in">
			<input class="button2" type="submit" name = "logout" value = "Log out"> 
		</form> 
		
		<form action = "../registration.php" method = "post" style="text-align:left">
			<input class="button2" type="submit" name = "signup" value = "Sign up"> 
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
			<header id = "main-header" class = "background-tint">
            <h1> NFL Stats </h1>
			</header>
        </div>
	
		<div class = "container">
		
		<div class="container">
		<?php
			echo "<h2 style='text-align:center'> Josh Allen </h2>";
			//foreach (glob("../playerimages/*.png") as $filename) {
				$filename = "../playerimages/JoshAllen.jpg";
				echo "<img src = '$filename' alt='$filename' class='center' style='object-fit: cover;width:300px;height:300px;vspace=200px;hspace=200px;border: 3px solid MediumBlue;'/><br>";
				echo "<p style='text-align:center'>37 Wins, 22 Losses</p>";
		//	}
	?> </div>
	
	<div class = "container">
            <form id="joshAllen2021Stats" method="get" action="">
                <div class="input-group mb-3">
                    <input class="button2" type="submit" name = "joshAllen2021Stats" value = "Josh Allen 2021 Stats"> 
                </div>
            </form>
        </div>
		
		<div class="container">
            <?php
                if(isset($_GET['joshAllen2021Stats']))
                {
                    echo "<table class='table table-md table-bordered'>";
                    echo "<thead class='thead-dark' style='text-align: center'>";
                    echo "<tr><th class='col-md-2'>QB ID</th><th class='col-md-2'>Year</th><th class='col-md-2'>Game</th>
					<th class='col-md-2'>Completions</th><th class='col-md-2'>Attempts</th><th class='col-md-2'>Yards</th>
					<th class='col-md-2'>Touchdowns</th><th class='col-md-2'>Interceptions</th>
					<th class='col-md-2'>Sacks</th><th class='col-md-2'>Sack yards</th></thead></tr>";
					


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
                            echo "</tr>" . "\n";
                        }
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "project database";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT * from qbgames where playerId = 3 and yearPlayed = 2021");
                        $stmt->execute();

                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            echo $v;
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
					
					 try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT playerId, yearPlayed, MAX(gameNumber), sum(completions), sum(attempts), sum(yards), sum(touchdowns), sum(interceptions), sum(sacks), sum(sackyards) from qbgames where playerId = 3 and yearPlayed = 2021");
                        $stmt->execute();

                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
						$p = 0;
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
							echo $v;
                        }
						
                    }
					
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
					
                    $conn = null;
                    echo "</table>";
					
					
                }
            ?>
        </div>
		
		<div class = "container">
            <form id="joshAllen2020Stats" method="get" action="">
                <div class="input-group mb-3">
                    <input class="button2" type="submit" name = "joshAllen2020Stats" value = "Josh Allen 2020 Stats"> 
                </div>
            </form>
        </div>
		
		<div class="container">
            <?php
                if(isset($_GET['joshAllen2020Stats']))
                {
                    echo "<table class='table table-md table-bordered'>";
                    echo "<thead class='thead-dark' style='text-align: center'>";
                    echo "<tr><th class='col-md-2'>QB ID</th><th class='col-md-2'>Year</th><th class='col-md-2'>Game</th>
					<th class='col-md-2'>Completions</th><th class='col-md-2'>Attempts</th><th class='col-md-2'>Yards</th>
					<th class='col-md-2'>Touchdowns</th><th class='col-md-2'>Interceptions</th>
					<th class='col-md-2'>Sacks</th><th class='col-md-2'>Sack yards</th></thead></tr>";
					


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
                            echo "</tr>" . "\n";
                        }
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "project database";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT * from qbgames where playerId = 3 and yearPlayed = 2020");
                        $stmt->execute();

                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            echo $v;
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
					
					 try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT playerId, yearPlayed, MAX(gameNumber), sum(completions), sum(attempts), sum(yards), sum(touchdowns), sum(interceptions), sum(sacks), sum(sackyards) from qbgames where playerId = 3 and yearPlayed = 2020");
                        $stmt->execute();

                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
						$p = 0;
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
							echo $v;
                        }
						
                    }
					
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
					
                    $conn = null;
                    echo "</table>";
					
					
                }
            ?>
        </div>
		
				<div class = "container">
		        <form id="joshAllen2019Stats" method="GET" action="">
                <div class="input-group mb-3">
                    <input class="button2" type="submit" name = "joshAllen2019Stats" value = "Josh Allen 2019 Stats"> 
                </div>
            </form>
        </div>
		
		<div class="container">
            <?php
                if(isset($_GET['joshAllen2019Stats']))
                {
                    echo "<table class='table table-md table-bordered'>";
                    echo "<thead class='thead-dark' style='text-align: center'>";
                    echo "<tr><th class='col-md-2'>QB ID</th><th class='col-md-2'>Year</th><th class='col-md-2'>Game</th>
					<th class='col-md-2'>Completions</th><th class='col-md-2'>Attempts</th><th class='col-md-2'>Yards</th>
					<th class='col-md-2'>Touchdowns</th><th class='col-md-2'>Interceptions</th>
					<th class='col-md-2'>Sacks</th><th class='col-md-2'>Sack yards</th></thead></tr>";
					


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
                            echo "</tr>" . "\n";
                        }
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "project database";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT * from qbgames where playerId = 3 and yearPlayed = 2019");
                        $stmt->execute();

                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            echo $v;
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
					
					 try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT playerId, yearPlayed, MAX(gameNumber), sum(completions), sum(attempts), sum(yards), sum(touchdowns), sum(interceptions), sum(sacks), sum(sackyards) from qbgames where playerId = 3 AND yearPlayed = 2019");
                        $stmt->execute();

                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
						$p = 0;
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
							echo $v;
                        }
						
                    }
					
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
					
                    $conn = null;
                    echo "</table>";
					
					
                }
            ?>
        </div>
		
			<div class = "container">
		        <form id="joshAllen2018Stats" method="GET" action="">
                <div class="input-group mb-3">
                    <input class="button2" type="submit" name = "joshAllen2018Stats" value = "Josh Allen 2018 Stats"> 
                </div>
            </form>
        </div>
		
		<div class="container">
            <?php
                if(isset($_GET['joshAllen2018Stats']))
                {
                    echo "<table class='table table-md table-bordered'>";
                    echo "<thead class='thead-dark' style='text-align: center'>";
                    echo "<tr><th class='col-md-2'>QB ID</th><th class='col-md-2'>Year</th><th class='col-md-2'>Game</th>
					<th class='col-md-2'>Completions</th><th class='col-md-2'>Attempts</th><th class='col-md-2'>Yards</th>
					<th class='col-md-2'>Touchdowns</th><th class='col-md-2'>Interceptions</th>
					<th class='col-md-2'>Sacks</th><th class='col-md-2'>Sack yards</th></thead></tr>";
					


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
                            echo "</tr>" . "\n";
                        }
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "project database";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT * from qbgames where playerId = 3 and yearPlayed = 2018");
                        $stmt->execute();

                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            echo $v;
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
					
					 try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT playerId, yearPlayed, MAX(gameNumber), sum(completions), sum(attempts), sum(yards), sum(touchdowns), sum(interceptions), sum(sacks), sum(sackyards) from qbgames where playerId = 3 AND yearPlayed = 2018");
                        $stmt->execute();

                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
						$p = 0;
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
							echo $v;
                        }
						
                    }
					
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
					
                    $conn = null;
                    echo "</table>";
					
					
                }
            ?>
        </div>
		
		
		<div class = "container">
		
            <form id="joshAllenCareerStats" method="GET" action="">
                <div class="input-group mb-3">
                    <input class="button2" type="submit" name = "joshAllenCareerStats" value = "Josh Allen Career Stats"> 
                </div>
            </form>
        </div>
		
		<div class="container">
            <?php
                if(isset($_GET['joshAllenCareerStats']))
                {
                    echo "<table class='table table-md table-bordered'>";
                    echo "<thead class='thead-dark' style='text-align: center'>";
                    echo "<tr><th class='col-md-2'>QB ID</th><th class='col-md-2'>Year</th><th class='col-md-2'>Game</th>
					<th class='col-md-2'>Completions</th><th class='col-md-2'>Attempts</th><th class='col-md-2'>Yards</th>
					<th class='col-md-2'>Touchdowns</th><th class='col-md-2'>Interceptions</th>
					<th class='col-md-2'>Sacks</th><th class='col-md-2'>Sack yards</th></thead></tr>";
					


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
                            echo "</tr>" . "\n";
                        }
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "project database";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT playerId, yearPlayed, MAX(gameNumber), sum(completions), sum(attempts), sum(yards), sum(touchdowns), sum(interceptions), sum(sacks), sum(sackyards) from qbgames where playerId = 3 GROUP BY yearPlayed");
                        $stmt->execute();

                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            echo $v;
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
					
					 try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT playerId, yearPlayed - yearPlayed, MAX(gameNumber), sum(completions), sum(attempts), sum(yards), sum(touchdowns), sum(interceptions), sum(sacks), sum(sackyards) from qbgames where playerId = 3");
                        $stmt->execute();

                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
						$p = 0;
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
							echo $v;
                        }
						
                    }
					
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
					
                    $conn = null;
                    echo "</table>";
					
					
                }
            ?>
        </div>
		
    </body>
</html>