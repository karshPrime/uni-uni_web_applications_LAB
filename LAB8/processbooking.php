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
        // check if process was triggered by a form submit, if not display an error message
        if (isset($_POST["firstname"])) {
            $firstname = $_POST["firstname"];
            echo "<p>This is a test: You first name is $firstname</p>";

            if (isset($_POST["lastname"])) $lastname = $_POST["lastname"];
            echo "<p>This is a test: Your lastname is $lastname";

            if (isset($_POST["age"])) $age = $_POST["age"];
            echo "<p>This is a test: Your age is $age";

            if (isset($_POST["food"])) $food = $_POST["food"];
            echo "<p>This is a test: Your food is $food";

            if (isset($_POST["partySize"])) $partySize = $_POST["partySize"];
            echo "<p>This is a test: Your partySize is $partySize";

        } else {
            // Display error message, if process not triggered by a form submit
            echo "<p>Error: Enter data in the <a href=\"register.html\">form</a></p>";
        }
        
    ?>
</body>
</html>