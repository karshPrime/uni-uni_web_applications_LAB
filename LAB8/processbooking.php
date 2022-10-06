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

            // validation
            $errMsg = "";
            if ($firstname == "") {
                $errMsg .= "<p>You must enter your first name.</p>";
            } elseif (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
                $errMsg .= "<p>Only alpha letters allowed in your first name.</p>";
            } 

            if ($lastname == "") {
                $errMsg .= "<p>You must enter your last name.</p>";
            } elseif (!preg_match("/^[a-zA-Z\-]*$/", $lastname)) {
                $errMsg .= "<p>Only alpha letters and hyphens allowed in your last name.</p>";
            }

            if (!is_numeric($age)) {
                $errMsg .= "<p>Age must be a number</p>";
            } elseif ($age < 10 || $age > 10000) {
                $errMsg .= "<p>Age must be between 10 and 10000</p>";
            }

            // print data
            echo "
                <p>Welcome $firstname $lastname</p>;
                <p> You are booked on the $tour tours</p>;
                <p> Species: $species</p>;
                <p> Meal Preference: $food</p>;
                <p> Number of travellers: $partySize</p>
            ";

        } else {
            // Redirect to form if process not triggered by a form submit
            header("location: register.html");
        }
        
    ?>
</body>
</html>