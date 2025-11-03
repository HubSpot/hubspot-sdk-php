<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\Settings\SettingCreateParams;
use HubspotSDK\Crm\Extensions\Calling\Settings\SettingUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\Calling\SettingsContract;
use HubspotSDK\Webhooks\SettingsResponse;

use const HubspotSDK\Core\OMIT as omit;

final class SettingsService implements SettingsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param string $name
     * @param string $url
     * @param int $height
     * @param bool $isReady
     * @param bool $supportsCustomObjects
     * @param bool $supportsInboundCalling
     * @param bool $usesCallingWindow
     * @param bool $usesRemote
     * @param int $width
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        $name,
        $url,
        $height = omit,
        $isReady = omit,
        $supportsCustomObjects = omit,
        $supportsInboundCalling = omit,
        $usesCallingWindow = omit,
        $usesRemote = omit,
        $width = omit,
        ?RequestOptions $requestOptions = null,
    ): SettingsResponse {
        $params = [
            'name' => $name,
            'url' => $url,
            'height' => $height,
            'isReady' => $isReady,
            'supportsCustomObjects' => $supportsCustomObjects,
            'supportsInboundCalling' => $supportsInboundCalling,
            'usesCallingWindow' => $usesCallingWindow,
            'usesRemote' => $usesRemote,
            'width' => $width,
        ];

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
    ): SettingsResponse {
        [$parsed, $options] = SettingCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/extensions/calling/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: SettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * @param int $height
     * @param bool $isReady
     * @param string $name
     * @param bool $supportsCustomObjects
     * @param bool $supportsInboundCalling
     * @param string $url
     * @param bool $usesCallingWindow
     * @param bool $usesRemote
     * @param int $width
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        $height = omit,
        $isReady = omit,
        $name = omit,
        $supportsCustomObjects = omit,
        $supportsInboundCalling = omit,
        $url = omit,
        $usesCallingWindow = omit,
        $usesRemote = omit,
        $width = omit,
        ?RequestOptions $requestOptions = null,
    ): SettingsResponse {
        $params = [
            'height' => $height,
            'isReady' => $isReady,
            'name' => $name,
            'supportsCustomObjects' => $supportsCustomObjects,
            'supportsInboundCalling' => $supportsInboundCalling,
            'url' => $url,
            'usesCallingWindow' => $usesCallingWindow,
            'usesRemote' => $usesRemote,
            'width' => $width,
        ];

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
    ): SettingsResponse {
        [$parsed, $options] = SettingUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['crm/v3/extensions/calling/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: SettingsResponse::class,
        );
    }

    /**
     * @api
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
            path: ['crm/v3/extensions/calling/%1$s/settings', $appID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): SettingsResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/extensions/calling/%1$s/settings', $appID],
            options: $requestOptions,
            convert: SettingsResponse::class,
        );
    }
}
