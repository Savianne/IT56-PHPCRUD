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

    <!-- Inforamtion Table Styling -->
    <link rel="stylesheet" href="./assets/css/information-table.css" />

    <!-- Using Lineawesome Icons -->
    <link rel="stylesheet" href="./assets/libs/fontawesome-free-5.15.4-web/css/all.css" />
    <title>Parents Information</title>
  </head>
  <body>
    <div class="container parents-info-list">
        <div class="container-head">
            <h4><i class="fas fa-clipboard-list" style="margin-right: 10px"></i>Parents Information</h4>
            <a class="add-new-record-btn btn btn-primary" href="/add-record.php">
                <i class="fas fa-plus btn-icon"></i>
                <p>Add new record</p>
            </a>

        </div>
        <div class="item-list">
            <table class="information-table" id="information-table">
                <tr>
                    <th><i class="fas fa-sort-amount-down-alt"></i></th>
                    <th>Fathers Name</th>
                    <th>Mothers Name</th>
                    <th>Address</th>
                    <th>CP Number</th>
                    <th>Occupation</th>
                    <th>Annual Income</th>
                    <th>Action</th>
                </tr>
            </table>
            <div id="nodata">
              <i class="fas fa-exclamation-circle" style="margin-right: 10px"></i>
              No Data to display!
            </div>
        </div>
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
  <div class="ask-delete-indicator-bg">
    <div class="indicator-container">
      <i class="fas fa-exclamation-circle" style="margin-right: 10px"></i><p>Are you sure you want to delete this record?</p>
      <div class="btn-action-container">
        <span class="btn btn-default" onClick="deleteMiddleware.cancelDelete()">Cancel</span>
        <span class="btn btn-remove" style="margin-left: 10px" onClick="deleteMiddleware.continueDelete()">Yes</span>
      </div>
    </div>
  </div>
  <script>
      function closeIndicators() {
        document.querySelector('.success-indicator-bg').style.display = 'none';
        document.querySelector('.error-indicator-bg').style.display = 'none';
      }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="/assets/javascript/middleware/delete-record.js"></script>
  <script src="/assets/javascript/middleware/retrieve-record.js"></script>
</html>
