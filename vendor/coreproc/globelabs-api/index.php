<?php

use Coreproc\Globe\Labs\Api\Services\Sms;

require 'vendor/autoload.php';

$sms = new Sms('eB75F4dyoGhRdcEqxbTyMXhR9BRBFKx8', '75ccbb7bcda7c34b649c9396c531e2a5c5ba5a94f4bacdca8c3c867528f477ab');

if($sms->send('1231hwc_fzcFrozyvfKF5HaL2O4xNZe0IUrtz5NSq70mE8', '09175729283', 'test message', '21582328')) echo 'yeah';
