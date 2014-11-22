<?php

namespace Coreproc\Procex\Utilities;

use Config;
use Coreproc\Globe\Labs\Api\Classes\Sms;
use Coreproc\Globe\Labs\GlobeLabs;
use Coreproc\Procex\Model\Subscriber;
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

        $subscriber = Subscriber::where('subscriber_number', '=', $sms->sender->clean($sms->sender->get()))->get();
        if (empty($subscriber)) {
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

        $message = 'Help message should be here';

        $globeLabs = GlobeLabs::service(Config::get('globelabs_api.appId'), Config::get('globelabs_api.appSecret'));

        $smsService = $globeLabs->smsService();

        // we try to get the access token.....
        $smsService->setAccessToken($this->accessToken);
        $smsService->setMobileNumber($this->sms->sender->get());
        $smsService->setMessage($message);
        $smsService->setShortCode(Config::get('globelabs_api.shortCode'));
        $sms = $smsService->sendSms();

        if ($sms->isSent) {
            Log::info("Help SMS message has been sent to {$this->sms->sender->get()}");
        } else {
            Log::error("FAILED  to send Help SMS to {$this->sms->sender->get()}");
        }
    }

} 