<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Creating Web Applications Lab 10">
        <meta name="keyword" content="PHP, MySql">
        <title>Retrieving records to HTML</title>
    </head>
    <body>
        <h1>Creating Web apps - Lab 10</h1>
    <?php
        require_once("settings.php");
        $conn = @mysqli_connect(
            $user,
            $pwd,
            $sql_db
        );

        // Checks if connection is successful
        if (!$conn) {
            //display an error message
            echo "<p>Database connection failure</p>";
        } else {
            // upon successful connection
            $sql_table = "cars";

            // SQL set up command
            $query = "SELECT make, model, price FROM cars ORDER BY make, model";

            // store result in result pointer
            $result = mysqli_query($conn, $query);

            // check if the query was successful
            if (!$result) {
                echo "<p>Something is wrong with " , $query, "</p>";
            } else {
                // create a table to desipaly the result
                echo "<table>\n";
                echo "<tr>\n"
                . "<th scope =\"col\">Make</th>\n"
                . "<th scope =\"col\">Model</th>\n"
                . "<th scope =\"col\">Price</th>\n"
                . "</tr>\n";

                // display the result
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n";
                    echo "<td>",$row["make"],"</td>\n";
                    echo "<td>",$row["model"],"</td>\n";
                    echo "<td>",$row["price"],"</td>\n";
                    echo "</tr>\n";
                }
                echo "</table>\n";

                //free memory after displaying result
                mysqli_free_result($result);

            }

            //close database
            mysqli_close($conn);
        }
        ?>
    </body>
</html>
