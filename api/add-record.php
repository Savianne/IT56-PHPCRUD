<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
       
        header('Content-Type: application/json');  // <-- header declaration

        $json = file_get_contents('php://input');

        $parents_info = json_decode($json, true);

        // Create connection
        $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        // Check connection
        if ($conn->connect_error) {
            $flag = array('success' => false, 'error' => $conn->connect_error);
            //return the json response :
            echo json_encode($flag, true);    // <--- encode
            exit();
        }

        $sql = "INSERT INTO parentsinformation (fathersName, mothersName, address, cpNumber, occupation, annualIncome) VALUES (?, ?, ?, ?, ?, ?)";

        // prepare and bind
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $fathersName, $mothersName, $address, $cpNumber, $occupation, $annualIncome);

        $fathersName = $parents_info['fathersName'];
        $mothersName = $parents_info['mothersName'];
        $address = $parents_info['address'];
        $cpNumber = $parents_info['cpNumber'];
        $occupation = $parents_info['occupation'];
        $annualIncome = $parents_info['annualIncome'];
        $stmt->execute();
        
        $stmt->close();
        $conn->close();

        $flag = array('success' => true);
        //return the json response :
        echo json_encode($flag, true);    // <--- encode

        exit();
   }
?>