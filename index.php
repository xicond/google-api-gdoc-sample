<?php
require './vendor/autoload.php';

$client = new Google_Client();
$client->setAuthConfigFile('client_secrets.json');
$client->setDeveloperKey('AIzaSyAj6xMC62uVVLlLpaUvX-Lg9XmXRO4kvRA');

$client->setAccessType("offline");

$client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);
$client->addScope('https://spreadsheets.google.com/feeds');
$client->addScope('https://docs.google.com/feeds');
//$client->addScope(Google_Service_Data)
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');

$auth_url = $client->createAuthUrl();

header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
exit;