<html>
<title>DISPLAY</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
    include_once 'db_connection.php';
	$decide=true;
?>
<script type="text/javascript">

function show(){
	document.getElementById("optional").style.display="block";
	document.getElementById("stream").required=true;
	document.getElementById("roll").required=true;
}
function hide(){
	document.getElementById("optional").style.display="none";
	document.getElementById("stream").required=false;
	document.getElementById("roll").required=false;
}
	
</script>
</head>
<body>
<h4>DISPLAY STUDENT'S RECORD&emsp;&emsp;&emsp;&emsp;&ensp;<a href="index.html">HOME</a><br></h4>
<form action="" method="POST">
Record:&emsp;ALL:<input type="radio" selected name="rad" value="all" onclick="hide()" <?php if (isset($_POST["rad"])&&$_POST["rad"]=="all") {echo "checked";} ?>>&emsp;&emsp; 
SEARCH:<input type="radio" id="search" name="rad" value="one" onclick="show()" checked><br>
<br>


<div id="optional" >
<label for="stream">Select Stream:</label>
<!--here i gave first option value as value="" then only required worked-->
<select id="stream" name="stream" required>
<option value="" <?php  echo (isset($_POST['stream']) && $_POST['stream'] == 'Select Stream') ? 'selected="selected"' : ''; ?>>Select Stream</option>
<option <?php echo (isset($_POST['stream']) && $_POST['stream'] == 'CSE') ? 'selected="selected"' : ''; ?>>CSE</option>
<option <?php echo (isset($_POST['stream']) && $_POST['stream'] == 'IT') ? 'selected="selected"' : ''; ?>>IT</option>
<option <?php echo (isset($_POST['stream']) && $_POST['stream'] == 'ECE') ? 'selected="selected"' : ''; ?> >ECE</option>
<option <?php echo (isset($_POST['stream']) && $_POST['stream'] == 'EE') ? 'selected="selected"' : ''; ?>>EE</option>
<option <?php echo (isset($_POST['stream']) && $_POST['stream'] == 'MCA') ? 'selected="selected"' : ''; ?>>MCA</option>
<option  <?php echo (isset($_POST['stream']) && $_POST['stream'] == 'MTech') ? 'selected="selected"' : ''; ?>>MTech</option>
</select>
<br><br>
Enter Roll:&nbsp;<input type="text" id="roll" name="roll_ip" value="<?php echo isset($_POST['submit']) ? $_POST['roll_ip'] : '' ?>"  />
</div>
<br>
<input type="submit" value="SUBMIT" name="submit">
</form>
<br>

<?php
	if(isset($_POST["submit"])&&$_POST["rad"]=="one" )
	{
		$r=$_POST["roll_ip"];
		$dept=$_POST["stream"];
		
		$sql = "SELECT * FROM personal_information where Roll=$r and Stream='$dept'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) 
		{
			echo "<table border='1'><tr>
				<th>Name</th>
				<th>Roll</th>
				<th>Address</th>
				<th>Phone_No</th>
				<th>Stream</th>
				<th>Email_Id</th>
				<th>Gender</th>
				</tr>";
			while($row = $result->fetch_assoc()) 
			{
				echo "<tr>
					<td>".$row["Name"]."</td>
					<td>".$row["Roll"]."</td>
					<td>".$row["Address"]."</td>
					<td>".$row["Phone_No"]."</td>
					<td>".$row["Stream"]."</td>
					<td>".$row["Email_Id"]."</td>
					<td>".$row["Gender"]."</td>
					</tr>";
			}
			echo "</table>";
			} 
		else 
		{
			echo "<h3>0 results! No element found!</h3>";
		}

	}

	if(isset($_POST["submit"])&&$_POST["rad"]=="all")
	{
?>
		<style type="text/css">#optional{
		display:none;
		}</style>
<?php
		$sql = "SELECT * FROM personal_information";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			echo "<table border='1'><tr>
				<th>Name</th>
				<th>Roll</th>
				<th>Address</th>
				<th>Phone_No</th>
				<th>Stream</th>
				<th>Email_Id</th>
				<th>Gender</th>
				</tr>";
			while($row = $result->fetch_assoc()) 
			{
				echo "<tr>
					<td>".$row["Name"]."</td>
					<td>".$row["Roll"]."</td>
					<td>".$row["Address"]."</td>
					<td>".$row["Phone_No"]."</td>
					<td>".$row["Stream"]."</td>
					<td>".$row["Email_Id"]."</td>
					<td>".$row["Gender"]."</td>
					</tr>";
			}
			echo "</table>";
			} 
		else 
		{
			echo "0 results";
		}
	}
?>


</body>
<!--
		<style type="text/css">#optional{
		display:none;
		}</style>
-->
</html>