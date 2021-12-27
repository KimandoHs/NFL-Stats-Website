<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<style>
		.divider{
			width:5px;
			height:auto;
			display:inline-block;
		}
		</style>
		<title>Test | PHP</title>
		
</head>

<body>
		<form action = "registration.php" method = "post">
		<div class ="container">
			<div class ="row">
				<div class="col-sm-4">
					<h1>Registration</h1>
					<hr class = "mb-4">
						<form action = "" method = "post" style="text-align:center">
							
							<label for "regEmail"><b>Email</b></label>
							<input class="form-control" name="regEmail" type ="text" required>
			
							<?php echo "<br>"; ?>
			
							<label for "name"><b>First and Last Name</b></label>
							<input class="form-control" name="name" type ="text" required>
			
							<?php echo "<br>"; ?>
			
							<label for "Age"><b>Age</b></label>
							<input class="form-control" name="Age" type ="text" required>
			
							<?php echo "<br>"; ?>
							
							<hr class = "mb-4">
							
							<input class="btn btn-primary" type ="submit" name = "userSubmit" value ="Sign up">
		</form> 
		
		</div>
		
		<div class="container">
            <?php
			if(isset($_POST["userSubmit"])) {
				$email = $_POST["regEmail"];
				$name = $_POST["name"];
				$age = $_POST["Age"];
				echo "You have successfully registered your account. ";
				
					$servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cs460 project 1 movie database";

                        // SQL
						$mysqli = new mysqli($servername, $username, $password, $dbname);
						$stmt = $mysqli->prepare("INSERT INTO user VALUES (?, ?, ?)");
						$stmt->bind_param('ssi', $email, $name, $age);
                        $stmt->execute();

                        // set the resulting array to associative
                        
                
              
                    $conn = null;

			}
		  ?>
        </div>
		<div class ="container">
		<form action = "index.php" method = "post" style="text-align:center">
		<hr class = "mb-4">
		<input class="btn btn-primary" type ="submit" name = "backToLogin" value ="Go back to main page">
		</form>
		</div>
	
</body>
</html>