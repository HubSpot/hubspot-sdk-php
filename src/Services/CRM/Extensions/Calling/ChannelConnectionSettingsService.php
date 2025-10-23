<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Extensions\Calling\ChannelConnectionSettings\ChannelConnectionSettingCreateParams;
use HubspotSDK\CRM\Extensions\Calling\ChannelConnectionSettings\ChannelConnectionSettingUpdateParams;
use HubspotSDK\CRM\Extensions\Calling\ChannelConnectionSettingsResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Extensions\Calling\ChannelConnectionSettingsContract;

use const HubspotSDK\Core\OMIT as omit;

final class ChannelConnectionSettingsService implements ChannelConnectionSettingsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Configure [channel connection settings](https://developers.hubspot.com/docs/guides/api/crm/extensions/third-party-calling#create-channel-connection-settings) for the app.
     *
     * @param bool $isReady If true, this app will be considered to support channel connection
     * @param string $url The URL to fetch phone numbers available for channel connection
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        $isReady,
        $url,
        ?RequestOptions $requestOptions = null
    ): ChannelConnectionSettingsResponse {
        $params = ['isReady' => $isReady, 'url' => $url];

        return $this->createRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ChannelConnectionSettingsResponse {
        [$parsed, $options] = ChannelConnectionSettingCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v3/extensions/calling/%1$s/settings/channel-connection', $appID,
            ],
            body: (object) $parsed,
            options: $options,
            convert: ChannelConnectionSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Update existing [channel connection settings](https://developers.hubspot.com/docs/guides/api/crm/extensions/third-party-calling#manage-the-webhook-settings-for-channel-connection) for your app.
     *
     * @param bool $isReady If true, this app will be considered to support channel connection
     * @param string $url The URL to fetch phone numbers available for channel connection
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        $isReady = omit,
        $url = omit,
        ?RequestOptions $requestOptions = null,
    ): ChannelConnectionSettingsResponse {
        $params = ['isReady' => $isReady, 'url' => $url];

        return $this->updateRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ChannelConnectionSettingsResponse {
        [$parsed, $options] = ChannelConnectionSettingUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'crm/v3/extensions/calling/%1$s/settings/channel-connection', $appID,
            ],
            body: (object) $parsed,
            options: $options,
            convert: ChannelConnectionSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete the [channel connection settings](https://developers.hubspot.com/docs/guides/api/crm/extensions/third-party-calling#delete-existing-channel-connection-settings) for the app.
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'crm/v3/extensions/calling/%1$s/settings/channel-connection', $appID,
            ],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve the settings related to the app's [channel connection](https://developers.hubspot.com/docs/guides/api/crm/extensions/third-party-calling#fetch-existing-channel-connection-settings).
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): ChannelConnectionSettingsResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'crm/v3/extensions/calling/%1$s/settings/channel-connection', $appID,
            ],
            options: $requestOptions,
            convert: ChannelConnectionSettingsResponse::class,
        );
    }
}
