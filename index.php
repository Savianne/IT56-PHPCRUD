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
            <a class="add-new-record-btn btn btn-primary" href="/add-new-record.php">
                <i class="fas fa-plus btn-icon"></i>
                <p>Add new record</p>
            </a>

        </div>
        <div class="item-list">
            <table class="information-table">
                <?php

                    $parents_list = array(
                        array(
                            "ParentId" => "1",
                            "FathersName" => "Romeo P. Baylon",
                            "MothersName" => "Emperatris Q. Baylon",
                            "Address" => "Sandiat West, San Manuel Isabela 3317",
                            "CPNumber" => "09128486021",
                            "Occupation" => "Farmers",
                            "AnnualIncome" => "5000"
                        ),
                        array(
                            "ParentId" => "2",
                            "FathersName" => "Romeo P. Baylon",
                            "MothersName" => "Emperatris Q. Baylon",
                            "Address" => "Sandiat West, San Manuel Isabela 3317",
                            "CPNumber" => "09128486021",
                            "Occupation" => "Farmers",
                            "AnnualIncome" => "5000"
                        ),
                        array(
                            "ParentId" => "3",
                            "FathersName" => "Romeo P. Baylon",
                            "MothersName" => "Emperatris Q. Baylon",
                            "Address" => "Sandiat West, San Manuel Isabela 3317",
                            "CPNumber" => "09128486021",
                            "Occupation" => "Farmers",
                            "AnnualIncome" => "5000"
                        )
                    );

                    if( count($parents_list) > 0 ) {
                        echo <<<EOT
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
                        EOT;

                        $index = 0;
    
                        foreach( $parents_list as $parent) {
                            $index += 1;
                            $id = $parent["ParentId"];
                            $fathersName = $parent["FathersName"];
                            $mothersName = $parent["MothersName"];
                            $address = $parent["Address"];
                            $cp = $parent["CPNumber"];
                            $occupation = $parent["Occupation"];
                            $annualIncome = $parent["AnnualIncome"];
    
                            echo <<<EOT
                            <tr>
                                <td>$index</td>
                                <td>$fathersName</td>
                                <td>$mothersName</td>
                                <td>$address</td>
                                <td>$cp</td>
                                <td>$occupation</td>
                                <td>$annualIncome</td>
                                <td class="action">
                                    <a href="/update-parent-info.php?parentId=$id" class="toggle edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="/remove-parent-info.php?parentId=$id" class="toggle remove">
                                        <i class="fas fa-minus-square"></i>
                                    </a>
                                </td>
                            </tr>
                            EOT;
                        }
                    }
                ?>
            </table>
            <?php
                if( count($parents_list) <= 0 ) {
                    echo <<<EOT
                    <div class="empty">
                        <i class="fas fa-exclamation-circle"></i>
                        NO Record to display!
                    </div>
                    EOT;
                }
            ?>
        </div>
    </div>
  </body>
</html>
