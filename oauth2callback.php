<?php
/**
 * Created by PhpStorm.
 * User: xicond
 * Date: 1/25/16
 * Time: 11:19 AM
 */

use Google\Spreadsheet\DefaultServiceRequest;
use Google\Spreadsheet\ServiceRequestFactory;

require './vendor/autoload.php';

$client = new Google_Client();
$client->setAuthConfigFile('client_secrets.json');
//$client->setApplicationName("gdoc");
$client->setAccessType("offline");
//$client->setDeveloperKey('AIzaSyAj6xMC62uVVLlLpaUvX-Lg9XmXRO4kvRA');
//$client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);
//$client->addScope('https://spreadsheets.google.com/feeds');
//$client->addScope('https://docs.google.com/feeds');

//$client->authenticate($_GET['code']);
//$access_token = $client->getAccessToken();
//echo gettype($access_token) ;
//die($access_token);


//change to configurable
$access_token = '{
"access_token": "ya29.dALnYEH949dMsMb-pkHAmqVGwAPnsGf-D9gV4VexWxK4u69CRl_pK5jSzQv8L3XnpzfH",
"token_type": "Bearer",
"expires_in": 3600,
"created": 1453709814
}';





$client->setAccessToken($access_token);
$accessToken = json_decode($access_token);

if ($client->isAccessTokenExpired()) {
    $client->setIncludeGrantedScopes(true);
    $client->refreshToken($token->access_token);
    $access_token = $client->getAccessToken();
    // save the new token to configurable
    $accessToken = json_decode($access_token);
}

$drive_service = new Google_Service_Drive($client);

$files_list = $drive_service->files->listFiles(array())->getItems();

/*foreach($files_list as $file){
    /**
     * @var Google_Service_Drive_DriveFile $file
     *
     *-/

    echo $file->getId()."<br />\r\n";
    echo $file->originalFilename."<br />\r\n";
}
die();*/

$serviceRequest = new DefaultServiceRequest($accessToken->access_token,$accessToken->token_type);
ServiceRequestFactory::setInstance($serviceRequest);


$spreadsheetService = new Google\Spreadsheet\SpreadsheetService();
$spreadsheetFeed = $spreadsheetService->getSpreadsheets();
$spreadsheet = $spreadsheetFeed->getByTitle('Loan Calculator');
$worksheetFeed = $spreadsheet->getWorksheets();
$worksheet = $worksheetFeed->getByTitle('Loan Calculator');
$listFeed = $worksheet->getListFeed();
foreach ($listFeed->getEntries() as $entry) {
    $values = $entry->getValues();
    echo var_dump($values)."<br />\r\n";
}