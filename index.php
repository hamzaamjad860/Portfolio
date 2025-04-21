require_once 'vendor/autoload.php'; // Include Google Sheets API library

// Initialize Google Sheets API
$client = new Google_Client();
$client->setAuthConfig('client_secret.json'); // Your OAuth2 credentials
$client->addScope(Google_Service_Sheets::SPREADSHEETS);

$service = new Google_Service_Sheets($client);
$spreadsheetId = 'spreadsheets/d/1-kcI-AjXhe-2YML1oWJ5T_ZPCJ5dujZZL7B2F9VVv8I/edit#gid=0'';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form data
    $data = [
        $_POST['Name'],
        $_POST['Email'],
        $_POST['Phone'],
        $_POST['Message'],
        // Add more fields as needed
    ];

    // Insert data into Google Sheets
    $range = 'Sheet1'; // Change to the appropriate sheet name
    $values = [[$data]];
    $body = new Google_Service_Sheets_ValueRange(['values' => $values]);
    $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, ['valueInputOption' => 'RAW']);

    if ($result) {
        echo "Data submitted successfully!";
    } else {
        echo "Error submitting data.";
    }
}
?>