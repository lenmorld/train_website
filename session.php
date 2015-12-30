<!-- Assignment 4 SOEN-287
    Coded by: Lenmor Larroza Dimanalata #27699727
    -->


<?php 
// initiate session 
session_start(); 

include('php/db_connect.php');

// check that form has been submitted and that name and password are not empty
if ($_POST && !empty($_POST['username'])  && !empty($_POST['password'])  ) {

	//validate username and password
	$username = $_POST['username'];
	$password = $_POST['password'];
		
		//to protect from MySQL injection
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	
	$conn = setUpConnection();
	$sql = "SELECT * from users 
			WHERE password='$password' 
			AND username='$username'"  ;	 

	$result = $conn->query($sql);
	
	//IF FOUND - username and password valid
	if ($result->num_rows == 1 ){
		
	//$_SESSION['username'] = $_POST['username'];	
	$_SESSION['login_user']=$username; 		// Initializing Session
	//header("location: carpool.php"); 		// Redirecting To Other Page
	} else {
	$error = "Username or Password is invalid";
	}
	//###########################################
} 
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <link href="css/train.css" rel="stylesheet" type="text/css">
    <title>Thomas The Train</title>
    <meta charset="utf-8">
</head>

<body>
    <header>
        <div>
            <h2>Thomas the Train</h2>
            <h4>Transportation Systems</h4>
            <p id="date"></p>
        </div>
        <a href="index.php"><img alt="Thomas The Train" src="images/thomas.jpg" width="150"></a>
        <script>
            var today = new Date();
            document.getElementById('date').innerHTML = today;
        </script>
    </header>
    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="schedule.php">Schedule</a>
            </li>
            <li>
                <a href="nextTrain.php">Next Train</a>
            </li>
            <li>
                <a href="Registration.php">Registration</a>
            </li>
            <li>
                <a href="purchase.php">Purchase Ticket</a>
            </li>
            <li>
                <a href="carpool.php">Looking for Carpooling Buddy</a>
            </li>
        </ul>
    </nav>
    <section>

			<div>
			
			<?php 
				// check session variable is set 
				if (isset($_SESSION['login_user'])) { 
				// if set, greet by name 
				echo 'Hi, ' . $_SESSION['login_user'] . '. Welcome! You can now access these pages.<br /> <a href="carpool.php">Carpooling</a>  <br /> <a href="purchase.php">Purchase</a>   '; 
				} else { 
				// if not set, send back to login 
				echo 'Invalid username or password. <a href="login.php">Try again</a>'; 
				} 
				?>
			
			</div>

    </section>
    <footer>
        <ul>
            <li>
                <a href="privacy.php">Privacy Statement</a>
            </li>
            <li>
                <a href="contact.php">Contact Us</a>
            </li>
        </ul>
    </footer>
</body>

</html>







