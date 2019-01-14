<?php
 //session_start();
 header('Content-Type: text/html; charset=iso-8859-1');
 $message = "";
 $message2 = "";
 $message3 = "";
 
 	
 
 ?>

 <html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/program-10.css">
		<title>
			ITSE 2302 Program-10: Jesse Strait
		</title>
	</head>

	<body>
		<h1>ITSE 2302 Program-10: Jesse Strait</h1>
		<hr>

		<h2>#1. Prepared Statements to Enter Data.</h2>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		    
		    <p>Enter information for 4 teams</p>
		    <table style="width:100%">
			  <tr>
			    <th>Team Name</th>
			    <th>City</th> 
			    <th>Best Player</th>
			    <th>Year Formed</th>
			    <th>Website</th>
			  </tr>
			  <tr>
			    <td>
			    	<input name="team1" type="text" max="30"/>
			    </td>
			    <td>
			    	<input name="city1" type="text" max="30"/>
			    </td> 
			    <td>
			    	<input name="best1" type="text" max="30"/>
			    </td>
			    <td>
			    	<input name="year1" type="number" max="9999" />
			    </td>
			    <td>
			    	<input name="site1" type="url" max="30"/>
			    </td>
			  </tr>
			  <tr>
			    <td>
			    	<input name="team2" type="text" max="30"/>
			    </td>
			    <td>
			    	<input name="city2" type="text" max="30"/>
			    </td> 
			    <td>
			    	<input name="best2" type="text" max="30"/>
			    </td>
			    <td>
			    	<input name="year2" type="number" max="9999" />
			    </td>
			    <td>
			    	<input name="site2" type="url" max="30"/>
			    </td>
			  </tr>
			  <tr>
			    <td>
			    	<input name="team3" type="text" max="30"/>
			    </td>
			    <td>
			    	<input name="city3" type="text" max="30"/>
			    </td> 
			    <td>
			    	<input name="best3" type="text" max="30"/>
			    </td>
			    <td>
			    	<input name="year3" type="number" max="9999" />
			    </td>
			    <td>
			    	<input name="site3" type="url" max="30"/>
			    </td>
			  </tr>
			  <tr>
			    <td>
			    	<input name="team4" type="text" max="30"/>
			    </td>
			    <td>
			    	<input name="city4" type="text" max="30" />
			    </td> 
			    <td>
			    	<input name="best4" type="text" max="30" />
			    </td>
			    <td>
			    	<input name="year4" type="number" max="9999" />
			    </td>
			    <td>
			    	<input name="site4" type="url" max="30"/>
			    </td>
			  </tr>
			  
			</table>

    		<input type="submit" name="submit4" value="ADD TO DATABASE">
	</form>
	
<?php


if(isset($_POST['submit4'])) {
	$team1 = $_POST['team1'];
	$city1 = $_POST['city1'];
	$best1 = $_POST['best1'];
	$year1 = $_POST['year1'];
	$site1 = $_POST['site1'];

	$team2 = $_POST['team2'];
	$city2 = $_POST['city2'];
	$best2 = $_POST['best2'];
	$year2 = $_POST['year2'];
	$site2 = $_POST['site2'];

	$team3 = $_POST['team3'];
	$city3 = $_POST['city3'];
	$best3 = $_POST['best3'];
	$year3 = $_POST['year3'];
	$site3 = $_POST['site3'];

	$team4 = $_POST['team4'];
	$city4 = $_POST['city4'];
	$best4 = $_POST['best4'];
	$year4 = $_POST['year4'];
	$site4 = $_POST['site4'];

	$servername = "lineofcode.com";
 	$username = "itse2302001003";
 	$password = "8AT7SWCJ";
 	$message2 = "";
   	$dbname = "itse2302001003";
   	$conn = new mysqli($servername, $username, $password,$dbname);

	//$conn = new mysqli($servername, $username, $password);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	if ($conn) {
		$message = "Connected to DATABASE<br>";
		echo $message2;
		//sleep(1);
	}

	$stmt = $conn->prepare("INSERT INTO teams (teamname, city, bestplayer, yearformed, website) VALUES (?,?,?,?,?)");

	$stmt->bind_param("sssis", $team1, $city1, $best1, $year1, $site1);
	$stmt->execute();
	$last_id = mysqli_insert_id($conn);

	if ($last_id) {
    
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    echo "<br>";
	} else {
	    echo "Error: <br>" . $conn->error;
	}

	$stmt->bind_param("sssis", $team2, $city2, $best2, $year2, $site2);
	$stmt->execute();
	$last_id = mysqli_insert_id($conn);
	
	if ($last_id) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    echo "<br>";
	} else {
	    echo "Error: <br>" . $conn->error;
	}

	$stmt->bind_param("sssis", $team3, $city3, $best3, $year3, $site3);
	$stmt->execute();
	$last_id = mysqli_insert_id($conn);
	
	if ($last_id) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    echo "<br>";
	} else {
	    echo "Error: <br>" . $conn->error;
	}

	$stmt->bind_param("sssis", $team4, $city4, $best4, $year4, $site4);
	$stmt->execute();
	$last_id = mysqli_insert_id($conn);
	
	if ($last_id) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    echo "<br>";
	} else {
	    echo "Error: <br>" . $conn->error;
	}
	$stmt->close();
	$conn->close();
}
	
