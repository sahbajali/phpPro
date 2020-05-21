<?php

$conn=mysqli_connect("localhost","root","mysql123","student");
//$conn=mysqli_connect("sql203.epizy.com","epiz_25750707","xKW0J45rVCWR3Sw","epiz_25750707_student");
if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}

?>