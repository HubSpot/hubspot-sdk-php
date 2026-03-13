<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Events\EventDetailSettings;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Events\SettingsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class SettingsService implements SettingsContract
{
    /**
     * @api
     */
    public SettingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SettingsRawService($client);
    }

    /**
     * @api
     *
     * Create or update the current settings for the application.
     *
     * @param int $appID the id of the application to update the settings for
     * @param string $eventDetailsURL The url that will be used to fetch marketing event details by id. Must contain a `%s` character sequence that will be substituted with the event id. For example: `https://my.event.app/events/%s`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createOrUpdate(
        int $appID,
        string $eventDetailsURL,
        RequestOptions|array|null $requestOptions = null,
    ): EventDetailSettings {
        $params = Util::removeNulls(['eventDetailsURL' => $eventDetailsURL]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createOrUpdate($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the current settings for the application.
     *
     * @param int $appID the id of the application to retrieve the settings for
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): EventDetailSettings {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($appID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
