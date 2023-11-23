<?php
if(isset($_POST['pay'])){
	date_default_timezone_set('Africa/Nairobi');
	$consumerKey = 'o2UxDF3Ar3Rg9TI2HnHUCMm9wtJxCKj2'; 
	$consumerSecret = 'oZXJAaBcPpGArsJH';

	$BusinessShortCode = '174379';
	$Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';  

	$PartyA = $_POST['phone'];
	$AccountReference = '2255';
	$TransactionDesc = 'Test Payment';
	$Amount = $_POST['amount'];
	$Timestamp = date('YmdHis');    
	$Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);

	$headers = ['Content-Type:application/json; charset=utf8'];
	$access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
	$initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
	$CallBackURL = 'https://morning-basin-87523.herokuapp.com/callback_url.php'; 

	$curl = curl_init($access_token_url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($curl, CURLOPT_HEADER, FALSE);
	curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
	$result = curl_exec($curl);
	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	$result = json_decode($result);
	$access_token = $result->access_token;  
	curl_close($curl);

	$stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $initiate_url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader);

	$curl_post_data = array(
		'BusinessShortCode' => $BusinessShortCode,
		'Password' => $Password,
		'Timestamp' => $Timestamp,
		'TransactionType' => 'CustomerPayBillOnline',
		'Amount' => $Amount,
		'PartyA' => $PartyA,
		'PartyB' => $BusinessShortCode,
		'PhoneNumber' => $PartyA,
		'CallBackURL' => $CallBackURL,
		'AccountReference' => $AccountReference,
		'TransactionDesc' => $TransactionDesc
	);

	$data_string = json_encode($curl_post_data);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
	$curl_response = curl_exec($curl);
	// Decode the JSON response
	$responseData = json_decode($curl_response, true);
if ($responseData !== null) {
	require '../db.php';
	session_start();
	$loggedInUserID = $_SESSION['user_email'];
	$invoiceNumber = rand(100000, 999999);


	$apiUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query';
	$headers = array(
		'Authorization: Basic cFJZcjZ6anEwaThMMXp6d1FETUxwWkIzeVBDa2hNc2M6UmYyMkJmWm9nMHFRR2xWOQ==',
		'Content-Type: application/json',
	);

	$requestBody = json_encode(array(
		"BusinessShortCode" => 174379,
		"Password" => "MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMjMxMTIzMDM1OTU3",
		"Timestamp" => $Timestamp,
		"CheckoutRequestID" => $responseData['CheckoutRequestID']
	));

	$curl = curl_init($apiUrl);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $requestBody);
	$apiResponse = curl_exec($curl);
	curl_close($curl);
	sleep(10);
	// Decode the API response
	$responseData = json_decode($apiResponse, true);

	$stmt = $conn->prepare("INSERT INTO payments (user_email, merchant_request_id, checkout_request_id, response_code, response_description, customer_message, invoice_number) VALUES (?, ?, ?, ?, ?, ?, ?)");

	$stmt->bind_param("sssissi", $loggedInUserID,  $responseData['MerchantRequestID'], $responseData['CheckoutRequestID'], $responseData['ResponseCode'], $responseData['ResponseDescription'], $responseData['CustomerMessage'], $invoiceNumber);
	$stmt->execute();
	$stmt->close();

	$invoiceUpdateQuery = "INSERT INTO invoices (invoice_number, email, due_date, total_amount, payment_status) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 7 DAY), ?, 'paid')";
	$updateStmt = $conn->prepare($invoiceUpdateQuery);
	$updateStmt->bind_param("sss", $invoiceNumber, $loggedInUserID, $Amount);
	$updateStmt->execute();
	$updateStmt->close();
	echo '<script>localStorage.removeItem("cart");</script>';
	header('Location: ../../index.php?notification&success');

		}
		else {
			echo "Error: Invalid JSON response";
		}
	}
?>
