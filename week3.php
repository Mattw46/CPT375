<?php

function displayTable ($result) {
	print "+------------+-------------+------+-----+---------+-------+<br />";
	print "| Field &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp     | Type   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp      
			| Null &nbsp&nbsp| Key &nbsp| Default &nbsp| Extra &nbsp|<br />";
	print "+------------+-------------+------+-----+---------+-------+<br />";
	if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //echo "|&nbps".$row['Field']."&nbsp|&nbspType&nbsp|&nbsp".$row['Type']."&nbsp|&nbsp";
            echo "|&nbsp".$row["Field"]."&nbsp&nbsp|&nbsp".$row['Type']."&nbsp|<br />";
        }
    }
	print "+------------+-------------+------+-----+---------+-------+<br />";
}
?>
