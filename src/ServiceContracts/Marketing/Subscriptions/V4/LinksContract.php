<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\V4\LinkGenerationResponse;
use HubspotSDK\Marketing\Subscriptions\V4\Links\LinkCreateParams\Channel;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface LinksContract
{
    /**
     * @api
     *
     * @param Channel|value-of<Channel> $channel
     * @param string $subscriberIDString
     * @param int $businessUnitID
     * @param string $language
     * @param int $subscriptionID
     *
     * @throws APIException
     */
    public function create(
        $channel,
        $subscriberIDString,
        $businessUnitID = omit,
        $language = omit,
        $subscriptionID = omit,
        ?RequestOptions $requestOptions = null,
    ): LinkGenerationResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): LinkGenerationResponse;
}
