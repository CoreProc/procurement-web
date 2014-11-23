<?php

namespace Coreproc\Globe\Labs\Api\Classes;

use Carbon\Carbon;
use Coreproc\MsisdnPh\Msisdn;

class Sms
{

    /**
     * @var string
     */
    public $messageId;

    /**
     * @var Msisdn
     */
    public $destination;

    /**
     * @var Msisdn
     */
    public $sender;

    /**
     * @var string
     */
    public $message;

    /**
     * @var boolean
     */
    public $isSent;

    /**
     * @var Carbon
     */
    public $createdAt;

} 