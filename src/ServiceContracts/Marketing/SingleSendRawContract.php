<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\EmailSendStatusView;
use HubSpotSDK\Marketing\SingleSend\SingleSendCreateParams;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
