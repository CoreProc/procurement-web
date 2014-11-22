<?php

namespace Coreproc\Procex\Utilities;

use Config;
use Coreproc\Globe\Labs\Api\Classes\Sms;
use Coreproc\Globe\Labs\GlobeLabs;
use Coreproc\Procex\Model\Award;
use Coreproc\Procex\Model\BidInformation;
use Coreproc\Procex\Model\Subscriber;
use Geocoder\Geocoder;
use Geocoder\HttpAdapter\CurlHttpAdapter;
use Geocoder\Provider\OpenStreetMapProvider;
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
                $this->composeHelpMessage();
                break;
            case 'inquire':
                $this->composeInquireMessage();
                break;
            case 'search':
                $this->composeSearchMessage($keywords);

                break;
            default:
                break;
        }
    }

    public function composeHelpMessage()
    {
        $message = Lang::get('procex.smsMessages.help');

        $this->sendMessage($message);
    }

    /**
     * @param $keywords
     */
    public function composeSearchMessage($keywords)
    {
        $action = $keywords[2];
        $query = $keywords[3];
        $year = isset($keywords[4]) ? $keywords[4] : date('Y');
        $message = 'ERROR: Please contact support.';
        $data = null;

        if ($year) {
            switch ($action) {
                case 'classification':
                    $data = BidInformation::where('classification', '=', $query)->where('publish_date', '>=', $year . '-01-01T00:00:00');

                    $total_spent_amount =
                        Award::whereIn('ref_id', BidInformation::where('classification', '=', $query)->where('publish_date', '>=', $year . '-01-01T00:00:00')
                            ->lists('ref_id'))->sum('contract_amt');

                    break;
                case 'area':
                    $data = BidInformation::whereHas('projectLocation', function ($q) use ($query, $year) {
                        $q->whereLocation($query);
                    })->where('publish_date', '>=', $year . '-01-01T00:00:00');

                    $total_spent_amount =
                        Award::whereIn('ref_id', BidInformation::whereHas('projectLocation', function ($q) use ($query, $year) {
                            $q->whereLocation($query);
                        })->where('publish_date', '>=', $year . '-01-01T00:00:00'))->sum('contract_amt');

                    break;
                case 'category':
                    $data = BidInformation::where('business_category', '=', $query)->where('publish_date', '>=', $year . '-01-01T00:00:00');

                    $total_spent_amount =
                        Award::whereIn('ref_id', BidInformation::where('business_category', '=', $query)->where('publish_date', '>=', $year .
                            '-01-01T00:00:00'))
                            ->sum('contract_amt');

                    break;
                default;
                    return;
            }
        }

        if (isset($data)) {
            $total_projects = $data->count();
            $total_approved_projects = $data->whereTenderStatus('Awarded')->count();

            $total_budget_amount = $data->sum('approved_budget');

            $message = '- # Prj: ' . $total_projects . '
- # Apprv Prj: ' . $total_approved_projects . '
- Amt Spent: ' . $total_spent_amount . '
- Bdgt: ' . $total_budget_amount;
        }

        $this->sendMessage($message);
    }

    /**
     * @param $message
     */
    private function sendMessage($message)
    {
        $globeLabs = GlobeLabs::service(Config::get('procex.globelabs_api.appId'), Config::get('procex.globelabs_api.appSecret'));

        $smsService = $globeLabs->smsService();

        $accessToken = $this->accessToken;
        $mobileNumber = $this->sms->sender->get();
        $shortCode = Config::get('procex.globelabs_api.shortCode');

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

    private function composeInquireMessage()
    {
        Log::info('Trying to get location of ' . $this->sms->sender->get());
        // first locate the user
        $globeLabs = GlobeLabs::service(Config::get('procex.globelabs_api.appId'), Config::get('procex.globelabs_api.appSecret'));

        $locationService = $globeLabs->locationService();
        $location = $locationService->locate($this->accessToken, $this->sms->sender->get(), 100);

        if (empty($location)) {
            Log::error('Could not get location of subscriber ' . $this->sms->sender->get());
            return;
        }

        Log::info('Location found: ' . $location->latitude . ' ' . $location->longitude);

        $adapter = new CurlHttpAdapter();
        $provider = new OpenStreetMapProvider($adapter);

        $geocoder = new Geocoder($provider);

        $result = $geocoder->reverse($location->latitude, $location->longitude);

        // so we should have the region

        $province = $result->getRegion();

        $year = date('Y');

        $data = BidInformation::whereHas('projectLocation', function ($q) use ($province, $year) {
            $q->whereLocation($province);
        })->where('publish_date', '>=', $year . '-01-01T00:00:00');

        $total_spent_amount =
            Award::whereIn('ref_id', BidInformation::whereHas('projectLocation', function ($q) use ($province, $year) {
                $q->whereLocation($province);
            })->where('publish_date', '>=', $year . '-01-01T00:00:00'))->sum('contract_amt');

        if (isset($data)) {
            $total_projects = $data->count();
            $total_approved_projects = $data->whereTenderStatus('Awarded')->count();

            $total_budget_amount = $data->sum('approved_budget');

            $message = '- # Prj: ' . $total_projects . '
- # Apprv Prj: ' . $total_approved_projects . '
- Amt Spent: ' . $total_spent_amount . '
- Bdgt: ' . $total_budget_amount;

            Log::info('Sending message: ' . $message);

            $this->sendMessage($message);
            return;
        }

        Log::error('No message found');

    }

}
