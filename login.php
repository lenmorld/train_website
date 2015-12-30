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
	
		<h3><?php if( !empty($savedLog) ) echo '*************' . $savedLog . '***************';  ?></h3>
			<h2>Login Form </h2>
			<form method="post" action="session.php" class="center_form">
				<label>Username:</label>
				<input type="text" placeholder="username" name="username" id="uname" />
				<br />
				<br />
				<label>Password: </label>
				<input type="password" placeholder="********" name="password" id="password" />
				<br/><br/>
				
				<div class="center">
				<input name="submit" type="submit" value="Login"/>		
				</div>
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