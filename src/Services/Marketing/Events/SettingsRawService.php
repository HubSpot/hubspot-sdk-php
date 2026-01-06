<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\EventDetailSettings;
use HubspotSDK\Marketing\Events\Settings\SettingCreateOrUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Events\SettingsRawContract;

final class SettingsRawService implements SettingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create or update the current settings for the application.
     *
     * @param int $appID the id of the application to update the settings for
     * @param array{eventDetailsURL: string}|SettingCreateOrUpdateParams $params
     *
     * @return BaseResponse<EventDetailSettings>
     *
     * @throws APIException
     */
    public function createOrUpdate(
        int $appID,
        array|SettingCreateOrUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingCreateOrUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param int $appID the id of the application to retrieve the settings for
     *
     * @return BaseResponse<EventDetailSettings>
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/marketing-events/%1$s/settings', $appID],
            options: $requestOptions,
            convert: EventDetailSettings::class,
        );
    }
}
