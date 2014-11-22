<?php

namespace Coreproc\Procex\Utilities;

use Config;
use Coreproc\Globe\Labs\Api\Classes\Sms;
use Coreproc\Globe\Labs\GlobeLabs;
use Coreproc\Procex\Model\BidInformation;
use Coreproc\Procex\Model\Subscriber;
use Lang;
use Log;

class SmsReceiver
{

    /**
     * @var string
     */
    private $accessToken;

    public function __construct(Sms $sms) {
        $this->sms = $sms;

        $subscriberNumber = $sms->sender->clean($sms->sender->get());

        $subscriber = Subscriber::where('subscriber_number', '=', $subscriberNumber)->first();
        if (empty($subscriber)) {
            Log::error("Did not find subscriber with mobile number: {$subscriberNumber}");

            return;
        }

        $this->accessToken = $subscriber->access_token;
    }

    public function received($string) {
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
                $this->composeHelpMessage();
                break;
            case 'inquire':
                break;
            case 'search':
                $this->composeSearchMessage($keywords);

                break;
            default:
                break;
        }
    }

    public function composeHelpMessage() {
        $message = Lang::get('procex.smsMessages.help');

        $this->sendMessage($message);
    }

    /**
     * @param $keywords
     */
    public function composeSearchMessage($keywords) {
        $action = $keywords[2];
        $query  = $keywords[3];
        $year   = isset($keywords[4]) ? $keywords[4] : date('Y');

        if($year)

        switch($action) {
            case 'classification':
                $data = BidInformation::where('classification', '=', $query)->where('publish_date', '>=', $year .'-01-01T00:00:00');

                $total_projects = $data->count();
                $total_approved_projects = $data->whereTenderStatus('Awarded')->count();

                $total_budget_amount = $data->sum('approved_budget');


                break;
            case 'area':


                break;
            case 'category':


                break;
            default;
                return;
        }

        $this->sendMessage('');
    }

    /**
     * @param $message
     */
    private function sendMessage($message) {
        $globeLabs = GlobeLabs::service(Config::get('procex.globelabs_api.appId'), Config::get('procex.globelabs_api.appSecret'));

        $smsService = $globeLabs->smsService();

        $accessToken  = $this->accessToken;
        $mobileNumber = $this->sms->sender->get();
        $shortCode    = Config::get('procex.globelabs_api.shortCode');

        Log::info("Access Token: {$accessToken}, Mobile Number: {$mobileNumber}, Short Code: {$shortCode}, Message: {$message}");

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
