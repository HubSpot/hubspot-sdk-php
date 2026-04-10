<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing\MarketingEvents;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\MarketingEvents\EventDetailSettings;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface SettingsContract
{
    /**
     * @api
     *
     * @param string $eventDetailsURL The url that will be used to fetch marketing event details by id. Must contain a `%s` character sequence that will be substituted with the event id. For example: `https://my.event.app/events/%s`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createOrUpdate(
        int $appID,
        string $eventDetailsURL,
        RequestOptions|array|null $requestOptions = null,
    ): EventDetailSettings;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): EventDetailSettings;
}