?>	
	<hr>
	<h2>#2. Select all data from field, and echo it out.</h2>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		
		<select name="fields">
  			<option value="teamname">Team Name</option>
			<option value="city">City</option>
  			<option value="bestplayer">Best Player</option>
  			<option value="yearformed">Year Formed</option>
  			<option value="website">Website</option>
		</select>


		<input type="submit" name="submit5" value="Show Data">
	</form>
<?php


if(isset($_POST['submit5'])) {
	$servername = "lineofcode.com";
	$username = "itse2302001003";
	$password = "8AT7SWCJ";

	$dbname = "itse2302001003";
	$conn = new mysqli($servername, $username, $password,$dbname);

	$selected_val = $_POST['fields'];
	
	$sql = "SELECT $selected_val FROM teams";
	$result = $conn->query($sql);
	
	if($result) {
		while($row = $result->fetch_array())
  		{
  		echo $row[$selected_val];
  		echo "<br />";
  		}
	}else {
		echo "ERROR WITH SQL";
	}
    
	$conn->close();

}

?>

<hr>
	<h2>#3. Select data from field, and echo it out, using multiple checkboxes</h2>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		
		Team Name<input type="checkbox" name="fieldz[]" id="fieldz" value="teamname">
		City<input type="checkbox" name="fieldz[]" id="fieldz" value="city">
		Best Player<input type="checkbox" name="fieldz[]" id="fieldz" value="bestplayer">
		Year Formed<input type="checkbox" name="fieldz[]" id="fieldz" value="yearformed">
		Website<input type="checkbox" name="fieldz[]" id="fieldz" value="website">

		<input type="submit" name="submit6" value="Show Data">
	</form>
<?php
error_reporting(E_ALL ^ E_NOTICE);

if(isset($_POST['submit6'])) {
	$servername = "lineofcode.com";
	$username = "itse2302001003";
	$password = "8AT7SWCJ";

	$dbname = "itse2302001003";
	$conn = new mysqli($servername, $username, $password,$dbname);

	$sql = "SELECT teamname, city, bestplayer, yearformed, website FROM teams";
	

	$result = $conn->query($sql);
	$col1 = $_POST['fieldz'][0];
	$col2 = $_POST['fieldz'][1];
	$col3 = $_POST['fieldz'][2];
	$col4 = $_POST['fieldz'][3];
	$col5 = $_POST['fieldz'][4];
	
    while($row = $result->fetch_array())
  		{

  		if (isset($col1)) {
  			//echo "TEAM: ";
  			echo $row[$col1];
  			echo "<br />";
  		}
  		if (isset($col2)) {
  			//echo "CITY: ";
  			echo $row[$col2];
  			echo "<br />";
  		}
  		if (isset($col3)) {
  			//echo "BEST PLAYER: ";
  			echo $row[$col3];
  			echo "<br />";
  		}
  		if (isset($col4)) {
  			echo "YEAR FORMED: ";
  			echo $row[$col4];
  			echo "<br />";
  		}
  		if (isset($col5)) {
  			//echo "WEBSITE: ";
  			echo $row[$col5];
  			echo "<br />";
  		}
  		
  		
  		}
	$conn->close();

}

?>

<hr>
	<h2>#4. Show all data from table, select and use textbox to delete row.</h2>
	
<?php

$servername = "lineofcode.com";
$username = "itse2302001003";
$password = "8AT7SWCJ";

$dbname = "itse2302001003";
$conn = new mysqli($servername, $username, $password,$dbname);

$sql = "SELECT id, teamname, city, bestplayer, yearformed, website FROM teams";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. 
        " - Team Name: " . $row["teamname"]. 
        " City: " . $row["city"].
        " Best Player: " . $row["bestplayer"].
        " Year Formed: " . $row["yearformed"].
        " Website: " . $row["website"].
        "<br>";
    }
} else {
    echo "0 results";
}




?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		
		<select name="fields">
  			<option value="teamname">Team Name</option>
			<option value="city">City</option>
  			<option value="bestplayer">Best Player</option>
  			<option value="yearformed">Year Formed</option>
  			<option value="website">Website</option>
		</select>
		<input type="text" name="entVal" id="entVal">

		<input type="submit" name="submit8" value="DELETE Data">
	</form>
<?php

