<!-- Assignment 4 SOEN-287
    Coded by: Lenmor Larroza Dimanalata #27699727
    Carpool page -->

<?php
session_start();

include('php/db_connect.php');
$authenticated = false;		

$savedLog = "";

if (isset($_SESSION['login_user']))
{
	$login_session = $_SESSION['login_user'];
	$authenticated = true;

	//initialize addBuddies string
	$addBuddies = "";

	// get existing buddies
	$existingBuddyArray = array();		// init as empty array

	$conn2 = setUpConnection();			//execute query	
	$sql2 = "SELECT carpool, carpoolBuddies
			 FROM users 
			 WHERE username = '"  .  $login_session   .  "' ;"  ;	 
			 
	$result2 = $conn2->query($sql2);
	

	if ($result2->num_rows > 0) {
			$row = $result2->fetch_assoc();
			
			$existingBuddyArray =  explode("," , $row['carpoolBuddies']);
			
			$carpoolYes =  ($row['carpool'] == 1) ? true : false ; 
	}
	$conn2->close();

	if (isset($_POST['submitAddBuddies'])) {					// if user added buddies
		if (!empty($_POST['carpool_candidates'] )) {								// if carpool candidates array is set and not empty		
				$addBuddies = array_map("trim" , $_POST['carpool_candidates']);			//compose string of buddies to add

				//append the buddies to add to the existing buddies
				if (isset($existingBuddyArray))
				{
					if (count($existingBuddyArray) ==1 && empty($existingBuddyArray[0]) )			//if first element is null
						$mergeList = $addBuddies;
					else
						$mergeList = array_merge($existingBuddyArray, $addBuddies);			//merge exisiting buddies and buddies to add
					
					$newBuddyArray =  ( array_unique($mergeList));						// remove duplicates
					
					$conn2 = setUpConnection();			//execute query to update
				
					$sql2 = "UPDATE users
					 SET carpoolBuddies = '"   .  implode(",", $newBuddyArray )    . "'
					 WHERE username = '"  .  $login_session   .  "' ;"  ;	 

					if (!$conn2->query($sql2) )							//get error if there is
						$savedLog = "Error: " .  $conn2->error   ;
					else
						$savedLog = "Successfully updated buddylist";

					$conn2->close();

					//update existing buddy array
					$existingBuddyArray	 = $newBuddyArray;
				}
		}
	}

	if (isset($_POST['submitDeleteBuddies'])) {									// if user deleted buddies		
		if (!empty($_POST['delete_buddies'] ) )   {			

				$delBuddies = array_map("trim" , $_POST['delete_buddies']);		// trim spaces of each element in the array
				
				if (is_array($existingBuddyArray))
				{
					$diffList = array();
					
					for($x=0; $x<count($existingBuddyArray); $x++)
					{
						//$existingBuddyArray = trim($existingBuddyArray[$x]);
						if(!in_array($existingBuddyArray[$x], $delBuddies) &&  !empty($existingBuddyArray[$x]))
							array_push($diffList, $existingBuddyArray[$x] );
					}

					$conn2 = setUpConnection();
				
					//update buddylist for this user
					$sql2 = "UPDATE users
					 SET carpoolBuddies = '"   .  implode("," , $diffList )    . "'
					 WHERE username = '"  .  $login_session   .  "' ;"  ;	 
							 
					if (!$conn2->query($sql2) )
						printf("Error: %s\n", $conn2->error);
					else
						echo "successfully updated buddylist";

					$conn2->close();

					//update existing buddy array
					$existingBuddyArray	 = $diffList;
				}
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

	<!----------------------------------------------------------->
	<?php 
	// check whether session variable is set 
	if (isset($_SESSION['login_user'])) { 
	// if set, greet by name 
	echo 'You are logged in as ' . $_SESSION['login_user'] . '<br />'; 
	
	echo '<a href="logout.php">Logout</a>'; 
	} else { 
	// display if user not recognized 
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
            <li class="current">
                <a href="carpool.php">Looking for Carpooling Buddy</a>
            </li>
        </ul>
    </nav>
    <section>
	
		<h3><?php if( !empty($savedLog) ) echo '*************' . $savedLog . '***************';  ?></h3>
        <div>
            <div>
				
				<hr />
				
				<?php 
				if ($authenticated) 
				
				{   if ($carpoolYes)  {     ?>
				
				
				<div class="center_div"> <h1>Carpool Buddies</h1> </div>
				
				<!---- list all current carpooling buddies to DELETE -->
				<h3>Current carpooling buddies</h3>
				<form method="post" action="carpool.php" name="delBuddies">
				<table>
				
				<?php
				//{
					if(!empty($existingBuddyArray))
					{
					echo "<tr><th></th> <th>Capooling Buddies - Choose the ones to DELETE</th></tr>";
					// output data of each row
					for( $x=0; $x < count($existingBuddyArray) ; $x++ ) {
						
						if (!empty($existingBuddyArray[$x]))
						echo "<tr><td>"  .  "<input  type='checkbox' name='delete_buddies[]'  value='" .  $existingBuddyArray[$x]  . "'     />"   .  "</td><td>"  . $existingBuddyArray[$x]  . " </td></tr>";
					}
					echo "<tr><td colspan='2'><input type='submit' name='submitDeleteBuddies' id='submitDeleteBuddies' value='DELETE' /></td></tr>";
					}
					else
					{
						echo "<tr><td>No current carpooling buddies</td></tr>";
					}
				//}
				?>
				</form>
				</table>
					
				<hr />
				<!--- list all possible carpooling buddies to ADD -->
				
				<h3>Add carpooling buddies</h3>
				<form method="post" action="carpool.php" name="addBuddies">
				<table>
				
				<?php 
				//if ($authenticated)
				//{
					$existingBuddyArray = array_map("trim" , $existingBuddyArray);
					
					$conn = setUpConnection();
					$sql = "SELECT username
							 FROM users 
							 WHERE carpool = 1
							 AND username != '"   .  $login_session  . "'		;"  ;	 
							 
					$result = $conn->query($sql);
					
					$carpoolCandidatesArray = array();
					

				if ($result->num_rows > 0) {
					
					//var_dump($existingBuddyArray);
					while($row = $result->fetch_assoc()) {
						if (!(in_array( $row["username"],$existingBuddyArray ) ))
							array_push($carpoolCandidatesArray, $row["username"] );
					}
					
					//var_dump($existingBuddyArray);
					//var_dump($carpoolCandidatesArray);
					
					if (count($carpoolCandidatesArray) > 0)
					{
						echo "<tr><th></th> <th>Capooling Candidates - Choose the ones to ADD</th></tr>";
						// output data of each row
						for( $x = 0; $x < count($carpoolCandidatesArray) ; $x++ ) {
							echo "<tr><td>"  .  "<input  type='checkbox' name='carpool_candidates[]'  value='" .  $carpoolCandidatesArray[$x]  . "'     />"   .  "</td><td>"  . $carpoolCandidatesArray[$x]  . " </td></tr>";
						}
						echo "<tr><td colspan='2'><input type='submit' name='submitAddBuddies' id='submitAddBuddies' value='ADD' /></td></tr>"; 	
					}
					else
					{
						echo "<tr><td>No current carpooling candidates</td></tr>";
					}
				} 	
					$conn->close();
				//}
				?>
				
				<?php } 
					else {   echo "<h2>Sorry. You did not sign up for carpooling</h2>";    }			// did not signed up for carpooling
				}
				else { ?>
				
				<h2>Please log-in to access this page. <a href="login.php">LOGIN</a></h2>
				
				
				<?php } ?>

				</table>
				</form>
				

			</div>
			
			
			
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