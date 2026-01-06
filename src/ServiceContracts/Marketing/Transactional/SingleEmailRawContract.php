<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Transactional;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\EmailSendStatusView;
use HubspotSDK\Marketing\Transactional\SingleEmail\SingleEmailSendParams;
use HubspotSDK\RequestOptions;

interface SingleEmailRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|SingleEmailSendParams $params
     *
     * @return BaseResponse<EmailSendStatusView>
     *
     * @throws APIException
     */
    public function send(
        array|SingleEmailSendParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
