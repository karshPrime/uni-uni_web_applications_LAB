<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab8 php</title>
</head>
<body>
    <h1>Rohirrim Tour Booking Confirmation</h1>
    <?php
        function sanitise_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // check if process was triggered by a form submit, if not display an error message
        if ( isset($_POST["firstname"]) ) {
            $firstname = sanitise_input($_POST["firstname"]);
            if (isset($_POST["lastname"]))  $lastname  = sanitise_input($_POST["lastname"]);
            if (isset($_POST["age"]))       $age       = sanitise_input($_POST["age"]);
            if (isset($_POST["food"]))      $food      = sanitise_input($_POST["food"]);
            if (isset($_POST["partySize"])) $partySize = sanitise_input($_POST["partySize"]);

            // tour
            $tour = "";
            if (isset($_POST["1day"]))   $tour = $tour. "1 day ";
            if (isset($_POST["4day"]))   $tour = $tour. "and 4 days ";
            if (isset($_POST["10day"]))  $tour = $tour. "and 10 days ";

            // species
            if (isset($_POST["species"])) {
                $species = sanitise_input($_POST["species"]);
            } else {
                $species = "Unknown Species";
            }
            
            // print data
            echo "<p>Welcome $firstname $lastname</p>";
            echo "<p> You are booked on the $tour tours</p>";
            echo "<p> Species: $species</p>";
            echo "<p> Meal Preference: $food</p>";
            echo "<p> Number of travellers: $partySize</p>";

        } else {
            // Display error message, if process not triggered by a form submit
            echo "<p>Error: Enter data in the <a href=\"register.html\">form</a></p>";
        }
        
    ?>
</body>
</html>