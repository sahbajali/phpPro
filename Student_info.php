<html>
<html>
<title>Registration</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
    include_once 'db_connection.php';
?>
</head>
<body>
<?php

	if(isset($_POST['submit']))
	{
		$sql = "INSERT INTO personal_information (Name, Roll, Address,Phone_No,Stream,Email_Id,Gender) 
		VALUES ('".$_POST["name"]."','".$_POST["roll"]."','".$_POST["address"]."','".$_POST["phone"]."',
		'".$_POST["stream"]."','".$_POST["email"]."','".$_POST["rad"]."')";
		$result = mysqli_query($conn,$sql);
		echo '<script>alert("Form Submitted")</script>'; 
	}
?>

<h4>STUDENT'S INFORMATION&emsp;&emsp;&emsp;&emsp;&ensp;<a href="index.html">HOME</a><br></h4>
<form action="Student_info.php" method="POST">
NAME:&emsp;&emsp;&emsp;&ensp;<input type="text" name="name" value="" required>
<br><br>
Roll:&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;<input type="text"  name="roll" required>
<br><br>
<label for="address">Address:&emsp;&emsp;&emsp;</label>
<textarea id="address" rows="4" cols="20" name="address" required></textarea>
<br><br>
Phone Number:&nbsp; <input type="text" name="phone" required>
<br><br>
<label for="stream">STREAM:&emsp;&emsp;&nbsp;</label>
<select id="stream" name="stream" required>
<option value="">Select stream</option>
<option value="CSE">CSE</option>
<option value="IT">IT</option>
<option value="ECE">ECE</option>
<option value="EE">EE</option>
<option value="MCA">MCA</option>
<option value="MTech">MTech</option>
</select>
<br><br>
Email ID:&emsp;&emsp;&ensp;&nbsp;&nbsp;<input type="text" name="email" required>
<br><br>

<p class="radiobuttons">
Gender:&emsp;&emsp;&emsp;&ensp;Male:<input type="radio" name="rad" value="M">
Female:<input type="radio" name="rad" value="F">
<br><br><br>
&emsp;&emsp;&emsp;&emsp;
<input type="submit" value="SUBMIT" name="submit">&emsp;&emsp;
<input type="reset" value="RESET" name="reset"></input>
</form>
</body>
</html>
