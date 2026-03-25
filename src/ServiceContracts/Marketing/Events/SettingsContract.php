<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\EventDetailSettings;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
