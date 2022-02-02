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
        <form action="/add-record.php" method="post" onSubmit="event.preventDefault();">
            <span class="input-group">
                <strong>Fathers Name:</strong>
                <input type="text" id="fathersName" class="input-field" placeholder="example: Audilon R. Binito" />
                <p class="error-input fathers-name-err-message"></p>
            </span>
            <span class="input-group">
                <strong>Mothers Name:</strong>
                <input type="text" id="mothersName" class="input-field" placeholder="example: Dorie D. Binito"/>
                <p class="error-input mothers-name-err-message"></p>
            </span>
            <span class="input-group">
                <strong>Address:</strong>
                <input type="text" id="address" class="input-field" placeholder="Barangay, City/Municipality, Province, Zip Code." />
                <p class="error-input address-err-message"></p>
            </span>
            <span class="input-group">
                <strong>CP Number:</strong>
                <input type="number" id="cpNumber" class="input-field" placeholder="example: 09128486124"/>
                <p class="error-input cp-number-err-message"></p>
            </span>
            <span class="input-group">
                <strong>Occupation:</strong>
                <input type="text" id="occupation" class="input-field" placeholder="example: Teacher"/>
                <p class="error-input occupation-err-message"></p>
            </span>
            <span class="input-group">
                <strong>Annual Income:</strong>
                <input type="number" id="annualIncome" class="input-field" placeholder="example: 1,000,000"/>
                <p class="error-input annual-income-err-message"></p>
            </span>
            <button class="input-submit btn-primary" onclick="handleSubmit()">Submit</button>
        </form>
    </div>
  </body>
  <div class="loading-indicator-bg">
    <div class="indicator-container">
        <i class="fas fa-spinner fa-pulse" style="margin-right: 10px"></i>Loading...
    </div>
  </div>
  <div class="success-indicator-bg" onClick="closeIndicators()">
    <div class="indicator-container">
        <i class="fas fa-check" style="margin-right: 10px"></i>Success!
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
  </script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="/assets/javascript/middleware/add-record.js"></script>
</html>