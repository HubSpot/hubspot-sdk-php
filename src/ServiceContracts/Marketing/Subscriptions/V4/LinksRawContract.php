<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\V4\LinkGenerationResponse;
use HubspotSDK\Marketing\Subscriptions\V4\Links\LinkCreateParams;
use HubspotSDK\RequestOptions;

interface LinksRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|LinkCreateParams $params
     *
     * @return BaseResponse<LinkGenerationResponse>
     *
     * @throws APIException
     */
    public function create(
        array|LinkCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
