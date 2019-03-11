<?php
    $takenUsernames = array("Kris","Kristoffer","Kristian","Christobal","Christ");

  session_start();

  $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

  switch($httpMethod) {
    case "OPTIONS":
      // Allows anyone to hit your API, not just this c9 domain
      header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
      header("Access-Control-Allow-Methods: POST, GET");
      header("Access-ConStrol-Max-Age: 3600");
      exit();
    case "GET":
      // Allow any client to access
      header("Access-Control-Allow-Origin: *");
      // Let the client know the format of the data being returned
      header("Content-Type: application/json");
        
        // Creating an array, a boolean and storing the username
      $results = array();
      $username = $_GET["username"];
      $usernameIsTaken = false;
      
      // Check if username from user is taken
      if(in_array($username,$takenUsernames)) {
          $usernameIsTaken = true;
      }
      
      // Put the result into the array
      array_push($results, $usernameIsTaken);
      
      // Sending back down as JSON
      echo json_encode($results);
      
      break;
    case 'POST':
      // Get the body json that was sent
      $rawJsonString = file_get_contents("php://input");

      //var_dump($rawJsonString);

      // Make it a associative array (true, second param)
      $jsonData = json_decode($rawJsonString, true);

      // TODO: do stuff to get the $results which is an associative array
      $results = array();

      // Allow any client to access
      header("Access-Control-Allow-Origin: *");
      // Let the client know the format of the data being returned
      header("Content-Type: application/json");

      // Sending back down as JSON
      echo json_encode($results);

      break;
    case 'PUT':
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      echo "Not Supported";
      break;
    case 'DELETE':
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      break;
  }
?>