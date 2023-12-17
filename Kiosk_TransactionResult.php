<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<!--Get your own code at fontawesome.com-->
    <title>Transaction Result</title>
    <h1> <img class="logo" src="Photos/PUPLogo.png" style="height: 80px; width: 80px;"></h1>
</head>

<style>
    body{ 
        text-align: center;
    }
    h2{
        font-size:1.1rem;
    }
    #back{
   
        color: maroon;
        margin-left:10px;
        font-size:1.3rem;
        text-decoration:none;
    }
    #print{
        background-color: maroon;
        color: white;
        margin-left:20px;
        font-size:1.5rem;
        padding: 8px 15px;
    }
    .trans-result{
        align-items: center;
        font-size:1.2rem;
    }
    a {
  text-decoration: none;
  display: inline-block;
  padding: 10px 20px;
}

a:hover {
  background-color: yellow;
  color: black;
}
.back {
  color: black;
}
@media print {
    .goBack {
       visibility: hidden;
    }
 }
h5{
   font-size: 1.5rem;
}
p{
    font-size:2.0rem;
    font-style: solid black;
}
h3{
    font-size: 2.0rem;
}
#kiosk3{
    display: flex;
    justify-content: center;
    align-items: center;
    
}
li{
    display: flex;
    justify-content: center;
}
</style>

<body>
    <h2>POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</h2>
    <p>...............................................................</p>

    <div class="trans-result">
    <!-- <?php
  
    if (isset($_POST['ch']) && is_array($_POST['ch'])) {
        echo '';
        foreach ($_POST['ch'] as $ch) {
            echo '<li>' . htmlspecialchars($ch) . '</li>';
        }
        echo '';
    } else {
        echo 'No users selected for the transaction.';
    }
    ?> -->
<!-- This is a new way of getting value of buttons -->
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['buttonValue'])) {
        $clickedButtonValue = $_POST['buttonValue'];
        echo "" . htmlspecialchars($clickedButtonValue), "<br>";
    } elseif (isset($_POST['submitButton'])) {
        // If the text input submit button is clicked
        if (isset($_POST['textInput'])) {
            $textInputValue = $_POST['textInput'];
            echo "Other Inquiries: <br>";
            echo "" . htmlspecialchars($textInputValue), "<br>";
        } else {
            echo "No text input value submitted";
        }
    } else {
        echo "Form submitted, but no valid data received";
    }
}

// Get the JSON data sent from JavaScript
$jsonData = file_get_contents('php://input');

// Decode the JSON data to PHP array
$data = json_decode($jsonData, true);

// Handle the received data (for example, you can access it like an associative array)
if (!empty($data)) {
    $key1Value = $data['key1'];
    $key2Value = $data['key2'];
    
    // Perform operations with received data
    // For example:
    echo "Received data: Key1 = $key1Value, Key2 = $key2Value";
  } else {
    echo "No data received";
}

?>

<p id="ticketOutput"></p>

<button onclick="generateCode('REG')" id="ticketReg">Registrar</button>
<button onclick="generateCode('ADM')" id="ticketADM">Admission</button>
<button onclick="generateCode('ACAD')" id="ticketAcad">Academic</button>
<button onclick="generateCode('OSS')" id="ticketOSS">OSS</button>


    </div>

    <p>.................................................................</p> 
    
  
   
    <span id="time"> </span>
    <p id="kiosk3"> <img src="Photos/PUPKioskLogo.png" style="width: 80px;"></p>
    <script src="index.js">   </script>

  
   <br> <br>
    <div class="goBack">
        <button id="back"> <a href="Kiosk_R&A.html" class="back">&laquo; <b> Make Changes </b></a> </button>
        <button onclick="window.print()" id="print"> <b>  PRINT </b> <i class="fa fa-print"></i></button>
    </div>

    <script src="script.js"></script>
</body>
</html>