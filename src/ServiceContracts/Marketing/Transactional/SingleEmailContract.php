<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Transactional;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\EmailSendStatusView;
use HubspotSDK\Marketing\Transactional\SingleEmail\SingleEmailSendParams;
use HubspotSDK\RequestOptions;

interface SingleEmailContract
{
    /**
     * @api
     *
     * @param array<mixed>|SingleEmailSendParams $params
     *
     * @throws APIException
     */
    public function send(
        array|SingleEmailSendParams $params,
        ?RequestOptions $requestOptions = null,
    ): EmailSendStatusView;
}
