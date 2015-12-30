<!-- Assignment 4 SOEN-287
Coded by: Lenmor Larroza Dimanalata #27699727 
SCHEDULE
-->

<?php
include('php/db_connect.php');			//used for setting up DB connection
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
            <p id="date"> </p>
        </div>
        <a href="index.php">
            <img alt="Thomas The Train" src="images/thomas.jpg" width="150">
        </a>
        <!--============== SCRIPTS for date and get stations =====================-->
        <script type="text/javascript" src="js/date.js"></script>
        <script type="text/javascript" src="js/getStations.js">
        </script>

    </header>
    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li class="current">
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
        <h2>Select a train station</h2>
		
		<form name="schedule" onsubmit="schedule.php" method="post">
            <fieldset>
                <table class="center_table">
                    <tr>
                        <th colspan="3">Please select a line</th>
                    </tr>
                    <tr>
                        <td>
                            <p style="text-align:left;">
                                <label>
								
                                    <input type="radio" name="line" value="Deux-Montagnes" onchange='loadStationList()'    
									/>Deux-Montagnes</label>
                            </p>
                        </td>
                        <td>
                            <p style="text-align:left;">
                                <label>
                                    <input type="radio" name="line" value="Vaudreuil-Hudson" onchange='loadStationList()' 
									/>Vaudreuil-Hudson</label>
                            </p>
                        </td>
                        <td>
                            <p style="text-align:left;">
                                <label>
                                    <input type="radio" name="line" value="Candiac" onchange='loadStationList()' 
									/>Candiac</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3">Please select a direction</th>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p id="direction"> </p>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3">Please select a station</th>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p id="station"> </p>
                        </td>
                    </tr>
					
					<!------------------ schedule ------------------>
					<tr>
						<td colspan ="3">
						<table class="center_table">
						
						<?php 
						
						if (isset($_POST['submit_sched']))			// if form sbumitted
						{
							if (isset($_POST['station'] )  && isset($_POST['direction']))		//if both station and direction submitted
							{
								
								$conn = setUpConnection();			//setup database connection

								$sql = "SELECT station, times_string
										 FROM times 
										 WHERE station = '" . $_POST['station'] . "'" .
										 "AND  direction ='" . 	$_POST['direction'] . "';"	 ;	 
										 
								$result = $conn->query($sql);
								
								if ($result->num_rows > 0) {
									
									echo "<tr> <th>" .  $_POST['station'] .  " - Direction "  .   
								  $_POST['direction']   .  " </th></tr>";
									// output data of each row
									while($row = $result->fetch_assoc()) {
										$arrayTimes =  explode (",", $row["times_string"] );
										
										for ($x = 0; $x < count($arrayTimes); $x++)
											echo "<tr><td>" . $arrayTimes[$x] . "</td></tr>";
									}
								} else {
									echo "<tr><td>Please enter the line, direction and station</td></tr>";
								}
								$conn->close();		
							}
						}
						?>
						
						</table>
						</td>
					</tr>
                </table>

                <div class="center">
                    <input type="submit" name="submit_sched" value="SUBMIT" id="submit" />
                </div>
            </fieldset>
        </form>
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