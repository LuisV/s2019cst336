<?php

session_start();
$conn = getDBConnection();

// TODO: Grab all of our paramters from the session
$parameters[":name"]= $_SESSION["name"];

// TODO: Execute SQL to add a row to database table
$sql = "INSERT INTO `users` (`id`, `name`, `major`, `email`, `zip`) VALUES";

// Destory the session once you submit
session_destroy();

// TODO: Return all the rows from the datable table

$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

      $stmt = $dbConn->prepare($sql);
      $stmt->execute(array ("" => $_POST['']));
      
      $record = $stmt->fetch();

?>
