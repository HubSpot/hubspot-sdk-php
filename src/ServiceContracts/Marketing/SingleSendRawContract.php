<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\EmailSendStatusView;
use HubspotSDK\Marketing\SingleSend\SingleSendCreateParams;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SingleSendRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SingleSendCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailSendStatusView>
     *
     * @throws APIException
     */
    public function create(
        array|SingleSendCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
