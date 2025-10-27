<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\EventDetailSettings;
use HubspotSDK\RequestOptions;

interface SettingsContract
{
    /**
     * @api
     *
     * @param string $eventDetailsURL The url that will be used to fetch marketing event details by id. Must contain a `%s` character sequence that will be substituted with the event id. For example: `https://my.event.app/events/%s`
     *
     * @throws APIException
     */
    public function createOrUpdate(
        int $appID,
        $eventDetailsURL,
        ?RequestOptions $requestOptions = null
    ): EventDetailSettings;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createOrUpdateRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): EventDetailSettings;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): EventDetailSettings;
}
