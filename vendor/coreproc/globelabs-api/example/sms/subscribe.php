<?php

require '../vendor/autoload.php';

use Coreproc\Globe\Labs\GlobeLabs;

/**
 * Subscribe notify sample
 */

$accessToken = $_GET['access_token'];
$subscriberNumber = $_GET['subscriber_number'];

file_put_contents(__DIR__ . '/../storage/subscribers.txt', $accessToken . ',' . $subscriberNumber . '\n', FILE_APPEND);

$appId = 'eB75F4dyoGhRdcEqxbTyMXhR9BRBFKx8';
$appSecret = '75ccbb7bcda7c34b649c9396c531e2a5c5ba5a94f4bacdca8c3c867528f477ab';

/**
 * Send SMS message sample
 */

$globeLabs = GlobeLabs::service($appId, $appSecret);

$smsService = $globeLabs->smsService();

$smsService->setAccessToken($accessToken);
$smsService->setMobileNumber($subscriberNumber);
$smsService->setShortCode('21582328');
$smsService->setMessage('Test message');

$sms = $smsService->send();

if ($sms->isSent) {
    echo 'sent!';
} else {
    echo 'not sent!';
}