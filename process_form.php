<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the checkout URL from the form data
    $checkoutUrl = $_POST['checkoutlink'];

    // Create a cURL session to fetch the checkout page
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://csgrabber.herokuapp.com/checkout');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['checkouturl' => $checkoutUrl]));
    $response = curl_exec($ch);
    curl_close($ch);
    // echo $response;

    // Parse the JSON response and extract the relevant data
    $data = json_decode($response, true);
    $pk_live = isset($data['pk_live']) ? $data['pk_live'] : null;
    $cs_live = isset($data['cs_live']) ? $data['cs_live'] : null;
    $Amount = isset($data['Amount']) ? $data['Amount'] : null;
    $Email = isset($data['Email']) ? $data['Email'] : null;

    // Create a JSON response with the extracted data
    $response = json_encode([
        'pk_live' => $pk_live,
        'cs_live' => $cs_live,
        'Amount' => $Amount,
        'Email' => $Email,
    ]);

    // Send the JSON response back to the client
    echo $response;
    exit;
}
