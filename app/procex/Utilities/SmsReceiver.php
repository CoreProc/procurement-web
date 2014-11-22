<?php

namespace Coreproc\Procex\Utilities;

use Config;
use Coreproc\Globe\Labs\Api\Classes\Sms;
use Coreproc\Globe\Labs\GlobeLabs;
use Coreproc\Procex\Model\Subscriber;
use Lang;
use Log;

class SmsReceiver
{

    /**
     * @var string
     */
    private $accessToken;

    public function __construct(Sms $sms)
    {
        $this->sms = $sms;

        $subscriberNumber = $sms->sender->clean($sms->sender->get());

        $subscriber = Subscriber::where('subscriber_number', '=', $subscriberNumber)->first();
        if (empty($subscriber)) {
            Log::error("Did not find subscriber with mobile number: {$subscriberNumber}");
            return;
        }

        $this->accessToken = $subscriber->access_token;
    }

    public function received($string)
    {
        // analyze keywords
        // help, inquire, search query

        $string = strtolower($string);

        $keywords = explode(' ', $string);

        if ($keywords[0] != 'procex') {
            return;
        }

        // we have procex

        // analyze command
        switch ($keywords[1]) {
            case 'help':
                // send help message
                $this->sendHelpMessage();
                break;
            case 'inquire':
                break;
            case 'search':
                break;
            default:
                break;
        }
    }

    public function sendHelpMessage()
    {
        $message = Lang::get('procex.smsMessages.help');

        $globeLabs = GlobeLabs::service(Config::get('procex.globelabs_api.appId'), Config::get('procex.globelabs_api.appSecret'));

        $smsService = $globeLabs->smsService();

        $accessToken = $this->accessToken;
        $mobileNumber = $this->sms->sender->get();
        $shortCode = Config::get('procex.globelabs_api.shortCode');

        Log::info("Access Token: {$accessToken}, Mobile Number: {$mobileNumber}, Short Code: {$shortCode}");

        // we try to get the access token.....
        $smsService->setAccessToken($accessToken);
        $smsService->setMobileNumber($mobileNumber);
        $smsService->setMessage($message);
        $smsService->setShortCode($shortCode);
        $sms = $smsService->sendSms();

        if ($sms->isSent) {
            Log::info("Help SMS message has been sent to {$this->sms->sender->get()}");
        } else {
            Log::error("FAILED  to send Help SMS to {$this->sms->sender->get()}");
        }
    }

} 