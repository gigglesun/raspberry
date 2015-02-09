<html>
<head>
    <title>Pi Brand - Todo List App</title>
</head>
<body>
        <h1>Pi Todo List App</h1>
<?php
$mysqli = new mysqli('localhost', 'pi', 'raspberry', 'pi');
if ($mysqli->connect_error)
	{
		die('Connect Error(' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
	}
?>
<table>
<tr>
<th>Description</th>
<th>Owner</th>
<th>Due Date</th>
<th>Location</th>
<th>Importance</th>
<th>Cteator</th>
</tr>
<?php
$result = $mysqli->query("SELECT * FROM todolist");
		while($row = $result->fetch_assoc())
		{
			print "<tr>";
			print "<td>".$row["description"]."</td>";
			print "<td>".$row["owner"]."</td>";
			print "<td>".$row["data"]."</td>";
			print "<td>".$row["location"]."</td>";
			print "<td>".$row["importance"]."</td>";
			print "<td>".$row["creator"]."</td>";
			print "</tr>";
		}
	
	?>
</table>
<hr></hr>
<form action="index.php" method="POST">
<input type="hidden" name="action" value="insert" />
Description: <input name="description" /><br/>
Owner: <input name="owner" /><br/>
Date: <input name="data" /><br/>
Location: <input name="location" /><br/>
Importance: <input name="importance" /><br/>
Creator: <input name="creator" /><br/>
<input type="submit" /> 
<?php
if(isset($_REQUEST["action"]))
{
	switch($_REQUEST["action"])
	{
		case "insert":
			$SQL="INSERT INTO todolist (description, owner, data, location, importance, creator)VALUES(";
			$SQL=$SQL."'".$_REQUEST["description"]."',";
			$SQL=$SQL."'".$_REQUEST["owner"]."',";
			$SQL=$SQL."'".$_REQUEST["data"]."',";
			$SQL=$SQL."'".$_REQUEST["location"]."',";
			$SQL=$SQL."'".$_REQUEST["importance"]."',";
			$SQL=$SQL."'".$_REQUEST["creator"]."'";
			$SQL=$SQL.");";
		if($mysqli->query($SQL)===FALSE)
		{
			printf("Error, unable to insert data to table " . $mysqli->error);
		}
		break;
		case "delete":
			print "Delete function yet to added!";
			break;
	}
}
$mysqli->close();	
?>
</form>
</body>
</html>
