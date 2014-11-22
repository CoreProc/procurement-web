<?php

namespace Coreproc\Procex\Controller\Web;

use App;
use Coreproc\Procex\Controller\BaseController;
use Coreproc\Procex\Model\Subscriber;
use Input;
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

} 