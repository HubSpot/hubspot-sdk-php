<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\EmailSendStatusView;
use HubspotSDK\Marketing\SingleSend\SingleSendSendParams;
use HubspotSDK\RequestOptions;

interface SingleSendContract
{
    /**
     * @api
     *
     * @param array<mixed>|SingleSendSendParams $params
     *
     * @throws APIException
     */
    public function send(
        array|SingleSendSendParams $params,
        ?RequestOptions $requestOptions = null
    ): EmailSendStatusView;
}
