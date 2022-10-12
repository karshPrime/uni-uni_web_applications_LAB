<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Creating Web Applications Lab 10">
        <meta name="keyword" content="PHP, MySql">
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
            // upon successful connection
            $sql_table = "cars";
            $query = "";
        
            // getting data
            if ($_GET["carmake"]!=""){
                $make = $_GET["carmake"];
                if ($query != ""){ $query .= "AND "; }
                $query .= " make='$make' ";
            }

            if ($_GET["carmodel"]!=""){
                $model = $_GET["carmodel"];
                if ($query != ""){ $query .= "AND "; }
                $query .= "model='$model' ";
            }

            if ($_GET["price"]!=""){
                $price = $_GET["price"];
                if ($query != ""){ $query .= "AND "; }
                $query .= "price='$price' ";
            }

            if ($_GET["yom"]!=""){
                $yom = $_GET["yom"];
                if ($query != ""){ $query .= "AND "; }
                $query .= "yom='$yom' ";
            }

            if ($query == ""){
                echo "<p>Please enter search terms <a href=\"searchcar.html\">Here.</a></p>";
            } else {
                // SQL set up command
                $query = "SELECT make, model, price, yom FROM cars WHERE " . $query . ";";
            
                // store result in result pointer
                $result = mysqli_query($conn, $query);
            
                //check if the query was successful
                if (!$result) {
                    echo "<p>Something is wrong with " , $query, "</p>";
                } else {
                    // create table to desipaly result
                    echo "<table>\n";
                    echo "<tr>\n"
                    . "<th scope =\"col\">Make</th>\n"
                    . "<th scope =\"col\">Model</th>\n"
                    . "<th scope =\"col\">Price</th>\n"
                    . "<th scope =\"col\">Year</th>\n"
                    . "</tr>\n";
                    
                    // display the result
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>\n";
                        echo "<td>",$row["make"],"</td>\n";
                        echo "<td>",$row["model"],"</td>\n";
                        echo "<td>",$row["price"],"</td>\n";
                        echo "<td>",$row["yom"],"</td>\n";
                        echo "</tr>\n";
                    }
                    echo "</table>\n";
            
                    // free memory after displaying result
                    mysqli_free_result($result);
                }

                // close database
                mysqli_close($conn);
            }
        }
    ?>
    </body>
</html>
