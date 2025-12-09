<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\EventDetailSettings;
use HubspotSDK\RequestOptions;

interface SettingsContract
{
    /**
     * @api
     *
     * @param int $appID the id of the application to update the settings for
     * @param string $eventDetailsURL The url that will be used to fetch marketing event details by id. Must contain a `%s` character sequence that will be substituted with the event id. For example: `https://my.event.app/events/%s`
     *
     * @throws APIException
     */
    public function createOrUpdate(
        int $appID,
        string $eventDetailsURL,
        ?RequestOptions $requestOptions = null,
    ): EventDetailSettings;

    /**
     * @api
     *
     * @param int $appID the id of the application to retrieve the settings for
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): EventDetailSettings;
}
