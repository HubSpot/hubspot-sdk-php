<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\V4\LinkGenerationResponse;
use HubspotSDK\Marketing\Subscriptions\V4\Links\LinkCreateParams\Channel;
use HubspotSDK\RequestOptions;

interface LinksContract
{
    /**
     * @api
     *
     * @param 'EMAIL'|Channel $channel Query param:
     * @param string $subscriberIDString Body param:
     * @param int $businessUnitID Query param:
     * @param string $language Body param:
     * @param int $subscriptionID Body param:
     *
     * @throws APIException
     */
    public function create(
        string|Channel $channel,
        string $subscriberIDString,
        int $businessUnitID = 0,
        ?string $language = null,
        ?int $subscriptionID = null,
        ?RequestOptions $requestOptions = null,
    ): LinkGenerationResponse;
}
