<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing\Transactional;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\EmailSendStatusView;
use HubSpotSDK\Marketing\Transactional\SingleEmail\SingleEmailSendParams;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface SingleEmailRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SingleEmailSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailSendStatusView>
     *
     * @throws APIException
     */
    public function send(
        array|SingleEmailSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
