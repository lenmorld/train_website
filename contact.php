<!DOCTYPE html>
<!-- Assignment 3 SOEN-287
    Coded by: Lenmor Larroza Dimanalata #27699727
    -->
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

        <!-- phone number for customer service --->

        <!-- address in case someone wants to go to the office in person -->


        <div class="contact">

            <p>

                <h3>Contact Us</h3> E-mail: <a href="mailto:admin@thomasthetraintransport.com?Subject=Hello%20There" target="_top">
	admin@thomasthetraintransport.com</a>
                <br /> Phone Number: <span class="phone">514-123-4567</span>

            </p>

            <p>
                <h3>Our Address</h3> 4120 St-Laurent #400
                <br /> Montreal, QC, Canada
                <br /> H9L 3M7
                <br />
            </p>

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