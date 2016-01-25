# google-api-gdoc-sample

goto https://console.developers.google.com/apis/credentials

add oAuth Client ID

download the json result key, save as client_secrets.json

install composer

I'm using 2 libraries:

        "google/apiclient": "1.1.*",
        "asimlqt/php-google-spreadsheet-client": "2.3.7"

hope not crash on your installing

first thing, request the token, using index.php, uncomment oauth2callback.php line 26

        26. //die($access_token);

copy result access_token to oauth2callback.php line 30

        29. //change to configurable
        30. $access_token = '{
        31. "access_token": "ya29.dALnYEH949dMsMb-pkHAmqVGwAPnsGf-D9gV4VexWxK4u69CRl_pK5jSzQv8L3XnpzfH",
        32. "token_type": "Bearer",
        33. "expires_in": 3600,
        34. "created": 1453709814
        35. }';

Trial with the spreadsheet and worksheet title that you know oauth2callback.php line 73 & 75

        73. spreadsheet = $spreadsheetFeed->getByTitle('Loan Calculator');

        75. $worksheet = $worksheetFeed->getByTitle('Loan Calculator');

