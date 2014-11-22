<?php

namespace Coreproc\Procex\Controller\Web;

use App;
use Coreproc\Globe\Labs\Api\Services\SmsService;
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

        $jsonString = file_get_contents('php://input');

        $sms = SmsService::recieveSms($jsonString);

        Log::info("Received message {$sms->message}");
    }

} 