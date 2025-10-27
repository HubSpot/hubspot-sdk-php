<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\Settings\SettingCreateOrUpdateParams;
use HubspotSDK\Marketing\MarketingEvents\EventDetailSettings;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Events\SettingsContract;

final class SettingsService implements SettingsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create or update the current settings for the application.
     *
     * @param string $eventDetailsURL The url that will be used to fetch marketing event details by id. Must contain a `%s` character sequence that will be substituted with the event id. For example: `https://my.event.app/events/%s`
     *
     * @throws APIException
     */
    public function createOrUpdate(
        int $appID,
        $eventDetailsURL,
        ?RequestOptions $requestOptions = null
    ): EventDetailSettings {
        $params = ['eventDetailsURL' => $eventDetailsURL];

        return $this->createOrUpdateRaw($appID, $params, $requestOptions);
    }

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
    ): EventDetailSettings {
        [$parsed, $options] = SettingCreateOrUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['marketing/v3/marketing-events/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: EventDetailSettings::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the current settings for the application.
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): EventDetailSettings {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/marketing-events/%1$s/settings', $appID],
            options: $requestOptions,
            convert: EventDetailSettings::class,
        );
    }
}
