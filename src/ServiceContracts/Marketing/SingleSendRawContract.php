<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\EmailSendStatusView;
use HubspotSDK\Marketing\SingleSend\SingleSendSendParams;
use HubspotSDK\RequestOptions;

interface SingleSendRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SingleSendSendParams $params
     *
     * @return BaseResponse<EmailSendStatusView>
     *
     * @throws APIException
     */
    public function send(
        array|SingleSendSendParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
