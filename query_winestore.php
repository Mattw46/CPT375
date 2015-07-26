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
        	<option value="select">SELECT</option>
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
        		$sql = "SELECT * FROM ".$_GET["tableName"].";";
        		$result = $conn->query($sql);
        		if ($_GET["tableName"] == 'countries') {
					
				}  
        		if ($_GET["tableName"] == 'customer') {
					
				}  
        		if ($_GET["tableName"] == 'grape_variety') {
					
				}  
        		if ($_GET["tableName"] == 'inventory') {
					
				}  
        		if ($_GET["tableName"] == 'items') {
					
				}  
        		if ($_GET["tableName"] == 'orders') {
					
				}  
        		if (region) {
					
				}  
        		if (titles) {
					
				}  
        		if (users) {
					
				}  
        		if (wine) {
					
				}  
        		if (wine_type  ) {
					
				}  
        		if (wine_variety) {
					
				}  
        		if (winery) {
					
				}  
        	}
        	else {
        		$sql = "SHOW columns FROM ".$_GET["tableName"].";";
        		$result = $conn->query($sql);
        		require_once 'week3.php';
        		displayTable($result);
        	}
      }
		  
		?>
	</body>
<html>

