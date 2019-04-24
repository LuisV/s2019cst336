<?php
    include '../dbConnection.php';
    $conn = getDatabaseConnection("cinder");
    $namedParameters = array();
    $sql = "SELECT * FROM user WHERE 1 AND FROM answer_type_id WHERE is_negative";
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);

?>