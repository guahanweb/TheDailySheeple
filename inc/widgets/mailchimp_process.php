<?php
require '/home/bahdood/libs/mailchimp-api-php/src/Mailchimp.php';

$apikey = '5df8cc415c6c472e99bfdff456a62db0-us3';
$listid = '40bb808dc2';

function sendResponse($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

$mailchimp = new Mailchimp($apikey);
$email = isset($_POST['email']) ? trim($_POST['email']) : null;
if (null === $email || !preg_match('/^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i', $email)) {
    sendResponse(array(
        'success' => false,
        'error' => 'Invalid email address provided',
        'data' => null
    ));
} else {
    $res = $mailchimp->call('lists/subscribe', array(
        'id' => $listid,
        'email' => array('email' => $email),
        'send_welcome' => true
    ));

    sendResponse(array(
        'success' => true,
        'error' => null,
        'data' => $res
    ));
    var_dump($res);
}
?>
