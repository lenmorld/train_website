<!-- Assignment 4 SOEN-287
    Coded by: Lenmor Larroza Dimanalata #27699727
    Registration page -->

<?php

// if someone was logged in before, make sure, they are logged out before new registration
session_start();			

if(session_destroy())		//destroy all sessions
{
	unset($_SESSION['login_user']);		
	//header("Location: login.php");		//redirect to home page
}

include('php/db_connect.php');			//used for setting up DB connection

//initialize all error variables to be used

	$firstname_error = "";
	$lastname_error = "";
	$address_error = "";
	$city_error = "";
	$province_error = "";
	$postal_error = "";
	$province_error = "";
	$email_error = "";
	$phone1_error = "";
	$phone2_error = "";
	$DOB_error = "";
	$username_error = "";
	$password_error ="";
	$cpassword_error = "";
	$zone_error = "";
	$carpool_error = "";	
	
	$firstname = "";
	$lastname ="";
	$address = "";
	$city = "";
	$province = "";
	$postal = "";
	$email = "";
	$phone1 = "";
	$phone2 = "";

	$DOBMonth = "none";
	$DOBDay = "none";
	$DOBYear = "none";
	
	$username = "";
	$password = "";
	$cpassword = "";
	$zone = "";
	$carpool = "unchecked";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="css/train.css" rel="stylesheet" type="text/css">
    <title>Thomas The Train</title>
    <meta charset="utf-8">

</head>

