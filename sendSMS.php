<?php  


session_start();
if(!isset($_SESSION['login_id']))
header('location:login.php');



$host = 'localhost';
$username = 'root';
$password = '';
$database = 'voting_db';

use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

$apiURL = "k2zp48.api.infobip.com";
$apiKey = "559185f5c41fade09b108012826be0b7-c9dff2f1-9435-4375-bec0-9840b4fd1cbd";

require __DIR__ . "/vendor/autoload.php";

// Function to generate a complex OTP
function generateComplexOTP() {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz@';
    $otp = '';

     $charactersLength = strlen($characters);

     for ($i = 0; $i < 8; $i++) {
         $otp .= $characters[rand(0, $charactersLength - 1)];
     }

      return $otp;
      
}

$phoneNumber = $_POST["phoneNumber"];

// Function to insert OTP into the user's record in the database
function insertOTPIntoDatabase($otp, $phoneNumber, $connection) {
    $sql = "UPDATE users SET otp = '$otp' WHERE phone_number = '$phoneNumber'";
    $result = mysqli_query($connection, $sql);

    return $result;
}

// Example: Generate an 8-character complex OTP
$otp = generateComplexOTP();

   //echo "Generated Complex OTP: $otp";

// Replace with your actual database connection code
$connection = mysqli_connect($host, $username, $password, $database);

if ($connection) {
    
    $insertResult = insertOTPIntoDatabase($otp, $phoneNumber, $connection);



    // Close the database connection
    mysqli_close($connection);
} else {
    echo "Error connecting to the database.";
}


$sendmessage = "Elections 2024\nInvitation to vote: institution SRC.\nHere is your OTP: $otp.\nlink to proceed: https://yourwebsite.com\n8AM to 8PM (2024-03-11)\nThank you!";    

$configuration = new Configuration(host: $apiURL, apiKey: $apiKey);
$api= new SmsApi(config: $configuration);

$destination = new SmsDestination(to: $phoneNumber);

$theMessage = new SmsTextualMessage(
    destinations: [$destination],
    text: $sendmessage,
    from: "Syntax Flow"
);

$request = new SmsAdvancedTextualRequest(messages: [$theMessage]);
$response= $api->sendSmsMessage($request);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SMS Sent</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
        }
        p {
            color: #333;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>SMS Message Sent</h1>
        <p>Your SMS invitation has been sent successfully.</p>
        
    </div>
</body>
</html>