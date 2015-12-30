<!-- Assignment 4 SOEN-287
    Coded by: Lenmor Larroza Dimanalata #27699727
	HOME PAGE
	-->

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
        <!--============== SCRIPT for date =====================-->
        <script type="text/javascript" src="js/date.js"></script>
    </header>
    <nav>
        <ul>
            <li class="current">
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

        <!--=============== 1st row  ================-->

        <h1>Enjoy the train ride!</h1>

        <h3>From Montreal to anywhere, the convenience of train transportation for you</h3>

        <p>
            Welcome to the Thomas the Train website! Whether you are planning a trip or looking for the right fare, you'll find everything you need to get around Greater Montréal using public and active transportation – by train. A website for you, inspired by you!
        </p>

        <p>You will find everything you need to plan your train travel or just purchase tickets quickly. Have fun browsing.</p>
        <dl>
            <dt><a href="index.php">Home</a></dt>
            <dd>Quick links to schedules and ticket purchases, as well as promotions. </dd>
            <dt><a href="schedule.php">Schedule</a></dt>
            <dd>Check out stations and train times. No matter where you are, we have a train for you!</dd>
            <dt><a href="nextTrain.php">Next Train</a></dt>
            <dd>Quickly check next 3 trains close to you. You'll never be late again.</dd>
            <dt> <a href="Registration.php">Registration</a></dt>
            <dd>Want to take the best train service in Montreal? Sign up now</dd>
            <dt> <a href="purchase.php">Purchase Ticket</a></dt>
            <dd>Buy tickets with several options. You need to register first to be able to access this.</dd>
            <dt><a href="carpool.php">Carpool Buddy</a></dt>
            <dd>Share a ride with someone to the train station. Save gas. Make new friends.</dd>
        </dl>

        <br />
        <hr />
        <br />

        <!--=============== 2nd row  ==================-->

        <div class="one_row">

            <div class="cons_table">
                <div>
                    <h3>Construction alert</h3>
                    <p>
                        There would be some construction going on
                        <br /> from November 20 - 21, 2015 on these following stations:
                    </p>
                </div>
                <div class="cons_img">
                    <img src="images/cons.png" alt="construction" />
                </div>

                <table>
                    <tr>
                        <th>Lines</th>
                        <th>Stations</th>
                    </tr>
                    <tr>
                        <td>Deux-Montagnes</td>
                        <td>
                            <ul>
                                <li>Montpelier</li>
                                <li>Sunnybrooke</li>
                                <li>Bois-Franc</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>Saint-Jerome</td>
                        <td>
                            <ul>
                                <li>Parc</li>
                                <li>Vimont</li>
                            </ul>

                        </td>
                    </tr>
                </table>
            </div>


            <div class="right_table">
                <h3>NEXT TRAINS Leaving</h3>
                <table>
                    <tr>
                        <th>Lines</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Departing Time:</th>
                    </tr>
                    <tr>
                        <td>Deux-Montagnes</td>
                        <td>Montreal</td>
                        <td>Montreal</td>
                        <td class="time">10:00 AM</td>
                    </tr>
                    <tr>
                        <td>Vaudreuil-Hudson</td>
                        <td>Roxboro-Pierrefonds</td>
                        <td>Hudson</td>
                        <td class="time">10:00 AM</td>
                    </tr>
                    <tr>
                        <td>Saint-Jerome</td>
                        <td>Blainville</td>
                        <td>Parc</td>
                        <td class="time">10:00 AM</td>
                    </tr>
                    <tr>
                        <td>Mont-Saint-Hilaire</td>
                        <td>McMasterville</td>
                        <td>Gare Centrale</td>
                        <td class="time">10:00 AM</td>
                    </tr>
                    <tr>
                        <td>Candiac</td>
                        <td>Delson</td>
                        <td>LaSalle</td>
                        <td class="time">10:00 AM</td>
                    </tr>
                </table>


            </div>

            <div>
                <img width="200" src="images/thomas-rail.jpg" alt="thomas the train" />
            </div>


        </div>

        <hr />

        <!--====================== 3rd row =========================-->

        <div class="one_row2">

            <div class="left_extra">
                <img alt="train ride" src="images/train.jpg" width="250" />
                <h4>NOTHING LIKE A NICE PEACEFUL TRAIN RIDE</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris scelerisque erat eget mi sollicitudin faucibus. Mauris tempor at mi a molestie. Sed ultricies nibh sed mi gravida auctor.
                </p>
            </div>

            <div class="left_extra">
                <img alt="train ride" src="images/friends.jpg" width="250" />
                <h4>Travel with 2 Friends and get $100 discount</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris scelerisque erat eget mi sollicitudin faucibus. Mauris tempor at mi a molestie. Sed ultricies nibh sed mi gravida auctor.
                </p>
            </div>

            <div class="left_extra">
                <img alt="free ticket" src="images/free.jpg" width="250" />
                <h4>ONE FREE TICKET for a purchase of 10 Tickets!!</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris scelerisque erat eget mi sollicitudin faucibus. Mauris tempor at mi a molestie. Sed ultricies nibh sed mi gravida auctor.
                </p>
            </div>

            <div class="left_extra">
                <img alt="free ticket" src="images/kids.jpg" width="250" />
                <h4>KIDS under 10 are FREE, with FREE Thomas the Train Toy!</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris scelerisque erat eget mi sollicitudin faucibus. Mauris tempor at mi a molestie. Sed ultricies nibh sed mi gravida auctor.
                </p>
            </div>
			
            <div class="left_extra">
                <img alt="free ticket" src="images/kids.jpg" width="250" />
                <h4>KIDS under 10 are FREE, with FREE Thomas the Train Toy!</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris scelerisque erat eget mi sollicitudin faucibus. Mauris tempor at mi a molestie. Sed ultricies nibh sed mi gravida auctor.
                </p>
            </div>
			
            <div class="left_extra">
                <img alt="free ticket" src="images/kids.jpg" width="250" />
                <h4>KIDS under 10 are FREE, with FREE Thomas the Train Toy!</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris scelerisque erat eget mi sollicitudin faucibus. Mauris tempor at mi a molestie. Sed ultricies nibh sed mi gravida auctor.
                </p>
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