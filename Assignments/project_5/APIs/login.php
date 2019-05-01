<?php
session_start();

if (empty($_POST["email"])) {
        echo json_encode(array(
          "success" => false,
          "message" => "No email provided"));
        return;
      }

if (isset($_POST['email'])) {  //login form has been submitted

    include '../dbConnection.php';
    $conn = getDatabaseConnection("eventMediaDump");
    $postedEmail = $_POST["email"];
    
    
    // $sql = "SELECT  '$postedEmail'   FROM data WHERE  email_address  = :value";
    // $stmt = $conn->prepare($sql);
    // $stmt->bindParam(':value', $postedEmail);
    // $stmt->execute(array(':value' => $postedEmail));
    //data = $stmt->fetch(PDO::FETCH_ASSOC);
    

    $sql = "INSERT INTO data
          (email_address)
        VALUES
          (:email)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $postedEmail);
    $stmt->execute(array (":email" => $postedEmail));

 
   //echo json_encode($data);
    
	echo json_encode($stmt);
}

else {
    echo "Login form has not been submitted";
}
?>