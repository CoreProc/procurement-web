<?php

namespace Coreproc\Procex\Controller\Web;

use App;
use Carbon\Carbon;
use Coreproc\Globe\Labs\Api\Classes\Sms;
use Coreproc\Globe\Labs\Api\Services\SmsService;
use Coreproc\MsisdnPh\Msisdn;
use Coreproc\Procex\Controller\BaseController;
use Coreproc\Procex\Model\Subscriber;
use Input;
use Log;
use Validator;

class GlobeLabsController extends BaseController
{

    public function getSubscribe()
    {
        $data = [
            'accessToken'      => Input::get('access_token'),
            'subscriberNumber' => Input::get('subscriber_number')
        ];

        $rules = [
            'accessToken'      => 'required',
            'subscriberNumber' => 'required'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            App::abort(400);
        }

        $subscriber = Subscriber::where('subscriber_number', '=', $data['subscriberNumber'])
            ->first();

        if (empty($subscriber)) {
            $subscriber = new Subscriber;
        }

        $subscriber->access_token = $data['accessToken'];
        $subscriber->subscriber_number = $data['subscriberNumber'];

        $subscriber->save();
    }

    public function postIncomingSms()
    {
        Log::info('Recieved SMS... trying to read');

        $jsonStringData = file_get_contents('php://input');

        if (empty($jsonStringData)) {
            App::abort(400);
        }

        $data = json_decode($jsonStringData);

        if (empty($data)) {
            App::abort(400);
        }

        $inboundSmsMessage = $data->inboundSMSMessageList->inboundSMSMessage[0];

        if (empty($inboundSmsMessage)) {
            App::abort(400);
        }

        $sms = new Sms();
        $sms->messageId = $inboundSmsMessage->messageId;
        $sms->sender = new Msisdn($inboundSmsMessage->senderAddress);
        $sms->message = $inboundSmsMessage->message;
        $sms->createdAt = new Carbon($inboundSmsMessage->dateTime);

        Log::info("Received message {$sms->message}");
    }

} 