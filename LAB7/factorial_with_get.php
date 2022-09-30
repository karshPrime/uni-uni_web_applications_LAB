<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial PHP</title>
</head>
<body>
    <?php
		include ("mathfunctions.php");
    ?>

    <h1>Creating Web Applications - Lab 7</h1>

    <?php
    	if(isset($_GET["number"])) {
    		$num = $_GET["number"];
    		if (isPositiveInteger($num)) {
    			echo "<p>", $num, "! is ", factorial ($num), ".</>";
    		} else {
    			echo "<p>Please enter a positive integer.</p>";
    		}
    		echo "<p><a href='index.html'>Return to the Entry Page</a></p>";
    	}
    ?>
</body>
</html>