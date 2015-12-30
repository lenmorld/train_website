<!-- Assignment 4 SOEN-287
    Coded by: Lenmor Larroza Dimanalata #27699727
     PURCHASE PAGE -->
	 
<?php 

session_start();

include('php/db_connect.php');			//include DB connection script

$authenticated = false;	

if (isset($_SESSION['login_user']))
{
	$login_session = $_SESSION['login_user'];
	$authenticated = true;		

	//query age and zone info of user
	$conn2 = setUpConnection();
	$sql2 = "SELECT birthday, zone
			 FROM users 
			 WHERE username = '"  .  $login_session   .  "' ;"  ;	 
			 
	$result2 = $conn2->query($sql2);

	if ($result2->num_rows > 0) {
			$row = $result2->fetch_assoc();
			$birthday =  $row['birthday'];	
			$zone = $row['zone'];
	}

	 //date in mm/dd/yyyy format; or it can be in other formats as well
	  $birthDate =  $row['birthday'];
	  //explode the date to get month, day and year
	  $birthDate = explode("-", $birthDate);
	  //get age from date or birthdate
	  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
		? ((date("Y") - $birthDate[0]) - 1)
		: (date("Y") - $birthDate[0]));
	  
		$reduced = ($age <21 || $age > 65) ? true : false;
	  
	$conn2->close();

	//get POST variables - selected type
	if (isset($_POST['submit_purchase']))
	{
		if (isset($_POST['ticket_type']))
		{
			$ticket = $_POST['ticket_type'];
			$fee = 0.0;			// initialize fee
			  //open flat file
			  $feeFile = "./fares/fare.txt";
			  $fh = fopen($feeFile, 'r') or die("Unable to open file!");
			  
				 // read one line until end-of-file
				while(!feof($fh)) {
					$line = fgets($fh);
					$lineArray = explode(" ", $line);
					if ($lineArray[0] == $ticket && $lineArray[1] == $zone)
					{
						if($reduced)
							$fee = $lineArray[3];
						else
							$fee = $lineArray[2];
						break;		//found the fee that is desired, exit loop
					}
				}
				//if fee not found, it will just be left to 0.0

				fclose($fh);			//close file
				
				//write to database
				$conn = setUpConnection();
				//prepared statements
				$stmt = $conn->prepare("INSERT INTO purchase (username, time_stamp, fee, type ) VALUES (?, ?, ?, ?)");
				$stmt->bind_param("ssds", $login_session, date('Y-m-d h:i:s'), $fee, $ticket);
				$stmt->execute();
				
				$conn->close();
		
		}
	}
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

	
	<!------------- DISPLAY IF USER HAS BEEN AUTHENTICATED-------------------------->
	<?php 
	// check whether session variable is set 
	if (isset($_SESSION['login_user'])) { 
	// if set, greet by name 
	echo 'You are logged in as ' . $_SESSION['login_user'] . '. <br>'; 

	
	echo '<a href="logout.php">Logout</a>'; 
	} else { 
	// display if not recognized 
	echo "Please login to access this page "; 
	echo '<a href="login.php">Login</a>'; 
	} 
	?>
	<!----------------------------------------------------------->

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

        <!--====== Script for buying tickets ===========-->
        <!--script type="text/javascript" src="js/purchase.js"></script-->

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
            <li class="current">
                <a href="purchase.php">Purchase Ticket</a>
            </li>
            <li>
                <a href="carpool.php">Looking for Carpooling Buddy</a>
            </li>
        </ul>
    </nav>
    <section>
        <form name="tickets" method="post" action="purchase.php">

            <fieldset>

				<hr />
				
				<?php 
				if ($authenticated) { ?>

                <!--============== TYPE OF TICKET ================-->

                <h3>Type of Ticket</h3>

                <label>
                    <input type="radio" name="ticket_type" value="Single" checked />Single Fare
                </label>
                <br />

                <label>
                    <input type="radio" name="ticket_type" value="Booklet" />Booklet of 6
                </label>
                <br />
                <div class="center">
                    <input name="submit_purchase" type="submit" value="SUBMIT" >
                </div>

            </fieldset>

        </form>
		
		<hr />
		<div>
			<table class="center_table">
				
				<?php 
				if ($authenticated)
				{

					$conn = setUpConnection();
					$sql = "SELECT username, type, fee, time_stamp
							 FROM purchase
							 WHERE username = '"   .  $login_session  . "'		;"  ;	 
							 
					$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					
					echo "<tr><th colspan='4'>Purchases Made - " . $login_session  . "</th></tr>";
					//var_dump($existingBuddyArray);
					while($row = $result->fetch_assoc()) {
						echo "<tr><td>"  .  $row['username'] . " </td><td>" . $row['type'] . "</td><td>".   $row['fee'] . "</td><td>" .  $row['time_stamp']  . "</td></tr>";
					}

				}
				else
				{
					echo "<tr><td>No current carpooling candidates</td></tr>";
				}				
					$conn->close();
				}
				?>
				
				<?php } else { ?>
				
				<h2>Please log-in to access this page. <a href="login.php">LOGIN</a></h2>
				
				
				<?php } ?>

				</table>
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