if(isset($_POST['submit8'])) {
	
	$entered_text = $_POST['entVal'];
	$selected_val = $_POST['fields'];

	//echo $entered_text;
	//echo "<br>";
	//echo $selected_val;
	//echo "<br>";
	$sql = "DELETE FROM teams WHERE $selected_val='$entered_text'";

	//echo $sql;
	//echo "<br>";
	$result = $conn->query($sql);
	
	if($conn->query($sql) === TRUE) {
		
  		echo "RECORD SUCCESSFULLY DELETED<br />";
  		
	}else {
		echo "ERROR WITH SQL: " . $conn->error;
	}
    $sql = "SELECT id, teamname, city, bestplayer, yearformed, website FROM teams";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    	echo "<strong>UPDATED TABLE</strong><br>";
    	while($row = $result->fetch_assoc()) {

        echo "id: " . $row["id"]. 
        " - Team Name: " . $row["teamname"]. 
        " City: " . $row["city"].
        " Best Player: " . $row["bestplayer"].
        " Year Formed: " . $row["yearformed"].
        " Website: " . $row["website"].
        "<br>";
    	}
	} else {
    echo "0 results";
}
	

}


$conn->close();
?>




<hr>
	<h2>#5. Show all data from table, select and use textbox to UPDATE row.</h2>
	
<?php

$servername = "lineofcode.com";
$username = "itse2302001003";
$password = "8AT7SWCJ";

$dbname = "itse2302001003";
$conn = new mysqli($servername, $username, $password,$dbname);

$sql = "SELECT id, teamname, city, bestplayer, yearformed, website FROM teams";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. 
        " - Team Name: " . $row["teamname"]. 
        " City: " . $row["city"].
        " Best Player: " . $row["bestplayer"].
        " Year Formed: " . $row["yearformed"].
        " Website: " . $row["website"].
        "<br>";
    }
} else {
    echo "0 results";
}




?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		
		<select name="fields">
  			<option value="teamname">Team Name</option>
			<option value="city">City</option>
  			<option value="bestplayer">Best Player</option>
  			<option value="yearformed">Year Formed</option>
  			<option value="website">Website</option>
		</select>
		<input type="text" name="entVal" id="entVal">text in DB<br>
		<input type="text" name="text2chng" id="text2chng">text to UPDATE<br>
		<input type="submit" name="submit9" value="UPDATE Data">
	</form>
<?php

if(isset($_POST['submit9'])) {
	$text_to_change = $_POST['text2chng'];
	$entered_text = $_POST['entVal'];
	$selected_val = $_POST['fields'];

	//echo $entered_text;
	//echo "<br>";
	//echo $selected_val;
	//echo "<br>";
	$sql = "UPDATE teams 
			SET $selected_val = '$text_to_change' WHERE $selected_val = '$entered_text'";

	//echo $sql;
	//echo "<br>";
	$result = $conn->query($sql);
	
	if($conn->query($sql) === TRUE) {
		
  		echo "RECORD SUCCESSFULLY UPDATED<br />";
  		
	}else {
		echo "ERROR WITH SQL: " . $conn->error;
	}
    $sql = "SELECT id, teamname, city, bestplayer, yearformed, website FROM teams";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    	echo "<strong>UPDATED TABLE</strong><br>";
    	while($row = $result->fetch_assoc()) {

        echo "id: " . $row["id"]. 
        " - Team Name: " . $row["teamname"]. 
        " City: " . $row["city"].
        " Best Player: " . $row["bestplayer"].
        " Year Formed: " . $row["yearformed"].
        " Website: " . $row["website"].
        "<br>";
    	}
	} else {
    echo "0 results";
}
	

}


$conn->close();
?>

	<hr>
	<h2>#6. Choose a value to LIMIT SQL QUERY....</h2>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	
		<input type="number" name="limit" id="limit">ENTER NUMBER TO LIMIT<br>
		<input type="submit" name="submit10" value="DISPLAY W/LIMIT">
	</form>

<?php
$servername = "lineofcode.com";
$username = "itse2302001003";
$password = "8AT7SWCJ";

$dbname = "itse2302001003";
$conn = new mysqli($servername, $username, $password,$dbname);

if(isset($_POST['submit10'])) {
	$limit_num = $_POST['limit'];
    $sql = "SELECT id, teamname, city, bestplayer, yearformed, website FROM teams LIMIT $limit_num";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    	echo "<strong>LIMITED VIEW</strong><br>";
    	while($row = $result->fetch_assoc()) {

        echo "id: " . $row["id"]. 
        " - Team Name: " . $row["teamname"]. 
        " City: " . $row["city"].
        " Best Player: " . $row["bestplayer"].
        " Year Formed: " . $row["yearformed"].
        " Website: " . $row["website"].
        "<br>";
    	}
	} else {
    echo "0 results";
}
	
$conn->close();
}



?>
	</body>
</html>

