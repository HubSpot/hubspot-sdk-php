<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\EventDetailSettings;
use HubspotSDK\Marketing\Events\Settings\SettingCreateOrUpdateParams;
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
     * @param array{eventDetailsUrl: string}|SettingCreateOrUpdateParams $params
     *
     * @throws APIException
     */
    public function createOrUpdate(
        int $appID,
        array|SettingCreateOrUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): EventDetailSettings {
        [$parsed, $options] = SettingCreateOrUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<EventDetailSettings> */
        $response = $this->client->request(
            method: 'post',
            path: ['marketing/v3/marketing-events/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: EventDetailSettings::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<EventDetailSettings> */
        $response = $this->client->request(
            method: 'get',
            path: ['marketing/v3/marketing-events/%1$s/settings', $appID],
            options: $requestOptions,
            convert: EventDetailSettings::class,
        );

        return $response->parse();
    }
}
