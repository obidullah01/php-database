<?php
$conn=new mysqli("localhost","root","12345","wtk");

//var_dump($conn); //what is in database

if ($conn -> connect_error)
{
	die("connection Failed:  " .$conn-> connect_error);
}

echo "Databese Connection successful";
?>