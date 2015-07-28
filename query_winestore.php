<html>
	<head>
		<title>Query Winestore</title>
	</head>
	<body>
		<h3>Query Winestore</h3>
		<form action="<?php //echo $_SERVER['PHP_SELF']; ?>" method="GET"> 
		<select value="tableName" name="tableName">
		<?php
		require_once('db.php');
			
		//Create connection
        $conn = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);
        // Check connection
		if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "show tables";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
        	while ($row = $result->fetch_assoc()) {
                echo "<option value=".$row['Tables_in_winestore'].">".$row['Tables_in_winestore']."</option>";
            }
        }
        
        $conn->close();
        ?>
        </select>
        <select value="query" name="query">
        	<option value="SELECT">SELECT</option>
        	<option value="SHOW">SHOW</option>
        </select>
		<input type="submit" name="submit" value="Run Query">
		</form>
		<?php
			
			
		//Create connection
      $conn = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);
      // Check connection
		if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
      }
        
      if (isset($_GET["query"])) {
        	if ($_GET["query"] == "SELECT") {
				echo "select * from: ".$_GET["tableName"]."<br />";
        		$sql = "SELECT * FROM ".$_GET["tableName"];
        		$result = $conn->query($sql);
        		if ($result->num_rows > 0) {
					//while ($row = $result->fetch_assoc()) {
		
					//}
					while ($row = $result->fetch_assoc()) {
						foreach($row as $key => $value) {
							print "|&nbsp$key&nbsp&nbsp|&nbsp $value &nbsp&nbsp|<br />";
						}
					}
				}
        	}
        	else {
				echo "Show Columns from: ".$_GET["tableName"]."<br />";
        		$sql = "SHOW columns FROM ".$_GET["tableName"].";";
        		$result = $conn->query($sql);
        		require_once 'week3.php';
        		displayTable($result);
        	}
      }
		  
		?>
	</body>
<html>

