<?php

error_reporting(E_ALL);

require '../../vendor/autoload.php';

use Coreproc\Globe\Labs\Api\Services\SmsService;

$sms = SmsService::recieveSms();

file_put_contents(__DIR__ . '/../storage/incoming.txt', json_encode($sms));