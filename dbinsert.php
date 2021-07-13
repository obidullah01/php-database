<?php

include 'dbconnection.php';
//$conn=connect();

/*$sql = $conn->prepare("INSERT INTO User (username, password) VALUES (?, ?)"); // prepare and bind
$sql->bind_param("ss", $username, $password);
// set parameters and execute

$username = "abc";
$password = "111";
$response=$sql->execute();
var_dump($response);
$conn->close();*/

function register ($username,$password)
{
$sql=$conn->prepare("INSERT INTO User (username, password) VALUES (?, ?)"); 

 $sql -> bind_param("ss",$username,$password);
 $username=$_POST['username'];
$password=$_POST['password'];


$response = $sql ->execute();
var_dump($response);

$conn ->close();
 //return response();
}




?>






