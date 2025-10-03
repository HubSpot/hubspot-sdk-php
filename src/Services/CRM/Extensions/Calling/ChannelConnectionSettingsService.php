<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Extensions\Calling\ChannelConnectionSettings\ChannelConnectionSettingCreateParams;
use HubspotSDK\CRM\Extensions\Calling\ChannelConnectionSettings\ChannelConnectionSettingUpdateParams;
use HubspotSDK\CRM\Extensions\Calling\ExtensionsCallingChannelConnectionSettingsResponse;
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
     * Configure channel connection settings
     *
     * @param bool $isReady
     * @param string $url
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        $isReady,
        $url,
        ?RequestOptions $requestOptions = null
    ): ExtensionsCallingChannelConnectionSettingsResponse {
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
    ): ExtensionsCallingChannelConnectionSettingsResponse {
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
            convert: ExtensionsCallingChannelConnectionSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Update channel connection settings
     *
     * @param bool $isReady
     * @param string $url
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        $isReady = omit,
        $url = omit,
        ?RequestOptions $requestOptions = null,
    ): ExtensionsCallingChannelConnectionSettingsResponse {
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
    ): ExtensionsCallingChannelConnectionSettingsResponse {
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
            convert: ExtensionsCallingChannelConnectionSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete channel connection settings
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        int $appID,
        mixed $params,
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
     * Retrieve channel connection settings
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): ExtensionsCallingChannelConnectionSettingsResponse {
        $params = [];

        return $this->getRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function getRaw(
        int $appID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ExtensionsCallingChannelConnectionSettingsResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'crm/v3/extensions/calling/%1$s/settings/channel-connection', $appID,
            ],
            options: $requestOptions,
            convert: ExtensionsCallingChannelConnectionSettingsResponse::class,
        );
    }
}
