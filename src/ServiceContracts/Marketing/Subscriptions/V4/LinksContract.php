<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\V4\LinkGenerationResponse;
use HubspotSDK\Marketing\Subscriptions\V4\Links\LinkCreateParams;
use HubspotSDK\RequestOptions;

interface LinksContract
{
    /**
     * @api
     *
     * @param array<mixed>|LinkCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|LinkCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): LinkGenerationResponse;
}
