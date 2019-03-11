<?php

  session_start();

  $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

  switch($httpMethod) {
    case "OPTIONS":
      // Allows anyone to hit your API, not just this c9 domain
      header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
      header("Access-Control-Allow-Methods: POST, GET");
      header("Access-Control-Max-Age: 3600");
      exit();
    case "GET":
      // Allow any client to access
      header("Access-Control-Allow-Origin: *");
      // Let the client know the format of the data being returned
      header("Content-Type: application/json");

        // Create an empty array, an array with characters to create the password with, two integers and an empty string
      $results = array();
      $characters = array(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,0,1,2,3,4,5,6,7,8,9);
      $intMin = 0;
      $intMax = count($characters);
      $password = "";
      
      // Create the password
      for($i=0; $i<17; $i++) {
          $password .= $characters[rand($intMin,$intMax)];
      }
      
      // Put the result into the array
      array_push($results, $password);
      
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
        $username = $_POST["username"];
        $password = $_POST["password"];
        $usernamePasswordOverlap = false;
        if (strpos($password, $username) !== false) {
            $usernamePasswordOverlap = true;
        }

      // Allow any client to access
      header("Access-Control-Allow-Origin: *");
      // Let the client know the format of the data being returned
      header("Content-Type: application/json");

      // Put the result into the array
      array_push($results, $usernamePasswordOverlap);

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