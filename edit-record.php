<?php
require_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'config.php';
   
    header('Content-Type: application/json');  // <-- header declaration

    $json = file_get_contents('php://input');

    $parents_info = json_decode($json, true);

    // Create connection
    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check connection
    if ($conn->connect_error) {
        $result = array('success' => false, 'error' => $conn->connect_error);
        //return the json response :
        echo json_encode($result, true);    // <--- encode
        exit();
    }

    $sql = "UPDATE parentsinformation SET fathersName = ?, mothersName = ?, address = ?, cpNumber = ?, occupation = ?, annualIncome = ? WHERE parentId = ?";

    // prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $fathersName, $mothersName, $address, $cpNumber, $occupation, $annualIncome, $parentId);

    $fathersName = $parents_info['fathersName'];
    $mothersName = $parents_info['mothersName'];
    $address = $parents_info['address'];
    $cpNumber = $parents_info['cpNumber'];
    $occupation = $parents_info['occupation'];
    $annualIncome = $parents_info['annualIncome'];
    $parentId = $parents_info['parentId'];
    $stmt->execute();
    
    $stmt->close();
    $conn->close();

    $result = array('success' => true);
    //return the json response :
    echo json_encode($result, true);    // <--- encode

    exit();
}

if(!isset($_GET['parentId'])) {
    header("Location: add-record.php", true, 301);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta
      name="description"
      content="IT56-PHPCRUD"
    />
    <link rel="apple-touch-icon" href="%PUBLIC_URL%/logo192.png" />

    <!-- Eric Mayers CSS Reset -->
    <link rel="stylesheet" href="./assets/css/reset.css" />

    <!-- Main Styling -->
    <link rel="stylesheet" href="./assets/css/main.css" />

    <!-- Text Styling -->
    <link rel="stylesheet" href="./assets/css/typography.css" />

    <!-- Using Lineawesome Icons -->
    <link rel="stylesheet" href="./assets/libs/fontawesome-free-5.15.4-web/css/all.css" />
    <title>Parents Information</title>
  </head>
  <body>
    <!-- <div class="alert-message">
        
    </div> -->
    <div class="container add-record">
        <div class="container-head">
            <h4><i class="fas fa-plus" style="margin-right: 10px"></i>Add Record</h4>
            <a class="add-new-record-btn btn btn-secondary" href="index.php">
                <i class="fas fa-clipboard-list btn-icon"></i>
                <p>View Records</p>
            </a>
        </div>
        <?php

        $parent_id = $_GET['parentId'];

        // Create connection
        $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        // Check connection
        if ($conn->connect_error) {
            echo $conn->connect_error;
            exit();
        }

        $sql = "SELECT * FROM parentsinformation WHERE parentId = ?";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("i", $parent_id);
        $stmt->execute();
        $query_result = $stmt->get_result();

        $parent = array();

        if ($query_result-> num_rows > 0) {
            // output data of each row
            while($row = $query_result->fetch_assoc()) {
                array_push($parent, $row);
            }
        } else {
            header("Location: add-record.php", true, 301);
            exit();
        }

        $fathersName = $parent[0]['fathersName'];
        $mothersName = $parent[0]['mothersName'];
        $address = $parent[0]['address'];
        $cpNumber = $parent[0]['cpNumber'];
        $occupation = $parent[0]['occupation'];
        $annualIncome = $parent[0]['annualIncome'];

        $conn->close();

        echo <<<TOF
        <form action="/add-record.php" method="post" onSubmit="event.preventDefault();">
            <span class="input-group">
                <strong>Fathers Name:</strong>
                <input type="text" value="$fathersName" id="fathersName" class="input-field" placeholder="example: Audilon R. Binito" onBlur="disableField('fathersName')" disabled />
                <i class="fas fa-pen edit-input-icn toggle" onClick="editField('fathersName')"></i>
                <p class="error-input fathers-name-err-message"></p>
            </span>
            <span class="input-group">
                <strong>Mothers Name:</strong>
                <input type="text" value="$mothersName" id="mothersName" class="input-field" placeholder="example: Dorie D. Binito" onBlur="disableField('mothersName')" disabled />
                <i class="fas fa-pen edit-input-icn toggle" onClick="editField('mothersName')"></i>
                <p class="error-input mothers-name-err-message"></p>
            </span>
            <span class="input-group">
                <strong>Address:</strong>
                <input type="text" value="$address" id="address" class="input-field" placeholder="Barangay, City/Municipality, Province, Zip Code." onBlur="disableField('address')" disabled />
                <i class="fas fa-pen edit-input-icn toggle" onClick="editField('address')"></i>
                <p class="error-input address-err-message"></p>
            </span>
            <span class="input-group">
                <strong>CP Number:</strong>
                <input type="number" value="$cpNumber" id="cpNumber" class="input-field" placeholder="example: 09128486124" onBlur="disableField('cpNumber')" disabled />
                <i class="fas fa-pen edit-input-icn toggle" onClick="editField('cpNumber')"></i>
                <p class="error-input cp-number-err-message"></p>
            </span>
            <span class="input-group">
                <strong>Occupation:</strong>
                <input type="text" value="$occupation" id="occupation" class="input-field" placeholder="example: Teacher" onBlur="disableField('occupation')" disabled />
                <i class="fas fa-pen edit-input-icn toggle" onClick="editField('occupation')"></i>
                <p class="error-input occupation-err-message"></p>
            </span>
            <span class="input-group">
                <strong>Annual Income:</strong>
                <input type="number" value="$annualIncome" id="annualIncome" class="input-field" placeholder="example: 1,000,000" onBlur="disableField('annualIncome')" disabled />
                <i class="fas fa-pen edit-input-icn toggle" onClick="editField('annualIncome')"></i>
                <p class="error-input annual-income-err-message"></p>
            </span>
            <button class="input-submit btn-primary" onclick="handleSubmit($parent_id)">Save Changes</button>
        </form>
        TOF;
        ?>
    </div>
  </body>
  <div class="loading-indicator-bg">
    <div class="indicator-container">
        <i class="fas fa-spinner fa-pulse" style="margin-right: 10px"></i>Loading...
    </div>
  </div>
  <div class="success-indicator-bg" onClick="closeIndicators()">
    <div class="indicator-container">
        <i class="fas fa-check" style="margin-right: 10px"></i>Done
    </div>
  </div>
  <div class="error-indicator-bg" onClick="closeIndicators()">
    <div class="indicator-container">
        <i class="fas fa-times" style="margin-right: 10px"></i>Error!
    </div>
  </div>
  <script>
    function closeIndicators() {
        document.querySelector('.success-indicator-bg').style.display = 'none';
        document.querySelector('.error-indicator-bg').style.display = 'none';
    }

    function editField(field) {
        document.getElementById(field).disabled = false;
        document.getElementById(field).focus();
    }

    function disableField(field) {
        document.getElementById(field).disabled = true;
    }

  </script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="/assets/javascript/middleware/edit-record.js"></script>
</html>