<body>
	
	<?php

		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$firstname = screen_input($_POST["firstname"]);
			$lastname = screen_input($_POST["lastname"]);
			$address = screen_input($_POST["address"]);
			$city = screen_input($_POST["city"]);
			$province = screen_input($_POST["province"]);
			$postal = screen_input($_POST["postal"]);
			$email = screen_input($_POST["email"]);
			$phone1 = screen_input($_POST["phone1"]);
			$phone2 = screen_input($_POST["phone2"]);

			$DOBMonth = ($_POST["DOBMonth"]);
			$DOBDay = ($_POST["DOBDay"]);
			$DOBYear = ($_POST["DOBYear"]);
			
			$username = ($_POST["username"]);
			$password = ($_POST["password"]);
			$cpassword = ($_POST["cpassword"]);
			$zone = ($_POST["zone"]);

			if (isset($_POST["carpool"]))
				$carpool = "checked";


			$allValid = true;		// initialize variables for checking successful save
			$savedLog = "";
			
			//perform some validation with the input

			if  ( strlen($firstname)  <= 1)
			{	$allValid = false;
				$firstname_error = "Too short. Must be at least 2 characters";
			}
			if (strlen($lastname)  <= 1) {
				$allValid = false;
				$lastname_error = "Too short. Must be at least 2 characters";
			}
			if (strlen($address)  < 6) {
				$allValid = false;
				$address_error = "Too short. Must be at least 5 characters";
			}
			if (strlen($city)  <= 1) {
				$allValid = false;
				$city_error = "Too short. Must be at least 2 characters";
			}
			if (strlen($province)  <=1) {
				$allValid = false;
				$province_error = "Too short. Must be at least 2 characters";
			}
			if (!preg_match("/^[a-z]\d[a-z] \d[a-z]\d$/i",$postal))   {	
				$allValid = false;
				$postal_error = "Please enter a valid postal code e.g A1B 2C3";
			}
			if (!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,5}$/",$email))   {	
				$allValid = false;
				$email_error = "Please enter a valid email e.g. abc@xyz.com ";
			}
			if (!preg_match("/^\d{3} \d{3} \d{4}$/",$phone1))   {	
				$allValid = false;
				$phone1_error = "Please enter a valid phone e.g. 123 456 7890";
			}
			
			if (!empty($phone2)) {
				if (!preg_match("/^\d{3} \d{3} \d{4}$/",$phone2))   {	
					$allValid = false;
					$phone2_error = "Please enter a valid phone e.g. 123 456 7890";
				}
			}
			if ($DOBMonth == "none" || $DOBDay == "none" || $DOBYear == "none"  )
			{
				$allValid = false;
				$DOB_error = "Please input the Day-Month-Year";
			}
			if (strlen($username)  <= 5) {
				$allValid = false;
				$username_error = "Username too short. Must be at least 5 characters";
			}
			if (strlen($password)  == 0 ) {
				$allValid = false;
				$password_error = "Please enter the password";
			}
			if ($cpassword  != $password ) {
				$allValid = false;
				$cpassword_error = "Two passwords are not the same. Please re-enter both now";
				
				$password = "";
				$cpassword = "";
			}
			
			if ($allValid == true)
			{	
				$conn = setUpConnection();
				//SQL to insert data into database
				
				/*
				$servername = "localhost";
				$db_username = "lenmor";
				$db_password = "markoj2049";
				$dbname = "train";
				
				// Create connection
				$conn = new mysqli($servername, $db_username, $db_password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 
				*/
				$date = $DOBYear . "-" . $DOBMonth . "-" . $DOBDay ;
				$birthday = date("Y-m-d", strtotime($date));
				//$birthday = date_format($date, "Y-m-d");
				//echo $birthday;
				
				if ($carpool == "checked")
					$carpoolVar = 1;
				else
					$carpoolVar = 0;

				if ( !($stmt = $conn->prepare ("INSERT INTO users (firstname, lastname, address, city, province, postal, email, phone1, phone2, birthday, username, password, 	cpassword, zone, carpool ) VALUES (?, ?, ? ,?, ?, ? ,?, ?, ? ,?, ?, ? ,?, ?, ? )  ") )) {
					 echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
				 }
				
				$stmt->bind_param("sssssssssssssii", $firstname, $lastname, $address, $city, $province, $postal, $email, $phone1, $phone2, $birthday, $username, $password, $cpassword, $zone, $carpoolVar );
				
				$stmt->execute();

				// SUCCESSFUL SAVE TO DATABASE

				if (empty( $stmt->error))
				{
					$savedLog = $username .  " has been successfully added to the database";

					//clear all inputs
						$firstname = "";
						$lastname ="";
						$address = "";
						$city = "";
						$province = "";
						$postal = "";
						$email = "";
						$phone1 = "";
						$phone2 = "";

						$DOBMonth = "none";
						$DOBDay = "none";
						$DOBYear = "none";
						
						$username = "";
						$password = "";
						$cpassword = "";
						$zone = "";
						$carpool = "unchecked";
					
				}
					
				else
					$savedLog = "Error" . $stmt->error ;
				
				$stmt->close();
				$conn->close();
			}				
		}
		function screen_input ($data) {		//remove unnecessary spaces 
			$data = trim($data);		
			$data = stripslashes($data);	
			$data = htmlspecialchars($data);
			
			return $data;
		}
	?>
    <header>
        <div>
            <h2>Thomas the Train</h2>
            <h4>Transportation Systems</h4>
            <p id="date"></p>
        </div>
        <a href="index.php"><img alt="Thomas The Train" src="images/thomas.jpg" width="150"></a>
        <script type="text/javascript" src="js/date.js"></script>

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
            <li class="current">
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
		<h3><?php if( !empty($savedLog) ) echo '*************' . $savedLog . '***************';  ?></h3>
	
        <h2>Registration Form</h2>
        <div class="left_form">

            <!-- send to the same document and strip out unnecessary chars that might be exploited -->
            <form id="myForm" name="myForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <fieldset>
                    <legend>Personal Information</legend>
                    <p>
                        <label>First name:</label>
                        <input id="firstname" name="firstname"  required type="text"  value="<?php print $firstname; ?>"   /> <span class="invalid"><?php echo $firstname_error;  ?></span>
                    </p>
                    <p>
                        <label>Last name:</label>
                        <input id="lastname" name="lastname" required type="text" value="<?php print $lastname; ?>"/> <span class="invalid"><?php echo $lastname_error;  ?></span>
                    </p>
                    <p>
                        <label>Address:</label>
                        <input id="address" name="address" required type="text" value="<?php print $address; ?>" /> <span class="invalid"><?php echo $address_error;  ?></span>
                    </p>
                    <p>
                        <label>City:</label>
                        <input id="city" name="city" required type="text" value="<?php print $city; ?>"/> <span class="invalid"><?php echo $city_error;  ?></span>
                    </p>
                    <p>
                        <label>Province:</label>
                        <input id="province" name="province" required type="text" value="<?php print $province; ?>"/> <span class="invalid"><?php echo $province_error;  ?></span>
                    </p>
                    <p>
                        <label>Postal Code:</label>
                        <input id="postal" name="postal" required type="text" placeholder="A1B 2C3" value="<?php print $postal; ?>"  /> <span class="invalid"><?php echo $postal_error;  ?></span>
                    </p>
                    <p>
                        <label>E-mail Address:</label>
                        <input id="email" name="email"  required type="email" value="<?php print $email; ?>" /> <span class="invalid"><?php echo $email_error;  ?></span>
                    </p>
                    <p>
                        <label>Phone Number:</label>
                        <input id="phone1" name="phone1"  placeholder="XXX XXX XXXX" required type="text"  value="<?php print $phone1; ?>"  /> <span class="invalid"><?php echo $phone1_error;  ?></span>
                    </p>
                    <p>
                        <label>Second Phone Number:</label>
                        <input id="phone2" name="phone2"  placeholder="XXX XXX XXXX" type="text"  value="<?php print $phone2; ?>"/> <span class="invalid"><?php echo $phone2_error;  ?></span>
                    </p>
                    <p>
                        <label>Birthday:</label>
                        <select name="DOBMonth">
                            <option   value="none">
                                - Month -
                            </option>
                            <option value="01" <?php if (isset($DOBMonth) && $DOBMonth == "01") echo 'selected="selected"'; ?> >
                                January
                            </option>
                            <option value="02" <?php if (isset($DOBMonth) && $DOBMonth == "02") echo 'selected="selected"'; ?>>
                                February
                            </option>
                            <option value="03" <?php if (isset($DOBMonth) && $DOBMonth == "03") echo 'selected="selected"'; ?>>
                                March
                            </option>
                            <option value="04" <?php if (isset($DOBMonth) && $DOBMonth == "04") echo 'selected="selected"'; ?>>
                                April
                            </option>
                            <option value="05" <?php if (isset($DOBMonth) && $DOBMonth == "05") echo 'selected="selected"'; ?>>
                                May
                            </option>
                            <option value="06" <?php if (isset($DOBMonth) && $DOBMonth == "06") echo 'selected="selected"'; ?>>
                                June
                            </option>
                            <option value="07" <?php if (isset($DOBMonth) && $DOBMonth == "07") echo 'selected="selected"'; ?>>
                                July
                            </option>
                            <option value="08" <?php if (isset($DOBMonth) && $DOBMonth == "08") echo 'selected="selected"'; ?>>
                                August
                            </option>
                            <option value="09" <?php if (isset($DOBMonth) && $DOBMonth == "09") echo 'selected="selected"'; ?>>
                                September
                            </option>
                            <option value="10" <?php if (isset($DOBMonth) && $DOBMonth == "10") echo 'selected="selected"'; ?>>
                                October
                            </option>
                            <option value="11" <?php if (isset($DOBMonth) && $DOBMonth == "11") echo 'selected="selected"'; ?>>
                                November
                            </option>
                            <option value="12" <?php if (isset($DOBMonth) && $DOBMonth == "12") echo 'selected="selected"'; ?>>
                                December
                            </option>
                        </select>
                        <select id="DOBDay" name="DOBDay">

								<?php 
									echo "<option value='none'> - Day - </option>";
									
									for ($x = 1; $x <= 31; $x++)
									{
										echo "<option value='". $x .  "'" ;
										if(isset($DOBDay) && $DOBDay == $x)  {echo "selected='selected'" ;}    
										echo " >" . $x;
										echo "</option>";
									}
								
								?>
                        </select>
                        <select id="DOBYear" name="DOBYear">
							
								<?php 
									echo "<option value='none'> - Year - </option>";
									
									for ($x = 2005; $x > 1940; $x--)
									{
										echo "<option value='". $x .  "'" ;
										if(isset($DOBYear) && $DOBYear == $x)  {echo "selected='selected'" ;}    
										echo " >" . $x;
										echo "</option>";
									}
								
								?>
                        </select>
                    </p>

                    <div class="credentials">
					<span class="invalid"><?php echo $username_error;  ?></span>
                        <p>
                            <label>Username:</label>
                            <input id="username" name="username" required type="text" value="<?php print $username; ?>">
                        </p>
						<span class="invalid"><?php echo $password_error;  ?></span>
                        <p>
                            <label>Password</label>
                            <input id="initial" name="password" required size="20" type="password">
                        </p>
						<span class="invalid"><?php echo $cpassword_error;  ?></span>
                        <p>
                            <label>Confirm Password</label>
                            <input id="second" name="cpassword" required size="20" type="password" />
                        </p>
                    </div>

                </fieldset>

                <fieldset>
                    <legend>Zone and Carpooling</legend>
                    <label>Fare Zone</label>
                    <select name="zone">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>

                    <p class="note">The metropolitan territory is divided into four zones which are used to determine transit fares based on the distance to be covered from downtown Montreal.
                    </p>

                    <p>
                        <label>
                            <input type="checkbox" name="carpool" id="carpool"  <?php print $carpool; ?>   /> Carpool</label>
                    </p>
                    <p id="carpoolOptions">
                    </p>
                </fieldset>

                <div class="center">
                    <input name="reset" type="reset" value="RESET" />
                    <input name="submit" type="submit" value="SUBMIT" />
                </div>
            </form>

            <br />

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

    <!--================ SCRIPTS for carpool checkbox ================-->
    <script type="text/javascript" src="js/carpool.js">
    </script>
    <!--script type="text/javascript" src="js/register.js">
    </script-->

</body>

</html>