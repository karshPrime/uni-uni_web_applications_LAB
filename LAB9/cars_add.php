<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Processed</title>
        <link rel="stylesheet" href="addcar.css" type="text/css" />
    </head>
    <body>
    <?php
        require_once("settings.php");
        $conn = @mysqli_connect(
            $host,
            $user,
            $pwd,
            $sql_db
        );

        if (!$conn) {
            // display an error message
            echo "<p>Database connection failure</p>";
        } else {
            // set table
            $sql_table = "cars";

            // set data
            $make = $_POST["carmake"];
            $model = $_POST["carmodel"];
            $price = $_POST["price"];
            $yom = $_POST["yom"];
            
            // SQL insert command
            $query = "INSERT INTO $sql_table (make, model, price, yom) VALUES 
                ('$make', '$model', '$price', '$yom')";

            // store result in result pointer
            $result = mysqli_query($conn, $query);

            // check if successful
            if (!$result) {
                echo "<p class=\"wrong\">Something is wrong with " , $query, "</p>";
            } else {
                echo "<p class=\"ok\">Successfully added New Car record</p>";
            }
            
            //close database
            mysqli_close($conn);
        }
    ?>
    </body>
</html>
